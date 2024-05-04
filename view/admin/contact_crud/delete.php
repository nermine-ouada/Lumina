<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ("../../../config.php");

$req = $conn->prepare('delete from contact where contact_id=?');

$req->execute([$_GET['contact_id']]);

header('location:index.php');

?>