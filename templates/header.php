<?php
    include('config/config.php');
	session_start();
	// Check if user is admin
	if(isset($_SESSION['u_type'])){
		if (($_SESSION['u_type']) == 1){
		    // assuming admin users have a user_type in the user table of 1, do the following
		    $admin_visible = TRUE;
		}
		
		// now this can be used in other pages while admin is logged in (session exists)
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="forum.php">Forums</a></li>
				<li><a href="create_topic.php"><strong>Create New Topic</strong></a>
			</ul>
			<div class="nav-login">
				<!-- Hide if user is logged in and session variables are set -->
				<?php if(isset($_SESSION['u_id'])) : ?> 					
					<form action="includes/logout.inc.php" method="POST">
						<button type="submit" name="submit">Logout</button>
					</form>						
				<?php else : ?>
					<form action="includes/login.inc.php" method="POST">
						<input type="text" name="username" placeholder="Username/email">
						<input type="password" name="password" placeholder="password">
						<button type="submit" name="submit">Login</button>
					</form>
					<a href="register.php">Sign up</a>				
				<?php endif; ?>
			</div>
		</div>
	</nav>
</header>
