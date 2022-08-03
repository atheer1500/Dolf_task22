-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 10:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
('احلام2', 'Ahlam@Ahlam.com', 'F', 2, '1'),
('عبد المجيد', 'm@gmail.com', 'M', 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminEmail` varchar(35) NOT NULL,
  `Passowrd` varchar(10) NOT NULL,
  `AdminID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminEmail`, `Passowrd`, `AdminID`) VALUES
('admin@admin.com', '123', '1');

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
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25);

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
('Maisaa1', 'Ahmad', 333, 'Ahmad@ahmad.com', 'F'),
('Maisaa1', 'Ahmad', 123, 'atheer1500@gmail.com', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Time` varchar(15) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(500) NOT NULL,
  `AvailableTickets__` int(11) NOT NULL,
  `Pic` text NOT NULL,
  `ActorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Time`, `Date`, `Description`, `AvailableTickets__`, `Pic`, `ActorID`) VALUES
(4, 'Stray Kids', '00:00:02', '2022-07-19', 'Second concert for Stray Kids K-pop Group.', 0, 'images/poster3.jpg', 2),
(21, '2', '12 PM - 2 PM', '2022-08-12', '2', 2, 'images/poster3.jpg', 2),
(22, '1', '12 PM - 2 PM', '2022-08-26', '1', 1, 'images/jujutsu-kaisen-satoru-gojo-glasses-uhdpaper.com-hd-8.1779.jpg', 2),
(23, 'cloud', '12 PM - 2 PM', '2022-08-15', 'c2', 1, 'images/8deca5a42aa28b0c59fe64ee5fb8be71.png', 2),
(24, '1', '12 PM - 2 PM', '2022-08-19', '1', 1, 'images/picture1-1430246e71f0514f307bb9020529f4f1738f39.jpg', 2),
(25, 'حفل عبد المجيد', '6 PM - 8 PM', '2022-08-09', '22', 2, 'images/picture1-1430246e71f0514f307bb9020529f4f1738f39.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `event_manger`
--

CREATE TABLE `event_manger` (
  `Password` varchar(10) NOT NULL,
  `MangerEmail` varchar(35) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `MangerID` int(8) NOT NULL,
  `AdminID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_manger`
--

INSERT INTO `event_manger` (`Password`, `MangerEmail`, `Name`, `MangerID`, `AdminID`) VALUES
('123', 'manger@manger.com', 'Manger', 1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`ActorID`),
  ADD UNIQUE KEY `Name` (`Name`),
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
  MODIFY `ActorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`UserEmail`) REFERENCES `end_user` (`UserEmail`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`) ON DELETE CASCADE;

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
