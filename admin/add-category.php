<?php include('partials/menu.php')?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Category</h1>
		<br><br>

		<?php  
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
		?>

		<br><br>
		<!--Add category Form Starts-->
        <!--enctype is allow us to upload file or image -->
		<form action="" method="POST" enctype="multipart/form-data"> 
			
			<table class="tbl-30">
				<tr>
					<td>Title : </td>
					<td>
						<input type="text" name="title" placeholder="category Title">
					</td>
				</tr> 
				<tr>
					<td>Select Image : </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr> 
				<tr>
					<td>Featured : </td>
					<td>
						<input type="radio" name="featured" value="Yes"> Yes
						<input type="radio" name="featured" value="No"> No
					</td>
				</tr>

				<tr>
					<td>Active : </td>
					<td>
						<input type="radio" name="active" value="Yes"> Yes
						<input type="radio" name="active" value="No"> No
					</td>
				</tr>

				<tr>
					<td colspan="2">
					<input type="submit" name="submit" value="Add Category" class="btn-secondary">
					</td>
					
						
				</tr>
			</table>
		</form>

		<!--Add Category Form Ends-->

		<?php

		//check whether the submit button is clicked or not
		if(isset($_POST['submit']))
			{
				//echo "Button Clicked";

				//Get the value from Form
				$title = $_POST['title'];
				
				//For Radio input , we need to check whether the button is selected or not
				if(isset($_POST['featured']))
				{
					//Get the value from form
					$featured = $_POST['featured'];
				}
				else
				{
					//Set the Default Value
					$featured = "No";
				}

				if(isset($_POST['active']))
				{
					$active = $_POST['active'];
				}
				else
				{
					//Set the Default Value
					$active = "No";
				}

				//check whether the image is selected or not and set the value for image name accordingly

				//print_r($_FILES['image']);

				//die(); //Break the code here

				if(isset($_FILES['image']['name']))
				{
					//upload the image
					$image_name=$_FILES['image']['name'];

					//upload the image only if image is selected
					if($image_name !="")
						{
							$ext = end(explode('.', $image_name));

							//Rename the image
							$image_name="Food_category_".rand(000,999).'.'.$ext;

							$source_path = $_FILES['image']['tmp_name'];
							$destination_path = "../images/category/".$image_name;

							//Finally Upload the image
							$upload = move_uploaded_file($source_path, $destination_path);

							//check whether the image uploaded or not
							//if the iamge is not uploaded then we will stop the process and redirect with error message
							if($upload==false)
							{
								$_SESSION['upload'] = "<div class='error'>Failed to upload Iamge.</div>";
								//Redirect to add Category Page
								header("location:".SITEURL.'admin/add-category.php');
								//stop the process
								die();
							}
						}
				}
				else
				{
					//don't upload the image and set the image name as blank
					$image_name="";
				}

				//Create SQL Query to Insert category into database
				$sql = "INSERT INTO tbl_category SET
					title='$title',
					image_name='$image_name',
					featured='$featured',
					active='$active'
				";

				//Execute the Query and save in Database
				$res = mysqli_query($conn, $sql);

				//Check whether the query executed or not and data added or not
				if($res == true)
				{
					//Query Executed and category Added
					$_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";

					//Redirect to manage Category Page
					header("location:".SITEURL.'admin/manage-category.php');
				}
				else
				{
					//Failed to Add Category
					$_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";

					//Redirect to manage Category Page
					header("location:".SITEURL.'admin/add-category.php');
				}
			}

		?>
	</div>
</div>



<?php include('partials/footer.php')?>