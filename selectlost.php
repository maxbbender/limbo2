<?php
	$q = intval($_GET['q']);
	require connect_db.php;
	mysqli_select_db($dbc,'lost');
	$request = 'SELECT id, name, color, make, model, sizes, info, location';
	$result = mysqli_query($dbc, $request);
	echo '<table border="1">
	<tr>
	<th>Name</th>
	<th>Color</th>
	<th>Make</th>
	<th>Model</th>
	<th>Size</th>
	<th>Information</th>
	<th>Location</th>
	<th>Picture</th>
	</tr>
	';
	while ($row = mysqli_fetch_array($result){
		echo '<tr>';
		echo '<td>' . row['name'] . '</td>';
		echo '<td>' . row['color'] . '</td>';
		echo '<td>' . row['make'] . '</td>';
		echo '<td>' . row['model'] . '</td>';
		echo '<td>' . row['sizes'] . '</td>';
		echo '<td>' . row['info'] . '</td>';
		echo '<td>' . row['location'] . '</td>';
		echo '<td><img src="images/' . row['id'] . '.jpg"></td>';
		echo '</tr>';
	}
	echo '</table>';
	mysqli_free_result($result);
	mysqli_close($dbc);
?>