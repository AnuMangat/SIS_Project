<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
<title>Student Management System</title>
</head>


<h4><a href="index.php" style="float: left;margin-left: 50px; margin-top:5px;font-size: 20px;color: #23527c;">Back </a></h4>


<form method="POST" action="facultylogin.php">
<body>
	<h1 align="Center" >Faculty Login</h1>
        <input type="text" name="faculty_id" placeholder ="Faculty ID"><br>
        <input type="password" name="password" placeholder = "Password"><br>
		<input type="submit" name="submit" value="Login"><br>
</form>
</body>
</html>

<?php
include ('dbconnect.php');

if (isset($_POST['submit'])) 
{
$faculty_id = $_POST['faculty_id'];
$password = $_POST['password'];

ValidateUser($db,$faculty_id,$password);

}

function ValidateUser($db,$facultyid,$password)
{	
	$sql="SELECT * from student.faculty_info f
               INNER JOIN student.faculty_login fl 
               ON f.FacultyID = fl.faculty_id 
               WHERE f.FacultyID = $facultyid AND fl.password = '$password'";
	$result= mysqli_query($db,$sql);
        
        if(mysqli_num_rows($result)>0)
	{
            session_start();
             $_SESSION['facultyid']=$facultyid;
             header('location:faculty/facultydash.php');
        }
 else {
     echo "Invalid User/Password";
     return;
 }
        
}
?>
