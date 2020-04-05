-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2017 at 05:33 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uy_signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `bio`, `facebook`, `linkedin`, `address`) VALUES
(1, 'shakil khan', 'shakilkhan@gmail.com', '123456789', 'shakil.jpg', '', '', '', ''),
(2, 'rahul', 'rahul@gmail.com', '$2y$10$Z/9/8n2wbbejv5mHKCr97OTbdJToEP3/YhGfUA4TPyvRVWpMZR34K', '', '', '', '', ''),
(3, 'sohail', 'sohail@gmail.com', '$2y$10$SH6dH0h1t8P.gg7ceUIbuu.0w6O0DfJ.9LxsYlBC6eERDHb46py/y', '', '', '', '', ''),
(4, 'zashan', 'zeshan@gmail.com', '$2y$10$V9XbdzV/gMpKpSv.XjRHCuz.8GlAwniPKiTWHMLF1XlTvGWvAisGW', '', '', '', '', ''),
(5, 'jamal', 'jamal@gmail.com', '$2y$10$7UBm2wrPHs3fQwp8MVZCGezcflZ9OjdEJ.ubNC7EpB89wLSTAnQzy', '', '', '', '', ''),
(6, 'asad', 'asad@yahoo.com', '$2y$10$WdfDhGBqt9Zcq0pwtsGHJOlGt1ZxAHPqjybKZL9hhpicQSUE5uyvm', '', '', '', '', ''),
(7, 'wali', 'wali@yahoo.com', '$2y$10$4mSNqYSpRRn02xusx.vO7u7rd2TkpM3m/jG5dRebpc7.GYW53DZta', '', '', '', '', ''),
(8, 'sohrab', 'sohrab@gmail.com', '$2y$10$QNMBeYKD5FZ3eEJ9M64/.eeYgAfuMZHwkFza/zRzm5H3PJ5wV.Lai', '', '', '', '', ''),
(9, 'zohaib', 'zohaib@gmail.com', '$2y$10$IADxsf5j9MnNoALnhZXLO.Dy7/bMCI18lea4wGL2HWo7Gq1PbWMVK', '', '', '', '', ''),
(10, 'sadiq', 'sadiq@gmail.com', '$2y$10$bApir3Wt7ptrOw.eyDRnr.dR2Fb7AFpW53DqnH/LSyKpq1NKzhuk2', '', '', '', '', ''),
(11, 'alex', 'alex@gmail.com', '$2y$10$l8ZS2YSDFT908PeYbBQe.e602gVIqmw4bZCBsHkFUKIf/wLeDbkN.', '', '', '', '', ''),
(12, 'shakil', 'shakilkhan621@gmail.com', '$2y$10$MBkw.4MElhTA.MVQfvxIAOLGGpr0aYQFgMbt0wks1D/LZQE0lsQLy', '', '', '', '', ''),
(13, 'alex', 'javed@gmail.com', '$2y$10$7rydbnb83dy1L4GGtdS./eyH7iIx2fjTbvunRlz3Ufy.apImXVNti', 'Profile2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'https://www.facebook.com/shakilkhan621', 'http://www.linkedin.com/shakil621', 'United Kingdom House, Winsley Street, London, United Kingdom'),
(14, 'kumar', 'kumar@gmail.com', '$2y$10$wmVHnDEUfQ3IOyzIhvWBOO0C2IVDhQEXJ3CgClbNxrLrnw4b5Lkd2', 'pro8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'https://www.facebook.com/kumar', 'https://www.linkedin.com/kumar', 'Delhi, India'),
(15, 'shakil', 'shakilkhanblogger@gmail.com', '$2y$10$OD7CVfR3aLCD6MvDudgsVu6jstuzmCWv/wXud6OEIWuwF6BNy29UG', 'pro1.jpg', 'great teacher', 'https://www.facebook.com/wali', 'https://www.linkedin.com/wali', 'Karachi, Sindh, Pakistan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
