# SIS_Project - Student Information Management System

Project Vision: Create a Student Database Management System capable of allowing
students to add, delete and update course selections. Also allows faculty members to
view courses taught and apply grades to students. Furthermore, administrators can add,
delete, update student and faculty records. 

Created a working student database system using mySQL/php/html/js/css/bootstrap
capable of various functionalities
● These functions include admin/student/faculty logins, adding/deleting/updating data to
and from server, and other features such as search, grades etc
● Allows users to view the database portal and browse it freely, however you must be in the
database registered as a student, faculty member or administrator to use the database
system.
● Setup the database which houses all the datasets using the Apache server and
phpmyAdmin
● All administrative work on the database such as creating queries, tables, users etc can be
done locally using phpmyAdmin and mySQL
● Project can be accessed and executed locally using localhost

Developed a working database system capable performing different functionalities.
The final Database schema is as follows:
Admin(id, username, password)
Admin_info(id, name, department, address, phone)
Course(CourseID, Title, Year, Program)
Enrolled(StudentID, CourseID, Mark)
Faculty_info(FacultyID, FirstName, LastName, Department)
Faculty_login(faculty_id, password)
Prerequisite(CourseID, PrereqID)
Room(RoomNo, Building, Capacity)
Student_info(StudentID, StudentName, Major, GPA, address, phone)
Student_login(student_id, password)
Teaches(FacultyID, CourseID, RoomNo, Building, StartTime, EndTime, Title, day)
Transcript(StudentID, CourseID, CourseName, Semester, Mark)



Project Execution Instructions
You can execute the project and use our Student Database Management System we have developed on your localhost by using tools such as XAMPP control, phpmyAdmin and Apache Servers. First download the latest version of XAMPP and also MySQL. Then on the XAMPP control panel click “Start” on the Apache and MySQL module. Then type in http://localhost/phpmyadmin so that you can access the database. You should see the phpmyAdmin page, which means that the server is working correctly. 
After that go to the directory where you have XAMPP stored and open the “htdoc” folder directory, in our case this was C:\xampp\htdocs\. This is where you will store our entire project file so that the Apache server may connect to it and you will be able to run the php files. Here in C:\xampp\htdocs\ you will paste our entire project folder called “SIS_Project-main”. 
Now you should see all the files that are within our project. Next go to C:\xampp\htdocs\SIS_Project-main\SI_Project\databases_sql_files directory, and open the student.sql file. Copy the entire contents of this .sql file then go back to the database on http://localhost/phpmyadmin, and within the sql command, paste it in so that you have our entire database created on your localhost in phpmyAdmin.
Once all this is done go back to your browser and open another tab then type in http://localhost/SIS_Project-main/SI_Project/index.php. This is where you should be able to see the working project, and its current index page. From there you may browse freely throughout the project, if you need to login to any of the accounts whether it is a student, faculty or admin account, just go back to your http://localhost/phpmyadmin page and look at the “tables admin”, “faculty_info” and “student_info” within the “student” database, which contains the login credentials for you to login to the database system GUI using any created users.
You can also see all the files of the project on our GitHub Page here https://github.com/AnuMangat/SIS_Project.
We also have created test accounts for examiners to view and grade the project, below are test accounts and their login credentials for easy access:
Admin Username/Password: admin/admin
Student ID/Password: 123/Test
Faculty ID/Password: 123/Test 
