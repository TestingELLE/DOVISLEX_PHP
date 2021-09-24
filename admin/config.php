<?php 
//include('../admin/login.php');

//set global variable for db
$dovisLex_db = "z1bb6fc8_dovisLex";
$db_server = "cloud16.hostgator.com";//set global variable for db
// hardcode temporary
$uname_long = "z1bb6fc8_Anh";
$password = "Anh4343&&";

	session_start();
        
   
	// connect to database
        // do not hardcode username and password
	$conn=mysqli_connect($db_server,$uname_long,$password,$dovisLex_db);

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/DOVISLEX_PHP/news_article_form/');
?>