-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2020 at 03:35 PM
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
-- Database: `flora_ordering`
--
CREATE DATABASE IF NOT EXISTS `flora_ordering` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `flora_ordering`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(255) NOT NULL AUTO_INCREMENT,
  `NIC_No` varchar(10) NOT NULL,
  `ProductCategory` varchar(100) NOT NULL,
  `PriceRange` varchar(50) NOT NULL,
  `DeliveryDate` varchar(20) NOT NULL,
  `DeliveryOption` varchar(50) NOT NULL,
  `Recipient` varchar(50) NOT NULL,
  `Address` varchar(500) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `NIC_No` (`NIC_No`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `NIC_No`, `ProductCategory`, `PriceRange`, `DeliveryDate`, `DeliveryOption`, `Recipient`, `Address`) VALUES
(11, '981443225V', 'Congratulation-Flowers', 'Above-Rs.5000', '01-19-2020', 'Delivery-To-Address', 'Nayani', '165/A,Wanduramba,Galle.'),
(12, '981553225V', 'Flowers', 'Rs.2000-Rs.5000', '02-19-2020', 'PickUp-From-Florist', 'Kamani', '25/A,Thalawa,Wanduramba,Galle.'),
(13, '983654739V', 'Anniversary-Flowers', 'Rs.2000-Rs.5000', '01-23-2020', 'Delivery-To-Address', 'Ridmi', '55/B,Makuluwa,Galle.'),
(14, '953654749V', 'Birthday-Flowers', 'Below-Rs.2000', '01-25-2020', 'PickUp-From-Florist', 'Malsha', '55/B,Elpitiya,Galle.'),
(15, '993654389V', 'Symoathy-Flowers', 'Above-Rs.5000', '01-29-2020', 'Delivery-To-Address', 'Nayani', '10/B1/New York City/Usa.'),
(16, '893651189V', 'Congratulation-Flowers', 'Above-Rs.5000', '04-19-2020', 'PickUp-From-Florist', 'Namidu', 'Landon,United Kingdom.'),
(17, '793644789V', 'Anniversary-Flowers', 'Above-Rs.5000', '03-19-2020', 'Delivery-To-Address', 'Chamathka', '22/C,Mumbai,India.');

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

DROP TABLE IF EXISTS `sender`;
CREATE TABLE IF NOT EXISTS `sender` (
  `NIC_No` varchar(10) NOT NULL,
  `Sender_Name` varchar(200) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Telephone_No` int(10) NOT NULL,
  `Street_Address` varchar(500) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(30) NOT NULL,
  PRIMARY KEY (`NIC_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`NIC_No`, `Sender_Name`, `Company`, `Telephone_No`, `Street_Address`, `City`, `Country`) VALUES
('793644789V', 'Ashwaryarai', 'Saloon', 1366171544, 'Mumbai,India.', 'Mumbai', 'India'),
('893651189V', 'Ema', 'Ema Choco', 1122171335, 'London', 'London', 'UK'),
('953654749V', 'Madushani', 'Madushani Sweets', 756177825, 'Elpitiya,Galle.', 'Elpitiya', 'SriLanka'),
('981443225V', 'Maneesh', 'Mpdesign', 766171525, 'Wanduramba,Galle.', 'Wanduramba', 'SriLanka'),
('981553225V', 'Navod', 'DragonTech', 766171545, 'Thalawa,Wanduramba,Galle.', 'Wanduramba', 'SriLanka'),
('983654739V', 'Oshani', 'Osh Watalappan', 716171345, 'Makuluwa,Galle.', 'Galle', 'SriLanka'),
('993654389V', 'John ', 'Johnny wik', 1166171525, 'New York City,', 'New York City', 'USA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `nic_no_fk` FOREIGN KEY (`NIC_No`) REFERENCES `sender` (`NIC_No`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
