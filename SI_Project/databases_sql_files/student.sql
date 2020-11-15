-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 01:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Year` int(1) NOT NULL,
  `Program` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `Title`, `Year`, `Program`) VALUES
('BIOL-1101', 'Cell Biology', 1, 'Biology'),
('BIOL-2071', 'Introductory Microbiology & Techniques', 2, 'Biology'),
('COMP-1000', 'Key Concepts in Computer Science', 1, 'Computer Science'),
('COMP-1400', 'Intro to Algorithms and Programming I', 1, 'Computer Science'),
('COMP-1410', 'Intro to Algorithms and Programming II', 1, 'Computer Science'),
('COMP-3150', 'Database Management Systems', 3, 'Computer Science'),
('COMP-4150', 'Advanced Database Design', 4, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `StudentID` int(11) NOT NULL,
  `CourseID` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Mark` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`StudentID`, `CourseID`, `Mark`) VALUES
(4321, 'BIOL-2071', NULL),
(4321, 'COMP-1000', NULL);

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
(123, 'Test', 'Test', 'CS'),
(454, 'Tom', 'Tom', 'CS'),
(456, 'Brenda', 'Sanders', 'Math'),
(789, 'Ken', 'Thomas', 'Bio'),
(12345, 'Johnny', 'Bravo', 'CS');

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
(123, 'Test'),
(456, 'Password'),
(789, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite`
--

CREATE TABLE `prerequisite` (
  `CourseID` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `PrereqID` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prerequisite`
--

INSERT INTO `prerequisite` (`CourseID`, `PrereqID`) VALUES
('COMP-1410', 'COMP-1400'),
('COMP-4150', 'COMP-3150');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomNo` int(5) NOT NULL,
  `Building` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Capacity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomNo`, `Building`, `Capacity`) VALUES
(53, 'Chrysler Hall North', 60),
(100, 'Odette Building', 300),
(401, 'Toldo Building', 150),
(402, 'Toldo Building', 250),
(1121, 'Erie Hall', 300);

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
(4321, 'Daniel', 'Math', '3.00'),
(6789, 'Nimo', 'CS', '3.72'),
(8910, 'Kyle', 'Bio', '3.00'),
(12314, 'bobobo', 'CS', '3.00'),
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
(123, 'Test'),
(4321, 'heyy'),
(6789, 'Nimo89'),
(8910, 'hello'),
(88778, 'hihello');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `FacultyID` int(11) NOT NULL,
  `CourseID` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `RoomNo` int(11) NOT NULL,
  `Building` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`FacultyID`, `CourseID`, `RoomNo`, `Building`, `StartTime`, `EndTime`) VALUES
(456, 'COMP-1000', 401, 'Toldo Building', '10:00:00', '11:20:00'),
(789, 'BIOL-2071', 1121, 'Erie Hall', '02:30:00', '03:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE `transcript` (
  `StudentID` int(11) NOT NULL,
  `CourseID` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `Semester` varchar(15) NOT NULL,
  `Mark` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`StudentID`, `CourseID`, `CourseName`, `Semester`, `Mark`) VALUES
(4321, 'BIOL-2071', 'Introductory Microbiology & Techniques', 'Fall2020', '86.00');

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
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `Year` (`Year`,`Program`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`StudentID`,`CourseID`),
  ADD KEY `CourseID` (`CourseID`);

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
-- Indexes for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD PRIMARY KEY (`CourseID`,`PrereqID`),
  ADD KEY `PrereqID` (`PrereqID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomNo`,`Building`),
  ADD KEY `RoomNo` (`RoomNo`,`Building`);

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
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`FacultyID`,`CourseID`,`RoomNo`,`Building`),
  ADD KEY `StartTime` (`StartTime`),
  ADD KEY `EndTime` (`EndTime`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `RoomNo` (`RoomNo`);

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`StudentID`,`CourseID`),
  ADD KEY `1` (`CourseID`);

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
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `Enrolled_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `teaches` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Enrolled_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student_info` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD CONSTRAINT `Prerequisite_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Prerequisite_ibfk_2` FOREIGN KEY (`PrereqID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `Teaches_ibfk_1` FOREIGN KEY (`FacultyID`) REFERENCES `faculty_info` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Teaches_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Teaches_ibfk_3` FOREIGN KEY (`RoomNo`) REFERENCES `room` (`RoomNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `1` FOREIGN KEY (`CourseID`) REFERENCES `enrolled` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2` FOREIGN KEY (`StudentID`) REFERENCES `enrolled` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
