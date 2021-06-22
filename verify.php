<?php 

if (isset($_GET['em']) && !is_numeric($_GET['em'])) {

	$email = trim($_GET['em']);

	require "check/functions.php";
	$feedback = checkEmail($email);
	echo $feedback;

}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>verification</title>
 	<link rel="stylesheet" type="text/css" href="css/verify.css">
 </head>
 <body>
 	<div class="container">

 		
 		
 	</div>
 
 </body>
 </html>