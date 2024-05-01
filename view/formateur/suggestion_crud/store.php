<?php
session_start();

if (!isset($_SESSION['formateur'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
require '../../../config.php';
require '../../../model/uuid.php';

$sql = 'INSERT INTO formation_suggestion (  formation_suggestion_id,title,description,formation_category_id,etat) VALUES (?,?,?,?,?)';

$req = $conn->prepare($sql);

$req->execute([
    Uuid::generate(),
    $_POST['title'],
    $_POST['description'],
    $_POST['formation_category_id'],
    "encours",
]);

header('location:index.php')
    ?>