
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Food Point" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="categories.html">Categories</a>
                    </li>
                    <li>
                        <a href="foods.html">Foods</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
					<li>
                        <a href="admin/login.php">Login</a>
                    </li>
					<li>
                        <a href="Registration.php">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

<form action="save.php" method="post">
	<div class="registration"><fieldset>
	<legend>REGISTRATION</legend>
	Name : <br>
	<input type="text" name="name" value=""placeholder="Give valid Username">
	<br>
	Email : <br>
	<input type="text" name="email" value=""placeholder="Give valid Username">
	<br>
	Username : <br>
	<input type="text" name="username" value=""placeholder="Give valid Username">
	<br>
	Password:<br>
	<input type="Password" name="pass" value="" placeholder="password">
	<br>
	Confirm Password :<br>
	<input type="password" name="conpass" placeholder="New Password">
	<br>
	<fieldset>
			<legend >Gender</legend>
			<input type="radio" id="gender" name="male">Male</input>
			<input type="radio" id="gender" name="male">FeMale</input>
			<input type="radio" id="gender" name="male">Other</input>

	</fieldset>

	<fieldset>
		<legend>Date Of Birth</legend>
		 <label for="dateofbirth"></label>
		 <input type="date" id="dateofbirth" name="dateofbirth">
	</fieldset>
	<br>
	<input type="submit" name="Login" value="Submit"> <input type="submit" name="Reset" value="Reset"> 
	</fieldset>
</form>

<!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">NAHID SAYED MORSHED TAFSIMUL</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>