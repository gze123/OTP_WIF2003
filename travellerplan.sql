-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 10:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travellerplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` varchar(55) NOT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` varchar(55) NOT NULL,
  `TripID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `description`, `location`, `type`, `start_date`, `start_time`, `end_date`, `end_time`, `TripID`) VALUES
(27, 'Eat', 'Eat pork', 'Porky Society', 'Food', '2019-05-30', '09:00', '2019-05-30', '10:00', 14),
(32, 'Visit Disneyland With family', 'Visit Disneyland', 'Disneyland Park, Disneyland Drive, Anaheim, CA, USA', 'Relaxing', '2019-05-25', '09:00', '2019-05-25', '22:00', 24),
(33, 'Eat Dessert', 'Hillll', 'Korean BBQ, Elizabeth Street, Surry Hills NSW, Australia', 'Food', '2019-06-06', '14:00', '2019-06-06', '16:00', 29),
(34, 'Buy Handphone', 'Buy new phone', 'Mobileciti, Church Street, Parramatta NSW, Australia', 'Shopping', '2019-06-02', '14:00', '2019-06-02', '16:00', 29);

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `checklistID` int(10) UNSIGNED NOT NULL,
  `checkname` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `tripID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`checklistID`, `checkname`, `state`, `tripID`) VALUES
(45, '11 pants', 0, 24),
(46, '5 shirts', 0, 29),
(47, 'shit', 0, 29);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `userid` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`userid`, `email`, `name`, `password`) VALUES
(1, 'weinghwee@hotmail.com', 'Hello Hi', '$2y$10$cxpw27CWKy81Jmk6n2xGgOgjb/LUQARe4wvj4bVzQBwI8Hl6rvkH6'),
(2, 'gandandan123@gmail.com', 'GAN ZIY EN', '$2y$10$Mw2DkN/VuaGKolecrlikzuyQdKr3Z.v.g22L/QiFO7GYw/cvt7M1a'),
(3, 'weewh98@gmail.com', 'Weing Hwee Wee', '$2y$10$7LgGUQfvmTHOi51E/.PGvOxEtkR1z/103HUgqGHmZg9JabcLg7.7O'),
(6, 'testing@hotmail.com', 'Testing', '$2y$10$X5vtAxWn0INqAeL8ki53TudKh49LwscsIWHRhMKTe8XakHcHR.ncC'),
(7, 'testing2@hotmail.com', 'Testing2', '$2y$10$JcUTqywEYXeyGehDa1nEZuVmTtjURA0/9dZkQ.pajS4YFcmeDmdYm'),
(13, 'tzeqianeng@gmail.com', 'tzeqian`', '$2y$10$B4g4sItXSXvzPMox0G9Vku9tBU3Qw5X9mGYZvdDD4ff.CudlbqgY2');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(10) UNSIGNED NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `rate` int(5) NOT NULL,
  `Comment_Date` date NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `Comment`, `rate`, `Comment_Date`, `userid`) VALUES
(1, 'Huuu', 5, '2019-05-24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `savedplace`
--

CREATE TABLE `savedplace` (
  `placeID` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `placeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savedplace`
--

INSERT INTO `savedplace` (`placeID`, `userid`, `placeName`) VALUES
(1, 2, 'Paris'),
(2, 2, 'Paris'),
(3, 3, 'Paris'),
(4, 3, 'London'),
(5, 13, 'Paris'),
(6, 13, 'Paris'),
(7, 13, 'South Island, New Zealand'),
(8, 13, 'Paris'),
(9, 13, 'Phuket'),
(10, 13, 'Paris');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `TripID` int(10) UNSIGNED NOT NULL,
  `Location` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `TripName` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `userid` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`TripID`, `Location`, `startDate`, `endDate`, `TripName`, `Description`, `userid`) VALUES
(14, 'Thailand', '2019-05-30', '2019-05-31', 'Thailand 1 Day Trip', 'Eat, Enjoy.', 1),
(23, 'Malaysia Small Chilli Restaurant, Balmain Road, Li', '2019-06-25', '2019-06-26', 'Hi', 'Testing', 2),
(24, 'Paris, France', '2019-05-22', '2019-05-24', 'Disneyland Short Tour', 'Meet Minnie And Mickey', 3),
(29, 'London', '2019-12-20', '2019-12-25', 'London visit', 'Watch Premier League', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `FK_tripid` (`TripID`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`checklistID`),
  ADD KEY `tripID` (`tripID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `FK_useridREVIEW` (`userid`);

--
-- Indexes for table `savedplace`
--
ALTER TABLE `savedplace`
  ADD PRIMARY KEY (`placeID`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`TripID`),
  ADD KEY `FK_userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `checklistID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savedplace`
--
ALTER TABLE `savedplace`
  MODIFY `placeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `TripID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `FK_tripid` FOREIGN KEY (`TripID`) REFERENCES `trips` (`TripID`) ON DELETE CASCADE;

--
-- Constraints for table `checklist`
--
ALTER TABLE `checklist`
  ADD CONSTRAINT `checklist_ibfk_3` FOREIGN KEY (`tripID`) REFERENCES `trips` (`TripID`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_useridREVIEW` FOREIGN KEY (`userid`) REFERENCES `members` (`userid`);

--
-- Constraints for table `savedplace`
--
ALTER TABLE `savedplace`
  ADD CONSTRAINT `savedplace_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`userid`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`userid`) REFERENCES `members` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
