<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ("../../../config.php");

$req = $conn->prepare('delete from participant where participant_id=?');

$req->execute([$_GET['participant_id']]);

header('location:index.php');

?>