<?php
	session_start();
	if(isset($_SESSION['auth'])){
		if($_SESSION['auth'] == true){
			session_destroy();
			echo 'You have Logged Out. Redirecting you to home page';
			header("refresh:2;url=index.php");
		}
	}else{
		echo 'You are not logged in. Redirecting you to Admin Login Page';
		header("refresh:3;url=admin_login.php");
	}
?>