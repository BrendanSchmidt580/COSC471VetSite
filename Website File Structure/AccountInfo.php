<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) 
	{
		header('Location: Login.php');
		exit();
	}
	if(isset($_SESSION['VetID']))
	{	//If you're logged in as a Vet select vet table.
		$dbTable = "vets"; //Name of Database table
		$idN = "VetID";	   //Name of ID in Database Table
		$ID = $_SESSION['VetID'];
		$Nav1 = "View All Pet History";
		$Nav1Href = "VetPetInfo.php";
		$Nav2 = "Create Bills";
		$Nav2Href = "VetBills.php";
		$Nav3 = "Vet Info";
	}
	if(isset($_SESSION['UserID']))
	{
		$dbTable = "users";
		$idN = "UserID";
		$ID = $_SESSION['UserID'];
		$Nav1 = "View Pet Info";
		$Nav1Href = "UserPetInfo.php";
		$Nav2 = "View/Pay Bills";
		$Nav2Href = "UserBills.php";
		$Nav3 = "User Info";
	}
	require_once "serverConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['name'];?>'s Account Information</title>
	<link rel="stylesheet" href="decentStyle.css">
</head>
<body>
	<nav id="navBar">
		<ul id="navBarUl">
			<li id="navBarLi" style="width: 8%;"><a id="navBarA" href="VetHP.php">Home Page</a></li>
			<li id="navBarLi" style="float:right; width: 8%;"><a id="navBarA" href="Logout.php">Logout</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="#"><?php echo "$Nav3" ?></a></li> <!--Here-->
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="<?php echo "$Nav2Href" ?>"><?php echo "$Nav2" ?></a></li>
			<li id="navBarLi" style="float:right; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="<?php echo "$Nav1Href" ?>"><?php echo "$Nav1" ?></a></li>
		</ul>
	</nav>
	<h3 align="center">Account Information: </h3>
	<table align="center" style="width: 90%;">
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Address</th>
			<th>Update</th>
		</tr>
<?php //Gives User Information
	$sql = "SELECT * FROM $dbTable WHERE $idN = '$ID'";	
	$result = mysqli_query($myDB, $sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			echo "<tr>
					<td>".$row["UserName"]."</td>
					<td>".$row["Password"]."</td>
					<td>".$row["First_Name"]."</td>
					<td>".$row["Last_Name"]."</td>
					<td>".$row["Email"]."</td>
					<td>".$row["Phone_Num"]."</td>
					<td>".$row["Address"]."</td>
					<td style = 'width: 15%;'><a id='normalLink' href='UpdateInfo.php'>Click Here to Update your Info</a></td>
				  </tr>";
		}
		echo "</table>";
	}
	else{
		echo "</table>";
		echo "0 results";
	}
?>
</body>
</html>

<?php
	$myDB->close();
?>
