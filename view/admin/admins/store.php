<?php
require '../../../config.php';
require '../../../model/uuid.php';

$sql = 'INSERT INTO admin (  admin_id,cin,first_name,last_name,email,password,tel,poste) VALUES (?,?,?,?,?,?,?,?)';

$req = $conn->prepare($sql);

$req->execute([
    Uuid::generate(),
    $_POST['cin'],
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['email'],
    $_POST['password'],
    $_POST['tel'],
    $_POST['poste'],
]);

header('location:index.php')
    ?>