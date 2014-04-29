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
		<?php require 'includes/htmllinks.php'; ?>
		<title>Admin Login</title>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<?php include 'includes/mainNav.php'; ?>
			</header>
				<form id="login" action="admin_login.php" method="POST">
					<div class="row">
						<div class="large-4 columns center">
							<label>Username:
								<input type="text" name="username" placeholder="username">
							</label>
						</div>
					</div>
					<div class="row">
						<div class="large-4 columns center">
							<label>Password:
								<input type="password" name="password">
							</label>
						</div>
					</div>
				</form>
		</div>
	</body>
</html>
		