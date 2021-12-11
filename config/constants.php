<?php
	//start session
	session_start();



	//Create Constants to store Repeating Values
	define('SITEURL','http://localhost/Food_Order_Website/Food_Order/');
	define('LOCALHOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'food-point');


	$conn =mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
	 //Database Connection
	$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); 
	//Database Selecting


?>