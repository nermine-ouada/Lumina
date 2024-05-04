<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ("../../../config.php");

$req = $conn->prepare('delete from formation_category where formation_category_id=?');

$req->execute([$_GET['formation_category_id']]);

header('location:index.php');

?>