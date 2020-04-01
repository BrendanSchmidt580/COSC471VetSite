<?php
	session_start();
	require_once "serverConnection.php";
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{	//User isn't logged in so they can't have Payment Info Saved.
		header("location: Login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Account Information</title>
	<link rel="stylesheet" href="decentStyle.css">	
</head>
<body>
	<div>
		<h1>Update Account Information</h1>
		<h3>Enter your Updated Information</h3>
		<form action="UpdateInfoScript.php" method="POST">
			<label>Username: </label>
			<input type="text" name="UserName" id="UserName" required><br>
			<label>Password: </label>
			<input type="text" name="Password" id="Password" required><br>
			<label>First Name: </label>
			<input type="text" name="FName" id="FName" required><br>
			<label>Last Name: </label>
			<input type="text" name="LName" id="LName" required><br>
			<label>Email: </label>
			<input type="text" name="Email" id="Email" required><br>
			<label>Phone Number: </label>
			<input type="text" name="PhoneNum" id="PhoneNum" required><br>
			<label>Address: </label>
			<input type="text" name="Addr" id="Addr" required><br>
			
			<!--Submit and Reset buttons -->
			<input type="submit" value="Update Information">
			<input type="reset" value="Reset Form">
		</form>
	</div>
</body>
</html>
<?php
	$myDB->close();
?>