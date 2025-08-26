<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Product Dashboard: Team Ketsup スーパー store</title>
		<script>
		</script>
    </head>
    <body>
		<div class="main-container">
			<div class="logo-container">
				<p><a href="index.php">Team <span class="logo-name">Ketsup</span> <span id="online">スーパー store</span> </a> </p> 
			</div><!--
		 --><ul class="navbar">
				<li><a href="">Dashboard</a></li>
				<li><a class="active" href="">Profile</a></li>
				<li><a href="">Log off</a></li>
			</ul>
			
			<h2 class="service-title">Edit Profile Info</h2> 

				
				<div class="name-container edit-user">
				
			<form action="" method="POST" class="signup">
				<h1>Edit Information</h1>
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" value="" placeholder="-email@mail.com-">
				<label class="form-label"  for="first_name">First Name:</label>
				<input type="text" name="first_name" id="first_name" value="" placeholder="-first name-">
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" id="last_name" value="" placeholder="-last name-">
				<input type="submit" value="Save">
			</form>

				</div>
				<div class="name-container edit-user">
				
				<form action="" method="POST" class="signup">
					<h1>Change Password</h1>
					<label for="old-password">Old Password:</label>
					<input type="password" name="old-password" id="old-password" value="" placeholder="-old-password-">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" value="" placeholder="-password-">
					<label for="confirm-password">Confirm Password:</label>
					<input type="password" name="confirm-password" id="confirm-password" value="" placeholder="-confirm password-">
					<input type="submit" value="Save">
				</form>
	
					</div>
			</section>
			<footer>
				<p><a href="#"></a></p>
				<p>&copy;Sai Tama. All Rights Reserved</p>
			</footer>
        </div>
    </body>
</html>