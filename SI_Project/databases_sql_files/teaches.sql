-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 09:41 AM
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
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `FacultyID` int(10) NOT NULL,
  `CourseID` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `RoomNo` int(11) NOT NULL,
  `Building` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`FacultyID`, `CourseID`, `RoomNo`, `Building`, `StartTime`, `EndTime`) VALUES
(1000, 'COMP-1000', 401, 'Toldo Building', '10:00:00', '11:20:00'),
(3003, 'BIOL-2071', 1121, 'Erie Hall', '02:30:00', '03:50:00');

--
-- Indexes for dumped tables
--

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
-- Constraints for dumped tables
--

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `Teaches_ibfk_1` FOREIGN KEY (`FacultyID`) REFERENCES `faculty` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Teaches_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Teaches_ibfk_3` FOREIGN KEY (`RoomNo`) REFERENCES `room` (`RoomNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
