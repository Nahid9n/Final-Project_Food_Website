<?php
	include('../config/constants.php');
	//Destroy Session 
	session_destroy(); //unsets $_SESSION['user']

	//Redirect to login page
	header("location:".SITEURL.'admin/login.php');

?>