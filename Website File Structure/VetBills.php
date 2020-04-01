<?php
	session_start();
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: Login.php');
		exit();
	}
	require_once "serverConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Bill</title>
	<link rel="stylesheet" href="decentStyle.css">
</head>
<body>
	<nav id="navBar">
		<ul id="navBarUl">
			<li id="navBarLi" style="width: 8%;"><a id="navBarA" href="UserHP.php">Home Page</a></li>
			<li id="navBarLi" style="float:right; width: 8%;"><a id="navBarA" href="Logout.php">Logout</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="AccountInfo.php">Vet Info</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="#">Create Bills</a></li>
			<li id="navBarLi" style="float:right; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="UserPetInfo.php">View All Pet History</a></li>
		</ul>
	</nav>
	
	<div>
	<h2 align="center">Create A Bill:</h2>	<!--ADDING PET INFO SECTION-->
		<form action="VetBillScript.php" method="POST" style="width:60%; margin: auto;">
			<label>User ID: </label>
			<input type="text" style="margin: 0px 5px 5px 33px" name="UID" id="UID" required><br>
			<label>Bill Date: </label>
			<input type="date" style="margin: 0px 5px 5px 26px" name="BDate" id="BDate" required><br>
			<label>Cost: </label>
			<input type="number" step="0.01" style="margin: 0px 5px 5px 53px" name="Cost" id="Cost" required><br>
			
			<!--Submit and Reset buttons -->
			<input type="submit" value="Create Bill">
			<input type="reset" value="Reset Form">
		</form>
	</div>
</body>
</html>

<?php
	$myDB->close();
?>
