<!DOCTYPE html>
<html>
	<head>
		<?php 
			session_start();
			require 'includes/helpers.php';
		?>
		<title>Admin Page</title>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<h1>Admin Page</h1>
				<?php include 'includes/mainNav.php'; ?>
			</header>
			<div id="main">
			<?php	
				if(isset($_SESSION['auth'])){
					if($_SESSION['auth'] == true){
						echo '<div id="Found" height="400px" `	width="900px" style="overflow:scroll">';
						echo '<h3>Found Items</h3>';
						longFound();
						echo '</div>';
						echo '<h3>Lost Items</h3>';
						echo '<div id="Lost" height="400px" width="900px" style="overflow:scroll">';
						longLost();
						echo '</div>';
					}else{
						echo 'You are not authorized to access this page';
					}
				}else{
					echo 'You are not authorized to access this page';
				}
			?>
			</div>
		</div>
	</body>
</html>
		