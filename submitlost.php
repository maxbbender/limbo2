<!DOCTYPE html>
<html>
<head>
	<title>Submit Lost</title>
</head>
<body>
	<?php 
		require 'includes/connect_db.php';
		require 'includes/helpers.php';
		//require 'includes/upload_file.php';
		$id = submitLost();
		/*echo '<h2>Would you like to upload a picture of the item?</h2>';
		echo '<br>If not just click the "No Thanks" button below';
		echo '<form enctype="multipart/form-data" action="includes/upload_file.php" method="POST">';
		echo 'Please choose a file: <input name="file" type="file"><br>';
		echo '<input type="submit" value="Upload">';
		echo '</form>';
		echo '<br><br><br><br><a href="index.php">No Thanks</a>';*/
	?>
</body>
</html>
		