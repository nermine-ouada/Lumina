<?php
session_start();

session_destroy();

header("Location: login.html");
exit(); // Ensure that no other code is executed after the redirection
?>