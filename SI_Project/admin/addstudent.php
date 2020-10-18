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
<form method="POST" action="addstudent.php" enctype="multipart/form-data">
	<table border="1" align="center" style="width:50%;font-size: 30px;">
		 <tr>
				<th>Student ID</th>
				<td><input type="text" name="StudentID" placeholder="Enter Student ID"required></td>
		 </tr>
		 <tr>
				<th>Student Name</th>
				<td><input type="text" name="StudentName" placeholder="Enter Full Name" required></td>
		 </tr>
		 <tr>
				<th>Major</th>
				<td><input type="text" name="Major" placeholder="Enter Student Major" required></td>
		 </tr>
                  <tr>
				<th>GPA</th>
				<td><input type="text" name="GPA" placeholder="Enter Student GPA" required></td>
		 </tr>
		 
		
		 <tr>  
		 	<td colspan="2" align="center">
		 		<input height="20%" type="submit" name="Submit" value="Submit">
		 	</td>
		 </tr>
	</table>
</form>
	
<?php
if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
        $StudentID=$_POST['StudentID'];
	$StudentName=$_POST['StudentName'];
	$Major=$_POST['Major'];
	$GPA=$_POST['GPA'];
	
	
	// $sql="INSERT INTO student (rollno,name, city, pcon, class,image) VALUES ('$ROLLNO','$NAME','$CITY','$PCON','$CLASS','$IMAGE')";

	$qry = "INSERT INTO `student`.`student_info`(`StudentID`, `StudentName`, `Major`,`GPA`) VALUES ('$StudentID','$StudentName','$Major','$GPA')";

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