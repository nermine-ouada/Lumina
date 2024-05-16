<?php 
session_start();

if (!isset($_SESSION['participant'])) {
    header("location:auth/login.php");
}include('header.php');
?>



<?php include ('footer.php');?>