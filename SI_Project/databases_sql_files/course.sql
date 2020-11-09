-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 09:40 AM
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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `Year` (`Year`,`Program`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
