<!DOCTYPE html>
<html>
<head>
	<title>mailer</title>
	<link rel="stylesheet" type="text/css" href="css/mailer.css">
</head>
<body>

	<div class="wrapper">

		<div class="form_group">
			<h2>Register | <a href="login.php">login</a></h2>
				<?php require "processing/forms.php";?>
			<form action="" method="POST">

				<label>Username</label>
				<input type="text" name="username" required="" placeholder="enter username">
				
				<label>Email</label>
				<input type="email" name="email" required="" placeholder="enter email">

				<label>Password</label>
				<input type="password" name="password" required="" placeholder="enter password"><br><br>

				<input type="submit" name="register" value="Register">
				

				
			</form>
			
		</div>
		
	</div>

</body>
</html>