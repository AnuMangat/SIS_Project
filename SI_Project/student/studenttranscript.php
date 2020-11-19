<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Student Management System</title> 
	<link rel="stylesheet" type="text/css" href="../css/headerstyle.css">
</head>
<body>
	<div class="sidenav">
<p style="color:#743d8e" font-family:century Gothic; align="center">Welcome</p>
 
  <a href="studentenrollment.php">Go To Add Courses</a>
  <a href="studenttranscript.php">View my Transcript</a>
  <a href="../student_logout.php" class="btn">Logout</a>
</div>


<?php
	include ('../dbconnect.php');
	session_start();
	if (!isset($_SESSION['studentid']))
	{
		header('location:../login.php');
	}

	$myTranscript = getTranscript($db,$_SESSION['studentid']);
	if(!empty($myTranscript) && mysqli_num_rows($myTranscript)>0)
	$transcriptRows = $myTranscript->num_rows;
	else
	$transcriptRows = 0;

	

	echo <<<_END
		<form action="studentdash.php"  align="center" method="post" id="returntodash">
		<table  border="1" align="center">
		<thead>
			<tr>
			<th colspan="4" ><h4>My Current Transcript<h4></th>
			</tr>
			<tr>
			<th align="left">Course ID</th>
			<th align="left">Course Title</th>
			<th align="left">Semester</th>   
			<th align="left">Mark</th>  
			</tr>
			</thead>
			<tbody>
_END;
			for ($j = 0 ; $j < $transcriptRows ; ++$j)
			{
				$myTranscript->data_seek($j);
				$row = $myTranscript->fetch_array(MYSQLI_NUM);

			
		  
		  echo <<<_END
				<tr>
				<td>$row[1]</td>
				<td>$row[2]</td>   
				<td>$row[3]</td> 
				<td>$row[4]</td>  
				</tr>
_END;
			}
		  
		echo <<<_END
			</tbody>
			</table>
_END;
			?>
			<br><input type="submit" align="center"name="returntodash" value="Return to Dashboard">
		</form>
			<br><br>

<?php
	function getTranscript($db,$studentid)
	{
		$sqltaught="SELECT * FROM student.transcript t WHERE t.studentID = $studentid ORDER BY t.Semester";
		$resulttaught=mysqli_query($db,$sqltaught);
		if(!empty($resulttaught) && mysqli_num_rows($resulttaught)>0)
		{
			return $resulttaught;
		}
		return null;
	}
?>

</body>
</html>