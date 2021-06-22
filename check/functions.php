<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function registerUser($username, $email, $password){

	

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	require "database/d_base.php";
	$response = userExists($email, $password);
	if ($response == true) {
		echo "User registered already!";
		# code...
	}
	else{
		$register_query = "INSERT INTO users (username, email, password, date_created) VALUES ('$username', '$email', '$password', NOW())";
		$register_query_result = mysqli_query($conn, $register_query);

		if ($register_query_result) {
			//header("location: verification.php");

			//echo "User registered successfully<br>";
			//echo "A link has been sent to your email address;click the link to verify your account";

			
			$url = $_SERVER['HTTP_REFERER'];
			$link = "{$url}"."verify.php?em={$email} ";
			
			//echo "<pre>";
			//print_r($_SERVER);

			$mail = new PHPMailer(true);

			//echo "<pre>";
			//print_r($mail);

			try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host   = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '9f6311b5eb02d5';                     //SMTP username
    $mail->Password   = '28125b72047e79';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 2525;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('baba@email.com', 'Mailer');
    $mail->addAddress('olu@email.com', 'Olu User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thank you for registering';
    $mail->Body    = "Click on this link to verify your acount! <b style><a href='{$link}'>verify</a> </b>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


		
		}
		else{
			echo mysqli_error($conn);
		}
	}
}

 




function loginUser($email, $password){
	require "database/d_base.php";

$email = mysqli_real_escape_string ($conn, trim($email));
$password = mysqli_real_escape_string ($conn, trim($password));

$login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1 ";
$login_query_result = mysqli_query($conn, $login_query);

if ($login_query_result) {
	if (mysqli_num_rows($login_query_result) == 1) {

		session_start();
		$_SESSION = mysqli_fetch_array($login_query_result, MYSQLI_ASSOC);
		header("location: user.php");
	}
	else {
		echo "error! Have you registered?";
		# code...
	}
}
else{
	echo "Could not connect";
}


}
















 function userExists($email, $password){
 	require "database/d_base.php";
 	$check = "SELECT * FROM users WHERE email = '$email' AND password ='$password' LIMIT 1";
 	$check_result = mysqli_query($conn, $check);
 	if ($check_result) {
 		if (mysqli_num_rows($check_result)==1) {
 			return true;
 			# code...
 		}
 		else{
 			return false;
 		}
 		
 	}
 	else{
 		echo "Error";
 	}

 }







 function checkEmail($email){
 	require "database/d_base.php";
 	$query = "SELECT * FROM users WHERE email = '$email' AND status = 'not_verified' LIMIT 1";

 	$result = mysqli_query($conn, $query);
 	if ($result) { 
 		echo "<pre";
 		print_r($result);

 		if (mysqli_num_rows($result)==1) {

 		$query_update = "UPDATE users SET status = 'verified' WHERE email = '$email' LIMIT 1";

 		$query_result = mysqli_query($conn, $query_update);
 		if ($query_result) {
 			echo "successfully verified! Click  to login in";
 		}
 		else {
 			echo "Error".mysqli_error($conn);
 		}
 			
 		
 			# code...
 		}
 		else{
 			echo "Error";
 		}

 		# code...
 	}
 }
