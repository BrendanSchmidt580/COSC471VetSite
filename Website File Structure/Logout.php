<?php
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: Login.php");
		exit;
	}
	session_destroy();
	// Redirect to the login page:
	header('Location: Login.php');
?>