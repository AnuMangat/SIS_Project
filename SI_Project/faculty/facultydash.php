<?php
include ('../dbconnect.php');
session_start();
if (isset($_SESSION['facultyid']))
{
	echo "";
}
else
{
	header('location:../facultylogin.php');
}
echo " welcome ".$_SESSION['facultyid'];

$facultyInfo = getFacultyInfo($db,$_SESSION['facultyid']);
if($facultyInfo == null)
{
    echo "Error loading faculty info!";
    return;
}


?> 
<?php
	include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title> 
</head>
<body>

	<div class="admintitle" align="center">
		<h1>Faculty Dashboard</h1>

	</div>
	<div class="dashboard">
		<table  border="0" align="center" style="width: 50%;font-size: 30px;">
			<tr>
		 		<th>First Name</th>
		 		<td><?php echo $facultyInfo['FirstName']; ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
		 		<td><?php echo $facultyInfo['LastName']; ?></td>
			 </tr>
			 <tr>
				<th>Department</th>
		 		<td><?php echo $facultyInfo['Department']; ?></td>
			 </tr>
		</table>
		
<?php        
function getFacultyInfo($db,$facultyid)
{
        $sql="SELECT * from student.faculty_info f
               INNER JOIN student.faculty_login fl 
               ON f.FacultyID = fl.faculty_id 
               WHERE f.FacultyID = $facultyid";
	$result= mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
	{
            return mysqli_fetch_assoc($result);
        }
        return null;
}        
        
        
  ?>

<div class="button">
<a href="../facultylogout.php" class="btn">Logout</a>
</div>

		
</div>

</body >
</html> 