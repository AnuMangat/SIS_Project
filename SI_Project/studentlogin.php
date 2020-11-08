<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
<title>Student Management System</title>
</head>


<h4><a href="index.php" style="float: left;margin-left: 50px; margin-top:5px;font-size: 20px;color: #23527c;">Back </a></h4>


<form method="POST" action="studentlogin.php">
<body>
	<h1 align="Center" >Student Login</h1>
        <input type="text" name="student_id" placeholder ="Student ID"><br>
        <input type="password" name="password" placeholder = "Password"><br>
		<input type="submit" name="submit" value="Login"><br>
</form>
</body>
</html>

<?php
include ('dbconnect.php');

if (isset($_POST['submit'])) 
{
$student_id = $_POST['student_id'];
$password = $_POST['password'];

ValidateUser($db,$student_id,$password);

}

function ValidateUser($db,$studentid,$password)
{	
	$sql="SELECT * from student.student_info s
               INNER JOIN student.student_login sl 
               ON s.StudentID = sl.student_id 
               WHERE s.StudentID = $studentid AND sl.password = '$password'";
	$result= mysqli_query($db,$sql);
        
        if(mysqli_num_rows($result)>0)
	{
            session_start();
             $_SESSION['studentid']=$studentid;
             header('location:student/studentdash.php');
        }
 else {
     echo "Invalid User/Password";
     return;
 }
        
}
?>
