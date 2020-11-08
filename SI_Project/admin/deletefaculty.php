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
<form action="deletefaculty.php" method="POST">
	<table align="center">
	<tr>
	
				<th>Faculty ID</th>
				<td><input type="text" name="FacultyID" placeholder="Enter Faculty ID" required></td>
				<td><input type="Submit" name="Submit" value="Search"></td>
	</tr>
</table>

</form>

<table align="center" width="80%" border="1" style="margin-top: 10px";>
	<tr style="background-color: #000;color: #fff; " >
		<th>Faculty ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Department</th>
		<th>Delete</th>
	</tr>
	
<?php 
 if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
	$FacultyID=$_POST['FacultyID'];
	$sql="SELECT * FROM student.faculty_info WHERE FacultyID = $FacultyID";
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
				<td><?php echo $result['FacultyID'];?></td>    
				<td><?php  echo $result['FirstName'];?></td>
				<td><?php  echo $result['LastName'];?></td>
                <td><?php  echo $result['Department'];?></td>
				<td><a href="deleteformfaculty.php?FacultyID=<?php echo $result['FacultyID'];?> ">Delete</a></td> 
			</tr>
			<?php
			
		}
	}
}
?>
</table> 