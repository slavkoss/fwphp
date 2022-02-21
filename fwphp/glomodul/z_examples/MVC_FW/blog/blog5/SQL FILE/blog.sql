-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2019 at 11:43 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`  username:john password:john123
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(122) NOT NULL,
  `email` varchar(122) NOT NULL,
  `subject` varchar(122) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(122) NOT NULL,
  `created_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `subject`, `description`, `slug`, `created_at`, `status`) VALUES
(1, 'ranj', 'ranj@gmail.com', 'nature', 'nice article', 'What-is-Lorem-Ipsum-', '2019-02-18', 1),
(2, 'simon', 'simon12@gmail.com', 'nature', 'nice article from this blog', 'Greater-One-Horned-Rhinoceros', '2019-02-18', 1),
(3, 'nic', 'nic12@gmail.com', 'bird', 'i like birds', 'What-is-Lorem-Ipsum-', '2019-02-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(122) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(122) NOT NULL,
  `created_at` date NOT NULL,
  `slug` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `created_at`, `slug`) VALUES
(1, 'What is Lorem Ipsum?', '<p>Chitwan National Park is home to the second largest population of greater <strong>one horned rhinoceros</strong>. ... Today, however, no more than 2,000 remain in the wild, with</p>', 'birds.jpg', '2019-02-18', 'What-is-Lorem-Ipsum-'),
(2, 'Greater One - Horned Rhinoceros', '<p>the rhino population was estimated at ca. 1,000 in the Chitwan valley until 1950. The area was well protected by the then Rana rulers for sport hunting. It was also secure from outsiders since malaria was rampant. Only a few indigenous communities like the Tharus , who are immune to the disease, lived there. Their impact on the natural environment</p>', 'Greater_One_Horned_Rhino_8.6.2012_Hero_and_Circle_HI_107996.jpg', '2019-02-18', 'Greater-One-Horned-Rhinoceros'),
(3, 'this is paint', '<p>Balenciagaâ€™s directional Speed trainers are now available for children in this vivid cobalt-blue hue. Crafted in Italy, the sock-like construction is made from double-knit jersey set on a memory-technology s</p>', 'arva10_hero.jpg', '2019-02-18', 'this-is-paint'),
(4, 'Holi is colour festival', '<p>Holi is the festival of love or colors that signifies the victory of superior over immoral. <i><strong>Holi festival</strong></i> is commemorate on February end or starting March</p>', 'holy.png', '2019-02-18', 'Holi-is-colour-festival'),
(5, 'php is most popular language', '<p><a href=\"www.php.net\">PHP</a>: Hypertext Preprocessor is a server-side scripting language designed for web development. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group</p>', '1_bvfc4WbLY5HV00VMCndazQ.jpeg', '2019-02-18', 'php-is-most-popular-language'),
(6, 'PHP is popular programming language', '<p><a href=\"www.php.net\">PHP</a>: Hypertext Preprocessor is a server-side scripting language designed for web development. It was originally created by Rasmus Lerdorf in 1994</p>', 'php-dedicated.jpg', '2019-02-18', 'PHP-is-popular-programming-language');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`tag_id`, `post_id`) VALUES
(1, 1),
(3, 1),
(1, 2),
(4, 3),
(4, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'wildlife'),
(2, 'programming'),
(3, 'nature'),
(4, 'fashion');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(122) NOT NULL,
  `password` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'john', '6e0b7076126a29d5dfcbd54835387b7b');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
