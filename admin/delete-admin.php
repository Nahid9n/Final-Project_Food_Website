<?php 
	
	include('../config/constants.php');
	//get the ID of admin to Deleted
	 $id = $_GET['id'];
	//Create SQL Query to Deleted Admin
	 $sql = "DELETE FROM tbl_admin WHERE id=$id";

	 //Execute the Query
	 $res = mysqli_query($conn, $sql);

	 //check the query executed Successfully or Not
	 if ($res==true) {
	 	//query executed successfully and admin Deleted
	 	//echo "Admin Deleted";

	 	$_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
	 	//redirect to Manage Admin Page
	 	header("location:".SITEURL.'admin/manage-admin.php');
	 }
	 else
	 {
	 	//Failed to Delted Admin
	 	//echo "Failed to Deleted Admin";

	 	$_SESSION['delete'] = "<div class='error'>Failed to delete Admin. Try Again Later.</div>";
	 	//redirect to Manage Admin Page
	 	header("location:".SITEURL.'admin/manage-admin.php');
	 }
?>