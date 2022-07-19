-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 10:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `Name` varchar(10) NOT NULL,
  `ActorEmail` varchar(35) NOT NULL,
  `Gender` char(1) NOT NULL,
  `ActorID` int(11) NOT NULL,
  `AdminID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`Name`, `ActorEmail`, `Gender`, `ActorID`, `AdminID`) VALUES
('عبد المجيد', 'abdulmajid@hotmail.com', 'M', 1, '1'),
('احلام', 'Ahlam@Ahlam.com', 'F', 2, '1'),
('زينة', 'zaina@zaina.com', 'F', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminEmail` varchar(35) NOT NULL,
  `Passowrd` int(11) NOT NULL,
  `AdminID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminEmail`, `Passowrd`, `AdminID`) VALUES
('admin@admin.com', 1234, '1');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `PaymentMethod` varchar(15) NOT NULL,
  `NumberOfTickets__` int(11) NOT NULL,
  `UserEmail` varchar(35) NOT NULL,
  `EventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`PaymentMethod`, `NumberOfTickets__`, `UserEmail`, `EventID`) VALUES
('cach', 3, 'Ahmad@ahmad.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `edit_event`
--

CREATE TABLE `edit_event` (
  `MangerID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `edit_event`
--

INSERT INTO `edit_event` (`MangerID`, `EventID`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `end_user`
--

CREATE TABLE `end_user` (
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Password` int(11) NOT NULL,
  `UserEmail` varchar(35) NOT NULL,
  `Gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `end_user`
--

INSERT INTO `end_user` (`FirstName`, `LastName`, `Password`, `UserEmail`, `Gender`) VALUES
('Ali', 'Mohammad', 333, 'Ahmad@ahmad.com', 'M'),
('Maisaa', 'Ahmad', 123, 'Maisaa@hotmail.com', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(100) NOT NULL,
  `AvailableTickets__` int(11) NOT NULL,
  `Pic` text NOT NULL,
  `ActorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Time`, `Date`, `Description`, `AvailableTickets__`, `Pic`, `ActorID`) VALUES
(4, 't', '00:00:02', '2022-07-19', 't', 1, '7e579b53f4e596e8fcd1db4f5d2cd31e.png', 2),
(5, 'super junior', '00:00:08', '2022-07-13', 'music concert', 5, '162-1626751_png-pastel-bling-cute-yellow-star-90rainy-bling.png', 2),
(6, 'tst', '00:00:12', '2022-07-28', 'tst', 1, '81-814762_ayumi-via-discovered-by-on-we-cute-ghost.png', 1),
(7, '11', '00:00:04', '2022-08-04', '11', 1, '06acb336d4b5b6a434d0d0a841359ddd.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_manger`
--

CREATE TABLE `event_manger` (
  `Password` int(11) NOT NULL,
  `MangerEmail` varchar(35) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `MangerID` int(8) NOT NULL,
  `AdminID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_manger`
--

INSERT INTO `event_manger` (`Password`, `MangerEmail`, `Name`, `MangerID`, `AdminID`) VALUES
(123, 'manger@manger.com', 'Manger', 1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`ActorID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`UserEmail`,`EventID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `edit_event`
--
ALTER TABLE `edit_event`
  ADD PRIMARY KEY (`MangerID`,`EventID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `end_user`
--
ALTER TABLE `end_user`
  ADD PRIMARY KEY (`UserEmail`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `ActorID` (`ActorID`);

--
-- Indexes for table `event_manger`
--
ALTER TABLE `event_manger`
  ADD PRIMARY KEY (`MangerID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `ActorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_manger`
--
ALTER TABLE `event_manger`
  MODIFY `MangerID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`UserEmail`) REFERENCES `end_user` (`UserEmail`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`);

--
-- Constraints for table `edit_event`
--
ALTER TABLE `edit_event`
  ADD CONSTRAINT `edit_event_ibfk_1` FOREIGN KEY (`MangerID`) REFERENCES `event_manger` (`MangerID`),
  ADD CONSTRAINT `edit_event_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`ActorID`) REFERENCES `actor` (`ActorID`);

--
-- Constraints for table `event_manger`
--
ALTER TABLE `event_manger`
  ADD CONSTRAINT `event_manger_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
