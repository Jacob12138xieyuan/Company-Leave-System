-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 14, 2020 at 01:00 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE IF NOT EXISTS `holidays` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_name` varchar(30) NOT NULL,
  `holiday_date` date NOT NULL,
  `day` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`holiday_id`, `holiday_name`, `holiday_date`, `day`) VALUES
(2, 'Labour Day', '2020-05-01', 'Friday'),
(3, 'New Year\'s Day', '2020-01-01', 'Wednesday'),
(4, 'Good Friday', '2020-04-10', 'Friday'),
(5, 'Vesak Day', '2020-05-07', 'Thursday'),
(6, 'Hari Raya Puasa', '2020-05-24', 'Sunday'),
(7, 'Company Bonding', '2020-09-17', 'Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `note` text,
  `half_begin` tinyint(1) DEFAULT '0',
  `half_end` tinyint(1) DEFAULT '0',
  `days` float DEFAULT NULL,
  `status` varchar(255) DEFAULT 'created',
  `admin_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`leave_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `id`, `username`, `start_date`, `end_date`, `note`, `half_begin`, `half_end`, `days`, `status`, `admin_active`) VALUES
(75, 7, 'user', '2020-09-14', '2020-09-19', '', 0, 0, 5, 'created', 1),
(79, 8, 'user2', '2020-06-01', '2020-06-08', '', 1, 1, 5, 'created', 1),
(78, 7, 'user', '2020-05-01', '2020-05-10', '', 0, 0, 4, 'cancelled', 0),
(77, 7, 'user', '2020-05-01', '2020-05-10', '', 0, 0, 4, 'approved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT 'normal',
  `left_days` float DEFAULT '15',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `left_days`) VALUES
(6, 'admin', 'xiey0017@ntu.edu.sg', '202cb962ac59075b964b07152d234b70', 'admin', 15),
(7, 'user', 'xiey0017@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 6),
(8, 'user2', 'xiey@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
