<?php 
	include_once 'templates/header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Registration</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first_name" placeholder="Firstname">
			<input type="text" name="last_name" placeholder="Lastname">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>

<?php
	include_once 'templates/footer.php';
?>
