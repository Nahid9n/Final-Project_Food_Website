<?php include('partials/menu.php')?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Food</h1>
		<br><br>

		<?php  
			if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
		?>

		<br><br>
		<!--Add Food Form Starts-->
        <!--enctype is allow us to upload file or image -->
		<form action="" method="POST" enctype="multipart/form-data"> 
			
			<table class="tbl-30">
				<tr>
					<td>Title : </td>
					<td>
						<input type="text" name="title" placeholder="Food Title">
					</td>
				</tr> 
				<tr>
					<td>Description : </td>
					<td>
						<textarea name="description" cols="40" placeholder="Description of the food" rows="5"></textarea>
					</td>
				</tr> 
				<tr>
					<td>Price : </td>
					<td>
						<input type="number" name="price" >
					</td>
				</tr>
				<tr>
					<td>Select Image : </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>  
				<tr>
					<td>Category : </td>
					<td>
						<select name="category">

							<?php 
								//create php code to display categories from database
								//1.create sql to getr all active categories
								$sql = "SELECT * FROM tbl_category WHERE active='Yes'";
								//Executing query
								$res = mysqli_query($conn, $sql);

								//count rows to check whether we have categories or not
								$count = mysqli_num_rows($res);

								if($count>0)
								{
									//we have categories
									while ($row = mysqli_fetch_assoc($res))
									{
										// get the details of categories
										 $id = $row['id'];
					                     $title = $row['title'];
					                     ?>

					                     <option value="<?php echo $id;?>"><?php echo $title; ?></option>

					                     <?php
					                     $price = $row['price'];
					                     $description = $row['description'];
					                     $image_name = $row['image_name'];
									}
								}
								else
								{
									//we do not have category
									?>
									<option value="0">No Categories Found</option>
									<?php  
								}
								//Display on dropdown

							?>

							
						</select>
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
					<input type="submit" name="submit" value="Add Food" class="btn-secondary">
					</td>
					
						
				</tr>
			</table>
		</form>

		<!--Add food Form Ends-->

		<?php

		//check whether the submit button is clicked or not
		if(isset($_POST['submit']))
			{
				//echo "Button Clicked";

				//Get the value from Form
				$title = $_POST['title'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$category = $_POST['category'];

				
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
					if($image_name!="")
						{
							$ext = end(explode('.', $image_name));

							//Rename the image
							$image_name="Food-Name-".rand(0000,9999).".".$ext;

							$src = $_FILES['image']['tmp_name'];
							$dst = "../images/food/".$image_name;

							//Finally Upload the image
							$upload = move_uploaded_file($src, $dst);

							//check whether the image uploaded or not
							//if the iamge is not uploaded then we will stop the process and redirect with error message
							if($upload==false)
							{
								$_SESSION['upload'] = "<div class='error'>Failed to upload Iamge.</div>";
								//Redirect to add food Page
								header("location:".SITEURL.'admin/add-food.php');
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
				$sql2 = "INSERT INTO tbl_food SET
					title='$title',
					description='$description',
					price=$price,
					image_name='$image_name',
					category_id=$category,
					featured='$featured',
					active='$active'
				";

				//Execute the Query and save in Database
				$res2 = mysqli_query($conn, $sql2);

				//Check whether the query executed or not and data added or not
				if($res2 == true)
				{
					//Query Executed and category Added
					$_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";

					//Redirect to manage Food Page
					header("location:".SITEURL.'admin/manage-food.php');
				}
				else
				{
					//Failed to Add Food
					$_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";

					//Redirect to manage Food Page
					header("location:".SITEURL.'admin/manage-food.php');
				}
			}

		?>
	</div>
</div>

		<?php include('partials/footer.php')?>