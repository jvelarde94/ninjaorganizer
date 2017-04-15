<?php
/*
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'ninja999');
define('DB_PASSWORD', 'ninja');
define('DB_DATABASE', 'ninjadatabase');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
*/
	
//connect to database
$servername = "localhost:3306";
$username = "ninja999";
$password = "ninja";
$database = "ninjadatabase";
$conn = mysqli_connect($servername, $username, $password, $database);

//if error in connecting
if (!$conn) {
    die("Database connection failed: ".mysqli_connect_error());
}
?>