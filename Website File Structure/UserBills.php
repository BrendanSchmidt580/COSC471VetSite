<?php
	session_start();
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: Login.php');
		exit();
	}
	require_once "serverConnection.php";
	$UserId = $_SESSION['UserID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['name'];?>'s Home Page</title>
	<link rel="stylesheet" href="decentStyle.css">
</head>
<body>
	<nav id="navBar">
		<ul id="navBarUl">
			<li id="navBarLi" style="width: 8%;"><a id="navBarA" href="UserHP.php">Home Page</a></li>
			<li id="navBarLi" style="float:right; width: 8%;"><a id="navBarA" href="Logout.php">Logout</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="AccountInfo.php">User Info</a></li>
			<li id="navBarLi" style="float:right; width: 8%; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="#">View/Pay Bills</a></li>
			<li id="navBarLi" style="float:right; border-width: 0px 2px 0px 0px; border-style: solid;"><a id="navBarA" href="UserPetInfo.php">View Pet Info</a></li>
		</ul>
	</nav>

	<div style="width:80%; margin-left:auto; margin-right:auto;">
		<h1>Current Bills:</h1>
		<table align="center" style="width: 100%;">
		<tr>
			<th>Bill ID</th>
			<th>Bill Date</th>
			<th>Cost</th>
		</tr>
<?php
	$sql = "SELECT * FROM bill WHERE User_ID = '$UserId'";	
	$result = mysqli_query($myDB, $sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			echo "<tr>
					<td>".$row["Bill_ID"]."</td>
					<td>".$row["Bill_Date"]."</td>
					<td>".$row["Cost"]."</td>	
				  </tr>";
		}
		echo "</table>";
	}
	else{
		echo "<tr>
				<td>No Bills to Pay</td><td></td><td></td>
			  </tr>";
		echo "</table>";
	}
?>
	<!--Won't actually record info, as the site doesn't need to track payment info.-->
	<h2 align="center">Pay a Bill</h2>	<!--ADDING PET INFO SECTION-->
		<form action="UserBillScript.php" method="POST" style="width:60%; margin: auto;">
			<label>Bill ID Number: </label>
			<input type="text" name="BillID" id="BillID" required><br>
			<label>Card Number: </label>
			<input type="text" name="c" id="c" required><br>
			<label>CCV Number: </label>
			<input type="number" name="c1" id="c1" required><br>
			<label>Experation Date: (I.e. Month/Year, 1/20)</label>
			<input type="text" name="c2" id="c2" required><br>
			
			<!--Submit and Reset buttons -->
			<input type="submit" value="Pay Bill In Full">
			<input type="reset" value="Reset Form">
		</form>
		
	</div>
</body>
</html>

<?php
	$myDB->close();
?>
