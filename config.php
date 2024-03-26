<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Lumina';
$port='3308';
$conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);

?>