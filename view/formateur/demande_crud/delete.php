<?php
include ("../../../config.php");

$req = $conn->prepare('delete from formateur where formateur_id=?');

$req->execute([$_GET['formateur_id']]);

header('location:index.php');

?>