<?php
// Check if the server is localhost
if($_SERVER['HTTP_HOST'] === 'localhost:8888') {
    // Local server redirection
    header("Location: http://localhost:8888/DOVISLEX_PHP/it/index.php");
} else {
    // Server redirection
    header("Location: https://dovislex.eu/it/index.php");
}
exit;
?>
