<?php include('partials/menu.php');?>
<div class="main_content">
	<div class="wrapper">
		<h1>Update Food</h1>
		<br><br>

		<form action=""method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="title" placeholder="Food Title goes here.">
					</td>
				</tr>
				<tr>
					<td>Description:</td>
					<td>
						<textarea name="description" cols="30" rows="5"></textarea>
					</td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
						<input type="number" name="price">
					</td>
				</tr>
				<tr>
					<td>Current Image:</td>
					<td>Display the image if available</td>
				</tr>
				<tr>
					<td>Select New Image:</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Category:</td>
					<td>
						<select name="category">
							<?php 
							//Query to get Active categories
								$sql = "SELECT * FROM tbl_category WHERE active='Yes'";
								//Execute the query
								$res = mysqli_query($conn, $sql);
								//count Rows
								$count = mysqli_num_rows($res);

								//check whether category available or Not
								if($count>0)
								{
									//category Available

								}
								else
								{
									//category Not Available
									echo "<option value='0'>Category Not Available.</option>";
								}
							?>
							<option value="0">Test Category</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Featured:</td>
					<td>
						<input type="radio" name="features" value="yes">yes
						<input type="radio" name="features" value="no">No
					</td>
				</tr>
				<tr>
					<td>Active:</td>
					<td>
						<input type="radio" name="active" value="yes">yes
						<input type="radio" name="active" value="no">No
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Update Food" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php include('partials/footer.php');?>