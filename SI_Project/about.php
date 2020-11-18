<!DOCTYPE html>
<html>
<head>
         <meta charset="UTF-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="css/about.css">

</head>
<body>
	<header>  
		<div class="main">
                    
			<ul>
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="about.php">About</a></li>
				
			</ul>
		</div>
		<div class="title">
		
		<h1>Student Information Management System</h1>
		
		</div>
	</header>

<center><h1>About This Project</h1><center>

<p>
 <div class="d">
The student management system is a project where you act as an administrator in which you are able to add/delete/update student and faculty records.

You have the ability to log-in as a student and view your details, along with adding/deleting/updating courses.

You can also log in as a faculty member and  view your details and look into the courses you are scheduled to teach.</p>
   </div>
   <center><h1>Project Execution Instructions</h1><center>
  <div class="d">
<p>You can execute the project and use our Student Database Management System we have developed on your localhost by using tools such as XAMPP control, phpmyAdmin and Apache Servers. First download the latest version of XAMPP and also MySQL.</p>
<p> Then on the XAMPP control panel click “Start” on the Apache and MySQL module. </p>
<p>Then type in http://localhost/phpmyadmin so that you can access the database. You should see the phpmyAdmin page, which means that the server is working correctly. </p>
</p>After that go to the directory where you have XAMPP stored and open the “htdoc” folder directory, in our case this was C:\xampp\htdocs\. This is where you will store our entire project file so that the Apache server may connect to it and you will be able to run the php files. Here in C:\xampp\htdocs\ you will paste our entire project folder called “SIS_Project-main”. </p>

<p>Now you should see all the files that are within our project. Next go to C:\xampp\htdocs\SIS_Project-main\SI_Project\databases_sql_files directory, and open the student.sql file. Copy the entire contents of this .sql file then go back to the database on phpmyAdmin, and within the sql command, paste it in so that you have our entire database created on your localhost.</p>
<p>Once all this is done go back to your browser and open another tab then type in http://localhost/SIS_Project-main/SI_Project/index.php. This is where you should be able to see the working project, and its current index page. From there you may browse freely throughout the project, if you need to login to any of the accounts whether it is a student, faculty or admin account, just go back to your http://localhost/phpmyadmin page and look at the “tables admin”, “faculty_info” and “student_info” within the “student” database, which contains the login credentials for you to login to the database system GUI.</p>
<p>Below are accounts and their information created for examiners to view and grade the project:</p>
<ol class="d">
  <li>Admin Username/Password: admin/admin</li>
  <li>Student ID/Password: 123/Test</li>
  <li>Faculty ID/Password: 123/Test</li>
</ol>
</div>

</body>
</html>