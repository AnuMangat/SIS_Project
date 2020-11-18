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

?> 
<?php
	include('header.php');
	
?>
<?php 
{
include ('../dbconnect.php');
$FacultyID=$_GET['FacultyID'];

$sql="DELETE FROM student.faculty_info WHERE FacultyID = $FacultyID";
$result= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $data variable */
 
if($result==1)
  {
	  ?>
  	<script type="text/javascript">
		alert('Data deleted successfully');
		window.location.href = "deletefaculty.php";
	</script>
<?php  
//    header('Location: deletefaculty.php');
  }
  else
  {
  	echo "error";
  }
}
?>

