<?php
session_start();

if (!isset($_SESSION['formateur'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
include ("../../../config.php");

$req = $conn->prepare('delete from formateur where formateur_id=?');

$req->execute([$_GET['formateur_id']]);

header('location:index.php');

?>