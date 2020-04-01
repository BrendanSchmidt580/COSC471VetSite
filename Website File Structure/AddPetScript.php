<?php
	session_start();
	require_once "serverConnection.php";
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: Login.php");
		exit;
	}
	
	$ID = $_SESSION['UserID'];
	$PetN = $_POST['PetName'];
	$Gender = $_POST['Gender'];
	$Breed = $_POST['Breed'];
	$Iss = $_POST['KnownIss'];
	
	
	$sql = "INSERT INTO `pet` (`Owner_ID`, `Name`, `Gender`, `Breed`, `Known_Issues`) VALUES ('$ID', '$PetN', '$Gender', '$Breed', '$Iss')";
	if ($myDB->query($sql) === TRUE) 
	{
		echo "Pet Added";
		header("location: UserPetInfo.php");
		exit();
	} 
	else 
	{
		echo "Error updating record: " . $myDB->error;
	}
	$myDB->close();
?>
