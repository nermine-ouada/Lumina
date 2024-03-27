<?php
include ("../../../config.php");

$req = $conn->prepare('delete from participant where participant_id=?');

$req->execute([$_GET['participant_id']]);

header('location:index.php');

?>