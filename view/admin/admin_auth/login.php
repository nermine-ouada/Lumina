<?php
require '../../config.php';
$sql = "SELECT * FROM admin WHERE email=? AND password=?";

$req = $conn->prepare($sql);

$req->execute([$_POST["email"], $_POST["password"],]);

$result = $req->fetch();

if ($req->rowCount() > 0) {
    session_start();
    $_SESSION['admin'] = $result["email"];
    header("Location: ../admin/layouts/dashboard.php");
} else {
    header("Location: login.html");
}

?>
