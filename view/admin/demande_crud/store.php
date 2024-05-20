<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
    exit;
}

include ("../../../config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fiche_demande_id = $_POST['fiche_demande_id'];

    // Begin transaction
    $conn->beginTransaction();

    try {
        // Get session_id from the selected fiche_demande
        $sql = 'SELECT session_id FROM fiche_demande WHERE fiche_demande_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fiche_demande_id]);
        $session = $stmt->fetch();
        $session_id = $session['session_id'];

        // Update the selected fiche_demande to "accepted"
        $sql = 'UPDATE fiche_demande SET status = "accepted" WHERE fiche_demande_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fiche_demande_id]);

        // Update the rows in ligne_fiche with the same fiche_demande_id to "accepted"
        $sql = 'UPDATE ligne_fiche SET status = "accepted" WHERE fiche_demande_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fiche_demande_id]);

        // Update all other demands with the same session_id to "denied"
        $sql = 'UPDATE fiche_demande SET status = "denied" WHERE session_id = ? AND fiche_demande_id != ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$session_id, $fiche_demande_id]);

        // Commit transaction
        $conn->commit();

        // Redirect or display success message
        header("location:success_page.php"); // Redirect to a success page
        exit;

    } catch (Exception $e) {
        // Rollback transaction if an error occurs
        $conn->rollBack();
        echo "Failed: " . $e->getMessage();
    }
}
?>