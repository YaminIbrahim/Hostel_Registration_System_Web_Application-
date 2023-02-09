<?php
	//using session to track user information
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Process</title>

	<!-- import database connection file -->
	<?php 
		include("Dbconn.php"); 
	?>

	<link rel="stylesheet" type="text/css" href="Loader.css">
</head>

<body>
	<div class="loadBox">
		<div class="loader loader_bubble"></div>
	</div>

	<?php
		//recall from login.php form
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPass"];
		$type = $_POST["radType"];

		//login process for student
		$query = "";

		if ($type == "student") {
			$query = "SELECT * FROM student WHERE studEmail = '" . $email . "' AND studPassword = '" . $password . "'";
		} else {
			$query = "SELECT * FROM staff WHERE staffEmail = '" . $email . "' AND staffPassword = '" . $password . "'";
		}

		//execute query in each row of the student and staff table
		$result = mysqli_query($connection, $query);
		$checkRow = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);

		//login failed (email didn't match with the password), stay at Login.php
		if ($checkRow == 0) {
			?>
			<!--informing the user the error has occured-->
			<script>alert("Login failed!\nYour password did not match with email or you have not registered");</script>
			<?php
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=Login.php\"/>";
		} else {
			//login success or student
			if ($type == "student") {
				//forward to the student home page
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=Student/Home.php\"/>";

				//pass the user information via session
				$_SESSION["stud_id"] = $row["studID"];
				$_SESSION["stud_fname"] = $row["studFname"];
				$_SESSION["stud_lname"] = $row["studLname"];
				$_SESSION["stud_email"] = $row["studEmail"];
				$_SESSION["log"] = 1;
			} 

			//login success for staff
			else {
				//forward to the staff home page
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=Staff/Home.php\"/>";
				
				//pass the user information via session
				$_SESSION["staff_id"] = $row["staffID"];
				$_SESSION["staff_fname"] = $row["staffFname"];
				$_SESSION["staff_lname"] = $row["staffLname"];
				$_SESSION["staff_email"] = $row["staffEmail"];
				$_SESSION["log"] = 2;
			}
		}
	?>
</body>
</html>