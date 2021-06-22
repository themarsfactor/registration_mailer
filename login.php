<?php 

require "processing/forms.php";

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>login</title>
 	<link rel="stylesheet" type="text/css" href="css/login.css">
 </head>
 <body>
 	<div class="container">
 		
 		<h2>Login</h2>
 		<form class="form_group" method="POST" action="">
 			<label>Email</label>
 			<input type="email" name="email" required="" id="login-mail">

 			<label>Password</label>
 			<input type="password" name="password" required="" id="login-pw"><br><br>

 			<input type="submit" name="login" value="login" id="login-btn" onclick="check()">
 			

 		</form>


 	</div>
 	<script src="js/scripts.js"></script>
 
 </body>
 </html>