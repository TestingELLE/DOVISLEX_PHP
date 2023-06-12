<?php
function createConnection() {
    
    $host = "cloud16.hostgator.com";
    $user = "z1bb6fc8_aViewer";
    $pass = "RestrictedUser";
    $db = "z1bb6fc8_dovisLex";

    $connection = new mysqli($host, $user, $pass, $db);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    
    return $connection;
}

// Call the function
$connection = createConnection();