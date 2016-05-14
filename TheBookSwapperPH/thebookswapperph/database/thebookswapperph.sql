-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 12:17 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thebookswapperph`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int(11) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `bookAuthor` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `genre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookName`, `bookAuthor`, `type`, `genre`) VALUES
(1, ' ', ' ', 0, 0),
(2, 'Harry Potter and the Sorcerers Stone', 'J.K. Rowling', 0, 0),
(3, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 0, 0),
(4, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', 0, 0),
(5, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 0, 0),
(6, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', 0, 0),
(7, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling', 0, 0),
(8, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 0, 0),
(9, 'The Hobbit', 'R.R. Tolkein', 0, 0),
(10, 'The Lord of the Rings: The Fellowship of the Ring', 'R.R. Tolkein', 0, 0),
(11, 'The Lord of the Rings: The Two Towers', 'R.R. Tolkein', 0, 0),
(12, 'The Lord of the Rings: The Return of the King', 'R.R. Tolkein', 0, 0),
(13, 'Game of Thrones: A Game of Thrones', 'G. R.R. Martin', 0, 0),
(14, 'Game of Thrones: A Clash of Kings', 'G. R.R. Martin', 0, 0),
(15, 'Game of Thrones: A Storm of Swords', 'G. R.R. Martin', 0, 0),
(16, 'Game of Thrones: A Feast of Crows', 'G. R.R. Martin', 0, 0),
(17, 'Game of Thrones: A Dance with Dragons', 'G. R.R. Martin', 0, 0),
(18, 'Sherlock Holmes: A Study in Scarlet', 'A.C. Doyle', 0, 0),
(19, 'Sherlock Holmes: The Sign of Four', 'A.C. Doyle', 0, 0),
(20, 'Sherlock Holmes: The Adventures of Sherlock Holmes', 'A.C. Doyle', 0, 0),
(21, 'Sherlock Holmes: The Memoirs of Sherlock Holmes', 'A.C. Doyle', 0, 0),
(22, 'Sherlock Holmes: The Hound of the Baskervilles', 'A.C. Doyle', 0, 0),
(23, 'Sherlock Holmes: The Return of Sherlock Holmes', 'A.C. Doyle', 0, 0),
(24, 'Sherlock Holmes: The Valley of Fear', 'A.C. Doyle', 0, 0),
(25, 'Sherlock Holmes: His Last Bow', 'A.C. Doyle', 0, 0),
(26, 'Sherlock Holmes: The Case-Book of Sherlock Holmes', 'A.C. Doyle', 0, 0),
(27, 'Fifty Shades of Grey', 'E.L. James', 0, 0),
(28, 'Fifty Shades of Darker', 'E.L. James', 0, 0),
(29, 'Fifty Shades of Freed', 'E.L. James', 0, 0);

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
  `availability` tinyint(1) NOT NULL,
  `restriction` tinyint(1) NOT NULL,
  `bookWantID` int(11) NOT NULL,
  `bookCondition` varchar(100) NOT NULL,
  `addedComments` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`libraryID`, `userID`, `bookID`, `availability`, `restriction`, `bookWantID`, `bookCondition`, `addedComments`) VALUES
(34, 3, 5, 1, 0, 16, '', ''),
(35, 3, 9, 0, 0, 1, '', ''),
(37, 12, 16, 1, 0, 1, '', ''),
(52, 17, 17, 1, 0, 1, '', ''),
(53, 19, 1, 1, 0, 1, '', ''),
(54, 19, 6, 0, 0, 1, '', ''),
(57, 19, 7, 1, 0, 20, '', ''),
(60, 20, 3, 1, 0, 1, '', ''),
(69, 12, 10, 1, 0, 1, '', ''),
(74, 21, 19, 1, 0, 18, '', ''),
(75, 21, 4, 1, 0, 1, '', ''),
(76, 21, 11, 1, 0, 24, '', ''),
(88, 22, 8, 1, 0, 20, '', ''),
(93, 23, 28, 1, 0, 11, '', ''),
(101, 23, 13, 1, 0, 1, '', ''),
(105, 23, 22, 1, 0, 1, '', ''),
(109, 24, 12, 1, 0, 1, '', ''),
(113, 24, 23, 1, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `offerID` int(11) NOT NULL,
  `userTradingToID` int(11) NOT NULL,
  `userTradingFromID` int(11) NOT NULL,
  `libraryID` int(11) NOT NULL,
  `bookOfferID` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offerID`, `userTradingToID`, `userTradingFromID`, `libraryID`, `bookOfferID`, `message`, `status`) VALUES
