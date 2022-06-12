<?php 
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Colombo");

	define("TODAY", date("Y-m-d h:i:s"));
	
	define("DB_SERVER", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "course_assist");

	require_once __DIR__."/functions/main.php";
	require_once __DIR__."/modules/faculty/main.php";
	require_once __DIR__."/modules/department/main.php";
	require_once __DIR__."/modules/program/main.php";
	
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}


?>