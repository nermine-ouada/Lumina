<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ("../../../config.php");

$req = $conn->prepare('delete from session where session_id=?');

$req->execute([$_GET['session_id']]);

header('location:index.php');

?>