(79, 3, 12, 34, 0, '', 1),
(82, 3, 16, 35, 0, '', 1),
(83, 12, 17, 37, 0, '', 1),
(84, 3, 20, 35, 0, '', 1),
(85, 3, 12, 34, 0, '', 1),
(88, 19, 23, 54, 0, '', 0),
(89, 3, 23, 35, 0, '', 2),
(91, 19, 24, 54, 0, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `tradeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `libraryID` int(11) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `displayName`, `location`, `contactNo`, `email`, `isAdmin`, `notify`) VALUES
(2, 'admin', '$2y$10$qdEwQPRuOB7N0XdIasicWO.Yp.M8JnnlKC7Mx7/FY4CQR7LTielfe', 'admin', '', 0, 'asd', 1, 0),
(3, 't1', '$2y$10$ufccZBKkrZF5BrjMm9TWZ..tOhMGa1rG.4A49xeZuDDbWm4QMexa.', 'tjacob', 'qc', 0, 't1@y.com', 0, 0),
(4, 'asd', '$2y$10$YydCk3aBaAYU3lMjEWA3i.5HxPhmV2eHbCZND9XvG1Arch3tVCnoC', 'zxc', 'qwe', 0, 't2@y.com', 0, 0),
(5, 't3', '$2y$10$ZekQUY0fwUnvctE4FwBhfO5PVVlS552zRIodU3Oln8jklzoQjJz3.', 't3', 'rizal', 0, 't3@y.com', 0, 0),
(6, 't4', '$2y$10$9Ot9WHIYPSgCaKpcgSiOIesYctXCPytcZf1kigm8bRSdN4uM9RoH6', 't4', 'katip', 0, 't4@y.com', 0, 0),
(12, 'pater', '$2y$10$hfes22l81f0CTQ6laCE10.TObXM6iXo5jJ3Mu3IRi0wz2KsnjEVJG', 'pater', 'sorsogon', 2147483647, 'paterdoming22@yahoo.com', 0, 0),
(14, 'a', '$2y$10$uXJoyFo3BbQPGUTo/6cnBeVB4p92CqFv9brKz.58zUh.0dYxT3lZC', 'a', 'asda', 9, 'a@a.c', 0, 0),
(15, 'vince pogi', '$2y$10$mbDfnwDYTSXyMn4zCsCU/Ofbr7NRzuqZ2vKTx.e1GujhoDULzhuFm', 'vince pogi', 'q,', -1, 'a@a.c', 0, 0),
(16, 'lorenzo', '$2y$10$wpfjc09jSl0l/njrPw79eO/Hmql7nPU4fpgi5C7XYrHfAxmoEokRS', 'lorenzo', 'makati', 4321, 'lorenzo@y.com', 0, 0),
(17, 'kiros', '$2y$10$jdYgY0P74Wn8QUUc2DBoiO.Uv/yoJR7fUL5I9mc7uNgXPnj2eSf72', 'kiros', 'dcs', 123, 'yan@y.com', 0, 0),
(18, 'kei101895', '$2y$10$f.frgzYuOpYhTKVFi7nte.TWgRlPcuAC6Hj8CUC/SVgqtprdrrVl.', 'yes', 'solair', 911, 'pokemaniackei@gmail.com', 0, 0),
(19, 'user', '$2y$10$DmYHwcZmWmosRtFe8daDs.IT8kSgRZd0yeYBag.R7LQ3tNeeXw.lG', 'user', 'userland', 79897, 'user', 0, 0),
(20, 'blabla2', '$2y$10$N3NIWyNS7slhs/GBoyKuc.kVwagCuwZAa3QF4/X35kglIWGf06wB.', 'blabla', 'mama mo', 12345, 'sometihng@gmail.com', 0, 0),
(21, 'mbbunag', '$2y$10$LrtPtmZS5CiAVJ1nquiRZeOvZQ3AtEUQI2PZkQExUdibs6PUzG5UO', 'mbbunag', 'Quezon', 2147483647, 'mjbbunag@gmail.com', 0, 0),
(22, 'hlgaza', '$2y$10$wETwqbgOsp6HMy6fvyaSjecTtufIwYt5kThWlaQgJ1BMdHgtpHriC', 'mochi_dash', 'Quezon City', 2147483647, 'haifalapuz@yahoo.com', 0, 0),
(23, 'chrxstel', '$2y$10$xQUfdU9t1xQZIwe8oag4zuq9OWPtCVkZ00NMICJXQHITLRUf5qFze', 'chrxstel', 'QC', 2147483647, 'chrxstelespino@gmail.com', 0, 0),
(24, 'jeyd', '$2y$10$R/6pYGfF1.jHIlug7YLa6uskb4S0uDgmlbbYTs2o2njWvddJxSpQa', 'jeyd', 'qc', 123, 'jeyd@yahoo.com', 0, 0);

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
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `libraryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
