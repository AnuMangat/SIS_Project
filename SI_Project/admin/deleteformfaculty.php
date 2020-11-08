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
echo " welcome ".$_SESSION['username']
?> 
<?php
	include('header.php');
	include('titleheader.php');
?>
<?php 
{
include ('../dbconnect.php');
$StudentID=$_GET['StudentID'];

$sql="DELETE FROM student.student_info WHERE StudentID = $StudentID";
$result= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $data variable */
print_r($result); 
if($result==1)
  {
  	echo "Data delete Successfully";
  
  }
  else
  {
  	echo "error";
  }
}
?>

