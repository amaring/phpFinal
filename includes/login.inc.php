<?php

session_start();

if (isset($_POST['submit'])) {	

	include 'dbc.inc.php';
	
	// sanitize entries
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	// Error handlers
	// Check for empty inputs
	if (empty($username) || empty($password)) {
		// if using the redirect helper
		// redirect('home.php?login=empty');
		header("Location: ../home.php?login=empty");		
		exit();
	} else { // entries not empty
		$sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../home.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
					// password not valid
					// send error to a variable
					// $data['password_err'] = 'Incorrect password';
					header("Location: ../home.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) { // password is valid
					// Log in the user
					// createUserSession();
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['first_name'];
					$_SESSION['u_last'] = $row['last_name'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_username'] = $row['username'];
					header("Location: ../home.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../home.php?login=error");
	exit();
}

function createUserSession(){
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['user_email'] = $row['email'];
	$_SESSION['user_name'] = $row['username'];
	redirect('home.php');
}

function logOut(){
	// unset all variables, destroy session
	unset($_SESSION['user_id']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_name']);
	session_destroy();
	redirect('login.inc.php');
}

function isLoggedIn(){
	if(isset($_SESSION['user_id'])){
		return true;
	} else {
		return false;
	}
}

// returns value passed from DB
function isAdmin(){
	if(isset($_SESSION['isAdmin'])){
		return true;
	} else {		
		return false;
	}
}

?>