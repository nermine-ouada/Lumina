<?php
session_start();

if (!isset ($_SESSION['email'])) {
    header("location:../../auth/login.html");
}
include ('../layouts/header.php');
require '../../../config.php';


?>



<?php include ('../layouts/footer.php'); ?>