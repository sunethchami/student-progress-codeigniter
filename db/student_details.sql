-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2021 at 11:17 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_details_tb`
--

DROP TABLE IF EXISTS `student_details_tb`;
CREATE TABLE IF NOT EXISTS `student_details_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `combined_maths` int(3) NOT NULL,
  `physics` int(3) NOT NULL,
  `chemistry` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details_tb`
--

INSERT INTO `student_details_tb` (`id`, `reg_no`, `name`, `combined_maths`, `physics`, `chemistry`) VALUES
(1, 99, 'Julie Flynn', 59, 43, 80),
(2, 22, 'Ariana Alexander', 14, 77, 54),
(3, 47, 'Noble Velez', 90, 19, 18),
(4, 79, 'Maggy Phelps', 74, 46, 66),
(5, 14, 'Bo Levine', 47, 33, 21),
(6, 56, 'Kirestin Soto', 3, 23, 37),
(7, 90, 'Rhona Ingram', 86, 17, 98),
(8, 10, 'Garrett Middleton', 100, 34, 38),
(9, 6, 'Edward Davenport', 82, 56, 10),
(10, 49, 'Mufutau Gould', 92, 82, 59),
(11, 77, 'Damon Camacho', 85, 28, 74);

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

DROP TABLE IF EXISTS `users_tb`;
CREATE TABLE IF NOT EXISTS `users_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`id`, `username`, `password`) VALUES
(1, 'suneth', '$2a$08$Ftye58Q9ZGnvqm1VaoXGLumCuEkVJQzy3OdgqmmtMqvOs0DCHU0.6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
