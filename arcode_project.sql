-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2015 at 12:10 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arcode_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ar_filepath`
--

CREATE TABLE `ar_filepath` (
`ID` int(11) NOT NULL,
  `Upload_Date` date NOT NULL,
  `Upload_User` text,
  `File_Name` text NOT NULL,
  `Random_Code` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ar_filepath`
--

INSERT INTO `ar_filepath` (`ID`, `Upload_Date`, `Upload_User`, `File_Name`, `Random_Code`) VALUES
(1, '2015-04-18', '', '/_11_14_25_2015-04-18_data.pak', 'n4@U,^sZRG%7CPqV'),
(2, '2015-04-18', '', '/_2015-04-18_11_17_40_data.pak', '#sD4G$bRvS?j6*%3'),
(3, '2015-04-18', '', '/_2015-04-18_111827_data.pak', 'bGOrmlf5vL.gkND!'),
(4, '2015-04-18', '', '_2015-04-18_120939_data.pak', 'Uyp5UjYkRDRtV25VdCNrdw==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ar_filepath`
--
ALTER TABLE `ar_filepath`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ar_filepath`
--
ALTER TABLE `ar_filepath`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
