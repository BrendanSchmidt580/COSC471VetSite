<?php
	session_start();
	require_once "serverConnection.php";
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: Login.php");
		exit;
	}
	
	if(isset($_GET['del']))
	{
		$Pid = $_GET['del'];
		$sql = "DELETE FROM `pet` WHERE Pet_ID = '$Pid'";
		$myDB->query($sql);
		header("location: UserPetInfo.php");
		exit;
	}
	
	$myDB->close();
?>
