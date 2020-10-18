<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
  <h4><a href="index.php" style="float: left;margin-left: 50px; margin-top:50px ;font-size: 20px;color:#23527c;line-height: 130px;">Back </a></h4>
<h1>ADMIN lOGIN </h1>
<form action="login.php" method="POST" >
	
	<input type="text" name="username" placeholder ="Username"><br>
    <input type="password" name="password" placeholder = "Password"><br>
	<input type="submit" value="login"><br>
</form>
</body>
</html> 

<?php
session_start();
 include ('dbconnect.php');
 if(isset($_POST['username'])&& isset($_POST['password']))
{
 $Username= $_POST['username'];
 $Password= $_POST['password'];
 /*........... query for login.............*/
 $sql="SELECT * FROM admin WHERE username = '$Username' and password = '$Password'";
$data= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $data variable */ 
$result=mysqli_num_rows($data);/*data are feech then check how many data are feetch*/
 if($result==1)
   {
   $_SESSION['username']=$Username;
   header('location:admin/admindash.php'); /*redirect page whene you want*/
  }
   else{
  	echo "failed";
  }
}

?>

