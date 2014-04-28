<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); 
		$_SESSION['auth'] = false;
		require 'includes/htmllinks.php';
		require 'includes/helpers.php';
		?>
		<title>Marist Limbo</title>
		
	</head>
	<body>
		<div id="wrapper">
			<header>
				<?php include 'includes/mainNav.php' ?>
			</header>
			<div class="row">
				<div class="large-12 columns">
					<p>This website is called Limbo. Here you can report items that you find around campus and look for items that you have lost. So what are you waiting for? Lets go!</p>
				</div>
			</div>
			<div class="row">
				<div class="large-6 columns">
					<h3 class="text-center">Found</h3>
					<?php 
						shortLostPanels();
					?>
				</div>
				<div class="large-6 columns">
					<h3 class="text-center">Lost</h3>
					<?php
						shortFoundPanels();
					?>
				</div>
			</div>
			<script src="js/vendor/jquery.js"></script>
			<script src="js/foundation.min.js"></script>
			<script>
				$(document).foundation();
			</script>
		</div>
	</body>
</html>
		