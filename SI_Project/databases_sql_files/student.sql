-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 10:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'pass'),
(3, 'moderator', 'password'),
(4, 'Dora', 'something'),
(5, 'Tony', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `department`) VALUES
(1, 'Bob', 'Math'),
(2, 'Vance', 'CS'),
(3, 'Yuri', 'CS'),
(4, 'Dora', 'Bio'),
(5, 'Tony', 'Chem');

-- --------------------------------------------------------

--
-- Table structure for table `admin_personal_info`
--

CREATE TABLE `admin_personal_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_personal_info`
--

INSERT INTO `admin_personal_info` (`id`, `firstname`, `lastname`, `address`, `phone`) VALUES
(1, 'Bob', 'Benson', '123 Main St.', '5136451457'),
(2, 'Vance', 'Smith', '456 West St.', '7565487498'),
(3, 'Yuri', 'Yone', '678 East St.', '6587451485'),
(4, 'Dora', 'Jones', '7546 South St.', '8656662415'),
(5, 'Frank', 'Miller', '9846 North St.', '9871235481');

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `CourseID` varchar(15) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `Department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`CourseID`, `CourseName`, `Department`) VALUES
('BIO101', 'Cell Biology', 'Biology'),
('BIO201', 'Anatomy', 'Biology'),
('BIO305', 'Metabolism', 'Biology'),
('CHEM101', 'General Chemistry I', 'Chemistry'),
('CHEM102', 'General Chemistry II', 'Chemistry'),
('CHEM105', 'Organic Chemistry', 'Chemistry'),
('CS100', 'Introduction to Algorithms', 'CS'),
('CS102', 'Data Structures', 'CS'),
('CS200', 'Game Design', 'CS'),
('CS405', 'Artificial Intelligence', 'CS'),
('HK101', 'Introductory Exercise Physiology', 'Human Kinetics'),
('HK402', 'Neurophysiology', 'Human Kinetics'),
('MT101', 'Integral Calculus', 'Math'),
('MT102', 'Differential Calculus', 'Math'),
('MT105', 'Linear Algebra', 'Math'),
('MT202', 'Number Theory', 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `StudentID` varchar(15) NOT NULL,
  `CourseID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_info`
--

CREATE TABLE `faculty_info` (
  `FacultyID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_info`
--

INSERT INTO `faculty_info` (`FacultyID`, `FirstName`, `LastName`, `Department`) VALUES
(123, 'Johnny', 'Bravo', 'CS'),
(456, 'Brenda', 'Sanders', 'Math'),
(789, 'Ken', 'Thomas', 'Bio'),
(1234, 'Test', 'Test', 'CS'),
(6345, 'Tom', 'Tom', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE `faculty_login` (
  `faculty_id` int(11) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`faculty_id`, `password`) VALUES
(456, 'Password'),
(789, 'admin'),
(1234, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `StudentID` int(11) NOT NULL,
  `StudentName` varchar(50) NOT NULL,
  `Major` varchar(50) DEFAULT NULL,
  `GPA` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`StudentID`, `StudentName`, `Major`, `GPA`) VALUES
(123, 'Test', 'CS', '3.80'),
(6789, 'Nimo', 'CS', '3.72'),
(8910, 'Kyle', 'Bio', '3.00'),
(12314, 'bobobo', 'CS', '3.00'),
(12345, 'Daniel', 'Math', '3.00'),
(88778, 'Bob', 'Math', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `student_id` int(11) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`student_id`, `password`) VALUES
(123, 'test'),
(6789, 'Nimo89'),
(8910, 'hello'),
(12345, 'heyy'),
(88778, 'hihello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD KEY `id constraint` (`id`);

--
-- Indexes for table `admin_personal_info`
--
ALTER TABLE `admin_personal_info`
  ADD KEY `id constraint personal info` (`id`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `faculty_info`
--
ALTER TABLE `faculty_info`
  ADD PRIMARY KEY (`FacultyID`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD CONSTRAINT `id constraint` FOREIGN KEY (`id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `admin_personal_info`
--
ALTER TABLE `admin_personal_info`
  ADD CONSTRAINT `id constraint personal info` FOREIGN KEY (`id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`FacultyID`) ON DELETE CASCADE;

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
