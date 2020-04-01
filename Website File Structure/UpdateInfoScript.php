<?php
	session_start();
	require_once "serverConnection.php";
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: Login.php");
		exit;
	}
	if(isset($_SESSION['VetID']))
	{
		$dbTable = "vets"; //Name of Database table
		$idN = "VetID";	   //Name of ID in Database Table
		$ID = $_SESSION['VetID'];
	}
	if(isset($_SESSION['UserID']))
	{
		$dbTable = "users";
		$idN = "UserID";
		$ID = $_SESSION['UserID'];
	}
	
	$UserN = $_POST['UserName'];
	$UserP = $_POST['Password'];
	$FName = $_POST['FName'];
	$LName = $_POST['LName'];
	$Email = $_POST['Email'];
	$Phone = $_POST['PhoneNum'];
	$Addr  = $_POST['Addr'];
	
	$sql = "UPDATE $dbTable SET `UserName`='$UserN', `Password`='$UserP', `First_Name`='$FName', `Last_Name`='$LName', `Email`='$Email', `Phone_Num`='$Phone', `Address`='$Addr' WHERE $idN = '$ID'";
	if ($myDB->query($sql) === TRUE) 
	{
		echo "Record updated successfully";
		header("location: AccountInfo.php");
		exit();
	}
	else 
	{
		echo "Error Updating Record: " . $myDB->error;
	}
	$myDB->close();
?>
