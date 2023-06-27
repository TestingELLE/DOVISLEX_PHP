<?php
session_start();

if (!isset($_SESSION['uname'], $_SESSION['type'])) {
    // If the username and type are not set in the session,
    // redirect to login page
    header("Location: login.php");
    exit();
}

if (!in_array($_SESSION['type'], ["Admin", "Maintainer", "Programmer"])) {
    // If the user type is not one of the authorized types,
    // redirect to login page
    header("Location: login.php");
    exit();
}

// Include the connection file
include_once("connection.php");

// Check if the connection was successful
if (!isset($connection)) {
    // If the connection failed, set an error message and redirect to login
    $_SESSION['login_error'] = 'Database connection failed.';
    header("Location: login.php");
    exit();
}
?>
