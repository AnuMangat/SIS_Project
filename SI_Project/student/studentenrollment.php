<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Student Management System</title> 
	<link rel="stylesheet" type="text/css" href="../css/headerstyle.css">
</head>
<body>

	<div class="Studenttitle" align="center">
		<h1>Add Course</h1>

	</div>

	<div class="sidenav">
<p style="color:#743d8e" font-family:century Gothic; align="center">Welcome</p>
 
  <a href="studentenrollment.php">Go To Add Courses</a>
  <a href="studenttranscript.php">View my Transcript</a>
  <a href="../student_logout.php" class="btn">Logout</a>
</div>


<?php
include ('../dbconnect.php');
session_start();

if(!isset($_SESSION['studentid']))
{
	header('location:../login.php');
}

$studentInfo = getStudentInfo($db,$_SESSION['studentid']);
$currentID = $_SESSION['studentid'];
if($studentInfo == null)
{
	echo "Error loading student info!!";
	return;
}
$coursesAvailable = getAvailable($db,$_SESSION['studentid']);
$studentEnrollment = getEnrollment($db,$_SESSION['studentid']);
if(!empty($coursesAvailable) && mysqli_num_rows($coursesAvailable)>0)
	$availableRows = $coursesAvailable->num_rows;
else
	$availableRows = 0;

if(!empty($studentEnrollment) && mysqli_num_rows($studentEnrollment)>0)
	$enrollmentRows = $studentEnrollment->num_rows;
else
	$enrollmentRows = 0;

echo <<<_END
		<form action="studentenrollment.php" method="post" align="center" id="selectcoursestoadd">
		<table  border="1" align="center" >
		<thead>
			<tr>
			<th colspan="8" ><h4>Add Courses That You Meet The Prerequisites For<h4></th>
			</tr>
			<tr>
			<th align="left">Course ID</th>
			<th align="left">Course Title</th>
			<th align="left">Taught By</th>   
			<th align="left">RoomNo</th>  
			<th align="left">Building</th>
			<th align="left">Days</th>
			<th align="left">Start Time</th>
			<th align="left">End Time</th>
			</tr>
			</thead>
			<tbody>
_END;
			for ($j = 0 ; $j < $availableRows ; ++$j)
			{
				$coursesAvailable->data_seek($j);
				$row = $coursesAvailable->fetch_array(MYSQLI_NUM);

			
		  
		  echo <<<_END
				<tr>
				<td>$row[1]</td>
				<td>$row[6]</td>   
				<td>$row[9] $row[10]</td>   
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[7]</td>
				<td>$row[4]</td>
				<td>$row[5]</td>   
				<td><input type="checkbox" name='addcourse[]' value ='$row[1]'> </td>
				</tr>
_END;
			}
		  
		echo <<<_END
			</tbody>
			</table>
_END;
			?>


			<br><input type="submit" name="addcoursebutton" value="Add course">
		</form>
			<br><br>

		
		<table  border="1" align="center" >
		<thead>
			<tr>
			<th colspan="9" ><h4>Your Current Enrollment<h4></th>
			</tr>
			<tr>
			<th align="left">Course ID</th>
			<th align="left">Course Title</th>
			<th align="left">Taught By</th>   
			<th align="left">RoomNo</th>  
			<th align="left">Building</th>
			<th align="left">Days</th>
			<th align="left">Start Time</th>
			<th align="left">End Time</th>
			<th align="left">Mark</th>
			</tr>
			</thead>
			<tbody>
		<?php
			for ($j = 0 ; $j < $enrollmentRows ; ++$j)
			{
				$studentEnrollment->data_seek($j);
				$row = $studentEnrollment->fetch_array(MYSQLI_NUM);

			
		  
		  echo <<<_END
				<tr>
				<td>$row[1]</td>
				<td>$row[10]</td>   
				<td>$row[16] $row[17]</td>   
				<td>$row[5]</td>
				<td>$row[6]</td>
				<td>$row[10]</td>
				<td>$row[7]</td>
				<td>$row[8]</td>
				<td>$row[2]</td>   
				</tr>
_END;
			}
		  
		echo <<<_END
			</tbody>
			</table>

_END;
		?>
		<form action="studentdash.php" method="post" align="center" id="returntodash">
		<br><input type="submit" name="returntodash" value="Return to Dashboard">
		</form>
			<br><br>
		

<?php

function getStudentInfo($db,$studentid)
{
		$sql="SELECT * from student.student_info s
				INNER JOIN student.student_login sl 
				ON s.StudentID = sl.student_id 
				WHERE s.StudentID = $studentid";
	$result= mysqli_query($db,$sql);

		if(mysqli_num_rows($result)>0)
	{
			return mysqli_fetch_assoc($result);
		}
		return null;
}        

function getAvailable($db,$studentid)
{
	$sqlAvailable="SELECT * FROM student.teaches t INNER JOIN student.faculty_info f ON t.facultyID = f.facultyID INNER JOIN student.course c ON t.CourseID = c.CourseID LEFT OUTER JOIN student.prerequisite p on c.courseID = p.courseID WHERE p.prereqID IS NULL OR p.prereqID IN (select t.CourseID FROM student.transcript t WHERE t.studentID = $studentid AND t.mark >= 50) OR p.prereqID IN (select e.CourseID FROM student.enrolled e WHERE e.studentID = $studentid)";
	$resultAvailable=mysqli_query($db,$sqlAvailable);
	if(!empty($resultAvailable) && mysqli_num_rows($resultAvailable)>0)
	{
		return $resultAvailable;
	}
	return null;
}
		
function getEnrollment($db,$studentid)
{
	$sqlenrolled="SELECT * FROM student.enrolled e INNER JOIN student.teaches t ON e.courseID = t.courseID INNER JOIN student.course c ON e.courseID = c.courseID INNER JOIN student.faculty_info f ON t.facultyID = f.facultyID WHERE e.StudentID = $studentid";
	$resultenrolled=mysqli_query($db,$sqlenrolled);
	if(!empty($resultenrolled) && mysqli_num_rows($resultenrolled)>0)
	{
		return $resultenrolled;
	}
	return null;
}
	if (isset($_POST['addcoursebutton']) && isset($_POST['addcourse']))
	{
		$_POST['addcourse']; //get array of checked values
    	foreach($_POST['addcourse'] as $desiredcourse)
    	{
   			$sql = "INSERT INTO enrolled (`StudentID`, `CourseID`, `Mark`) VALUES ('$currentID', '$desiredcourse', NULL)";
   			$result= mysqli_query($db,$sql);
   			/*if (!$result) echo "INSERT failed: $sql<br>";*/
    	}
    }

?>

</body>
</html>
