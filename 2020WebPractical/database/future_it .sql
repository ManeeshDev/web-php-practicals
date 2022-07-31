-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2020 at 06:37 AM
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
-- Database: `future_it`
--
CREATE DATABASE IF NOT EXISTS `future_it` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `future_it`;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `RegNumber` varchar(35) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Course` varchar(50) NOT NULL,
  PRIMARY KEY (`RegNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RegNumber`, `Name`, `Address`, `DOB`, `NIC`, `Mobile`, `Email`, `Course`) VALUES
('0005', 'Navod', 'Galle', '2020-01-07', '0101010V', 101010101, 'cfhcscm@gmail.com', 'ComputerApplicationAssistant'),
('0002', 'Manish', 'Galle', '1998-05-23', '981443225V', 766171525, 'manishprashan@gmail.com', 'WebDevelopment'),
('0003', 'kamal', 'Matale', '2020-01-08', '981443225V', 766171525, 'navodhansajith@gmail.com', 'ComputerApplicationAssistant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
