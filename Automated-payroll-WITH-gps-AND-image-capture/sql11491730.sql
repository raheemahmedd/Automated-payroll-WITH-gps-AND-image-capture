-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 06:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
 create Database sql11491730;
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

use sql11491730;

CREATE TABLE `admin` (
  `AdminID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Password`, `FirstName`, `LastName`, `Gender`) VALUES
('202001058', 'admin', 'yhya', 'tarek', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `adminadress`
--

CREATE TABLE `adminadress` (
  `AdminID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `AddressID` int(11) NOT NULL,
  `StreetName` varchar(50) NOT NULL,
  `StreetNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `AdminID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `UserID` int(11) NOT NULL,
  `Feedback` varchar(2500) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `AdminID`, `UserID`, `Feedback`, `Date`, `Time`) VALUES
(1, '202001058', 202000318, 'good', '2022-05-16', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `HR_ID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`HR_ID`, `FirstName`, `LastName`, `Password`, `Gender`) VALUES
('2', 'toqa', 'mohammed', '152', 'Female'),
('3', 'hamid', 'samy', '152', 'Male'),
('4', 'fatma', 'adel', '162', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `hradress`
--

CREATE TABLE `hradress` (
  `HR_ID` int(11) NOT NULL,
  `AddressID` int(11) NOT NULL,
  `StretName` varchar(50) NOT NULL,
  `StreetNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hrfeedback`
--

CREATE TABLE `hrfeedback` (
  `FeedbackID` int(11) NOT NULL,
  `HR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `PhotoID` int(11) NOT NULL,
  `PhotoName` varchar(50) NOT NULL,
  `LocationID` int(11) NOT NULL,
  `Photo` longblob NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `AdminID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `AdminID`, `Password`, `FirstName`, `LastName`, `Gender`) VALUES
(261321, '202001058', 'raheem', 'RAHEEM', 'AHMAD', 'Male'),
(202000318, '202001058', '1234', 'rahem', 'ahmad', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `useradress`
--

CREATE TABLE `useradress` (
  `UserID` int(11) NOT NULL,
  `AddressID` int(11) NOT NULL,
  `StretName` varchar(50) NOT NULL,
  `StreetNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userbonus`
--

CREATE TABLE `userbonus` (
  `UserID` int(11) NOT NULL,
  `HR_ID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `BonusID` int(11) NOT NULL,
  `BonusAmt` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userbonus`
--

INSERT INTO `userbonus` (`UserID`, `HR_ID`, `BonusID`, `BonusAmt`, `Date`, `Time`) VALUES
(202000318, '2', 1, 200, '2022-05-14', '12:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `userlocation`
--

CREATE TABLE `userlocation` (
  `UserID` int(11) NOT NULL,
  `LocationID` int(11) NOT NULL,
  `Latitude` decimal(12,9) NOT NULL,
  `Longitude` decimal(12,9) NOT NULL,
  `LocationDate` date NOT NULL,
  `LocationTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userpenalty`
--

CREATE TABLE `userpenalty` (
  `UserID` int(11) NOT NULL,
  `HR_ID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `PenaltyID` int(11) NOT NULL,
  `PenaltyAmt` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpenalty`
--

INSERT INTO `userpenalty` (`UserID`, `HR_ID`, `PenaltyID`, `PenaltyAmt`, `Date`, `Time`) VALUES
(202000318, '2', 1, 230, '2022-05-14', '13:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `usersalary`
--

CREATE TABLE `usersalary` (
  `UserID` int(11) NOT NULL,
  `SalaryID` int(11) NOT NULL,
  `SalaryAmt` int(11) NOT NULL,
  `SalaryDate` date NOT NULL,
  `Salarytime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `RequestID` int(11) NOT NULL,
  `HR_ID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `Respond` enum('Accepted','Refused') DEFAULT NULL,
  `ReasonFor` varchar(300) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `adminadress`
--
ALTER TABLE `adminadress`
  ADD PRIMARY KEY (`AddressID`,`AdminID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`HR_ID`);

--
-- Indexes for table `hradress`
--
ALTER TABLE `hradress`
  ADD PRIMARY KEY (`HR_ID`,`AddressID`) USING BTREE,
  ADD UNIQUE KEY `AdressID` (`AddressID`);

--
-- Indexes for table `hrfeedback`
--
ALTER TABLE `hrfeedback`
  ADD PRIMARY KEY (`FeedbackID`,`HR_ID`),
  ADD KEY `HR_ID` (`HR_ID`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`PhotoID`),
  ADD KEY `fk` (`PhotoName`) USING BTREE,
  ADD KEY `photo_ibfk1` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `user_ibfk_1` (`AdminID`);

--
-- Indexes for table `useradress`
--
ALTER TABLE `useradress`
  ADD PRIMARY KEY (`UserID`,`AddressID`),
  ADD UNIQUE KEY `AdressID` (`AddressID`);

--
-- Indexes for table `userbonus`
--
ALTER TABLE `userbonus`
  ADD PRIMARY KEY (`UserID`,`HR_ID`,`BonusID`) USING BTREE,
  ADD UNIQUE KEY `BonusID` (`BonusID`),
  ADD KEY `HR_ID` (`HR_ID`);

--
-- Indexes for table `userlocation`
--
ALTER TABLE `userlocation`
  ADD PRIMARY KEY (`UserID`,`LocationID`),
  ADD UNIQUE KEY `LocationID` (`LocationID`);

--
-- Indexes for table `userpenalty`
--
ALTER TABLE `userpenalty`
  ADD PRIMARY KEY (`UserID`,`HR_ID`,`PenaltyID`) USING BTREE,
  ADD UNIQUE KEY `PenaltyID` (`PenaltyID`),
  ADD KEY `HR_ID` (`HR_ID`);

--
-- Indexes for table `usersalary`
--
ALTER TABLE `usersalary`
  ADD PRIMARY KEY (`UserID`,`SalaryID`),
  ADD UNIQUE KEY `SalaryID` (`SalaryID`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `HR_ID` (`HR_ID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hradress`
--
ALTER TABLE `hradress`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `PhotoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useradress`
--
ALTER TABLE `useradress`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userbonus`
--
ALTER TABLE `userbonus`
  MODIFY `BonusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlocation`
--
ALTER TABLE `userlocation`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userpenalty`
--
ALTER TABLE `userpenalty`
  MODIFY `PenaltyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
