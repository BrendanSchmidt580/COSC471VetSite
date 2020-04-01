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
	$ID = $_SESSION['UserID'];
	$sql = "SELECT * FROM pet WHERE Owner_ID = '$ID'";	
	$result = mysqli_query($myDB, $sql);
	$row = $result->fetch_assoc();
	$PetId = $row['Pet_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['name'];?>'s Pet Information</title>
	<link rel="stylesheet" href="decentStyle.css">
</head>
<body>
	<nav id="navBar">
		<ul id="navBarUl">
			<li id="navBarLi" style="width: 8%;"><a id="navBarA" href="UserHP.php">Home Page</a></li>
			<li id="navBarLi" style="float:right; width: 8%;"><a id="navBarA" href="Logout.php">Logout</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="AccountInfo.php">User Info</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="UserBills.php">View/Pay Bills</a></li>
			<li id="navBarLi" style="float:right; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="#">View Pet Info</a></li> <!--Here-->
		</ul>
	</nav>
	<!--PET INFO IN THIS BLOCK -->
	<h2 align="center">Basic Pet Info: </h2>
	<table align="center" style="width: 90%;">
		<tr>
			<th>Pet Name</th>
			<th>Gender</th>
			<th>Breed</th>
			<th>Known Issues</th>
			<th>Remove Old Info?</th>
		</tr>
<?php
	$sql = "SELECT * FROM pet WHERE Owner_ID = '$ID'";	
	$result = mysqli_query($myDB, $sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			echo "<tr>
					<td>".$row["Name"]."</td>
					<td>".$row["Gender"]."</td>
					<td>".$row["Breed"]."</td>
					<td>".$row["Known_Issues"]."</td>
					<td style = 'width: 15%;'><a id='normalLink' href='RemovePetScript.php?del=$row[Pet_ID]'>Remove This Listing</a></td>
				  </tr>";
		}
		echo "</table>";
	}
	else{
		echo "<tr>
				<td>No Info On Record</td><td></td><td></td><td></td>
				<td></td>
			  </tr>";
		echo "</table>";
	}
?>
		<h2 align="center">Add a Pet</h2>	<!--ADDING PET INFO SECTION-->
		<form action="AddPetScript.php" method="POST" style="width:60%; margin: auto;">
			<label>Pet Name: </label>
			<input type="text" style="margin: 0px 5px 5px 30px" name="PetName" id="PetName" required><br>
			<label>Gender: </label>
			<input type="text" style="margin: 0px 5px 5px 45px" name="Gender" id="Gender" required><br>
			<label>Breed: </label>
			<input type="text" style="margin: 0px 5px 5px 53px" name="Breed" id="Breed" required><br>
			<label>Known Issues: </label>
			<input type="text" name="KnownIss" id="KnownIss" required><br>
			
			<!--Submit and Reset buttons -->
			<input type="submit" value="Add Pet">
			<input type="reset" value="Reset Form">
		</form>
		
	<!--PET TREATMENT HISTORY HERE -->
	<h2 align="center">Pet Treatment History: </h2>
	<table align="center" style="width: 90%;">
		<tr>
			<th>Pet Name</th>
			<th>Treatment Type</th>
			<th>Treatment Date</th>
			<th>Follow up Needed?</th>
		</tr>
<?php 
	$sql = "SELECT pet.Name, pet_treatment.Treatment_Type, pet_treatment.Treatment_Date, pet_treatment.Follow_Up FROM pet, pet_treatment 
			WHERE pet.Pet_ID = pet_treatment.Pet_ID AND pet.Owner_ID = '$ID'";	
	$result = mysqli_query($myDB, $sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc())
		{
			echo "<tr>
					<td>".$row["Name"]."</td>
					<td>".$row["Treatment_Type"]."</td>
					<td>".$row["Treatment_Date"]."</td>
					<td>".$row["Follow_Up"]."</td>
				  </tr>";
		}
		echo "</table>";
	}
	else{
		echo "</table>";
		echo "None on Record.";
	}
?>
	<!--PET VACCINE INFO HERE -->
	<h2 align="center">Pet Vaccine History: </h2>
	<table align="center" style="width: 90%;">
		<tr>
			<th>Pet Name</th>
			<th>Vaccine Name</th>
			<th>Date Given</th>
			<th>Effective Length of Vaccine</th>
		</tr>
<?php 
	$sql = "SELECT pet.Name, pet_vacc.Vacc_Name, pet_vacc.Date_Give, pet_vacc.Effective_Length FROM pet, pet_vacc
			WHERE pet.Pet_ID = pet_vacc.Pet_ID AND pet.Owner_ID = '$ID'";		
	$result = mysqli_query($myDB, $sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			echo "<tr>
					<td>".$row["Name"]."</td>
					<td>".$row["Vacc_Name"]."</td>
					<td>".$row["Date_Give"]."</td>
					<td>".$row["Effective_Length"]."</td>
				  </tr>";
		}
		echo "</table>";
	}
	else{
		echo "</table>";
		echo "None on Record.";
	}
?>

</body>
</html>

<?php
	$myDB->close();
?>
