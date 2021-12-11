<?php 
	//Authorization Access Control
	//check the user is logged in or not

	if(!isset($_SESSION['user']))  //If user session is not set
	{
		//user is not logged in

		//Redirect to login page
		$_SESSION['no-login-message'] = "<div class='error text-center'>Please Login to access Admin Panel.</div>";
		header("location:".SITEURL.'admin/login.php');
	}
?>