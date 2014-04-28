<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); 
		$_SESSION['auth'] = false;
		require 'includes/htmllinks.php';
		?>
		<title>Marist Limbo</title>
		
	</head>
	<body>
		<div id="wrapper">
			<header>
				<?php include 'includes/mainNav.php' ?>
			</header>
			<div id="main">
				<p>This website is called Limbo. Here you can report items that you find around campus and look for items that you have lost. So what are you waiting for? Lets go!</p>
			</div>
			<script src="js/vendor/jquery.js"></script>
			<script src="js/foundation.min.js"></script>
			<script>
				$(document).foundation();
			</script>
		</div>
	</body>
</html>
		