<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.html");
}
require '../../../config.php';

$req = $conn->prepare(
    'update formation_category set category_name=?,updated_at=? where formation_category_id=?'
);
$currentDateTime = date("Y-m-d H:i:s");
$req->execute([
    $_POST['category_name'],
    $currentDateTime,
    $_POST['formation_category_id'],
]);

header('location:index.php');

?>