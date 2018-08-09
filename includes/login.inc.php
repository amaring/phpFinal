<?php
include_once('../config/config.php');
session_start();

if (isset($_POST['submit'])) {	
    
	// sanitize entries
	$username = htmlspecialchars($_POST['username']);
	$password = encryptIt($_POST['password']);
	
	// Error handlers
	// Check for empty inputs
	if (empty($username) || empty($password)) {
		// if using the redirect helper
		header("Location: ../home.php?login=empty");		
		exit();
	} else { // entries not empty
	    if ($sql = $mysqli->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password= ?;")) {
	        $sql->bind_param('sss', 
                $username,
			    $username,
			    $password
		    );
		    $sql->execute();
		    $sql->bind_result(
		        $id,
		        $first_name,
		        $last_name,
		        $email,
		        $username,
		        $password,
		        $user_date,
		        $user_type
            );
            $sql->fetch();
            $sql->close();
            
            if (!empty($id)) {
                session_start();
                    $_SESSION['u_id'] = $id;
					$_SESSION['u_first'] = $first_name;
					$_SESSION['u_last'] = $last_name;
					$_SESSION['u_email'] = $email;
					$_SESSION['u_username'] = $username;
					$_SESSION['u_type'] = $user_type;
				header('Location: ../home.php?login=success');
				exit();
            } else {
                header("Location: ../home.php?login=error");
                exit();
            }
	    }
	}
}

function logOut(){
	// unset all variables, destroy session
	unset($_SESSION['u_id']);
	unset($_SESSION['u_first']);
	unset($_SESSION['u_last']);
	unset($_SESSION['u_email']);
	unset($_SESSION['u_username']);
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