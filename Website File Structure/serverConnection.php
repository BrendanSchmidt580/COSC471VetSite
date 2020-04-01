<?php
define('DataBase_Server', 'localhost');
define('DataBase_UserName', 'root');
define('DataBase_Password', '');
define('DataBase_Name', 'VetSite');

$myDB = new mysqli(DataBase_Server, DataBase_UserName, DataBase_Password, DataBase_Name);
if ( mysqli_connect_errno()) 
{
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if($myDB === false)
{
	die("Error: Could not connect. " . $myDB->connect_error);
}
?>
