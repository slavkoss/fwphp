-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2018 at 07:46 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photograph_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_croatian_ci NOT NULL,
  `body` text COLLATE utf8mb4_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photograph_id` (`photograph_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photograph_id`, `created`, `author`, `body`) VALUES
(1, 1, '2009-01-01 11:30:39', 'Kevin', 'Great picture!'),
(5, 5, '2009-01-01 20:46:39', 'Doug', 'Clever.'),
(6, 5, '2009-01-01 21:08:58', 'Mary', 'I like it too.');

-- --------------------------------------------------------

--
-- Table structure for table `photographs`
--

DROP TABLE IF EXISTS `photographs`;
CREATE TABLE IF NOT EXISTS `photographs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_croatian_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_croatian_ci NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `photographs`
--

INSERT INTO `photographs` (`id`, `filename`, `type`, `size`, `caption`) VALUES
(1, 'header.jpg', 'image/jpeg', 10621, 'Beautifull knowlege Mountains opposed, <br />confronted to dirty ignorance'),
(5, 'mvc_M_V.jpg', 'image/jpeg', 8951, 'Data flow is Model -> View'),
(4, 'mvc.jpg', 'image/jpeg', 12817, 'Data flow is Model -> Controller -> View'),
(6, 'mvc_Laravel.jpg', 'image/jpeg', 17896, 'mvc_Laravel.jpg'),
(7, 'mvc_Laravel2.jpg', 'image/jpeg', 15531, 'Data flow is Model -> Controller -> View'),
(8, '02_relational_data_method_model.jpg', 'image/jpeg', 14262, 'ORM class does CRUD of table rows'),
(9, '05_n_tier_phisical_servers_like_MVCcode.jpg', 'image/jpeg', 13294, 'n tier phisical servers are simmilar to MVC code');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_croatian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_croatian_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_croatian_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'admin', 'demo', 'admin', 'demo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
