<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
    exit;
}

include ("../../../config.php");

$fiche_demande_id = $_POST['fiche_demande_id'];

// Begin transaction
$conn->beginTransaction();

try {
    $sql = 'SELECT session_id FROM fiche_demande WHERE fiche_demande_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fiche_demande_id]);
    $session = $stmt->fetch();
    $session_id = $session['session_id'];

    $sql = 'UPDATE fiche_demande SET status = "accepte" WHERE fiche_demande_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fiche_demande_id]);

    $sql = 'UPDATE ligne_fiche SET etat = "accepte" WHERE fiche_demande_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fiche_demande_id]);

    $sql = 'UPDATE fiche_demande SET status = "refuse" WHERE session_id = ? AND fiche_demande_id != ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$session_id, $fiche_demande_id]); 


    $conn->commit();

    // Redirect or display success message
    $_SESSION["successAdd"]="Record added  successfully";
    header("location:index.php"); 

    // Redirect to a success page
    exit;

} catch (Exception $e) {
    // Rollback transaction if an error occurs
    $conn->rollBack();
    $_SESSION["errorAdd"] = $e->getMessage();

}
?>