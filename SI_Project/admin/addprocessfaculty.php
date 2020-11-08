<?php
session_start();
if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
    $FacultyID=$_POST['FacultyID'];
	$FirstName=$_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$Department=$_POST['Department'];
	
	$sql = "INSERT INTO `faculty_info`(`FacultyID`, `FirstName`, `LastName`, `Department`) VALUES ('$FacultyID','$FirstName','$LastName','$Department')";
       

$result= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $result variable */
if($result==1)
  {
 
  	$_SESSION['success'] = "data inserted successfully";
  	header('location:addstudent.php');
  	exit();
  }
}
?>