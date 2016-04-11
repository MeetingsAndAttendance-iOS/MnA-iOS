-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 06:56 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookName`, `restriction`, `bookWant`, `bookAuthor`, `type`, `genre`, `bookCondition`, `addedComments`) VALUES
(8, 'HP1', 0, 'HP2', '', 0, 0, '', ''),
(9, 'Hunger Games 1', 0, 'Anything', '', 0, 0, '', ''),
(10, 'Hunger Games', 0, '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genreID` int(11) NOT NULL,
  `genreName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `libraryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`libraryID`, `userID`, `bookID`) VALUES
(8, 1, 8),
(9, 2, 9),
(10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `offerID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `offerName` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `typeID` int(11) NOT NULL,
  `typeNam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `displayName`, `location`, `contactNo`, `email`, `isAdmin`, `notify`) VALUES
(1, 'pater', '$2y$10$ZB8KgceBE1ZM8VWVqLuMS.JpDHZsbihQoO8HXP.7yoN14yJH2Pspy', 'pater', '', 0, 'asd', 0, 0),
(2, 'asd', '$2y$10$qdEwQPRuOB7N0XdIasicWO.Yp.M8JnnlKC7Mx7/FY4CQR7LTielfe', 'asd', '', 0, 'asd', 0, 0);

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
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `libraryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
