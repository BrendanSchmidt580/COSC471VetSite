<?php
	session_start();
	require_once "serverConnection.php";
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: Login.php");
		exit;
	}
	$VetID = $_SESSION['VetID'];
	$UserID = $_POST['UId'];
	$PetID = $_POST['PId'];
	$Date = $_POST['Date'];
	$Time = $_POST['Time'];
	$Notes = $_POST['Note'];
	
	$sql = "INSERT INTO `appointments` (`Vet_ID`, `User_ID`, `Pet_ID`, `Date_Of_Appt`, `Time_Of_Appt`, `Notes`) VALUES ('$VetID', '$UserID', '$PetID', '$Date', '$Time', '$Notes')";
	if ($myDB->query($sql) === TRUE) 
	{
		echo "Appointment Create";
		header("location: VetHP.php");
		exit();
	} 
	else 
	{
		echo "Error updating record: " . $myDB->error;
	}
	$myDB->close();
?>
