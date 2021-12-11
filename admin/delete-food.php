<?php
	//echo "Delete";

	include('../config/constants.php');

	if(isset($_GET['id']) && isset($_GET['image_name']))
	{
		//Process to Delete
		//echo "delete";
		//1. Get Id and Image Name
			$id = $_GET['id'];
			$image_name =$_GET['image_name'];


			//2. Remove the Image If available
			if($image_name !="")
			{
				//It has image and need to remove from folder
				//Get the image path
				$path ="../images/food/".$image_name;

				//Remove image file form folder
				$remove = unlink($path);
				//check whether the image is removed or not
				if ($remove==false) 
				{
					//Failed to remove image
					$_SESSION['upload'] ="<div class='error'>Failed to remove image File.</div>";
					//Redirect to manage food 
					header('location:'.SITEURL.'admin/manage-food.php');
					//stop the process of deleting Food
					die();
				}
			}

			//3. Delete Food from Database

			    $sql ="DELETE FROM tbl_food WHERE id=$id";
			    //Execute the Query
			    $res = mysqli_query($conn, $sql);

			    //Check wheter the query execute or not and set the session message respectively
			    //4. Redirect to mange Food with session Message 
			    if ($res==true) 
			    {
			    	//Food deleted
			    	$_SESSION['delete']="<div class='success'>Food Deleted Successfully.</div>";
			    	header("location:'.SITEURL.'admin?manage-food.php");
			    }
			    else
			    {
			    	//Failed to  Delete Food
			    	$_SESSION['delete']="<div class='error'>Failed to Delete Food.</div>";
			    	header("location:'.SITEURL.'admin?manage-food.php");
			    }


	


	}
	else
	{
		//redirect to maange Food page
		//echo "Redirect";
		$_SESSION['delete'] = "<div class='error'>Unauthorized.</div>";
		header("location:".SITEURL.'admin/manage-food.php');
	}

?>