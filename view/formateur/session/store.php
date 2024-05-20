<?php
session_start();
include ("../../../config.php");
require '../../../model/uuid.php';

$fiche_demande_id = Uuid::generate();
try {
    // Insert into fiche_demande
    $sql = "INSERT INTO fiche_demande (fiche_demande_id, session_id, formateur_id, status) VALUES (?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fiche_demande_id, $_POST['session_id'], $_SESSION['formateur_id'], 'encours']);

    // Insert into fiche_demande_rows for each selected module
    if (isset($_POST['module_id']) && is_array($_POST['module_id'])) {
        foreach ($_POST['module_id'] as $module_id) {
            $fiche_demande_row_id = Uuid::generate();
            $sql = "INSERT INTO fiche_demande_rows (fiche_demande_row_id, fiche_demande_id, module_id,etat) VALUES (?, ?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fiche_demande_row_id, $fiche_demande_id, $module_id, 'encours']);
        }
    }

    $_SESSION["successAdd"] = "Record added  successfully";
    header("location:index.php");

    // Redirect to a success page
    exit;

} catch (Exception $e) {
    // Rollback transaction if an error occurs
    $conn->rollBack();
    $_SESSION["errorAdd"] = $e->getMessage();
} ?>