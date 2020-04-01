<?php
	session_start();
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: Login.php');
		exit();
	}
	if (!isset($_SESSION['VetID']))
	{	//If the Vetid isn't set but you're logged in, you're a User.
		header('Location: Login.php');
		exit();
	}
	require_once "serverConnection.php";
	$VetId = $_SESSION['VetID'];
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
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="AccountInfo.php">Vet Info</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="VetBills.php">Create Bills</a></li>
			<li id="navBarLi" style="float:right; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="VetPetInfo.php">View All Pet History</a></li>
		</ul>
	</nav>

	<div style="width:80%; margin-left:auto; margin-right:auto;">
		<h1>Upcoming appointments:</h1>
		<table align="center" style="width: 100%;">
		<tr>
			<th>Owner Name</th>
			<th>Pet Name</th>
			<th>Date</th>
			<th>Time</th>
			<th>Notes</th>
		</tr>
<?php
	$sql = "SELECT * FROM appointments, users, pet WHERE users.UserID = appointments.User_ID AND pet.Pet_ID = appointments.Pet_ID AND appointments.Vet_ID = '$VetId'";	
	$result = mysqli_query($myDB, $sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			echo "<tr>
					<td>".$row["First_Name"]."</td>
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
		<h2 align="center">Create an Appointment:</h2>
		<form action="ScheduleAppt.php" method="POST" style="width:60%; margin: auto;">
			<label>UserID: </label>
			<input type="text" name="UId" id="UId" required><br>
			<label>PetID: </label>
			<input type="text" name="PId" id="PId" required><br>
			<label>Date Of Appt: </label>
			<input type="date" name="Date" id="Date" required><br>
			<label>Time Of Appt: </label>
			<input type="time" name="Time" id="Time" required><br>
			<label>Notes: </label>
			<input type="text" name="Note" id="Note" required><br>
			
			<!--Submit and Reset buttons -->
			<input type="submit" value="Create Appointment">
			<input type="reset" value="Reset Form">
		</form>


	</div>
</body>
</html>

<?php
	$myDB->close();
?>
