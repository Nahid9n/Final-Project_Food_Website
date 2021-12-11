<?php include('partials/menu.php');?>

	<!-- Main content section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Add Admin</h1> 
 			<br><br>

 			<?php
 				if(isset($_SESSION['add'])) {
					echo $_SESSION['add'];//Displaying Session Message
					unset($_SESSION['add']); //Removing Session Message
				}
 			?>
			<form action="" method="POST">
				
				<table class="tbl-30">
					<tr>
						<td>Full Name: </td>
						<td><input type="text" name="full_name" placeholder="Enter your Name" required>
						</td>
					</tr>

					<tr>
						<td>UserName: </td>
						<td><input type="text" name="username" placeholder="Enter your username" required>
						</td>
					</tr>

					<tr>
						<td>Password: </td>
						<td><input type="password" name="password" placeholder="Enter your Password" required>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>

<?php include('partials/footer.php')?>

<?php
	//Process the value from and save it in database
	//check whether the submit button is clicked or not

	if(isset($_POST['submit']))
	{
		//echo "Button Clicked";
		//Get the value from Form

		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$password = md5($_POST['password']); //password Encription With md5

		//SQL Query to save the data into database

		$sql = "INSERT INTO tbl_admin SET full_name='$full_name',username='$username',password='$password'";

		
		
		//Executing Query and saving data into Database
		$res = mysqli_query($conn, $sql) or die(mysqli_error());

		if($res==TRUE){
			//echo "Data Inserted Successfully";

			$_SESSION['add'] = "Admin added Successfully";

			//Redirect to manage Admin page
			header("location:".SITEURL.'admin/manage-admin.php');
		}
		else{
			//echo "Failed to insert data";

			$_SESSION['add'] = "Failed to Add Admin";

			//Redirect to manage Admin page
			header("location:".SITEURL.'admin/manage-admin.php');
		}

	}

?>