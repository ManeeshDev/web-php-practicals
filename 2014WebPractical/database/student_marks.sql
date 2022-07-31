-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2020 at 03:45 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_marks`
--
CREATE DATABASE IF NOT EXISTS `student_marks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student_marks`;

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `MarksID` int(255) NOT NULL AUTO_INCREMENT,
  `IndexNo` varchar(20) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Marks` int(3) NOT NULL,
  PRIMARY KEY (`MarksID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`MarksID`, `IndexNo`, `Subject`, `Marks`) VALUES
(1, 'NVQ-L5-25', 'Database System II', 80),
(2, 'NVQ-L5-23', 'Database System II', 67),
(3, 'NVQ-L5-23', 'Software Programming', 70),
(4, 'NVQ-L5-23', 'Networking', 75),
(5, 'NVQ-L5-23', 'Web Development', 83),
(6, 'NVQ-L5-23', 'Database System I', 66),
(7, 'NVQ-L5-22', 'Software Programming ', 90);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `IndexNo` varchar(20) NOT NULL,
  PRIMARY KEY (`IndexNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`UserName`, `Password`, `Name`, `IndexNo`) VALUES
('Saman', 'Sam321', 'SamanPerera', 'NVQ-L5-23'),
('Ajith', 'AJ123', 'AjithLiyanage', 'NVQ-L5-17'),
('Nilam', 'NIL474', 'NimalDias', 'NVQ-L5-25'),
('Manish', 'mp123', 'Manish Prashan', 'NVQ-L5-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
