<?php
	session_start();
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: Login.php');
		exit();
	}
	if (!isset($_SESSION['UserID']))
	{	//If the Userid isn't set but you're logged in, you're a Vet.
		header('Location: VetHP.php');
		exit();
	}
	require_once "serverConnection.php";
	$UserId = $_SESSION['UserID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['name'];?>'s Home Page</title>
	<link rel="stylesheet" href="decentStyle.css">
</head>
<body>
	<nav id="navBar">
		<ul id="navBarUl">
			<li id="navBarLi" style="width: 8%;"><a id="navBarA" href="#">Home Page</a></li>
			<li id="navBarLi" style="float:right; width: 8%;"><a id="navBarA" href="Logout.php">Logout</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="AccountInfo.php">User Info</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="UserBills.php">View/Pay Bills</a></li>
			<li id="navBarLi" style="float:right; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="UserPetInfo.php">View Pet Info</a></li>
		</ul>
	</nav>

	<div style="width:80%; margin-left:auto; margin-right:auto;">
		<h1>Upcoming appointments:</h1>
		<table align="center" style="width: 100%;">
		<tr>
			<th>Pet Name</th>
			<th>Date</th>
			<th>Time</th>
			<th>Notes</th>
		</tr>
<?php
	$sql = "SELECT * FROM appointments, pet WHERE appointments.User_ID = '$UserId' AND pet.Pet_ID = appointments.Pet_ID";	
	$result = mysqli_query($myDB, $sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			echo "<tr>
					<td>".$row["Name"]."</td>
					<td>".$row["Date_Of_Appt"]."</td>
					<td>".$row["Time_Of_Appt"]."</td>
					<td>".$row["Notes"]."</td>
				  </tr>";
		}
		echo "</table>";
	}
	else{
		echo "<tr>
				<td>No Upcoming Appointments.</td><td></td><td></td><td></td>
			  </tr>";
		echo "</table>";
	}
?>
	</div>
</body>
</html>

<?php
	$myDB->close();
?>
