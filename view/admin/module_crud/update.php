<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
require '../../../config.php';

$req = $conn->prepare(
    'update module set title=?,description=?,formation_id=?,volume_cours=?,volume_tp=?,volume_td=?, updated_at=? where module_id=?'
);
$currentDateTime = date("Y-m-d H:i:s");
$req->execute([



    $_POST['title'],
    $_POST['description'],
    $_POST['formation_id'],
    $_POST['volume_cours'],
    $_POST['volume_tp'],
    $_POST['volume_td'],



]);

header('location:index.php');

?>