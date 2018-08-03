<?php 
	include_once 'templates/header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
		
			if(isset($_SESSION['u_id'])) {
				echo "Welcome, " .$_SESSION['u_username'];
			}
		
		?>
		
	</div>
</section>

<?php
	include_once 'templates/footer.php';
?>
