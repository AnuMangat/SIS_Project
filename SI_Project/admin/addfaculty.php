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
echo " welcome ".$_SESSION['username']
?> 
<?php
	
	include('header.php');
	include('titleheader.php');
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title> 
</head>
<body>

	<div class="admintitle" align="center">
		<h1>Add Faculty Details</h1>

	</div>

<form method="POST" action="addfaculty.php" enctype="multipart/form-data">
	<table border="1" align="center" style="width:50%;font-size: 30px;">
		 <tr>
				<th>Faculty ID</th>
				<td><input type="text" name="FacultyID" placeholder="Enter Faculty ID"required></td>
		 </tr>
		 <tr>
				<th>First Name</th>
				<td><input type="text" name="FirstName" placeholder="Enter First Name" required></td>
		 </tr>
		 <tr>
				<th>Last Name</th>
				<td><input type="text" name="LastName" placeholder="Enter Last Name" required></td>
		 </tr>
                  <tr>
				<th>Department</th>
				<td><input type="text" name="Department" placeholder="Enter Faculty Department" required></td>
		 </tr>
		 
		
		 <tr>  
		 	<td colspan="2" align="center">
		 		<input height="20%" type="submit" name="Submit" value="Submit">
		 	</td>
		 </tr>
	</table>
</form>
</body>
</html>
	
<?php
if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
    $FacultyID=$_POST['FacultyID'];
	$FirstName=$_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$Department=$_POST['Department'];
	
	
	// $sql="INSERT INTO student (rollno,name, city, pcon, class,image) VALUES ('$ROLLNO','$NAME','$CITY','$PCON','$CLASS','$IMAGE')";

	$qry = "INSERT INTO `student`.`faculty_info`(`FacultyID`, `FirstName`, `LastName`,`Department`) VALUES ('$FacultyID','$FirstName','$LastName','$Department')";

   $run = mysqli_query($db, $qry);


if ($run == true) {
	?>
	<script type="text/javascript">
		alert('data inserted successfully');
	</script>
	<?php
}else{
	echo "error";
}

}
?>