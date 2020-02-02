--J:\zwamp64\vdrive\web\papl1\socnet\1_DDL_socnet_nixon.sql
-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2016 at 08:41 PM
-- Server version: 5.7.16
-- PHP Version: 7.1.0

/*

DELETE FROM `messages`;
DELETE FROM `profiles`;
DELETE FROM `friends`;
DELETE FROM `members`;

DROP TABLE `messages`;
DROP TABLE `profiles`;
DROP TABLE `friends`;
DROP TABLE `members`;
*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socnet_nixon`
--

-- --------------------------------------------------------

--
-- Table structures
--

CREATE TABLE `friends` (
  `user` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL,
  `friend` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

CREATE TABLE `members` (
  `user` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL,
  `pass` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `auth` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL,
  `recip` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL,
  `pm` char(1) COLLATE utf8_croatian_ci DEFAULT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `message` varchar(4096) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

CREATE TABLE `profiles` (
  `user` varchar(16) COLLATE utf8_croatian_ci DEFAULT NULL,
  `text` varchar(4096) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Indexes for dumped tables
--

ALTER TABLE `friends`
  ADD KEY `user` (`user`(6)),
  ADD KEY `friend` (`friend`(6));

ALTER TABLE `members`
  ADD KEY `user` (`user`(6));

ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth` (`auth`(6)),
  ADD KEY `recip` (`recip`(6));

ALTER TABLE `profiles`
  ADD KEY `user` (`user`(6));

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
