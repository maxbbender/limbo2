<?php
	require 'includes/connect_db.php';
	require 'includes/helpers.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$query = "DELETE FROM " . $_POST['type'] . " WHERE id= '" . $_POST['id'] . "'";
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if ($results){
			echo 'Deleted';
			header("refresh:3;url=admin.php");
		}
	}
?>