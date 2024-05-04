<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ("../../../config.php");

$req = $conn->prepare('delete from module where module_id=?');

$req->execute([$_GET['module_id']]);

header('location:index.php');

?>