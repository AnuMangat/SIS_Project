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
$coursesTaught = getTaught($db,$_SESSION['studentid']);
$studentEnrollment = getEnrollment($db,$_SESSION['studentid']);
$taughtRows = $coursesTaught->num_rows;
$enrollmentRows = $studentEnrollment->num_rows;

$currentGPA = calculateGPA($db,$_SESSION['studentid']);
$j = 0;
$currentGPA->data_seek($j);
$GPArow = $currentGPA->fetch_array(MYSQLI_NUM);
?>
		<table  border="1" >
			<tr>
				<th colspan="3" ><h4>Your Student Info<h4></th>
			</tr>
			<tr>
				<th>Student Name</th>
				<td><?php echo $studentInfo['StudentName']; ?></td>
			</tr>
			<tr>
				<th> Major</th>
				<td><?php echo $studentInfo['Major']; ?></td>
			 </tr>
			 <tr>
				<th> GPA</th>
				<td><?php echo $GPArow[0]/*$studentInfo['GPA'];*/ ?></td>
			 </tr>
		</table>
		<br>

<?php

echo <<<_END
		<form action="studentdash.php" method="post" id="selectcoursestoadd">
		<table  border="1" >
		<thead>
			<tr>
			<th colspan="7" ><h4>Courses On Offer<h4></th>
			</tr>
			<tr>
			<th align="left">Course ID</th>
			<th align="left">Course Title</th>
			<th align="left">Taught By</th>   
			<th align="left">RoomNo</th>  
			<th align="left">Building</th>
			<th align="left">Start Time</th>
			<th align="left">End Time</th>
			</tr>
			</thead>
			<tbody>
		_END;
			for ($j = 0 ; $j < $taughtRows ; ++$j)
			{
				$coursesTaught->data_seek($j);
				$row = $coursesTaught->fetch_array(MYSQLI_NUM);

			
		  
		  echo <<<_END
				<tr>
				<td>$row[1]</td>
				<td>$row[10]</td>   
				<td>$row[8] $row[9]</td>   
				<td>$row[2]</td>
				<td>$row[3]</td>
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

	<?php
	echo <<<_END
		<form action="studentdash.php" method="post" id="selectcoursestodrop">
		<table  border="1" >
		<thead>
			<tr>
			<th colspan="8" ><h4>Your Current Enrollment<h4></th>
			</tr>
			<tr>
			<th align="left">Course ID</th>
			<th align="left">Course Title</th>
			<th align="left">Taught By</th>   
			<th align="left">RoomNo</th>  
			<th align="left">Building</th>
			<th align="left">Start Time</th>
			<th align="left">End Time</th>
			<th align="left">Mark</th>
			</tr>
			</thead>
			<tbody>
		_END;
			for ($j = 0 ; $j < $enrollmentRows ; ++$j)
			{
				$studentEnrollment->data_seek($j);
				$row = $studentEnrollment->fetch_array(MYSQLI_NUM);

			
		  
		  echo <<<_END
				<tr>
				<td>$row[1]</td>
				<td>$row[10]</td>   
				<td>$row[14]</td>   
				<td>$row[5]</td>
				<td>$row[6]</td>
				<td>$row[7]</td>
				<td>$row[8]</td>
				<td>$row[2]</td>   
				<td><input type="checkbox" name='dropcourse[]' value ='$row[1]'> </td>
				</tr>
			_END;
			}
		  
		echo <<<_END
			</tbody>
			</table>

		_END;
			?>
			<br>
			<input type="submit" name="dropcoursebutton" value="Drop course">
		</form>

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

function getTaught($db,$studentid)
{
	$sqltaught="SELECT * FROM student.teaches t INNER JOIN student.faculty_info f ON t.facultyID = f.facultyID INNER JOIN student.course c ON t.CourseID = c.CourseID";
	$resulttaught=mysqli_query($db,$sqltaught);
	if(!empty($resulttaught) && mysqli_num_rows($resulttaught)>0)
	{
		return $resulttaught;
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

function calculateGPA($db,$studentid)
{
	$sqlGPA="SELECT AVG(Mark) FROM student.transcript t WHERE t.studentID = $studentid";
	$resultGPA=mysqli_query($db,$sqlGPA);
	if(!empty($resultGPA) && mysqli_num_rows($resultGPA)>0)
	{
		//updateGPA($db,$resultGPA);
		return $resultGPA;
	}
	return null;
}
		
?>

<?php
  if (isset($_POST['dropcoursebutton']) && isset($_POST['dropcourse']))
{
  $_POST['dropcourse']; //get array of checked values
  foreach($_POST['dropcourse'] as $key=>$todrop) 
  { 
	$sql = "DELETE FROM enrolled WHERE StudentID = $currentID AND CourseID = '$todrop'";
	$result= mysqli_query($db,$sql);
	if (!$result) echo "DELETE failed: $sql<br>";
  }
 
}
?> 

<?php
	if (isset($_POST['addcoursebutton']) && isset($_POST['addcourse']))
	{
		$_POST['addcourse']; //get array of checked values
    	foreach($_POST['addcourse'] as $desiredcourse)
    	{
   			$sql = "INSERT INTO enrolled (`StudentID`, `CourseID`, `Mark`) VALUES ('$currentID', '$desiredcourse', NULL)";
   			$result= mysqli_query($db,$sql);
   			if (!$result) echo "INSERT failed: $sql<br>";
    	}
    }
?>

<div class="button">
			<a href="../student_logout.php" class="btn">logout</a>
</div>