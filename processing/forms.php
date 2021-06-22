<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {
	if (isset($_POST['register'])) {


		$errors = [];
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);


		if (empty($username)) {
			$errors[] = "enter username";
			# code...
		}
		if (empty($email)) {
			$errors[] = "enter email";
		}

		if (empty($password)) {
			$errors[] = "enter password";
		}
		if (empty($errors)) {

			require "check/functions.php";
			$feedback = registerUser($username, $email, $password);
			echo $feedback;
		}
		else{
			foreach ($errors as $error) {
				echo "{&error}<br>";
			}
		}





		# code...
	}
	# code...
}






if (isset($_POST['login'])) {


	$errors = [];
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

		if (empty($email)) {
			$errors[] = 'enter your email';
				# code...
			}

		if (empty($password)) {
				$errors[] = 'enter your password'; 
				}
		if (empty($errors)) {
			require "check/functions.php";
			 $check = loginUser($email, $password);
			 echo $check;
					# code...
				}
		else{
			foreach ($errors as $error) {
			echo "{error}<br>";
			}
		}		# code...
}








 ?>