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

	include ('../dbconnect.php');
	$FacultyID=$_GET['FacultyID'];
	$sql="SELECT * FROM  student.faculty_info WHERE FacultyID = $FacultyID";
	$run = mysqli_query($db,$sql); 
	$result=mysqli_fetch_assoc($run);
        
	$FirstName=$result['FirstName'];
	$LastName=$result['LastName'];
	$Department=$result['Department'];
	
?>
	<form method="POST" action="updatedatafaculty.php" enctype="multipart/form-data">
	<table border="1" align="center" style="width:50%;font-size: 30px;">
		 
		 <tr>
				<th>First Name</th>
		
					<td><input type="text" name="FirstName" value="<?php echo $FirstName; ?>"required></td>

			
		 </tr>
		 <tr>
				<th>Last Name</th>  
				<td><input type="text" name="LastName" value="<?php if ( isset( $LastName ) ) {  echo $LastName; }?>" required></td>
		 </tr>
		 <tr>
				<th>Department</th>
				<td><input type="text" name="Department" value="<?php if ( isset( $Department ) ) {  echo $Department; }?>"required></td>
		 </tr>
		 <tr>  
		 	<td colspan="2" align="center">
		 		<input type="text" name="FacultyID" value="<?php echo $FacultyID;?>"/>
		 		<input height="30%" type="submit" name="Submit" value="Submit">
		 	</td>
		 </tr>
	</table>
	</form>
