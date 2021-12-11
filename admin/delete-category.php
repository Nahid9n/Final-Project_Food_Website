<?php 
	include('../config/constants.php');
	//echo "delete";
	//check whether the id and iamge_name value is set or not 
	if(isset($_GET['id']) && isset($_GET['image_name']))
	{
		//Get the value and Delete
		//echo "Get Value and Delete";
		$id = $_GET['id'];
		$image_name = $_GET['image_name'];

		//Remove the physical image file is available
		if($image_name!="")
		{
			//image is available
			$path = "../images/category/".$image_name;
			//Remove the image
			$remove = unlink($path);

			if($remove==false)
			{
				//set the session
				$_SESSION['remove'] = "<div class='erro'>Failed to Remove category Iamge.</div>";
				//redirect to manage category page
				header("location:".SITEURL.'admin/manage-category.php');
				//stop the process
				die();
			}
		}

		//Delete data from database
		$sql = "DELETE FROM tbl_category WHERE id=$id";

		//Exectue the Query
		$res = mysqli_query($conn, $sql);

		//check whether the data delete or not
		if($res==true)
		{
			//Set success message
			$_SESSION['delete'] = "<div class='success'>category deleted Successfully</div>";
			//redirect to manage category
			header("location:".SITEURL.'admin/manage-category.php');

		}
		else{
			//failed Message
			$_SESSION['delete'] = "<div class='error'>category failed to delete.</div>";
			//redirect to manage category
			header("location:".SITEURL.'admin/manage-category.php');

		} 
		//Redirect to manage Category page
	}
	else
	{
		//redirect to manage category page
		header("location:".SITEURL.'admin/manage-category.php');
	}
?>