<?php
include ("../../../config.php");

$req = $conn->prepare('delete from formation where formation_id=?');

$req->execute([$_GET['formation_id']]);

header('location:index.php');

?>