<?php
if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
        
    $name=$_POST['name'];
	$major=$_POST['major'];
	$gpa=$_POST['gpa'];
	$id=$_POST['id'];
    	
 	$StudentID=$_POST['StudentID'];
	$CourseID=$_POST['CourseID'];
	$Mark=$_POST['Mark']; 

       
$sql=("UPDATE `student`.`student_info` SET `StudentName` = '$name',"
      . "`Major` = '$major', `GPA` = '$gpa' "
      . "WHERE StudentID = $id");

$sql2=("UPDATE `student`.`enrolled` SET `StudentID` = '$StudentID',"
      . "`CourseID` = '$CourseID', `Mark` = '$Mark' "
      . "WHERE StudentID = $id");


$result= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $data variable */



if($result==1)
  {
  	echo "Data updated Successfully";
  
  }
  else
  {
  	echo "error";
  }
}
?>