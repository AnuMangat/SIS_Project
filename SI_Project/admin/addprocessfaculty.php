<?php
session_start();
if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
	  $StudentID=$_POST['StudentID'];
	$StudentName=$_POST['StudentName'];
	$Major=$_POST['Major'];
	$GPA=$_POST['GPA'];
	
	$sql = "INSERT INTO `student_info`(`StudentID`, `StudentName`, `Major`) VALUES ('$StudentID','$StudentName','$Major','$GPA')";
       

$result= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $result variable */
if($result==1)
  {
 
  	$_SESSION['success'] = "data inserted successfully";
  	header('location:addstudent.php');
  	exit();
  }
}
?>