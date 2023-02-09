<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Logout</title>

	<link rel="stylesheet" type="text/css" href="Loader.css">
</head>

<body>
	<div class="loadBox">
		<div class="loader loader_bubble"></div>
	</div>

	<?php
		session_start();

		//for student session
		if ($_SESSION["log"]==1) {
			unset($_SESSION['studID']);
			unset($_SESSION['studName']);
		}
		
		//for staff session
		else {
			unset($_SESSION['staffID']);
			unset($_SESSION['staffName']);
		}

		unset($_SESSION['log']);
		session_destroy();

		echo "<meta http-equiv=\"refresh\" content=\"2;url=Login.php\">";
	?>
</body>
</html>