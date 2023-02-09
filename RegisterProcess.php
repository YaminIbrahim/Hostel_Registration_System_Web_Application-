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
		$uitmid = $_POST["txtId"];
		$fname = $_POST["txtFname"];
		$lname = $_POST["txtLname"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPass"];
		$type = $_POST["typeStatus"];

		//Register process for student
		$query = "";
		if ($type == "student") {

			//$query = "INSERT INTO student ('studPassword') VALUES ('" .$password. "')" ;
						//WHERE studID = '" .$uitmid. "'";

			$query = "UPDATE student
						SET studPassword = '".$password."'
						WHERE studID = '".$uitmid."'";
			

				//execute query in each row of the student and staff table
				mysqli_query($connection, $query);
				header('location: Login.php');


			//execute query in each row of the student and staff table
			//mysqli_query($connection, $query);

			if (mysqli_query($connection, $query)) {
			    echo "Data inserted successfully.";
			    echo "<meta http-equiv=\"refresh\" content=\"2;URL=Login.php\"/>";
			    //header('location: Login.php');
			} else {
			    echo "Error inserting data: " . mysqli_error($conn);
			}

			

		} else {

			//INSERT INTO `staff`(`staffID`, `staffFname`, `staffLname`, `staffEmail`, `staffPassword`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

			$query = "SELECT * FROM staff WHERE staffID = '" . $uitmid . "'";

			//execute query in each row of the student and staff table
			$result = mysqli_query($connection, $query);
			$checkRow = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);

			if ($row["staffID"] == $uitmid) { 
			?>
				<script>alert("Register failed!\nThe account already exist");</script>
			<?php
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=Register.php\"/>";
			} else {
				$query = "INSERT INTO staff (staffID, staffFname, staffLname, staffEmail, staffPassword) VALUES ('".$uitmid. "','" .$fname. "','" .$lname. "','" .$email. "','" .$password. "')";

				//execute query in each row of the student and staff table
				mysqli_query($connection, $query);
				header('location: Login.php');
			}
		}

		//execute query in each row of the student and staff table
		//mysqli_query($connection, $query);
		//header('location: Login.php')
	?>
</body>
</html>