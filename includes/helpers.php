<?php
	require 'connect_db.php';
	function submitLost(){
		global $dbc;
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			//PREPARE THE QUERY
			$query = 
			"INSERT INTO lost 
			(fname, lname, email, phone, name, color, make, model, sizes, info, location, status, dateLost, dateSubmitted) 
			VALUES
			('" . 
			mysql_real_escape_string($_POST['fname']) . "','"  . 
			mysql_real_escape_string($_POST['lname']) . "','"  . 
			mysql_real_escape_string($_POST['email']) . "','" . 
			mysql_real_escape_string($_POST['phone']) . "','"  . 
			mysql_real_escape_string($_POST['name'])  . "','"   . 
			mysql_real_escape_string($_POST['color']) . "','"  . 
			mysql_real_escape_string($_POST['make'])  . "','"   . 
			mysql_real_escape_string($_POST['model']) . "','"  . 
			mysql_real_escape_string($_POST['size'])  . "','"   . 
			mysql_real_escape_string($_POST['info'])  . "','"   . 
			mysql_real_escape_string($_POST['location']) . "', 
			'lost','" //status
			mysql_real_escape_string($_POST['date']) . "','" . 
			date("Y/m/d") "')"; 
			//QUERY THE SERVER
			$results = mysqli_query($dbc, $query);
			echo 'Successfully Submitted, Thank You';
			header("refresh:3;url=index.php");
			check_results($results);
			//return $mysqli_insert_id($dbc);
			mysqli_free_results($results);
		}
	}
	function submitFound(){
		global $dbc;
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$query = 
			"INSERT INTO found1 
			(fname, lname, email, phone, name, color, make, model, sizes, info, location, dateFound, dateSubmitted) 
			VALUES
			('" . 
			mysql_real_escape_string($_POST['fname']) . "','"  . 
			mysql_real_escape_string($_POST['lname']) . "','"  . 
			mysql_real_escape_string($_POST['email']) . "','" . 
			mysql_real_escape_string($_POST['phone']) . "','"  . 
			mysql_real_escape_string($_POST['name'])  . "','"   . 
			mysql_real_escape_string($_POST['color']) . "','"  . 
			mysql_real_escape_string($_POST['make'])  . "','"   . 
			mysql_real_escape_string($_POST['model']) . "','"  . 
			mysql_real_escape_string($_POST['size'])  . "','"   . 
			mysql_real_escape_string($_POST['info'])  . "','"   . 
			mysql_real_escape_string($_POST['location']) . "'
			'found','" //status
			mysql_real_escape_string($_POST['date']) . "','" . 
			date("Y/m/d") "')"; 
			$results = mysqli_query($dbc, $query);
			check_results($results);
			//return $mysqli_insert_id($dbc);
			echo 'Successfully Submitted, Thank You';
			header("refresh:3;url=index.php");
			mysqli_free_results($results);
		}
	}
	function shortFound(){
		global $dbc;
		$query = 'SELECT id, name, color, location, status FROM found1 ORDER BY id DESC LIMIT 5';
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if($results){
			echo '<table style="text-align:center" id="shortFound" width="400px">';
			echo '<tr>';
			echo '<th>ID</th><th>Item Name</th><th>Color</th><th>Location</th>';
			echo '</tr>';
			while ($row = mysqli_fetch_array($results , MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>' . $row['id'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td style="background-color:' . $row['color'] . '"></td>';
				echo '<td>' . $row['location'] . '</td>';
				echo '</tr>';
			}
			echo '</table>';
			if(mysqli_num_rows($results) > 0){
				echo 'More Information:';
				echo '<form action="item.php" method="GET">';
				echo '<table><tr><td>ID Number:</td><td><input type="text" name="id"></td></tr>';
				echo '<tr><td><input type="hidden" name="type" value="found1"></td><td><input type="submit" value="See More Information"></td></tr></table>';
			}
		}
		mysqli_free_result($results);
	}
	function shortLost(){
		global $dbc;
		$query = 'SELECT id, name, color, location, status FROM lost ORDER BY id DESC LIMIT 5';
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if($results){
			echo '<table style="text-align:center" id="shortLost" width="100%">';
			echo '<tr>';
			echo '<th>ID</th><th>Item Name</th><th>Color</th><th>Location</th>';
			echo '</tr>';
			while ($row = mysqli_fetch_array($results , MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>' . $row['id'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td style="background-color:' . $row['color'] . '"></td>';
				echo '<td>' . $row['location'] . '</td>';
				echo '</tr>';
			}
			echo '</table>';
			if(mysqli_num_rows($results) > 0){
				echo 'More Information:';
				echo '<form action="item.php" method="GET">';
				echo '<table><tr><td>ID Number:</td><td><input type="text" name="id"></td></tr>';
				echo '<tr><td><input type="hidden" name="type" value="lost"></td><td><input type="submit" value="See More Information"></td></tr></table>';
			}
		}
		mysqli_free_result($results);
	}
	function shortLostPanels(){
		global $dbc;
		$query = 'SELECT id, name, color, location, status FROM lost ORDER BY id DESC LIMIT 5';
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if ($results){
			while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
				if ($row['status'] == 'lost'){
					$alertDiv = '
						<div data-alert class="alert-box warning">
							This item is still lost/found!
						</div>
					';
				}else{
					$alertDiv = '
						<div data-alert class="alert-box success">
							This item has been claimed!
						</div>
					';
				}
				echo '<div class="panel callout">
					<table style="text-center">
						<tr>
							<td><a class="button" href="item.php?id=' . $row['id'] . '&type=lost">Item ID: ' . $row['id'] . '</a></td>
						</tr>
						<tr>
							<td>Item Name:</td><td> ' .$row['name'] . '</td>
						</tr>
						<tr>
							<td>Location:</td><td> ' .$row['location'] . '</td>
						</tr>
					</table>
					' . $alertDiv . '
					</div>
				';
			}
		}
	}
	function shortFoundPanels(){
		global $dbc;
		$query = 'SELECT id, name, color, location, status FROM found1 ORDER BY id DESC LIMIT 5';
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if ($results){
			while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
				if ($row['status'] == 'lost'){
					$alertDiv = '
						<div data-alert class="alert-box warning">
							This item is still lost/found!
						</div>
					';
				}else{
					$alertDiv = '
						<div data-alert class="alert-box success">
							This item has been claimed!
						</div>
					';
				}
				echo '<div class="panel callout">
					<table style="text-center">
						<tr>
							<td><a class="button" href="item.php?id=' . $row['id'] . '&type=found1">Item ID: ' . $row['id'] . '</a></td>
						</tr>
						<tr>
							<td>Item Name:</td><td> ' .$row['name'] . '</td>
						</tr>
						<tr>
							<td>Location:</td><td> ' .$row['location'] . '</td>
						</tr>
					</table>
					' . $alertDiv . '
					</div>
				';
			}
		}
	}
	function longLost(){
		global $dbc;
		$query = 'SELECT * FROM lost ORDER BY id';
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if ($results){
			echo '<table style="text-align:center" id="longLost" width="900px">';
			echo '<tr>';
			echo '<th>ID</th><th>Name</th><th>Color</th><th>Make</th><th>Model</th><th>Size</th><th>Location</th>';
			echo '</tr>';
			while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>' . $row['id'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td style="background-color:' . $row['color'] . '"></td>';
				echo '<td>' . $row['make'] . '</td>';
				echo '<td>' . $row['model'] . '</td>';
				echo '<td>' . $row['sizes'] . '</td>';
				echo '<td>' . $row['location'] . '</td>';
			}
			if(mysqli_num_rows($results) > 0){
				echo 'More Information:';
				echo '<form action="item.php" method="GET">';
				echo '<table><tr><td>ID Number:</td><td><input type="text" name="id"></td><td><input type="submit" value="See More Information"></td></tr>';
				echo '<tr><td><input type="hidden" name="type" value="lost"></td></tr></table>';
				echo '</form>';
				if(isset($_SESSION['auth'])){
					if($_SESSION['auth'] == true) {
						echo '<form action="delete_item.php" method="POST">';
						echo '<table><tr><td>ID Number:</td><td><input type="text" name="id"></td><td><input type="submit" value="Delete Item"></td></tr>';
						echo '<tr><td><input type="hidden" name="type" value="lost"></td></tr></table>';
						echo '</form>';
					}	
				}
			}
		}
	}
	function longFound(){
		global $dbc;
		$query = 'SELECT * FROM found1 ORDER BY id';
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if ($results){
			echo '<table style="text-align:center" id="longFound" width="900px">';
			echo '<tr>';
			echo '<th>ID</th><th>Name</th><th>Color</th><th>Make</th><th>Model</th><th>Size</th><th>Location</th>';
			echo '</tr>';
			while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>' . $row['id'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td style="background-color:' . $row['color'] . '"></td>';
				echo '<td>' . $row['make'] . '</td>';
				echo '<td>' . $row['model'] . '</td>';
				echo '<td>' . $row['sizes'] . '</td>';
				echo '<td>' . $row['location'] . '</td>';
			}
			if(mysqli_num_rows($results) > 0){
				echo '<form action="item.php" method="GET">';
				echo '<table><tr><td>ID Number:</td><td><input type="text" name="id"></td><td><input type="submit" value="See More Information"></td></tr>';
				echo '<tr><td><input type="hidden" name="type" value="found1"></td></tr></table>';
				echo '</form>';
				if(isset($_SESSION['auth'])){
					if($_SESSION['auth'] == true) {
						echo '<form action="delete_item.php" method="POST">';
						echo '<table><tr><td>ID Number:</td><td><input type="text" name="id"></td><td><input type="submit" value="Delete Item"></td></tr>';
						echo '<tr><td><input type="hidden" name="type" value="found1"></td></tr></table>';
						echo '</form>';
					}	
				}
			}
		}
	}
	function check_results($results){
		global $dbc;
		if ($results != true){
			echo '<p style="color:red">MySQL Error: ' . mysqli_error($dbc) . '</p>';
		}
	}
	function login($username, $password){
		global $dbc;
		if(empty($username)||empty($password)){
			return -1;
			}
		$query = "SELECT id, username, password FROM users WHERE username='" . $username . "' LIMIT 1";
		$results = mysqli_query($dbc, $query);
		check_results($results);
		if(mysqli_num_rows($results) == 0){
			return -1;
			}
		$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
		$db_password = $row['password'];
			if($password == $db_password){
				$_SESSION['user'] = $username;
				$_SESSION['auth'] = true;
				$pid = $row['id'];
				echo $_SESSION['auth'];
			}else{
				return -1;
			}
		return intval($pid);
	}
	function logout(){
		session_destory();
	}
	