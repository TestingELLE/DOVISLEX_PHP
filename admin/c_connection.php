<?php
    session_start();

    $host = "cloud16.hostgator.com";
    $user = $_SESSION['uname_long'];
    $pass = $_SESSION['psw'];
    $db = "z1bb6fc8_dovisLex";
    
    $connection = new mysqli($host, $user, $pass, $db);

    if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    }
?>
