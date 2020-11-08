<?php
session_start();
if (isset($_SESSION['username']))
{
	echo "";
}
else
{
	header('location:../login.php');
}
echo " welcome ".$_SESSION['username'];

?> 
<?php
	include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title> 
</head>
<body>

	<div class="admintitle" align="center">
		<h1>Admin Dashboard</h1>

	</div>
	<div class="dashboard">
		<table border="0" align="center" style="width: 50%;font-size: 30px;">
			<tr>
				<td>1.</td>
				<td><a href="addstudent.php">Insert Student Details</a></td>
			</tr>
			<tr>
				<td>2.</td>
				<td><a href="updatestudent.php">Update Student Details</a></td>
			</tr>
			<tr>
				<td>3.</td>
				<td><a href="deletestudent.php">Delete Student Details</a></td>
			</tr>
			<tr>
				<td>4.</td>
				<td><a href="addfaculty.php">Add Faculty Details</a></td>
			</tr>
			<tr>
				<td>5.</td>
				<td><a href="updatefaculty.php">Update Faculty Details</a></td>
			</tr>
			<tr>
				<td>6.</td>
				<td><a href="deletefaculty.php">Delete Faculty Details</a></td>
			</tr>
		</table>

			<center><a href="../logout.php" class="btn">Logout</a></center>

		
	</div>

</body >
</html> 