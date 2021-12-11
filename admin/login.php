<?php include('../config/constants.php')?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login- Food Order System</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="login">
		<h1 class="text-center">Login</h1>
		<br><br>

		<?php
			if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}

			if(isset($_SESSION['no-login-message'])) 
			{
				 echo $_SESSION['no-login-message'];
				 unset($_SESSION['no-login-message']);
			}
		?>
		<form action=""method="POST" class="text-center">
			Username: <br>
			<input type="text" name="username" placeholder="Enter Username"><br>
			Password:<br>
			<input type="password" name="password" placeholder="Enter Password"> <br><br>
			<input type="submit" name="submit" value="Login" class="btn-primary">
			<br><br>

		</form>
	
	<p class="text-center">Create By - Group 10</p>
	</div>
</body>
</html>

<?php
	//check whether the submit button is clicked or Not
	if(isset($_POST['submit']))
	{
		//process for login
		//1.Get the data from login form
		$username=$_POST['username'];
		$password=md5($_POST['password']);

		//2.SQL to check whether the user with username and password exists or not
		$sql="SELECT*FROM tbl_admin WHERE username='$username' AND password='$password'";

		//3.Execute the query 
		$res = mysqli_query($conn, $sql);

		//4.count rows to check whether the user exists or not
		$count = mysqli_num_rows($res);

		if($count==1)
		{
			//user Available and login success
			$_SESSION['login'] = "<div class='success'>Login Successful.</div>";
			$_SESSION['user']= $username; //To check the user is logged in or not and logout will unset it .


			//Redirect to home page /Dashboard
			header("location:".SITEURL.'admin/');
		}
		else
		{
			//user not available and login Failed
			$_SESSION['login'] = "<div class='error'>Username or password did not match.</div>";
			//Redirect to home page /Dashboard
			header("location:".SITEURL.'admin/login.php');
		}
	}
?>

<!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">NAHID SAYED MORSHED TAFSIMUL</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->