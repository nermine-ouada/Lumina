<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
require '../../../config.php';

$req = $conn->prepare(
    'update promotion set title=?,taux_reduction=?,description=?,updated_at=? where promotion_id=?'
);
$currentDateTime = date("Y-m-d H:i:s");
$req->execute([
    $_POST['title'],
    $_POST['taux_reduction'],
    $_POST['description'],
    
    $currentDateTime,
    $_POST['promotion_id'],
]);

header('location:index.php');

?>