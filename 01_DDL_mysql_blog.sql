-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 11:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*
--
-- Database: `z_blogcms`
--create database IF NOT EXISTS z_blogcms;
--use z_blogcms;
--
*/
-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_croatian_ci NOT NULL,
  `aname` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `aheadline` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `abio` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  `aimage` varchar(60) COLLATE utf8_croatian_ci NOT NULL DEFAULT 'avatar.png',
  `addedby` varchar(30) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `password`, `aname`, `aheadline`, `abio`, `aimage`, `addedby`) VALUES
(1, '2019-01-18 13:01:33', 'jazeb', '1234', 'Jazeb Akram', 'Freelancer', 'Jazeb Akram is a developer and web designer with the great passion for building beautiful new Desktop/Web Applications from scratch. He has been working as aÂ FreelancerÂ since 2011.HeÂ designed variousÂ ApplicationsÂ for many web designÂ companiesÂ as an Out Sourcer. Jazeb Also haveÂ a university degree in computer science along with many research activitiesYou can read his full portfolio on his websiteÂ jazebakram.com/portfolio', 'meatmirror.jpg', 'Zoe333'),
(2, '2019-01-18 13:01:33', 'Tom', '1234', 'Tom Hanks', 'Designer', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.   ', 'anonym.jpg', 'Xerox121'),
(6, '2019-01-18 13:01:33', 'Xerox121', '1234', 'Zee Lu', 'Developer, Blogger', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.   ', 'avatar.png', 'DavidM'),
(17, '2019-10-18 13:01:33', 'w', 'wwww', 'qqqqqqqq n wwwwwwwwww', 'heeeeeeaaaaaaaaaa wwwwwwwwwww', 'Biography  biooooooooo of wwwwwwww        \r\nbbbbbbbbb iiiiiiii                                                                   ', 'twitter.jpg', 'ss'),
(18, '2019-10-18 13:01:33', 'ss', 'ssss', 'ss', 'IT galiot', 'bbbbb\r\n<br />bbb iiiiiii oo\r\n<br />o oooooooo\r\n<br />xxx xxxxxxx vvvvvvvvvv ', 'meatmirror.jpg', 'w'),
(29, '2019-10-18 13:01:33', '1111111111', '1111', '111111111111111111', '', '', 'avatar.png', 'w');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `datetime` varchar(50) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'Technology', 'Jazeb', '2019-10-18 13:01:33'),
(3, 'Fitness', 'Jazeb', '2019-10-18 13:01:33'),
(5, 'Science', 'Tom', '2019-10-18 13:01:33'),
(6, 'Politics', 'jazeb', '2019-10-18 13:01:33'),
(7, 'Sports', 'Xerox121', '2019-10-18 13:01:33'),
(8, 'World', 'Xerox121', '2019-10-18 13:01:33'),
(9, 'News', 'Xerox121', '2019-10-18 13:01:33'),
(10, 'Movies', 'Xerox121', '2019-10-02 12:25:56'),
(21, '1111111', 'w', '2019-10-18 13:01:33'),
(30, 'B12phpfw', 'w', '2019-11-09 14:11:38'),
(31, '222222222222', 'w', '2019-11-23 16:34:21'),
(33, '3333333', 'w', '2019-11-23 17:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_croatian_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  `approvedby` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(3) COLLATE utf8_croatian_ci NOT NULL,
  `post_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `post_id`) VALUES
(2, '2019-01-08', 'John', 'Thaa@gm.com', 'This movie was fabulous ', 'Zee Lu', 'ON', 53),
(3, '2019-01-09 12:25:04', 'Elizabeth ', 'Elizabeth@nc.vom', 'fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt e cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Zee Lu', 'ON', 53),
(7, '2019-01-12 10:19:59', 'Malik G', 'add@gg.com', ' Ø¬Ø§ Ø³Ùˆ Centaurus   Ø±Ø§Ø¬Û Ø¬ÛŒ ', 'Zee Lu', 'ON', 54),
(18, '2019-01-07 12:25:04', 'Macdawer ', 'ad', 'Future sounds great', 'David Miller', 'OFF', 50),
(23, '2019-01-12 19:45:19', 'Nick Walter', 'example@example.com', 'great post', 'Jazeb Akram', 'ON', 54),
(24, '2019-01-14 20:00:24', 'Tome Hanks', 'tom@example.com', 'great to see this post.', 'wwwww nnnnnn', 'ON', 48),
(30, '2019-10-20 21:06:44', 'ss', 'slavkoss22@gmail.com', 'ssssssssssssssssssssssssssss ssssssssssssssss ssssssssssss', 'qqqqqqqq n wwwwwwwwww', 'ON', 54),
(31, '2019-11-03 14:54:36', 'ss', 'slavkoss22@gmail.com', '##### eeeeee wwwwwwww 3      33333333333333 33333333 333########', 'qqqqqqqq n wwwwwwwwww', 'OFF', 54);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `title` varchar(300) COLLATE utf8_croatian_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `post` varchar(10000) COLLATE utf8_croatian_ci NOT NULL,
  `summary` varchar(4000) COLLATE utf8_croatian_ci DEFAULT NULL,
  `img_desc` varchar(4000) COLLATE utf8_croatian_ci DEFAULT NULL,
  `datetime2` varchar(25) COLLATE utf8_croatian_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`, `summary`, `img_desc`, `datetime2`, `author_id`, `user_id`) VALUES
(16, '2015-06-10 12:20:29', 'altervista007.txt ', 'B12phpfw', 'Tom', '3.jpg', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qu              ', '7. ORACLE 11g XE PERSISTENT DB CONNECTION POOLED (ESTABLISHED WITH PHP PDO OR E.Rangelâ€™s PDOOCI)', '                                ', NULL, NULL, NULL),
(18, '2015-08-16 12:20:29', 'altervista009.txt ', 'B12phpfw', 'Tom', '_102968357_diverse_politics.jpg', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', '                9. Main development, test and production menu (& 3 sites) - PHP 7 RC5, Oracle 11g on Windows 10 all 64 bit', '                                                ', NULL, NULL, NULL),
(19, '2015-04-13 12:20:29', 'altervista004.txt ', 'B12phpfw', 'Zoe333', 'safe_image.jpg', '', '                4. Multiple files upload OOP, namespaces & How to recognize mobile device - OOP, SPA, MVC domain style, PHP outside web doc root ', '                                ', NULL, NULL, NULL),
(20, '2011-11-11 12:20:29', 'Losing_weight.txt', 'Fitness', 'Zoe333', 'fit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ', 'Losing weight is a thing of Past', '                ', NULL, NULL, NULL),
(21, '2015-04-14 11:20:29', 'altervista005.txt ', 'B12phpfw', 'Zoe333', 'safe_image.jpg', '', '                5. CRUD simple table (ID, some data columns) PDO SQLite      ', '                                ', NULL, NULL, NULL),
(22, '2015-04-14 12:20:29', 'altervista006.txt ', 'B12phpfw', 'Zoe333', 'HTML5 CSS3.jpg', '', '6. CRUD selfjoin table forum â€“ message board PDO SQLite        ', '                                                ', NULL, NULL, NULL),
(23, '2011-11-11 12:20:29', 'Kids_play.txt', 'Fitness', 'Xerox121', 'children-running-t.jpg', 'Sarah Palen a famous physician says letting kids play the way they want make them happy, active and healthy. Parent advice on thing which they can do or dont leave a bad effect on children, she maintained. ', 'Fun Exercises for Kids : Sarah Palen a famous physician says letting kids play the way they want make them happy, active and healthy. Parent advice on thing which they can do or dont leave a bad effect on children, she maintained. ', '                                ', NULL, NULL, NULL),
(25, '2015-07-15 12:20:29', 'altervista008.txt ', 'B12phpfw', 'Xerox121', 'gas.jpg', 'hhhhhhh ggggggggggg                    ', '8. Understand AngularJS (ng) ver. 1.4.3 & PHP server script Get Emp from Oracle DB 11g', '                                ', NULL, NULL, NULL),
(26, '2011-11-11 12:20:29', 'Streetcar Desire 1951 ', 'Movies', 'Xerox121', 'tt.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', 'rrrrrrrrrrrr nnnnnnnnnnnn', NULL, NULL, NULL, NULL),
(27, '2011-11-11 12:20:29', 'Mosque.txt', 'World', 'Xerox121', 'wazir_khan_mosque.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis ', '                The Beautiful Wazir Khan Mosque', 'https://en.wikipedia.org/wiki/Wazir_Khan_Mosque\r\n\r\n17th century mosque located in the city of Lahore, capital of the Pakistani province of Punjab. The mosque was commissioned during the reign of the Mughal Emperor https://en.wikipedia.org/wiki/Shah_Jahan. Shah_Jahan name is Shahab-ud-din Muhammad Khurram - height of the Mughal architecture, most notably the {{b}}Taj Mahal{{/b}} https://hr.wikipedia.org/wiki/Taj_Mahal. His relationship with his wife Mumtaz Mahal has been heavily adapted into Indian art, literature, and cinema.\r\n\r\nMosque is part of an ensemble of buildings that also included the nearby Shahi Hammam baths. ', NULL, NULL, NULL),
(28, '2019-10-12 12:20:29', 'HTML5_CSS3.txt', 'Technology', 'Xerox121', 'htmlcourse.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qu', 'Learn HTML5 and CSS3.', 'banner img             aaa    ', NULL, NULL, NULL),
(34, '2015-01-04 12:20:29', 'altervista003.txt', 'B12phpfw', 'Xerox121', 'safe_image.jpg', '                                                                                                                                                                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n<h2 class=\"display-4\">The wait is finally over</h1>\r\n\r\n  <div style=\"height:10px; background:#27aae1;\"></div>\r\n <p class=\"lead\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>\r\n<div style=\"height:10px; background:#27aae1;\"></div>\r\n<img src=\"uploads/laptop.jpg\" class=\"d-block img-fluid\" />       \r\n<h2 class=\"display-4\"> Specification</h2>\r\n<ul>\r\n<li>Memory</li>\r\n<li>Hard drive</li>\r\n<li>Processor</li>\r\n<li>Cache</li>\r\n<li>Metallic Body</li>\r\n</ul>\r\n<img src=\"uploads/laptop1.jpg\" class=\"d-block img-fluid\" />  \r\n<p class=\"text-justify\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.   </p>                                                                               ', '3. Zwamp server development ibrowser menu', '                                                ', NULL, NULL, NULL),
(35, '2011-11-11  12:20:29', 'Work_out.txt', 'Fitness', 'jazeb', 'asasas.jpg', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in \r\n              ', 'Is intensive work-out bad for health?', '                ', NULL, NULL, NULL),
(36, '2016-10-26 12:20:29', 'altervista001a.txt', 'B12phpfw', 'jazeb', 'unnamed.jpg', '', '1a. Install ZWAMP, Apache, PHP, MySQL, WordPress on Win 10 all 64bit, all portable (extract, setup files)      ', '                ', NULL, NULL, NULL),
(37, '2017-09-13 12:20:29', 'altervista001b.txt', 'B12phpfw', 'jazeb', 'ty.jpg', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco l              ', '1b. Install Apache, PHP, localhost SSL (https) On Windows 10, all newest 64 bit', '                ', NULL, NULL, NULL),
(40, '2018-05-29 08:20:29', 'altervista011.txt ', 'B12phpfw', 'Zoe333', 'sc.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', '11. PHP CMS, flat files CRud database (WYSIWYG SimleMDE or Summernote) or relational DB tblrows CRUD', 'This is version 4 and 5 of B12phpfw. It seemed ok but I found many simplifications, improvements.                                        ', NULL, NULL, NULL),
(42, '2019-02-24 12:20:29', 'altervista012.txt ', 'B12phpfw', 'jazeb', 'dd.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.               ', '12. PHP menu & CRUD code skeleton', '                                ', NULL, NULL, NULL),
(43, '2019-03-16 12:20:29', 'altervista013.txt ', 'B12phpfw', 'zoe333', 'jj.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '13. jQuery, PHP, Bootstrap : AJAX DB table rows CRUD', '                                ', NULL, NULL, NULL),
(44, '2017-09-27 12:20:29', 'altervista001c.txt', 'B12phpfw', 'DavidM', 'ss.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                   ', '1c. Web server at home, DDNS (dynamic DNS), access my dyndns from local network, PHP, CURL, OpenSSL        ', '                ', NULL, NULL, NULL),
(45, '2016-07-13 12:20:29', 'altervista010.txt ', 'B12phpfw', 'jazeb', 'temaorapdo_ver_1_1-450x330.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '                                                                                \r\n10. Real life application Messages - PHP PDO, AJAX+jQuery CRUD&filter (thema, blog, forum, CMS, builetinboard, Skype replacement)', 'This old B12phpfw version 3. is more complicated but if you like it could be simplified. I think version 6 is best, simplest. ', NULL, NULL, NULL),
(46, '2011-11-11 12:20:29', 'Tesla_III.txt', 'News', 'jazeb', 'Tesla-Model-X-Silver.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'Tesla III is ready to launch.', '                                ', NULL, NULL, NULL),
(47, '2017-05-27 12:20:29', 'altervista002a.txt', 'B12phpfw', 'Xerox121', 'iphone.jpg', '                              ', '2a. Oracle 11g PL/SQL Tutorial', '                ', NULL, NULL, NULL),
(48, '2011-11-11 12:20:29', 'Travel_2050.txt', 'World', 'jazeb', 'travelBlogger.jpg', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat                             ', 'The Travel diary 2050.', '                ', NULL, NULL, NULL),
(50, '2011-11-11 12:20:29', 'Online_Edu.txt', 'News', 'jazeb', 'dd.jpg', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis               ', 'The future of Online Education.', '                ', NULL, NULL, NULL),
(51, '2011-11-11 12:20:29', 'Edu_Syria.txt', 'News', 'Zoe333', 'education.jpg', '                Symbolic Syrian Woman Alkuman-Made is asking for Free Education to all under-privileges . This will definitely a milestone in the middle eastern region.               ', 'Education for Syrian Refugee Children : Symbolic Syrian Woman Alkuman-Made is asking for Free Education to all under-privileges . This will definitely a milestone in the middle eastern region.', '                                ', NULL, NULL, NULL),
(53, '2011-11-11 12:20:29', 'Jupiter_2015.txt', 'Movies', 'Zoe333', 'maxresdefault.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  <h2 class=\"display-4\">People are Talking !!! </h1>    \r\n<div style=\"height:10px; background:#27aae1;\"></div>\r\n  <p class=\"lead\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> <div style=\"height:10px; background:#27aae1;\"></div>\r\n <img src=\"uploads/cacha.jpg\" class=\"d-block img-fluid\" />           \r\n\r\n   <p class=\"text-justify\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.  Excepteur sint occaecat cupidatat non proident, sunt in culpa ...   </p>                                                                                                                                                                   ', 'Jupiter ascending 2015 | Movie Review', '                ', NULL, NULL, NULL),
(54, '2019-10-18 15:10:29', '001. Menu_CRUD.txt', 'B12phpfw', 'ss', 'mvc_M_V_data_flow.jpg', 'WHY Nobody made good tutorial about OOP MVC menu and CRUD PHP code skeleton (especially for each module in own folder), instantly visible that it is best way of coding - hence so much blah-blah. Modules for master-detail and link tables are even more rare. Strong-talk-weak-work people pollute info space wit hypes, vapor wares... because of ignorance or to promote himself, to earn money.\r\n\r\nWHAT 2019-08-31 I made Version 5. of menu and CRUD standardized, simplest code skeleton (own PHP framework). Standardization of CRUD coding is not my primary goal but I gave many CRUD examples in learn directory - modules https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test.\r\n\r\nFW core code in zinc directory is less than 50 kB, do not fear of lot of global and module variables and older unneccessary scripts. Module and global config scripts conf_module.php and conf_site.php are simmilar but better than Oracle forms Property palette.\r\nMost important modules are :\r\n<ol>\r\n<li><strong>mnu</strong> module <a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/www5\">https://github.com/slavkoss/fwphp/tree/master/fwphp/www5</a> = main menu (home of site \"fwphp\" )    </li>\r\n<li><strong>msg</strong> module<br />\r\n<a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test/AJAX/01_ssv_json\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test/AJAX/01_ssv_json</a>  = basic PHP PDO, AJAX (jQuery), JSON : server side validtion<br />\r\n<a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/blog\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/blog</a>  = lot of functionality, PHP PDO, no OOP, no AJAX, jQuery, no JSON, Bootstrap 5 : server side validation<br />\r\n<a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test/AJAX/02_filter_rows_CRUD\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test/AJAX/02_filter_rows_CRUD</a> = similar to previous with rows filter and PDO<br />\r\n<a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test/login/user\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test/login/user</a>  = good PHP, PDO, AJAX (jQuery), Bootstrap users CRUD code. With namespaces      meaning autoloading module and site global classes scripts. Module single entry point is index.php meaning scripts are included, not URL called (except AJAX PHP scripts called from JS scripts).<br />\r\n<a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/usr_posttyp_post\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/usr_posttyp_post</a>  procedural coding, first step for (unfinished) OOP module :<br />\r\n<a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/msg_share\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/msg_share</a> = messages PDO CRUD MySQL & Oracle 11g XE (blog, todo...)     </li>\r\n<li><strong>mkd</strong> module <a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/mkd\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/mkd</a> = markdown WYSIWYG editor (SimpleMDE & Parsedown)      </li>\r\n</ol>\r\n\r\nHOW : Important is to learn :\r\n<ol>\r\n<li>code skeleton, </li>\r\n<li>globals, </li>\r\n<li>how to instantiate class (new command) - namespaces, autoloading class scripts with class methods global parameters array, </li>\r\n<li>how to include script (no http jumps to scripts), if you choose that not all included scripts are classes.   </li>\r\n</ol>\r\n\r\nWHERE Directories :\r\nzinc = includes, assets, framework core\r\nfwphp better named modules (we may use any name) = site = modules or modules groups. There are no 3 dirs M, V, C for all modules !\r\n\r\nWHO, WHEN I tested more than 5 versions of mnu, mkd and msg modules based on other people work mentioned below. Lot, lot of work wasted during dozen years because of strong-talk-weak-work people, and there is lot of details to do for which I had no time but can be easily built on grounds given here. Thanks parasits. \r\n\r\n\r\n<h2 class=\"display-4\">The wait is finally over</h1>    <div style=\"height:10px; background:#27aae1;\"></div>  <p class=\"lead\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> <div style=\"height:10px; background:#27aae1;\"></div> <img src=\"uploads/laptop.jpg\" class=\"d-block img-fluid\" /> \r\n       <h2 class=\"display-4\"> Specification</h2> <ul> <li>Memory</li> <li>Hard drive</li> <li>Processor</li> <li>Cache</li> <li>Metallic Body</li> </ul>\r\n\r\n <img src=\"uploads/laptop1.jpg\" class=\"d-block img-fluid\" />   <p class=\"text-justify\">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>                                                                                                                                                                                                             ', '                                Summary: WHY Nobody made good (not to simple) tutorial about PHP menu & CRUD code skeleton ? Especially for {{b}}each module in own folder like Oracle forms .fmb-s{{/b}} there is (almost) nothing to find in learning sources.\r\n                            ', '                                Picture M-V data flow. Model code is most complicated. C and V code can be standardized, M only partially : cc, rr, uu, dd methods for all tables but bussines logic in M code can not be standardized.\r\n\r\nUser`s events are handled in Controller class.\r\n- {{b}}C assigns user\'s orders in URL to variables telling V what user wants and includes V (not showed in picture){{/b}}. \r\n- V pulls data from M according C variables (user\'s orders in URL ). \r\n- V also may call C method for some state changes ordered by user in URL, eg table row updates like approve user comment.\r\n- V script may contain class but I do not see need for view classes because view script is included in Home_ctr class and can use $this to access methods and attributes in whole class hierarchy : Home_ctr, Config_allsites, Db_allsites. If we do not need CRUD than we do not need class hierarchy : Home_ctr, Config_allsites, Db_allsites meaning that simple coding like in mnu and mkd modules suffices..\r\n\r\nM-C-V data flow - controller instantiates M and pushes M data to V.\r\nI do not see advantages compared to M-V data flow. Disadvantage are : for pagination M-V data flow is only possible solution, M-C-V data flow makes C fat in large modules (lot of code). C in my msg (blog) module has lot of code, but code is very simple.\r\n\r\nSo view instantiates model and pulls data from M or C instantiates model and pulls data from M. Difference is important only for us - for clearer code, both styles work ok.\r\n\r\nIf we have user`s interactions (events) eg filter displayed rows (pagination is also filtering), than M-V data flow is only possible solution.\r\n', NULL, NULL, NULL),
(67, '2014-05-25 17:01:59', 'altervista002.txt', 'B12phpfw', 'w', '', '', '2. Install all 64bit: Oracle DB 11g XE on Windows 10 + Forms 12c + APEX 5.0.3', '                                aaa          post_aboutwhatever.txt post_aboutwhatever.txt post_aboutwhatever.txt', NULL, NULL, NULL),
(69, '2014-05-25 16:07:40', 'altervista001.txt', 'B12phpfw', 'w', 'twitter.jpg', '', 'SUMMARY (4000 characters)   1. Install Apache, PHP, Oracle DB 11g XE & 11g, Oracle Forms 6i and 12c & Reports on Win 10 (all 64bit)', 'IMAGE (BANNER) DESCRIPTION (4000 characters) :  aaaaaaa     yyyyyy             yyyyyyyyyyyy ', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign_Relation` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
