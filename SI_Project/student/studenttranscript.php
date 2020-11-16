<?php
	include ('../dbconnect.php');
	session_start();
	if (!isset($_SESSION['studentid']))
	{
		header('location:../login.php');
	}

	$myTranscript = getTranscript($db,$_SESSION['studentid']);
	$transcriptRows = $myTranscript->num_rows;

	echo <<<_END
		<form action="studentdash.php" method="post" id="returntodash">
		<table  border="1" >
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
			<br><input type="submit" name="returntodash" value="Return to Dashboard">
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