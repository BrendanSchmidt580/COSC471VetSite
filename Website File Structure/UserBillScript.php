<?php
	session_start();
	require_once "serverConnection.php";
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: Login.php");
		exit;
	}
	
	$BID = $_POST['BillID'];
	$sql = "DELETE FROM `bill` WHERE Bill_ID = '$BID'";
	if ($myDB->query($sql) === TRUE) 
	{
		echo "Bill Payed";
		header("location: UserBills.php");
		exit();
	} 
	else 
	{
		echo "Error updating record: " . $myDB->error;
	}
	$myDB->close();
?>
