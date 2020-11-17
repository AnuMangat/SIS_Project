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

$coursesTaught = getTaught($db,$currentID);
$taughtRows = getNumberOfRows($coursesTaught);

$studentEnrollment = getEnrollment($db,$_SESSION['studentid']);
$enrollmentRows = getNumberOfRows($studentEnrollment);

$updatedGPA = updateGPA($db,$_SESSION['studentid']);

$currentGPA = fetchGPA($db,$_SESSION['studentid']);
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
		<form action="studentenrollment.php" method="post" id="gotoaddcourses">
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
				 </td>
				</tr>
_END;
			}
		  
		echo <<<_END
			</tbody>
			</table>
_END;

			?>
			<br><input type="submit" name="enrollmentbutton" value="Go to add courses">
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
			//	$studentEnrollment->data_seek($j);
				$row = $studentEnrollment->fetch_array(MYSQLI_NUM);

			
		  
		  echo <<<_END
				<tr>
				<td>$row[1]</td>
				<td>$row[9]</td>   
				<td>$row[15] $row[16]</td>  
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
		<br><br>
		<form action="studenttranscript.php" method="post" id="gototranscript">
			<input type="submit" name="totranscriptbutton" value="View my transcript">
		</form>

<?php   

function getStudentInfo($db,$studentid)
{
		$sql="SELECT * from student.student_info s
				INNER JOIN student.student_login sl 
				ON s.StudentID = sl.student_id 
				WHERE s.StudentID = {$studentid}";
	$result= mysqli_query($db,$sql);
	if(mysqli_num_rows($result)>0)
	{
		return mysqli_fetch_assoc($result);
	}
	return null;
        	
}        

function getTaught($db)
{
	$sql="SELECT * FROM student.teaches t 
			INNER JOIN student.faculty_info f 
			ON t.facultyID = f.facultyID 
			INNER JOIN student.course c ON t.CourseID = c.CourseID";
	$result=mysqli_query($db,$sql);	
	return $result;
	
}
		
function getEnrollment($db,$studentid)
{
	$sql="SELECT * FROM student.enrolled e INNER JOIN student.teaches t 
		 ON e.courseID = t.courseID INNER JOIN student.course c 
		 ON e.courseID = c.courseID INNER JOIN student.faculty_info f 
		 ON t.facultyID = f.facultyID WHERE e.StudentID = {$studentid}";
	$result=mysqli_query($db,$sql);
	return $result;

}

function fetchGPA($db,$studentid)
{
	$sql="SELECT GPA FROM student.student_info s WHERE s.studentID = {$studentid}";
	$result=mysqli_query($db,$sql);
	return $result;
}

function updateGPA($db,$studentid)
{
	$sqlGPA="UPDATE student.student_info s SET GPA = (SELECT AVG(Mark) FROM student.transcript t WHERE t.studentID = $studentid) WHERE s.studentID = $studentid";
	$resultupdateGPA=mysqli_query($db,$sqlGPA);
}

function getNumberOfRows($result)
{
	if(!empty($result) && mysqli_num_rows($result)>0)
		return $result->num_rows;
	return 0;

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



<div class="button">
			<a href="../student_logout.php" class="btn">logout</a>
</div>