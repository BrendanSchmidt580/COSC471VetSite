<?php
	require_once "serverConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create a User Account</title>
	<link rel="stylesheet" href="decentStyle.css">
</head>
<body>
	<div>
		<h1 style = "text-align:center; margin: 2px;">User account creation for Dogs are Cool Vet Clinic</h1>
		<h3>Fill out this form to create an account.</h4>
		<form action="UserSignUpScript.php" method="POST">
			<!--Username and password confirmation-->
			<label>Username: </label>
			<input type="text" name="username" id="username" required><br>
			<label>Password:  </label>
			<input type="password" name="password" id="password" required><br>
			<label>Confirm Password: </label>
			<input type="password" name="confirmed_password" id="confirmed_password" required><br>
			<label>First Name: </label>
			<input type="text" name="FName" id="FName" required><br>
			<label>Last Name: </label>
			<input type="text" name="LName" id="LName" required><br>
			<label>Email: </label>
			<input type="text" name="Email" id="Email" required><br>
			<label>Phone Number: </label>
			<input type="text" name="PhoneNum" id="PhoneNum" required><br>
			<label>Address </label>
			<input type="text" name="Address" id="Address" required><br>
			
			<!--Submit and Reset buttons -->
			<input type="submit" value="Submit">
			<input type="reset" value= "Clear Form">
		</form>
		<a style="width: 37.5%" href="Login.php">Already Have An Account?</a>
	</div>
</body>
</html>
