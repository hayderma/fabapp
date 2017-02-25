-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2017 at 07:37 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `dg_id` int(11) NOT NULL,
  `UTAID` varchar(12) NOT NULL,
  `CODE` varchar(10) NOT NULL,
  `created` varchar(20) NOT NULL,
  `q_start` varchar(20) DEFAULT NULL,
  `duration` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `ca_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`q_id`),
  KEY `que_index_device_id` (`dg_id`),
  KEY `que_index_operator` (`UTAID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`q_id`, `dg_id`, `UTAID`, `CODE`, `created`, `q_start`, `duration`, `email`, `phone`, `ca_id`) VALUES
(9, 1, '10000008', 'code', 'string', '07:35 PM', 'string', 'myemail', '8179999999', 1),
(6, 1, '10000004', 'code', 'string', '07:15 PM', 'string', 'myemail', '8179999999', 1),
(7, 1, '10000008', 'code', 'string', '07:15 PM', 'string', 'myemail', '8179999999', 1),
(8, 1, '10000009', 'code', 'string', '07:20 PM', 'string', 'myemail', '8179999999', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
