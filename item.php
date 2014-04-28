<!DOCTYPE html>
<html>
	<head>
		<title>Item</title>
		<?php 
			require 'includes/connect_db.php';
			require 'includes/helpers.php';
			session_start();
		?>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<h1>Item Details</h1>
				<?php include 'includes/mainNav.php';?>
			</header>
			<div id="main">
				<?php	
					if($_SERVER['REQUEST_METHOD'] == 'GET'){
						if ($_SESSION['auth'] == true){
							$query = 
							"SELECT *
							FROM " . $_GET['type'] . "
							WHERE id= '" . $_GET['id'] . "' LIMIT 1";
						}
						else {
						$query = 
							"SELECT name,color,make,model,sizes,info,location 
							FROM " . $_GET['type'] . "
							WHERE id= '" . $_GET['id'] . "' LIMIT 1";
						}
						$results = mysqli_query($dbc, $query);
						check_results($results);
						$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
						if ($_SESSION['auth'] == true){
							echo '<table>';
							echo '<tr><td>ID:</td><td>' . $row['id'] . '</tr>';
							echo '<tr><td>First Name:</td><td>' . $row['fname'] . '</tr>';
							echo '<tr><td>Last Name</td><td>' . $row['lname'] . '</tr>';
							echo '<tr><td>Email:</td><td>' . $row['email'] . '</tr>';
							echo '<tr><td>Phone:</td><td>' . $row['phone'] . '</tr>';
							echo '<tr><td>Item Name:</td><td>' . $row['name'] . '</tr>';
							echo '<tr><td>Color:</td><td>' . $row['color'] . '</tr>';
							echo '<tr><td>Make:</td><td>' . $row['make'] . '</tr>';
							echo '<tr><td>Model:</td><td>' . $row['model'] . '</tr>';
							echo '<tr><td>Size:</td><td>' . $row['sizes'] . '</tr>';
							echo '<tr><td>Info:</td><td>' . $row['info'] . '</tr>';
							echo '<tr><td>Location:</td><td>' . $row['location'] . '</tr>';
							echo '</table>';
						}
						else{
							echo '<table>';
							echo '<tr><td>Item Name:</td><td>' . $row['name'] . '</tr>';
							echo '<tr><td>Color:</td><td>' . $row['color'] . '</tr>';
							echo '<tr><td>Make:</td><td>' . $row['make'] . '</tr>';
							echo '<tr><td>Model:</td><td>' . $row['model'] . '</tr>';
							echo '<tr><td>Size:</td><td>' . $row['sizes'] . '</tr>';
							echo '<tr><td>Info:</td><td>' . $row['info'] . '</tr>';
							echo '<tr><td>Location:</td><td>' . $row['location'] . '</tr>';
							echo '</table>';	
						}
					}else{	
						echo 'This page shows single items';
					}
				?>
			</div>
		</div>
	</body>
</html>
		