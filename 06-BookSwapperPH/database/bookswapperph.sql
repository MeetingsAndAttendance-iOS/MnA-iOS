-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 09:46 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookswapperph`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int(11) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `restriction` tinyint(1) NOT NULL DEFAULT '0',
  `bookWant` varchar(100) NOT NULL,
  `bookAuthor` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `bookCondition` varchar(100) NOT NULL,
  `addedComments` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genreID` int(11) NOT NULL,
  `genreName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `genreName`) VALUES
(1, ' '),
(2, 'Action'),
(3, 'Adventure'),
(4, 'Classic'),
(5, 'Comedy'),
(6, 'Comic/Graphic Novel'),
(7, 'Crime/Detective'),
(8, 'Drama'),
(9, 'Fable'),
(10, 'Fairy Tale'),
(11, 'Fanfiction'),
(12, 'Fantasy'),
(13, 'Folklore'),
(14, 'Horror'),
(15, 'Humour'),
(16, 'Legend'),
(17, 'Magical Realism'),
(18, 'Metafiction'),
(19, 'Mystery'),
(20, 'Romance Novel'),
(21, 'Satire'),
(22, 'Suspense/Thriller'),
(23, 'Tall Tale'),
(24, 'Tragedy'),
(25, 'Tragicomedy'),
(26, 'Western'),
(27, 'Bio/Autobiography'),
(28, 'Essay'),
(29, 'Personal Narrative'),
(30, 'Memoir'),
(31, 'Speech'),
(32, 'Laboratory Report'),
(33, 'Textbook'),
(34, 'Reference Book'),
(35, 'Self-help Book'),
(36, 'Journalism');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `libraryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `offerID` int(11) NOT NULL,
  `offerTradeID` int(11) NOT NULL,
  `userTradingToID` int(11) NOT NULL,
  `userTradingFromID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `offerName` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offertrade`
--

CREATE TABLE IF NOT EXISTS `offertrade` (
  `offerTradeID` int(11) NOT NULL,
  `offerID` int(11) NOT NULL,
  `userTradingFromID` int(11) NOT NULL,
  `userTradingToID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `offerTradeName` varchar(100) NOT NULL,
  `tmessage` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `tradeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `typeName`) VALUES
(1, ' '),
(2, 'Fiction'),
(3, 'Non-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `displayName` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `contactNo` int(11) NOT NULL,
  `email` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `notify` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `displayName`, `location`, `contactNo`, `email`, `isAdmin`, `notify`) VALUES
(2, 'admin', '$2y$10$qdEwQPRuOB7N0XdIasicWO.Yp.M8JnnlKC7Mx7/FY4CQR7LTielfe', 'admin', '', 0, 'asd', 1, 0),
(3, 't1', '$2y$10$ufccZBKkrZF5BrjMm9TWZ..tOhMGa1rG.4A49xeZuDDbWm4QMexa.', 'tjacob', 'qc', 0, 't1@y.com', 0, 0),
(4, 't2', '$2y$10$YydCk3aBaAYU3lMjEWA3i.5HxPhmV2eHbCZND9XvG1Arch3tVCnoC', 't2', 'makati', 0, 't2@y.com', 0, 0),
(5, 't3', '$2y$10$ZekQUY0fwUnvctE4FwBhfO5PVVlS552zRIodU3Oln8jklzoQjJz3.', 't3', 'rizal', 0, 't3@y.com', 0, 0),
(6, 't4', '$2y$10$9Ot9WHIYPSgCaKpcgSiOIesYctXCPytcZf1kigm8bRSdN4uM9RoH6', 't4', 'katip', 0, 't4@y.com', 0, 0),
(7, 'lf1', '$2y$10$kHVAkAPb4wcrJwnzAJXHwerT1aqLyfyoFJDmUo6jEwrir.m1MY7u6', 'lf1', 'qc', 0, 'lf1@y.com', 0, 0),
(8, 'lf2', '$2y$10$.mu3UgQBGyeZMcRUkZzauOi.3J9mErLB4ROq0ftHZnF/RR2F4azpS', 'lf2', 'katip', 0, 'lf2@y.com', 0, 0),
(9, 'lf3', '$2y$10$XSk/NG0OmtW8wOY.bLmB7evtEIBFtnN8ywC.Q97vmADQ4Q4nBgvF6', 'lf3', 'makati', 0, 'lf3@y.com', 0, 0),
(10, 'lf4', '$2y$10$RYty3UzbZAPahtAOm6bWtOOpTHGFH5SigJ4ilixnqSp2YhMNC4rpi', 'lf4', 'qc', 0, 'lf4@y.com', 0, 0),
(11, 'wew', '$2y$10$pTCExmZPhORIC3TFGfuK2Oo/iVSpVmY72WIybf.HiPzYe9Ar6fM4W', 'wew', 'wew', 214, 'wew', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`libraryID`),
  ADD UNIQUE KEY `bookID` (`bookID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offerID`);

--
-- Indexes for table `offertrade`
--
ALTER TABLE `offertrade`
  ADD PRIMARY KEY (`offerTradeID`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`tradeID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `libraryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `offertrade`
--
ALTER TABLE `offertrade`
  MODIFY `offerTradeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `tradeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
