-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 11:16 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `ApptID` int(11) NOT NULL,
  `Vet_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Pet_ID` int(11) NOT NULL,
  `Date_Of_Appt` date NOT NULL,
  `Time_Of_Appt` time NOT NULL,
  `Notes` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`ApptID`, `Vet_ID`, `User_ID`, `Pet_ID`, `Date_Of_Appt`, `Time_Of_Appt`, `Notes`) VALUES
(1, 3, 3, 1, '2020-03-31', '08:40:00', 'None.'),
(3, 3, 3, 1, '2020-12-04', '19:00:00', 'None to Mention'),
(5, 3, 4, 3, '2020-03-30', '15:00:00', 'Pets Nose Dry.');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Cost` varchar(40) NOT NULL,
  `Bill_Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Bill_ID`, `User_ID`, `Cost`, `Bill_Date`) VALUES
(1, 4, '183.2', '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `Pet_ID` int(11) NOT NULL,
  `Owner_ID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Breed` varchar(40) NOT NULL,
  `Known_Issues` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`Pet_ID`, `Owner_ID`, `Name`, `Gender`, `Breed`, `Known_Issues`) VALUES
(1, 3, 'Jade', 'Female', 'Poodle', 'None'),
(3, 4, 'Rufus', 'Male', 'Pitbull', 'Heart Problems');

-- --------------------------------------------------------

--
-- Table structure for table `pet_treatment`
--

CREATE TABLE `pet_treatment` (
  `Pet_ID` int(11) NOT NULL,
  `Treatment_Type` varchar(80) NOT NULL,
  `Treatment_Date` date NOT NULL,
  `Follow_Up` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_treatment`
--

INSERT INTO `pet_treatment` (`Pet_ID`, `Treatment_Type`, `Treatment_Date`, `Follow_Up`) VALUES
(1, 'Checkup', '2020-03-31', 'Yes'),
(3, 'Vaccine', '2020-03-30', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `pet_vacc`
--

CREATE TABLE `pet_vacc` (
  `Pet_ID` int(11) NOT NULL,
  `Vacc_Name` varchar(80) NOT NULL,
  `Date_Give` date NOT NULL,
  `Effective_Length` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_vacc`
--

INSERT INTO `pet_vacc` (`Pet_ID`, `Vacc_Name`, `Date_Give`, `Effective_Length`) VALUES
(1, 'Flu Shot', '2020-03-31', '10 months'),
(3, 'Flea Shot', '2020-03-30', '10 months');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Phone_Num` varchar(20) NOT NULL,
  `Address` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `First_Name`, `Last_Name`, `Email`, `Phone_Num`, `Address`) VALUES
(3, 'Brendan', 'temp', 'Brendan', 'Schmidt', 'BrendanSchmidt@abc.com', '123-456-7890', '123 Apple St.'),
(4, 'Alex123', '123', 'Alex', 'Remski', 'Remski@abc.com', '234-567-8901', '123 Grape St.');

-- --------------------------------------------------------

--
-- Table structure for table `vets`
--

CREATE TABLE `vets` (
  `VetID` int(11) NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Phone_Num` varchar(20) NOT NULL,
  `Address` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vets`
--

INSERT INTO `vets` (`VetID`, `UserName`, `Password`, `First_Name`, `Last_Name`, `Email`, `Phone_Num`, `Address`) VALUES
(3, 'Vet', 'vet', 'Dan', 'Smith', 'DSmith@abc.com', '555-555-5555', '321 Apple Ct.'),
(4, 'Vet2', 'vet', 'Adam', 'Jones', 'AJones@abc.com', '777-777-7777', '455 Orange St.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ApptID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_ID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`Pet_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `vets`
--
ALTER TABLE `vets`
  ADD PRIMARY KEY (`VetID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ApptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Bill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `Pet_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vets`
--
ALTER TABLE `vets`
  MODIFY `VetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
