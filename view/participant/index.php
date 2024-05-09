<?php 
session_start();

if (!isset($_SESSION['participant'])) {
    header("location:auth/login.php");
}include('layouts/header.php');
?>


<?php include ('layouts/footer.php');?>