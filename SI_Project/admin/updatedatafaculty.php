<?php
if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
        
    $FacultyID=$_POST['FacultyID'];
	$FirstName=$_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$Department=$_POST['Department'];
    
        
$sql=("UPDATE `student`.`faculty_info` SET  `FirstName` = '$FirstName',"
      . "`LastName` = '$LastName', `Department` = '$Department' "
      . "WHERE FacultyID = $FacultyID");
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