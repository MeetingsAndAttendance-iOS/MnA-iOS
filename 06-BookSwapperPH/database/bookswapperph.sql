-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 07:06 AM
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
  `addedComments` text NOT NULL,
  `availability` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookName`, `restriction`, `bookWant`, `bookAuthor`, `type`, `genre`, `bookCondition`, `addedComments`, `availability`) VALUES
(2, 'hp1', 0, '', 'jk rowling', 1, 1, '', '', 1),
(4, 'hp1', 0, '', 'jk rowling', 1, 2, '', '', 1),
(5, 'hp1', 0, '', 'jk rowling', 1, 2, '', '', 1),
(6, 'hp1', 0, '', 'jk rowling', 1, 2, 'new', ':D', 1),
(8, 'asdasd', 0, 'qwe', 'asd', 1, 1, 'qwe', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genreID` int(11) NOT NULL,
  `genreName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `genreName`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Classic'),
(4, 'Comedy'),
(5, 'Comic/Graphic Novel'),
(6, 'Crime/Detective'),
(7, 'Drama'),
(8, 'Fable'),
(9, 'Fairy Tale'),
(10, 'Fanfiction'),
(11, 'Fantasy'),
(12, 'Folklore'),
(13, 'Horror'),
(14, 'Humour'),
(15, 'Legend'),
(16, 'Magical Realism'),
(17, 'Metafiction'),
(18, 'Mystery'),
(19, 'Romance Novel'),
(20, 'Satire'),
(21, 'Suspense/Thriller'),
(22, 'Tall Tale'),
(23, 'Tragedy'),
(24, 'Tragicomedy'),
(25, 'Western'),
(26, 'Bio/Autobiography'),
(27, 'Essay'),
(28, 'Personal Narrative'),
(29, 'Memoir'),
(30, 'Speech'),
(31, 'Laboratory Report'),
(32, 'Textbook'),
(33, 'Reference Book'),
(34, 'Self-help Book'),
(35, 'Journalism');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `libraryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`libraryID`, `userID`, `bookID`) VALUES
(1, 3, 0),
(3, 1, 1),
(4, 3, 2),
(5, 4, 3),
(6, 5, 4),
(7, 6, 5),
(8, 4, 6),
(12, 1, 7),
(13, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `offerbooks`
--

CREATE TABLE IF NOT EXISTS `offerbooks` (
  `offerBookID` int(11) NOT NULL,
  `offerID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `offerID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `offerName` varchar(100) NOT NULL,
  `tmessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offertrade`
--

CREATE TABLE IF NOT EXISTS `offertrade` (
  `offerTradeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `offerTradeName` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `typeName`) VALUES
(1, 'Fiction'),
(2, 'Non-Fiction');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `displayName`, `location`, `contactNo`, `email`, `isAdmin`, `notify`) VALUES
(1, 'pater', '$2y$10$ZB8KgceBE1ZM8VWVqLuMS.JpDHZsbihQoO8HXP.7yoN14yJH2Pspy', 'pater', '', 0, 'asd', 0, 0),
(2, 'asd', '$2y$10$qdEwQPRuOB7N0XdIasicWO.Yp.M8JnnlKC7Mx7/FY4CQR7LTielfe', 'asd', '', 0, 'asd', 0, 0),
(3, 't1', '$2y$10$ufccZBKkrZF5BrjMm9TWZ..tOhMGa1rG.4A49xeZuDDbWm4QMexa.', 't1', '', 0, 't1@y.com', 0, 0),
(4, 't2', '$2y$10$YydCk3aBaAYU3lMjEWA3i.5HxPhmV2eHbCZND9XvG1Arch3tVCnoC', 't2', '', 0, 't2@y.com', 0, 0),
(5, 't3', '$2y$10$ZekQUY0fwUnvctE4FwBhfO5PVVlS552zRIodU3Oln8jklzoQjJz3.', 't3', '', 0, 't3@y.com', 0, 0),
(6, 't4', '$2y$10$9Ot9WHIYPSgCaKpcgSiOIesYctXCPytcZf1kigm8bRSdN4uM9RoH6', 't4', '', 0, 't4@y.com', 0, 0),
(7, 'lf1', '$2y$10$kHVAkAPb4wcrJwnzAJXHwerT1aqLyfyoFJDmUo6jEwrir.m1MY7u6', 'lf1', '', 0, 'lf1@y.com', 0, 0),
(8, 'lf2', '$2y$10$.mu3UgQBGyeZMcRUkZzauOi.3J9mErLB4ROq0ftHZnF/RR2F4azpS', 'lf2', '', 0, 'lf2@y.com', 0, 0),
(9, 'lf3', '$2y$10$XSk/NG0OmtW8wOY.bLmB7evtEIBFtnN8ywC.Q97vmADQ4Q4nBgvF6', 'lf3', '', 0, 'lf3@y.com', 0, 0),
(10, 'lf4', '$2y$10$RYty3UzbZAPahtAOm6bWtOOpTHGFH5SigJ4ilixnqSp2YhMNC4rpi', 'lf4', '', 0, 'lf4@y.com', 0, 0);

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
-- Indexes for table `offerbooks`
--
ALTER TABLE `offerbooks`
  ADD PRIMARY KEY (`offerBookID`);

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
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `libraryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `offerbooks`
--
ALTER TABLE `offerbooks`
  MODIFY `offerBookID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offertrade`
--
ALTER TABLE `offertrade`
  MODIFY `offerTradeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `tradeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
