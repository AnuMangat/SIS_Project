-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 04:05 AM
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
(123, 'PHYS-1000', 'Introduction to Astronomy I', '2018Fall', '80.00'),
(123, 'PHYS-1010', 'Introduction to Astronomy II', '2018Winter', '75.00'),
(4321, 'BIOL-2071', 'Introductory Microbiology & Techniques', 'Fall2020', '81.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`StudentID`,`CourseID`),
  ADD KEY `1` (`CourseID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `2` FOREIGN KEY (`StudentID`) REFERENCES `student_info` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
