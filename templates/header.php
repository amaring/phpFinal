<?php
	session_start();
	// Check if user is admin
	if(isset($isAdmin)){
		// assign session, name & id
		$isAdmin = session_name('IsAdmin');
		// now this can be used in other pages while admin is logged in (session exists)
	}
	include('config/config.php');
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
				<?php if(isset($_SESSION['user_id'])) : ?>{} 					
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

