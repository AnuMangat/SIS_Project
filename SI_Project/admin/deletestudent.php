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
		<h1>Delete Student Details</h1>

	</div> 

<form action="deletestudent.php" method="POST">
	<table align="center">
	<tr>
	
				<th>Student ID</th>
				<td><input type="text" name="StudentID" placeholder="Enter Student ID" required></td>
				<td><input type="Submit" name="Submit" value="Search"></td>
	</tr>
</table>

</form>

<table align="center" width="80%" border="1" style="margin-top: 10px";>
	<tr style="background-color: #000;color: #fff; " >
		<th>Student ID</th>
		<th>Student Name</th>
		<th>Major </th>
		<th>GPA</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Delete</th>
	</tr>
	</body>
	</html>
<?php 
 if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
	$StudentID=$_POST['StudentID'];
	$sql="SELECT * FROM student.student_info WHERE StudentID = $StudentID";
	$run = mysqli_query($db,$sql);   
	if(mysqli_num_rows($run)<1)
	{
		echo("No record is Found");
	}
	else
	{
		$count=0;
		while ($result=mysqli_fetch_assoc($run)) 
		{	
			$count++; 
			?>
			<tr align="center"> 
				<td><?php echo $result['StudentID'];?></td>    
				<td><?php  echo $result['StudentName'];?></td>
				<td><?php  echo $result['Major'];?></td>
                <td><?php  echo $result['GPA'];?></td>
				<td><?php  echo $result['address'];?></td>
				<td><?php  echo $result['phone'];?></td>
				<td><a href="deleteform.php?StudentID=<?php echo $result['StudentID'];?> ">Delete</a></td> 
			</tr>
			<?php
			
		}
	}
}
?>
</table> 