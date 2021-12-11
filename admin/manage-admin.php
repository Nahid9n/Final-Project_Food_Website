<?php include('partials/menu.php')?>


	<!-- Main content section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Admin</h1>
			<br><br>

			<?php
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];//Displaying Session Message
					unset($_SESSION['add']); //Removing Session Message
				}

				if(isset($_SESSION['delete'])){
					echo $_SESSION['delete'];//Displaying Session Message
					unset($_SESSION['delete']); //Removing Session Message
				}
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];//Displaying Session Message
					unset($_SESSION['update']); //Removing Session Message
				}

				if(isset($_SESSION['user-not-found']))
				{
					echo $_SESSION['user-not-found'];//Displaying Session Message
					unset($_SESSION['user-not-found']); //Removing Session Message
				}

				if(isset($_SESSION['pwd-not-match']))
				{
					echo $_SESSION['pwd-not-match'];//Displaying Session Message
					unset($_SESSION['pwd-not-match']); //Removing Session Message
				}

				if(isset($_SESSION['change-pwd']))
				{
					echo $_SESSION['change-pwd'];//Displaying Session Message
					unset($_SESSION['change-pwd']); //Removing Session Message
				}

			?>
			<br><br>
				<!-- button to add admin section Starts -->
				<a href="add-admin.php" class="btn-primary">Add Admin</a>

				<br><br><br>

				<table class="tbl-full">
					<tr>
						<th>S.N</th>
						<th>Full Name</th>
						<th>Username</th>
						<th>Actions</th>
					</tr>

						<?php
							$sql = "SELECT * FROM tbl_admin";

							$res = mysqli_query($conn, $sql);

							if($res==TRUE)
							{
								$count = mysqli_num_rows($res);//all the Rows in Database

								$sn=1;

								if($count>0){
									//we have data in database
									while($rows=mysqli_fetch_assoc($res)){

										$id=$rows['id'];
										$full_name=$rows['full_name'];
										$username=$rows['username'];
										?>
										<tr>
											<td><?php echo $sn++; ?></td>
											<td><?php echo $full_name; ?></td>
											<td><?php echo $username; ?></td>
											<td>
												<a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
												<a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary" onclick="update()">update Admin </a>
												<script>
													function update() {
													  alert("Hello! Do you want to Update Admin!");
													}
													</script>

												<a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger" onclick="myFunction()">Delete Admin </a>
									
												<script>
													function myFunction() {
													  alert("Hello! Do You want to Delete Admin!");
													}
													</script>
											</td>
										</tr>	

										<?php

									}
								}
								else{
									//we have no data in database
								}
							}

						?>


					
				</table>
			
		</div>
	</div>
	<!-- Menu content section Ends -->
	
	
<?php include('partials/footer.php')?>