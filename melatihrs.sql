-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 03:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melatihrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `regisID` int(10) NOT NULL,
  `regisDate` varchar(50) NOT NULL,
  `staffID` varchar(10) NOT NULL,
  `studID` varchar(10) NOT NULL,
  `roomID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regisID`, `regisDate`, `staffID`, `studID`, `roomID`) VALUES
(1, '2023-02-01', '2020459282', '2020459282', 'A-01-01'),
(3, '2023-01-29', '2020459282', '1111222334', 'A-01-01'),
(4, '2023-02-01', '2020459282', 'cbajhbc', 'A-01-02'),
(5, '2023-02-09', '1111222333', '2020456789', 'B-01-01'),
(6, '2023-02-10', '2020459282', '2020123456', 'B-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` varchar(8) NOT NULL,
  `roomFloor` varchar(2) NOT NULL,
  `roomBlock` varchar(1) NOT NULL,
  `roomAvail` varchar(2) NOT NULL,
  `roomType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomFloor`, `roomBlock`, `roomAvail`, `roomType`) VALUES
('A-01-01', '01', 'A', '2', '2'),
('B-01-01', '01', 'B', '8', '4');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `roomType` varchar(10) NOT NULL,
  `roomDesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomType`, `roomDesc`) VALUES
('2', '2 students'),
('4', '4 students'),
('8', '8 students');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` varchar(10) NOT NULL,
  `staffFname` varchar(50) NOT NULL,
  `staffLname` varchar(50) NOT NULL,
  `staffEmail` varchar(50) NOT NULL,
  `staffPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffFname`, `staffLname`, `staffEmail`, `staffPassword`) VALUES
('1111222333', 'Helmi', 'Othman', 'helmiothman00@gmail.com ', '123'),
('2020459282', 'Yamin', 'Ibrahim', 'yamin_ibrahim@uitm.edu.my', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studID` varchar(10) NOT NULL,
  `studFname` varchar(50) NOT NULL,
  `studLname` varchar(50) NOT NULL,
  `studEmail` varchar(50) NOT NULL,
  `studPassword` varchar(50) NOT NULL,
  `studAddr` varchar(50) NOT NULL,
  `studPhoneNum` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studID`, `studFname`, `studLname`, `studEmail`, `studPassword`, `studAddr`, `studPhoneNum`) VALUES
('2020123456', 'Aiman', 'Ali', 'aiman@gmail.com', '1234', 'Gemas,Negeri Sembilan', '0124567843'),
('2020459282', 'Yamin', 'Ibrahim', 'yamin@gmail.com', '123', 'Jasin, Melaka', '011-21060402');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`regisID`),
  ADD KEY `staffID` (`staffID`),
  ADD KEY `studID` (`studID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `roomType` (`roomType`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomType`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `regisID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`roomType`) REFERENCES `roomtype` (`roomType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
