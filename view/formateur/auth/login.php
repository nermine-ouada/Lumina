<?php
require '../../../config.php';
$sql = "SELECT * FROM formateur WHERE email=? AND password=?";

$req = $conn->prepare($sql);

$req->execute([$_POST["email"], $_POST["password"],]);

$result = $req->fetch();

if ($req->rowCount() > 0) {
    session_start();
    $_SESSION['formateur'] = $result["email"];
    header("Location: ../layouts/dashboard.php");
} else {
    header("Location: login.html");
}

?>
