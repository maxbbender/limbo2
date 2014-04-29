<?php
	$c1 = "";
	$c2 = "";
	$c3 = "";
	if($_SERVER["REQUEST_URI"] == "/limbo2/lost.php"){
		$c1 = "active";
	}else if ($_SERVER["REQUEST_URI"] == "/limbo2/found.php"){
		$c2 = "active";
	}else if ($_SERVER["REQUEST_URI"] == "/limbo2/admin.php" || $_SERVER["REQUEST_URI"] == "/limbo2/admin_login.php"){
		$c3 = "active";
	}
	echo '
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="title-area">
					<h2><a href="index.php">Limbo</a></h2>
				</li>
			</ul>
			<section class="top-bar-section">
				<!-- Right Nav -->
				<ul class="right">
					<li class="' . $c1 . '"><a href="lost.php">Lost Something</a></li>
					<li class="' . $c2 . '"><a href="found.php">Found Something</a></li>
					<li class="' . $c3 . '"><a href="admin_login.php">Admin Login/Page</a></li>
				</ul>
			</section>
		</nav>';
?>