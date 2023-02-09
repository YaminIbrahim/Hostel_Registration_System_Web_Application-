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
</head>

<body>
	<div class="container">
		<div class="uitmLogo">
			<img src="images/uitmmelati crop.png">
		</div>

		<div class="login">
			<h1>Login</h1>
		</div>

		<hr>
		<div class="loginForm">
			<form action="LoginProcess.php" method="POST">

				<!-- input user type -->
				<div class="radioType">
					<input type="radio" name="radType" id="radType" value="staff" required> Staff
					<input type="radio" name="radType" id="radType" value="student" required> Student
				</div>
				
				<hr><br>

				<!-- input email -->
				<div class="emailInput">
					<i class="fa-solid fa-envelope"></i><span>Email</span>
					<br>
					<input class="txtEmail" type="text" name="txtEmail" id="txtEmail" placeholder="Enter your email address" required>
				</div>

				<br>

				<!-- input password -->
				<div class="passInput">
					<i class="fa-solid fa-lock"></i><span>Password</span>
					<br>
					<input class="txtPass" type="Password" name="txtPass" id="txtPass" placeholder="Enter your password" required>
				</div>

				<br>

				<input class="submit" type="submit" name="submit" id="submit" value="Login">

			</form>
		</div>

		<!--<div class="or">
			<hr>
			<p>OR</p>
			<hr>
		</div>-->
		<br><br><br>
		<div class="linkRegis">
			<p>Didn't have any account yet? Register <a href="Register.php">Here</a> </p>
		</div>
	</div>
</body>
</html>