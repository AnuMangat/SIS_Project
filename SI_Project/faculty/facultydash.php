<?php
include ('../dbconnect.php');
session_start();
if (isset($_SESSION['facultyid']))
{
	echo "";
}
else
{
	header('location:../facultylogin.php');
}
echo " welcome ".$_SESSION['facultyid'];

$facultyInfo = getFacultyInfo($db,$_SESSION['facultyid']);
$coursesTaught = getCoursesTaught($db,$_SESSION['facultyid']);

if($coursesTaught == null)
{
    echo "Error loading faculty info!";
    return;
}
$coursesTaught->fetch_all(MYSQLI_ASSOC);

if($facultyInfo == null)
{
    echo "Error loading faculty info!";
    return;
}


?> 
<?php
	include('facultyheader.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title> 
	<link rel="stylesheet"  type="text/css" href="../css/headerstyle.css">	
</head>
<body>
<div class="sidenav">
<p style="color:#743d8e" font-family:century Gothic; align="center">Welcome</p>
 
  <a href="../facultylogout.php" class="btn" align="center">Logout</a>
</div>
	<div class="facultytitle" align="center" >
		<h1>Faculty Dashboard</h1>

	</div>
	<div class="dashboard">
		<table  border="0" align="center" style="width: 50%;font-size: 30px;">
			<tr>
		 		<th>First Name</th>
		 		<td><?php echo $facultyInfo['FirstName']; ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
		 		<td><?php echo $facultyInfo['LastName']; ?></td>
			 </tr>
			 <tr>
				<th>Department</th>
		 		<td><?php echo $facultyInfo['Department']; ?></td>
			 </tr>
		</table>
		<p>

	<div class="courses" align="center">
		<h1>Courses Taught</h1>
	</div>

	
<table align="center" width="20%" border="1" style="margin-top: 10px";>
	<tr style="background-color: #000;color: #fff; " >
		<th>Course ID</th><th>Course Name</th><th>Building</th><th>Room</th><th>Time Slot</th>
		
		<?php
		foreach ($coursesTaught as $ct)
		{
			echo "<tr>";
			echo "<td><center>" . $ct['CourseID']  . "</center></td>";
			echo "<td><center>" . $ct['Title']  . "</center></td>";
			echo "<td><center>" . $ct['Building']  . "</center></td>";
			echo "<td><center>" . $ct['RoomNo']  . "</center></td>";
			echo "<td><center>" . $ct['StartTime'] . "</center></td>";
			echo "</tr>";
		}
		?>
</tr>
</table>		

<div class="courses" align="center">
		<h1>Update Student Marks</h1>
</div>
	
<form action="facultydash.php" method="POST">
	<table align="center">
	<tr>
				<th>Student ID</th>
				<td><input type="text" name="studentid" placeholder="Student ID" required></td>
				<td><input type="Submit" name="Submit" value="Search"></td>
	</tr>
</table>

</form>

<table align="center" width="80%" border="1" style="margin-top: 10px";>
	<tr style="background-color: #000;color: #fff; " >
		<th>Student ID</th>
		<th>Student Name</th>
		<th>Major</th>
		<th>GPA</th>
		<th>Edit</th>
	</tr>
	
<?php 
 if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
	$studentid=$_POST['studentid'];
	$sql="SELECT * FROM student.student_info WHERE StudentID = $studentid";
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
				<td><a href="updateformmarks.php?studentid=<?php echo $result['StudentID'];?> ">Edit</a></td> 
			</tr>
			<?php
			
		}
	}
}
?>
</table>
	
	

	
<?php        
function getFacultyInfo($db,$facultyid)
{
        $sql="SELECT * from student.faculty_info f
               INNER JOIN student.faculty_login fl 
               ON f.FacultyID = fl.faculty_id 
               WHERE f.FacultyID = {$facultyid}";
	$result= mysqli_query($db,$sql);
	return mysqli_fetch_assoc($result);
}        
        
        
  ?>

<?php        
function getCoursesTaught($db,$facultyid)
{
    $sql="SELECT * from student.teaches WHERE FacultyID = {$facultyid}";
	return mysqli_query($db,$sql);
    
}        
     ?>

<center>
<div class="buttonNew">
<a href="../facultylogout.php" class="btn">Logout</a>
</div>
</center>
		
</div>

</body >
</html> 