<?php
require '../../../config.php';

$req = $conn->prepare(
    'update admin set first_name=?,last_name=?,email=?,password=?,tel=?,cin=?,poste=?,updated_at=? where admin_id=?'
);
$currentDateTime = date("Y-m-d H:i:s");
$req->execute([
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['email'],
    $_POST['password'],
    $_POST['tel'],
    $_POST['cin'],
    $_POST['poste'],
    $currentDateTime,
    $_POST['admin_id'],
]);

header('location:index.php');

?>