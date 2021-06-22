<?php 
$host = "localhost";
$user = "root";
$db_password = "";
$db_name = "mailer";

$conn = mysqli_connect($host, $user, $db_password, $db_name) or die('could not connect');

if ($conn) {

	$query = "CREATE TABLE IF NOT EXISTS users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(64) NOT NULL,
	email VARCHAR(64) NOT NULL,
	password VARCHAR (64) NOT NULL,
	status VARCHAR (64) NOT NULL DEFAULT('not_verified'),
	date_created TIMESTAMP NOT NULL

)";
$result = mysqli_query($conn, $query);
if ($result) {

}
else{
	echo "Error";
	# code...
}
}
else{
	echo mysqli_error($conn);
}

 ?>