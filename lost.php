<!DOCTYPE html>
<html>
	<head>
		<title>Lost Something</title>	
		<?php	
			require 'includes/htmllinks.php';
		?>
	</head>	
	<body>
		<div id="wrapper">
			<header>
				<?php include 'includes/mainNav.php'; session_start(); ?>
			</header>
			<div id="main">
				<?php include 'itemform.php';?>
			</div>
			<div id="lostItems">
				<h2>Some Recently Found Items</h2>
				<?php include 'includes/helpers.php';
					shortFound();
				?>
		</div>
	</body>
</html>
		