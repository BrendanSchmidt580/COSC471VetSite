<?php
	session_start();
	require_once "serverConnection.php";

	if ( !isset($_POST['username'], $_POST['password']) ) 
	{
		// Could not get the data that should have been sent.
		die ('Please fill both the username and password field!');
	}
	if ($stmt = $myDB->prepare('SELECT VetID, Password FROM vets WHERE UserName = ?')) 
	{	
		$stmt->bind_param('s', $_POST['username']);
		$stmt->execute();
		$stmt->store_result();
	}
	if ($stmt->num_rows > 0) 
	{
		$stmt->bind_result($Vetid, $password);
		$stmt->fetch();
		if ($_POST['password'] === $password) 
		{
			//User is now logged in, create session variables.
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['VetID'] = $Vetid;
			header('Location: VetHP.php');
		} 
		else 
		{	//Password didn't match one on file Alert.
			echo '<script language="javascript">';
			echo 'alert("Incorrect Password!")';
			echo '</script>';
			header('Location: Login.php');
		}
	} 
	else 
	{	//Username didn't match any on file Alert.
		echo '<script language="javascript">';
		echo 'alert("Incorrect Username!")';
		echo '</script>';
		header('Location: Login.php');
	}
	$stmt->close();
	$myDB->close();
?>