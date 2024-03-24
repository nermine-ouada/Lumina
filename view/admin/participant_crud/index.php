<?php
session_start();

if (!isset ($_SESSION['email'])) {
    header("location:../../auth/login.html");
}
include ('../layouts/header.php');
include ("../../../config.php");
?>

<?php include ('../layouts/footer.php'); ?>