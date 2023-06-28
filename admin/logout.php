<!-- logout for posts.php (functional) -->
<?php
//why are there two logout.php???


session_start();
//session_unset($_SESSION['uname']);
session_destroy();
header("location:login.php");
exit;
?>