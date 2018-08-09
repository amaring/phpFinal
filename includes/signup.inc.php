<?php
include_once('../config/config.php');

if (isset($_POST['submit'])){
	$first_name = htmlspecialchars($_POST['first_name']);
	$last_name = htmlspecialchars($_POST['last_name']);
	$email = htmlspecialchars($_POST['email']);
	$username = htmlspecialchars($_POST['username']);
	$password = encryptIt($_POST['password']);
	
	// Error handlers
	// Check for empty fields
	if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password)) {
		header("Location: ../register.php?signup=empty");
		exit();
	} else {
		// Checks for valid input characters for first & last names
		if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)){
			header("Location: ../register.php?signup=invalid");
			exit();
		} else {
			// Checks for valid email format
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../register.php?signup=email");
				exit();
			} else { // email is valid
				$sql = "SELECT * FROM users WHERE username= '$username'";
				$result = mysqli_query($mysqli, $sql) or die('-1'.mysqli_error());
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0) {
					header("Location: ../register.php?signup=userexist");
					exit();
				} else {
					// Insert user into the database
					$sql2 = $mysqli->prepare("INSERT INTO users (first_name, last_name, email, username, password) VALUES (?,?,?,?,?);");
					$sql2->bind_param('sssss', 
					    $first_name,
					    $last_name,
					    $email,
					    $username,
					    $password
					);
					$sql2->execute();
					$sql2->close();
					header("Location: ../home.php?signup=success");
					exit();
				}
			}
		}
	}
	
} else {
	header("Location: ../register.php");
	exit();
}

?>