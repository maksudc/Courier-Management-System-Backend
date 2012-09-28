-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2012 at 07:00 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `courier_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `userid` int(11) NOT NULL,
  UNIQUE KEY `name` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`userid`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `taskid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contactno` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `duedate` varchar(10) NOT NULL,
  `duetime` time NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `comments` varchar(10) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL,
  `reasontype` int(11) DEFAULT NULL,
  `reasondetails` varchar(30) DEFAULT NULL,
  `reportlongitude` double DEFAULT NULL,
  `reportlatitude` double DEFAULT NULL,
  `signaturefile` text,
  PRIMARY KEY (`taskid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskid`, `name`, `address`, `contactno`, `description`, `duedate`, `duetime`, `longitude`, `latitude`, `comments`, `status`, `reasontype`, `reasondetails`, `reportlongitude`, `reportlatitude`, `signaturefile`) VALUES
(1, 'Letter package', 'Indira Road, Farmgate', '01711000000', '3 letters in yellow box', '0000-00-00', '12:30:00', 90.38695, 23.75817, 'Contains l', 1, 1, 'delivered', 90.35525, 23.75762, 'http://test.sentisol.com/cwc/signaturefile/1047.png'),
(2, 'Microscope', '23, Tejgaon Govt. High School, Tejgaon', '01811000000', '1 Microscope packed in white box. Get sign after delivery.', '0000-00-00', '13:15:00', 90.39184, 23.75768, 'Contains g', 1, 1, 'nodetails', 15.3, 12.2, 'N/A'),
(4, 'Document Package', '3rd Floor, Titas Gas Bhaban, Kawranbajar, Dhaka', '01911000000', 'Documents in sealed box', '0000-00-00', '14:18:00', 90.39338, 23.75065, 'N/A', 1, 1, '233dada', 90.39338, 23.75065, 'N/A'),
(15, 'Cloth Delivery', 'Ishaq Plaza, 2nd Florr, Shop: 33, Mirpur', '01555000000', '1 box containing clothings', '0000-00-00', '15:50:00', 73.74948, 33.14871, 'Contains c', 0, NULL, NULL, NULL, NULL, NULL),
(16, 'Confidential Document', 'Police Lines, Mirpur', '01611000000', 'The package contains confidential documents of police officers. Handle with care', '0000-00-00', '09:00:00', 73.75034, 33.15167, 'Contains c', 0, NULL, NULL, NULL, NULL, NULL),
(18, 'Book Delivery', '39/12, Tajmahal Road, 2nd Floor, Mohammadpur, Dhaka.', '01718000000', '3 Story Books from Library', '0000-00-00', '17:00:00', 90.36414, 23.76382, 'Contains B', 0, NULL, NULL, NULL, NULL, NULL),
(20, 'Flower delivery', '112, 8th Floor, Ring Road, Shyamoli, Dhaka.', '01818000000', '2 packets of flowers with a written note', '0000-00-00', '00:00:00', 90.36478, 23.7746, 'Flower gif', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`) VALUES
(1, 'maksud', 'maksud', 'mc65799@gmail.com'),
(2, 'mony', 'mony', 'rudro@yahoo.com'),
(3, 'cwcuser1', '123456', 'cwcuser1@gmail.com'),
(4, 'munna', 'munna', 'munna');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE IF NOT EXISTS `user_task` (
  `userid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`userid`, `taskid`) VALUES
(3, 1),
(3, 2),
(3, 4),
(3, 15),
(3, 16),
(3, 18),
(3, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
