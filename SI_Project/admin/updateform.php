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
	$id=$_GET['studentid'];
	$sql="SELECT * FROM  student.student_info WHERE StudentID = $id";
	$run = mysqli_query($db,$sql); 
	$result=mysqli_fetch_assoc($run);
	$name=$result['StudentName'];
	$major=$result['Major'];
	$gpa=$result['GPA'];	
	$Address=$result['address'];
	$Phone=$result['phone'];
	
?>
	<form method="POST" action="updatedata.php" enctype="multipart/form-data">
	<table border="1" align="center" style="width:50%;font-size: 30px;">
		 
		 <tr>
				<th>Name</th>
		
					<td><input type="text" name="name" value="<?php echo $name; ?>"required></td>

			
		 </tr>
		 <tr>
				<th>Major</th>  
				<td><input type="text" name="major" value="<?php if ( isset( $major ) ) {  echo $major; }?>" required></td>
		 </tr>
		<tr>
				<th>GPA (Auto-Calculated)</th>
				<td><input type="number" name="gpa" readonly value="<?php if ( isset( $gpa ) ) {  echo $gpa; }?>"required></td>
		</tr>
				 <tr>
				<th>Address</th>
				<td><input type="text" name="Address" value="<?php if ( isset( $Address ) ) {  echo $Address; }?>"required></td>
		</tr>
		<tr>
				<th>Phone</th>
				<td><input type="text" name="Phone" value="<?php if ( isset( $Phone ) ) {  echo $Phone; }?>"required></td>
		 </tr>
		 <tr>  
		 	<td colspan="2" align="center">
		 		<input type="text" name="id" value="<?php echo $id;?>"/>
		 		<input height="30%" type="submit" name="Submit" value="Submit">
		 	</td>
		 </tr>
	</table>
	</form>
