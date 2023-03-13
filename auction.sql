-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 06:49 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `auctionid` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `startprice` float(10,2) NOT NULL,
  `username` varchar(200) NOT NULL,
  `propertyid` int(11) NOT NULL,
  `soldstatus` varchar(200) NOT NULL,
  PRIMARY KEY (`auctionid`),
  KEY `username` (`username`),
  KEY `propertyid` (`propertyid`)
) ENGINE=InnoDB AUTO_INCREMENT=941122 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionid`, `startdate`, `enddate`, `startprice`, `username`, `propertyid`, `soldstatus`) VALUES
(124570, '2019-11-22', '2020-01-31', 100000.00, 'admin', 21102, 'Unsold'),
(941121, '2019-11-25', '2020-02-28', 200000.00, 'admin', 21102, 'Unsold');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `bidid` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float(10,2) NOT NULL,
  `auctionid` int(11) NOT NULL,
  `bidderid` int(11) NOT NULL,
  PRIMARY KEY (`bidid`),
  KEY `auctionid` (`auctionid`),
  KEY `bidderid` (`bidderid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bidid`, `amount`, `auctionid`, `bidderid`) VALUES
(1, 125000.00, 124570, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bidder`
--

DROP TABLE IF EXISTS `bidder`;
CREATE TABLE IF NOT EXISTS `bidder` (
  `bidderid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` char(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`bidderid`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`bidderid`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `address`) VALUES
(3, 'Adjei', 'Amarh', 'amarh@gmail.com', '0124578963', 'MTIzNDU2Nzg5', 'Tema 22 Annex'),
(4, 'Ash', 'Ash', 'kingashysnr@gmail.com', '1234567890', 'MTIzNDU2Nzg5', '0123456789'),
(111, 'Nii', 'Ashitey', 'ashitey@gmail.com', '0203479793', 'YXNkZnF3ZXI=', 'Tema 22 Annex'),
(112, 'Naa', 'Mensa', 'naa@gmail.com', '0102145845', 'MTIzNDU2Nzg=', 'Tema 22 Annex');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `ownerid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` char(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`ownerid`),
  KEY `ownerid` (`ownerid`)
) ENGINE=InnoDB AUTO_INCREMENT=11203 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownerid`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `address`) VALUES
(11201, 'Ashitey', 'Onukpa', 'kingashyjnr@gmail.com', '0203479793', 'c2FmbzA3NDc=', 'Tema 22 Annex'),
(11202, 'Naa Adjeley', 'Mansa', 'kingashysnr@gmail.com', '0203497979', 'MTIzNDU2Nzg5', 'Tema Comm 1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentid` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float(10,2) NOT NULL,
  `propertyid` int(11) NOT NULL,
  PRIMARY KEY (`paymentid`),
  KEY `propertyid` (`propertyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `propertyid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `documents` blob NOT NULL,
  `documentsname` varchar(200) NOT NULL,
  `image1` blob NOT NULL,
  `image1name` varchar(200) NOT NULL,
  `image2` blob NOT NULL,
  `image2name` varchar(200) NOT NULL,
  `buildingstatus` varchar(200) NOT NULL,
  `dateuploaded` date NOT NULL,
  `verification` varchar(200) NOT NULL,
  `ownerid` int(11) NOT NULL,
  PRIMARY KEY (`propertyid`),
  KEY `ownerid` (`ownerid`)
) ENGINE=InnoDB AUTO_INCREMENT=21105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyid`, `description`, `location`, `documents`, `documentsname`, `image1`, `image1name`, `image2`, `image2name`, `buildingstatus`, `dateuploaded`, `verification`, `ownerid`) VALUES
(21102, '2 Bedroom with Boys quatres', 'Accra North', 0x7363616e2e706466, 'scan.pdf', 0x37323530383036322e6a7067, '72508062.jpg', 0x352e6a7067, '5.jpg', 'Renovated', '2019-11-22', 'Verified', 11201),
(21103, '6 Bedroom Apartment, 2 Boys quaters', 'Kasoa', 0x646f6e652e706466, 'done.pdf', 0x686f7573652e6a7067, 'house.jpg', 0x686f7573652e6a7067, 'house.jpg', 'Old', '2019-11-23', 'Verified', 11201),
(21104, '6 bedroom', 'Accra', 0x424553534d4f4e5320666c79657220696e666f2e646f6378, 'BESSMONS flyer info.docx', 0x6b69746368656e2e6a7067, 'kitchen.jpg', 0x6b69746368656e2e6a7067, 'kitchen.jpg', 'New', '2019-11-23', 'Pending', 11202);

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

DROP TABLE IF EXISTS `saved`;
CREATE TABLE IF NOT EXISTS `saved` (
  `saveid` int(11) NOT NULL AUTO_INCREMENT,
  `bidderid` int(11) NOT NULL,
  `auctionid` int(11) NOT NULL,
  PRIMARY KEY (`saveid`),
  KEY `bidderid` (`bidderid`),
  KEY `auctionid` (`auctionid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`saveid`, `bidderid`, `auctionid`) VALUES
(4, 4, 124570);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(200) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `job` varchar(200) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(20) DEFAULT NULL,
  `password_reset_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `job`, `login_session_key`, `email_status`, `password_reset_key`) VALUES
('admin', 'YWRtaW4xMjM0', 'Administrator', NULL, NULL, NULL),
('lands', 'bGFuZHMxMjM0', 'lands commission', NULL, NULL, NULL),
('receptionist', 'cmVjZXB0aW9uaXN0', 'Receptionist', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`propertyid`) REFERENCES `property` (`propertyid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`auctionid`) REFERENCES `auction` (`auctionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`bidderid`) REFERENCES `bidder` (`bidderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`propertyid`) REFERENCES `property` (`propertyid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `owner` (`ownerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `saved_ibfk_1` FOREIGN KEY (`bidderid`) REFERENCES `bidder` (`bidderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_ibfk_2` FOREIGN KEY (`auctionid`) REFERENCES `auction` (`auctionid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
