<!DOCTYPE html>
<html>
	<head>
	<?php	
		session_start();
		require 'includes/helpers.php';
		if(isset($_SESSION['auth']) && $_SESSION['auth'] == true){
			header ("Location: admin.php");
		}else{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$uName = $_POST['username'];
				$PWD = $_POST['password'];
				$pid = login($uName,$PWD);
				if ($pid == -1)
					echo '<p style="color:red">Login failed, please try again</p>';
				else
					header ('Location: admin.php');
			}
		}
	?>
		<title>Admin Login</title>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<h1>Admin Login</h1>
				<?php include 'includes/mainNav.php'; ?>
			</header>
			<div id="main">
				<form id="login" action="admin_login.php" method="POST">
					<table border="0px">
						<tr><td>Username:</td><td><input type="text" name="username"></td></tr>
						<tr><td>Password:</td><td><input type="password" name="password"></td></tr>
						<tr><td><input type="submit"></td></tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
		