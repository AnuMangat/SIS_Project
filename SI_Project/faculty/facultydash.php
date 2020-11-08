
<?php
include ('../dbconnect.php');
session_start();

if(!isset($_SESSION['studentid']))
{
	header('location:../login.php');
}

$studentInfo = getStudentInfo($db,$_SESSION['studentid']);
if($studentInfo == null)
{
    echo "Error loading student info!!";
    return;
}
?>
		<table  border="1" >
			<tr>
				<th colspan="3" ><h4>Student Details<h4></th>
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
		 		<td><?php echo $studentInfo['GPA']; ?></td>
			 </tr>
		</table>
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
        
        
  ?>
<div class="button">
			<a href="../student_logout.php" class="btn">logout</a>
		</div>