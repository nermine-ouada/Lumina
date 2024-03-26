<?php
include ("../../../config.php");

$req = $conn->prepare('delete from admin where admin_id=?');

$req->execute([$_GET['admin_id']]);

header('location:index.php');

?>