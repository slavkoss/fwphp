-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 07:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleanblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `mypassword`, `created_at`) VALUES
(1, 'admin1@admin.com', 'admin1@admin.com', '$2y$10$NlbuHlbGxVFbvWxi4vUKh.fkMKbsiKDeY3cBilvy24AHqoq2TQhFC', '2022-09-13 15:47:52'),
(2, 'admin2@yahoo.com', 'admin2', '$2y$10$y7x6xMVQcl03LWt6cgXOwuNqGZdlg07hvmJ.hkd3ODdfJlcK6NujW', '2022-09-13 17:56:02'),
(3, 'admin3@admin3.com', 'admin3', '$2y$10$FOKbQSPt3lc0lXCv2pnItOPvHCm2rYmwu2x2GGFzFXtqW8PEZkoBm', '2022-09-14 12:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'design-website', '2022-09-11 18:20:49'),
(2, 'football', '2022-09-11 18:20:49'),
(3, 'tech', '2022-09-11 18:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(3) NOT NULL,
  `id_post_comment` int(3) NOT NULL,
  `user_name_comment` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_comment` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_post_comment`, `user_name_comment`, `comment`, `created_at`, `status_comment`) VALUES
(22, 14, 'user4@gmail.com', 'cccccccccccc', '2022-09-18 11:53:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `category_id` varchar(3) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `user_id` varchar(3) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `body`, `status`, `category_id`, `img`, `user_id`, `user_name`, `created_at`) VALUES
(10, 'post twelve', 'subtitle of post twelve', 'Quickly deliver market positioning synergy for competitive products. Progressively disintermediate customer directed growth strategies for maintainable schemas. Proactively negotiate resource-leveling systems via high-quality potentialities. Credibly harness cooperative processes rather than orthogonal relationships. Uniquely maximize future-proof internal or \"organic\" sources through process-centric methods of empowerment.\r\n\r\nEnthusiastically aggregate bleeding-edge best practices via state of the art communities. Conveniently leverage existing unique synergy for superior e-markets. Quickly leverage other\'s resource-leveling sources vis-a-vis top-line systems. Dynamically formulate go forward niche markets vis-a-vis plug-and-play manufactured products. Globally.', 0, '4', '79894.jpg', '5', 'user5@user.com', '2022-09-10 21:13:03'),
(11, 'post one', 'subtitle of post one', 'Professionally exploit leveraged infrastructures rather than highly efficient leadership. Compellingly negotiate cross-media infrastructures for technically sound sources. Synergistically reintermediate empowered results rather than installed base relationships. Synergistically disintermediate distributed interfaces before resource maximizing total linkage. Proactively exploit alternative imperatives and cutting-edge process improvements.\r\n\r\nAppropriately matrix interoperable data without progressive infomediaries. Intrinsicly simplify B2C markets without parallel outsourcing. Enthusiastically revolutionize enterprise-wide sources vis-a-vis low-risk high-yield process improvements. Professionally expedite user friendly infomediaries via go forward meta-services. Rapidiously morph cross-unit vortals via client-focused relationships.', 1, '3', '72548.jpg', '5', 'user5@user.com', '2022-09-10 21:19:54'),
(14, 'post two', 'subtitle of post two', 'Collaboratively generate resource sucking e-services whereas reliable sources. Competently negotiate revolutionary communities before user friendly infrastructures. Enthusiastically empower multimedia based bandwidth via long-term high-impact growth strategies. Intrinsicly underwhelm state of the art platforms via real-time technology. Globally plagiarize open-source human capital after functional innovation.\r\n\r\nAssertively mesh low-risk high-yield services rather than virtual benefits. Energistically facilitate long-term high-impact processes through performance based \"outside the box\" thinking. Professionally brand multidisciplinary web services before cross-media niche markets. Compellingly target timely initiatives after 24/365 technologies. Competently.\r\n\r\nCollaboratively generate resource sucking e-services whereas reliable sources. Competently negotiate revolutionary communities before user friendly infrastructures. Enthusiastically empower multimedia based bandwidth via long-term high-impact growth strategies. Intrinsicly underwhelm state of the art platforms via real-time technology. Globally plagiarize open-source human capital after functional innovation.\r\n\r\nAssertively mesh low-risk high-yield services rather than virtual benefits. Energistically facilitate long-term high-impact processes through performance based \"outside the box\" thinking. Professionally brand multidisciplinary web services before cross-media niche markets. Compellingly target timely initiatives after 24/365 technologies. Competently.', 1, '1', '287849.jpg', '6', 'user7@user7.com', '2022-09-11 19:49:36'),
(17, 'post three', 'subtitle of post three', 'Seamlessly streamline proactive benefits with fully researched potentialities. Collaboratively network performance based relationships for diverse \"outside the box\" thinking. Continually build holistic customer service vis-a-vis magnetic services. Quickly streamline interactive imperatives vis-a-vis cutting-edge information. Efficiently envisioneer web-enabled markets and high-payoff supply chains.\r\n\r\nCompetently enable progressive paradigms and client-centered products. Proactively deliver bleeding-edge initiatives for competitive interfaces. Efficiently restore integrated networks before go forward technologies. Efficiently visualize fully tested products through value-added growth strategies. Credibly repurpose leading-edge infomediaries before stand-alone schemas.\r\n\r\nProgressively reinvent.', 1, '3', '480538.png', '4', 'user4@gmail.com', '2022-09-14 10:07:18'),
(18, 'post four', 'this is a subtitle for my post four ', 'Completely grow leading-edge methodologies rather than parallel potentialities. Enthusiastically seize cross-platform quality vectors via an expanded array of users. Proactively transition front-end communities and timely web services. Authoritatively initiate end-to-end intellectual capital vis-a-vis interoperable paradigms. Professionally formulate accurate customer service and bricks-and-clicks collaboration and idea-sharing.\r\n\r\nDynamically optimize reliable functionalities and professional intellectual capital. Globally actualize goal-oriented process improvements whereas web-enabled niche markets. Seamlessly strategize premium quality vectors vis-a-vis client-based results. Monotonectally formulate premier core competencies and standards compliant information. Compellingly morph revolutionary.', 1, '3', '79894.jpg', '9', 'new.user', '2022-09-14 11:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `mypassword`, `created_at`) VALUES
(1, 'user@user.com', 'user@user.com', 'user@user.com', '2022-09-02 18:56:28'),
(2, 'user@user.com', 'user@user.com', 'user@user.com', '2022-09-02 18:58:09'),
(3, 'user2@gmail.com', 'user2@gmail.com', 'user2@gmail.com', '2022-09-02 18:58:35'),
(4, 'user4@gmail.com', 'user4@gmail.com', '$2y$10$Ffo0L/PN1b8zZ53zF0mU2uxURbwtagQqnsdMgbaOTh2CGNBVTrxVa', '2022-09-02 19:00:31'),
(5, 'user5@user.com', 'user5@user.com', '$2y$10$43Sv1j7yR9cz.sD1XnIZO.W16Gr96a0xT6pm5sJr44OVKtfATAlrO', '2022-09-02 19:01:36'),
(6, 'mohamed.hassan@gmail.com', 'user7@user7.com', '$2y$10$NlbuHlbGxVFbvWxi4vUKh.fkMKbsiKDeY3cBilvy24AHqoq2TQhFC', '2022-09-07 18:50:37'),
(9, 'new@user.com', 'new.user', '$2y$10$JUi2KLRDYhl9xYVwTuCQTOhezioPYwSMJTE1IUJdG75a4TngGcoUq', '2022-09-14 11:43:53'),
(10, 'user11@user.com', 'user.new.11', '$2y$10$5I6dB6bPgXV0f9OgwKs2GOMAesgeEOfoCauEALSRy8PZG4xwLmlCu', '2022-09-14 11:56:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
