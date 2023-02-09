<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Melati Hostel Registration System</title>

	<!-- favicon -->
	<link rel="website icon" type="png" href="images/favicon.png">

	<!-- Link CSS file -->
	<link rel="stylesheet" href="styleOut.css">

	<!-- FontAwesome for icon -->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.3/css/all.min.css">-->
	<script src="https://kit.fontawesome.com/2fcc26b571.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- import database connection file -->
	<?php 
		include("Dbconn.php"); 
	?>
</head>

<body>
	<div class="container">
		<div class="uitmLogo">
			<img src="images/uitmmelati crop.png">
		</div>

		<div class="login">
			<h1>Register</h1>
		</div>

		<hr>
		<div class="loginForm">
			<form action="RegisterProcess.php" method="POST">

				<div class="radioType">
					<!-- staff -->
					<input  onclick="verify(); change('Staff ID'); changePh('Enter your staff ID')" type="radio" name="typeStatus" id="staff" value="staff" required> Staff

					<!-- student-->
					<input onclick="change('Student ID'); changePh('Enter your student ID')" type="radio" name="typeStatus" id="student" value="student" required> Student
				</div>
				
				<hr><br>

				<div class="nameInput">
					<!-- input for first name -->
					<div class="fname">
						<i class="fa-solid fa-user"></i><span>First Name</span>
						<br>
						<input class="txtFname" type="text" name="txtFname" placeholder="Enter your first name" required>
					</div>

					<!-- input for last name -->
					<div class="lname">
						<i class="fa-solid fa-user"></i><span>Last Name</span>
						<br>
						<input class="txtLname" type="text" name="txtLname" placeholder="Enter your last name" required>
					</div>
				</div>

				<br>

				<div class="idInput" id="idInput">
					<i class="fa-solid fa-id-card"></i></i><span id="idChange">UiTM ID number</span>
					<br>
					<input class="txtId" type="text" name="txtId" id="txtId" placeholder="Enter your UiTM ID Number" required>
				</div>

				<br>

				<div class="acctInput">
					<!-- input for email address -->
					<div class="emailAddr">
						<i class="mail fa-solid fa-envelope"></i><span class="spanEmail">Email</span>
						<br>
						<input class="txtEmailR" type="text" name="txtEmail" placeholder="Enter your email" required>
					</div>

					<!-- input for password -->
					<div class="emailPass">
						<i class="lock fa-solid fa-lock"></i><span class="spanPass">Password</span>
						<br>
						<input class="txtPassR" type="Password" name="txtPass" placeholder="Enter your password" required>
					</div>
				</div>

				<br>

				<input class="submit" type="submit" name="submit" value="Register">

			</form>
		</div>

		<!--<div class="or">
			<hr>
			<p>OR</p>
			<hr>
		</div>-->
		
		<div class="linkRegis">
			<p>Aready have an account? Login <a href="Login.php">Here</a> </p>
		</div>
	</div>

	<!-- verify staff account to be register -->
	<!-- code for staff is 1010 -->
	<script type="text/javascript">
		function verify(){
			var code = prompt("Please enter staff code");
			if (code == 1010) {
				var unCheck = document.getElementById("staff");
				unCheck.checked = true;
			} else {
				var unCheck = document.getElementById("staff");
				unCheck.checked = false;
			}
		}
	</script>

	<script type="text/javascript">
		function change(newText){
			document.getElementById("idChange").innerHTML = newText;
		}
	</script>

	<script type="text/javascript">
		function changePh(newPh) {
			document.getElementById("txtId").placeholder = newPh;
		}
	</script>


</body>
</html>