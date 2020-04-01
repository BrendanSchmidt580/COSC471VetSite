<?php
	session_start();
	require_once "serverConnection.php";
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: Login.php");
		exit;
	}
	
	$UserID = $_POST['UID'];
	$Date= $_POST['BDate'];
	$Cost = $_POST['Cost'];
	
	$sql = "INSERT INTO `bill` (`User_ID`, `Cost`, `Bill_Date`) VALUES ('$UserID', '$Cost', '$Date')";
	if ($myDB->query($sql) === TRUE) 
	{
		echo "Bill Created";
		header("location: VetBills.php");
		exit();
	} 
	else 
	{
		echo "Error updating record: " . $myDB->error;
	}
	$myDB->close();
?>
