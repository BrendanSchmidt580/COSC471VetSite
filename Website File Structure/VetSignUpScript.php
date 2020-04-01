<?php
	require_once "serverConnection.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassWord = $_POST['confirmed_password'];
	$firstName = $_POST['FName'];
	$lastName = $_POST['LName'];
	$email = $_POST['Email'];
	$phone = $_POST['PhoneNum'];
	$addr = $_POST['Address'];
	$sql = "INSERT INTO `vets`(`UserName`, `Password`, `First_Name`, `Last_Name`, `Email`, `Phone_Num`, `Address`) VALUES ('$username','$password', '$firstName', '$lastName', '$email', '$phone', '$addr')";
	
	if($password === $confirmPassWord)
	{
		if ($myDB->query($sql) === TRUE) 
		{
			echo "Account Created";
			header("location: Login.php");
			exit();
		} 
		else 
		{
			echo "Error updating record: " . $myDB->error;
		}
	}
	else
	{
		echo "Password didn't match";
	}
	$myDB->close();
?>