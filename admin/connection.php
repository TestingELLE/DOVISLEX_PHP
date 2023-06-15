<?php
$host = "cloud16.hostgator.com";

// Check if username and password are set in the session
if (isset($_SESSION['uname_long']) && isset($_SESSION['psw'])) {
    $user = $_SESSION['uname_long'];
    $pass = $_SESSION['psw'];
    $db = "z1bb6fc8_dovisLex";

    $connection = new mysqli($host, $user, $pass, $db);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
} else {
    // If the username and password are not set in the session, 
    // we should not try to create a connection and can handle it as an error
    $_SESSION['login_error'] = 'Please enter a username and password.';
}
?>
