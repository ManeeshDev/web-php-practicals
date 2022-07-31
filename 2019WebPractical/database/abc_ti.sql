-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2019 at 07:35 PM
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
-- Database: `abc_ti`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `IndexNo` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Marks` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`IndexNo`, `Subject`, `Marks`) VALUES
('2018L501', 'Software Programming', 67),
('2018L501', 'Graphic Design', 75),
('2018L501', 'Web Design', 83),
('2018L502', 'Software Programming', 55),
('2018L502', 'Graphic Design', 85),
('2018L502', 'Web Design', 65),
('2018L503', 'Software Programming', 72),
('2018L503', 'Graphic Design', 89),
('2018L503', 'Web Design', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `IndexNo` varchar(50) NOT NULL,
  PRIMARY KEY (`IndexNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `Password`, `Name`, `IndexNo`) VALUES
('Fernando', 'IPH@F', 'I.P.H.Fernando', '2018L501'),
('Silva', 'HJM#S', 'H.J.M.Silva', '2018L502'),
('Perera', 'PDU$P', 'P.D.U.Perera', '2018L503');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
