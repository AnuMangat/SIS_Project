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
$StudentID=$_GET['StudentID'];

$sql="DELETE FROM student.student_info WHERE StudentID = $StudentID";
$result= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $data variable */
 
if($result==1)
  {
 ?>
	<script type="text/javascript">
		alert('Data deleted successfully');
		window.location.href = "deletestudent.php";
	</script>
<?php
  
  }
  else
  {
  	echo "error";
  }
}
?>

