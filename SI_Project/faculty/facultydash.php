
<?php
include ('../dbconnect.php');
session_start();

if(!isset($_SESSION['facultyid']))
{
	header('location:../facultylogin.php');
}

$facultyInfo = getFacultyInfo($db,$_SESSION['facultyid']);
if($facultyInfo == null)
{
    echo "Error loading student info!!";
    return;
}
?>
		<table  border="1" >
			<tr>
				<th colspan="3" ><h4>Faculty Details<h4></th>
			</tr>
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
			<a href="../facultylogout.php" class="btn">logout</a>
		</div>