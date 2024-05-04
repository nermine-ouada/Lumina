<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ("../../../config.php");

$req = $conn->prepare('delete from promotion where promotion_id=?');

$req->execute([$_GET['promotion_id']]);

header('location:index.php');

?>