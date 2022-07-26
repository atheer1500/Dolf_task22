-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 10:19 AM
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `Title` varchar(10) NOT NULL,
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
(4, 't', '00:00:02', '2022-07-19', 't', 1, '7e579b53f4e596e8fcd1db4f5d2cd31e.png', 2),
(5, 'super juni', '12:15:56', '2022-07-13', 'musicconcertmusicconcertmusicmusicconcertmusic\r\nconcertmusicmusicconcertmusicconcertmus\r\nicmusicconcertmusicconcertmusicmusicconcer\r\ntmusicconcer', 5, 'images\\ab.JPG', 2),
(6, 'tst', '00:00:12', '2022-07-28', 'musicconcertmusicconcertmusicmusicconcertmusic\r\nconcertmusicmusicconcertmusicconcertmus\r\nicmusicconcertmusicconcertmusicmusicconcer\r\ntmusicconcertmusicmusicconcertmusicconcertm\r\nusicmusicconcertmusicconcertmusicmusicconc\r\nertmusicconcertmusicmusicconcertmusicconcertmus\r\nicmusicconcertmusicconcertmusicmusicconce\r\nrtmusicconcertmusicmusicconcertmusicconce\r\nrtmusicmusicconcertmusicconcertmusicmusic\r\nconcertmusicconcertmusicmusicconcertmusic\r\nconcertmusicmusicconcertmusicconcertmusic', 1, '81-814762_ayumi-via-discovered-by-on-we-cute-ghost.png', 1),
(7, 'wowwowowow', '10-12 PM', '2022-08-04', 'wowwwww wowwwowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww wowwwww www ', 5, 'images/img.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `ActorID` (`ActorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`ActorID`) REFERENCES `actor` (`ActorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
