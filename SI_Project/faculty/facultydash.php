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


if($facultyInfo == null)
{
    echo "Error loading faculty info!";
    return;
}


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

	<div class="facultytitle" align="center">
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
		<th>Course ID</th><tr><td><center><?php echo $coursesTaught['CourseID']; ?></center></td></tr>
		<th>Course Name</th><tr><td><center><?php echo $coursesTaught['Title']; ?></center></td></tr>
		<th>Building</th><tr><td><center><?php echo $coursesTaught['Building']; ?></center></td></tr>
		<th>Room</th><tr><td><center><?php echo $coursesTaught['RoomNo']; ?></center></td></tr>
		<th>Time Slot</th><tr><td><center><?php echo $coursesTaught['StartTime']; ?></center></td></tr>
	</tr>	
</table>		
	

	
<?php        
function getFacultyInfo($db,$facultyid)
{
        $sql="SELECT * from student.faculty_info f
               INNER JOIN student.faculty_login fl 
               ON f.FacultyID = fl.faculty_id 
               WHERE f.FacultyID = $facultyid";
	$result= mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
	{
            return mysqli_fetch_assoc($result);
        }
        return null;
}        
        
        
  ?>

<?php        
function getCoursesTaught($db,$facultyid)
{
        $sql="SELECT * from student.teaches t
               INNER JOIN student.faculty_login fl 
               ON t.FacultyID = fl.faculty_id 
               WHERE t.FacultyID = $facultyid";
	$result= mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
	{
            return mysqli_fetch_assoc($result);
        }
        return null;
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