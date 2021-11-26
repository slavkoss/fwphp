-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 05:23 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cdate` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `gender`, `email`, `cdate`, `city`) VALUES
(28, 'fff', 'Male', 'dd@gmail.com', '2017-07-31', 'ddd'),
(29, 'fff', 'Male', 'dd@gmail.com', '2017-07-31', 'ddd'),
(30, 'fff', 'Male', 'dd@gmail.com', '2017-07-31', 'ddd'),
(31, 'fffkkkkkkkk', 'Male', 'dd@gmail.com', '2017-07-31', 'dd2222222d'),
(32, '222', 'Male', '44dd@gmail.com', '2017-07-31', '4444'),
(33, 'eee1', 'Male', 'tt@gmail.com', '2017-07-31', 'eee'),
(42, 'rr', 'Male', 'rr', '2017-09-27', 'rr'),
(43, 'dd', 'Male', 'rr', '2017-09-27', 'dd'),
(44, 'egdf', 'Male', 'rr', '2017-09-27', 'rr'),
(45, '44', 'Male', '44', '2017-09-27', '44');

-- --------------------------------------------------------

--
-- Table structure for table `ordrs`
--

CREATE TABLE `ordrs` (
  `myid` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `ordr` varchar(200) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `sts` varchar(20) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordrs`
--

INSERT INTO `ordrs` (`myid`, `img`, `name`, `mobile`, `email`, `addr`, `ordr`, `pr`, `sts`, `cdate`) VALUES
(21, 'img/2.jpg', 'rr', 'rr', 'rr', 'rrr', 'Learn After Effect at Home ', '$200', 'Pending', '2017-09-30'),
(20, 'img/1.jpg', 'rrr', 'rrr', 'rrr', 'rrr', 'Learn Photoshop at Home ', '$100', 'Pending', '2017-09-30'),
(19, 'img/1.jpg', 'rrr', 'rrr', 'rrr', 'rrr', 'Learn Photoshop at Home ', '$100', 'Pending', '2017-09-30'),
(18, 'img/5.jpg', 'Michal ', '+1 245 2457893', 'naeem@gmail.com', 'near maxico america', 'JavaScript', '$300', 'Pending', '2017-09-30'),
(17, 'img/2.jpg', 'raja', '03331155', 'n@gmail.com', 'New york America', 'CSS', '$200', 'Dispatched', '2017-09-30'),
(16, 'img/1.jpg', 'Raja', '0333', 'nn@gmail.com', 'address here ', 'Learn Photoshop at Home ', '$100', 'Dispatched', '2017-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `des` varchar(150) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `cdate` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `img`, `name`, `des`, `pr`, `cdate`) VALUES
(1, 'img/1.jpg', 'Learn Photoshop at Home ', 'This is best course. In this we teach many outstanding features with step by step tricks. ', '$100', '2017-09-30'),
(2, 'img/2.jpg', 'Learn After Effect at Home ', 'This is best course. In this we teach many outstanding features with step by step tricks. ', '$200', '2017-09-30'),
(3, 'img/3.jpg', 'HTML ', 'You will learn how to create web page and learn coding of it step by step. ', '$100', '2017-09-30'),
(4, 'img/4.jpg', 'Learn Java ', 'Best Programming Language in this world. Complete course with step by step method.', '$100', '2017-09-30'),
(5, 'img/5.jpg', 'JavaScript', 'Client side Programming language. Best Video courses online. Complete Video with online method. ', '$300', '2017-09-30'),
(6, 'img/6.jpg', 'PHP', 'Server side Video training course. Complete Tutorials start from basic to advanced level. Also project with source code added. ', '$400', '2017-09-30'),
(7, 'img/7.jpg', 'Power Point ', 'Learn Power Point Online Training courses. Full Detail training video tutorials. ', '$10', '2017-09-30'),
(8, 'img/8.jpg', 'SEO ', 'Get professional level training with full course in detail. ', '$30', '2017-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(1, 'naeemcp', 'naeemtuts@gmail.com', '$2y$10$J479LW1Mra7dafSB2OdXO.HsHodOtQE0dDETva8SguJtbQjQbZCIG', '2017-07-25 06:28:03'),
(2, 'jj', 'jj@gmail.com', '$2y$10$i4tCrFTXbzp1u1B93TK7/.UkQ55yPqmczqkNIUzCnGKS9JVghDYl6', '2017-09-25 13:14:42'),
(3, 'jjj', 'jjj@gmail.com', '$2y$10$Y6vsCGh7jcJcLZIRRMqqguS5sK2sRf/Dk9v7UX87Ep75MdsZMRs/m', '2017-09-29 06:04:46'),
(4, 'dd', 'dd@gmail.com', '$2y$10$YTV/Fs97QPgm9ELWS1hDLO0viTXoPNLmCmS8NJ5LagVRaYqNhwXPO', '2017-10-05 04:16:03'),
(5, 'aaa', 'aaa@gmail.com', '$2y$10$DYHm3cHYmIzRfS4LstXToedKXyOe9/J1k/ktYWeJ9JZCXbTj6uA9S', '2017-10-05 04:43:47'),
(6, 'aaa4', 'aaa4@gmail.com', '$2y$10$rjmyHZVVperwachE8VZNz.VX5bNgoV2x.MFEUYIrP5dCFt8RfNWaG', '2017-10-05 04:45:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordrs`
--
ALTER TABLE `ordrs`
  ADD PRIMARY KEY (`myid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `ordrs`
--
ALTER TABLE `ordrs`
  MODIFY `myid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
