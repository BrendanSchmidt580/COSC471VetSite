<?php
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
	{	//User is already logged in, no need for a new session.
		header("location: UserHP.php"); //Redirect them to the shop page.
		exit;
	}
	require_once "serverConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dogs are Cool Vet Login</title>
	<link rel="stylesheet" href="decentStyle.css">
	<style>
		.box 
		{
			float: left;
			width: 50%;
			padding: 20px;
		}
		.clearfix::after 
		{
			content: "";
			clear: both;
			display: table;
		}
	</style>
</head>
<body>
	<div class = "clearfix">
		<h1 style = "text-align:center; margin: 2px;">Dogs are Cool Login Page</h1>
		<div class = "box">
			<h2>Enter User Login information to continue</h2>
			<form action = "UserAuth.php" method = "post">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" id="username" required> 
				<label>Password</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
				<input type="reset" value="Clear Form">
			</form>
			
			<p><a href="UserSignUp.php" style="width: 20%">Create User Account</a></p>
		</div>
		
		<div class = "box">
			<h2>Enter Vet Login information to continue</h2>
			<form action="VetAuth.php" method="post">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" id="username" required> 
				<label>Password</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
				<input type="reset" value="Clear Form">
			</form>
		
			<p><a href="VetSignUp.php" style="width: 20%">Create Vet Account</a></p>
		</div>
	</div>
</body>
</html>

<?php 
	$myDB->close();
?>
