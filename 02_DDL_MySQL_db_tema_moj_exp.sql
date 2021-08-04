/*
J:\awww\www\1_DDL_MySQL_db_tema_moj_exp.sql
--innoDB has row-level locking, MyISAM can only do full table-level locking. InnoDB has better 
--crash recovery. MyISAM has FULLTEXT search indexes, InnoDB did not until MySQL 5.6 (Feb 2013). 
--InnoDB implements transactions, foreign keys and relationship constraints, MyISAM does not
*/
CREATE DATABASE IF NOT EXISTS tema character set utf8mb4 collate utf8mb4_croatian_ci;
/*
--CREATE DATABASE IF NOT EXISTS tema character set utf8mb4
--CREATE DATABASE  IF NOT EXISTS tema character set utf8 collate utf8_bin;
--DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci
*/
/*
            !40100 DEFAULT CHARACTER SET utf8mb4 
*/
/* --utf8 */
USE `tema`;
/*
-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2019 at 12:10 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.9

-- see 
--J:\awww\zbig_old\zbig_oldold\zz\zz30GB\04knjige\msg_video\z_install_learn_doc_bckup\1_temav_DDL_yank_joke_vezna_oracle.sql
--J:\awww\zbig_old\zbig_oldold\zz\zz30GB\04knjige\murach\oracle\scripts\ch12\fig12-12.sql
--
--J:\awww\zbig_old\zbig_oldold\aplw\glomodul\kalendar\1_kalendar_DDL_mysql_moj.sql
--
--                             MINI3 php fw
--J:\awww\zbig_old\zbig_oldold\aplw\glomodul\bookmark\z_install_bckup 
    --J:\awww\zbig_old\zbig_oldold\aplw\glomodul\bookmark\z_install_bckup\01_ddl_bookmarks.sql
    --https://github.com/panique/mini3 J:\awww\zbig_old\zbig_oldold\zz\zz30GB\zfw\03mini3fw

--                           cms_skoglund
--J:\awww\zbig_old\zbig_oldold\zz\zz30GB\04knjige\cms_skoglund\globe_ba
-----------------
--J:\awww\zbig_old\zbig_oldold\zz\zz30GB\04knjige\wrox_php24h\30\install.sql
--J:\awww\zbig_old\zbig_oldold\zz\zz30GB\04knjige\expert_rochkind\1_DDL_rochkind_mydb.sql
--J:\awww\zbig_old\zbig_oldold\zz\zz30GB\04knjige\gogala_pro_php\08_db_mysql\fa.sql
*/
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tema`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event_title` varchar(255)  DEFAULT NULL,
  `event_summary` varchar(1024)  DEFAULT NULL,
  `event_desc` text ,
  `event_start` timestamp NULL DEFAULT NULL,
  `event_end` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `event_start` (`event_start`)
) ENGINE=InnoDB AUTO_INCREMENT=83 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `user_id`, `event_title`, `event_summary`, `event_desc`, `event_start`, `event_end`) VALUES
(26, 21, 'Kalendar original', 'Again, this time final refactoring ?', 'Excellent &quot;Pro PHP and jQuery&quot;, 2016 by Jason Lengstorf and Keith Wald, 375 pages.\r\n\r\nWorks also zepto.min.js 27 kB (I do not use it - best replacement for jQuery is not use jQuery )\r\n', '2018-12-02 12:11:00', '2018-01-20 12:11:00'),
(27, 25, 'ALL HELP SW (lsweb)  ', 'http://dev1:8083/fwphp/glomodul4/lsweb?cmd=J:\\awww\\www\\fwphp\\glomodul4\\help_sw\\', '<b>aaaaaaaa</b>  bbbbbbbb <br />\r\nnnnnnnn mmmmmmm', '2018-12-17 15:01:01', '2018-12-17 15:01:01'),
(31, 25, 'Module MSG SHARE', 'http://dev1:8083/fwphp/glomodul4/msg_share/', '<p>2019-02-24\r\nI made Version 5. of <strong>menu and CRUD PHP code skeleton (own framework) which is here my primary goal</strong> - less than 50 kB - <a href=\"http://dev1:8083/fwphp/glomodul4/msg_share/\">http://dev1:8083/fwphp/glomodul4/msg_share/</a>   Based is on ideas in </p>\r\n<ol>\r\n<li>video video Shan Shah 2019 https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/,  video Learn_OOP_PHP_By_Building_Complete_Website_by_Traversy_2018 </li>\r\n<li><a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test</a> (Mini3 fw, Inanz, Hopkins, Xuding...)</li>\r\n<li><a href=\"https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/user_post_kalendar_fmb\">https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/user_post_kalendar_fmb</a>\r\nand many other learning sources.</li>\r\n</ol>\r\n<p>I made many changes (I hope improvements) which I did because I do not like proposed solutions in best php frameworks and in learning sources above (especcialy coding).<br />\r\nI think that eg invoice php code should be in own folder like Oracle forms invoice.fmb (not all forms/reports in 3 folders: M, V, C).<br />\r\nI think that should be simple/fast/professional : <strong>globals</strong>, routing, dispaching, namespaces &amp; classes loading , web rich text editing...<br />\r\nIt is why I spended so many hours on this (huge time wasting which should do software authors, not users like me). </p>\r\n<p><strong>CRUD is here not my primary goal</strong> (I prefere PDO::FETCH_NUM, see <strong>Database4.php</strong> in version 4. which is enough to start programming table rows CRUD).  So this txt I entered in table  events using phpMyAdmin. </p>\r\n<p><br /> <br /><a name=\"ch4\"></a></p>', '2019-02-24 14:01:01', '2019-02-24 14:01:01'),
(32, 25, '4433XXyygg 1122', '333333333333333', '333333333333', '2018-12-17 14:01:01', '2018-12-17 14:01:01'),
(33, 25, '4444444', '44444444 44444444', '44444444444 444444444', '2018-12-17 14:01:01', '2018-12-17 14:01:01'),
(41, NULL, '11111', NULL, NULL, NULL, NULL),
(46, NULL, '222', NULL, NULL, NULL, NULL),
(47, NULL, '333', NULL, NULL, NULL, NULL),
(48, NULL, '4444', NULL, NULL, NULL, NULL),
(77, NULL, '555', NULL, NULL, NULL, NULL),
(78, NULL, '666', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

DROP TABLE IF EXISTS `eventtype`;
CREATE TABLE IF NOT EXISTS `eventtype` (
  `eventtype_id` int(11) NOT NULL AUTO_INCREMENT,
  `eventtype_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`eventtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`eventtype_id`, `eventtype_name`) VALUES
(1, 'PHP'),
(2, 'HTML, CSS'),
(3, 'JS'),
(4, 'My events');

-- --------------------------------------------------------

--
-- Table structure for table `event_eventtype`
--

DROP TABLE IF EXISTS `event_eventtype`;
CREATE TABLE IF NOT EXISTS `event_eventtype` (
  `event_id` int(11) NOT NULL,
  `eventtype_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`eventtype_id`)
) ENGINE=InnoDB ;

--
-- Dumping data for table `event_eventtype`
--

INSERT INTO `event_eventtype` (`event_id`, `eventtype_id`) VALUES
(2, 4),
(3, 4),
(5, 4),
(17, 4);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL,
  `name` varchar(25)  NOT NULL,
  `gender` varchar(20)  NOT NULL,
  `email` varchar(60)  NOT NULL,
  `cdate` varchar(30)  NOT NULL,
  `city` varchar(30)  NOT NULL
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `artist` text  NOT NULL,
  `track` text  NOT NULL,
  `link` text ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 ;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `user_id`, `artist`, `track`, `link`) VALUES
(1, 1, 'Rin', 'Ljubav/Beichtstuhl', 'https://www.youtube.com/watch?v=MDHJMirQ5PI'),
(2, 1, 'Jeremih feat. Natasha Mosley', 'F*** U All The Time', 'https://www.youtube.com/watch?v=6-Bq7PCKCJ4'),
(3, 1, 'Nao', 'In the Morning', 'https://www.youtube.com/watch?v=uuocmqLRgOM'),
(4, 1, 'Sofi / Tukker', 'Matadora', 'https://www.youtube.com/watch?v=d6GJeap4Oqo'),
(5, 1, 'Yung Hurn', 'Nein', 'https://www.youtube.com/watch?v=22m5eU6uxeQ'),
(6, 1, 'Rin', 'Error', 'https://www.youtube.com/watch?v=VzajBMa-2P8'),
(7, 1, 'Detachments', 'Circles (Martyn Remix)', 'http://www.youtube.com/watch?v=UzS7Gvn7jJ0'),
(8, 1, 'Survive', 'Hourglass', 'https://www.youtube.com/watch?v=JVOe2oGoHLk'),
(9, 1, 'Big Narstie', 'Hello Hi', 'https://www.youtube.com/watch?v=q10WwZJmPew'),
(10, 1, 'Sleaford Mods', 'Tarantula Deadly Cargo', 'https://www.youtube.com/watch?v=E-gvxxhcS8s'),
(11, 1, 'Mykki Blanco & Woodkid', 'Highschool never ends', 'https://www.youtube.com/watch?v=cNGR4ciDmTA'),
(12, 1, 'Secondcity & Tyler Rowe', 'I Enter', 'https://www.youtube.com/watch?v=vAmDJAxNMi0'),
(13, 1, 'Maxxi Soundsystem', 'Regrets we have no use for (Radio1 Rip)', 'https://soundcloud.com/maxxisoundsystem/maxxi-soundsystem-ft-name-one'),
(14, 1, 'Jamie T', 'Don\'t you find', 'https://www.youtube.com/watch?v=-tmoaFAT108'),
(15, 1, 'Sierra Kid', 'Ein Fan von Dir', 'https://www.youtube.com/watch?v=dfabdmbpQeQ'),
(16, 1, 'SSIO', 'Nullkommaneun', 'https://www.youtube.com/watch?v=Slei8n08Cqk'),
(17, 1, 'Pupkulies & Rebecca', 'ICI', 'https://www.youtube.com/watch?v=60tebPRj_D0'),
(18, 1, 'Color War', 'Shapeshifting', 'https://vimeo.com/111250184'),
(19, 1, 'RAoFAoS', 'Innerbloom', 'https://www.youtube.com/watch?v=IA1liCmUsAM'),
(20, 1, 'RAoFAoS', 'Tonight', 'https://www.youtube.com/watch?v=GCa_TKn9ghI'),
(22, NULL, 'Tom Odell', 'Another Love', 'https://www.youtube.com/watch?v=4ZHwu0uut3k'),
(24, NULL, 'Passenger', 'Let Her Go (Kygo Remix)', 'https://www.youtube.com/watch?v=FpQY90M-hww'),
(25, NULL, 'Kyla La Grange', 'Cut Your Teeth (Kygo Remix)', 'https://www.youtube.com/watch?v=QzEwx4BoYI0'),
(30, NULL, 'JosA© Lucas', 'Close To You (Lyric Video)', 'https://www.youtube.com/watch?v=Pi26L3lFws8'),
(31, NULL, 'Milky Chance', 'Down By The River (FlicFlac Edit)', 'https://www.youtube.com/watch?v=9mnoiRqh0dQ'),
(32, NULL, 'Damian Marley', 'Road To Zion (EFIX,  XKAEM Cover)', 'https://www.youtube.com/watch?v=Jq2IfkMr_x0'),
(35, NULL, 'aaa 111 1111', 'ttt 222', 'lll 333'),
(37, NULL, 'bbbbb 33333', 'bbbbbb', 'bbbbb'),
(38, NULL, 'ccc 111', 'ccccc 2222', 'cccccc 333'),
(39, NULL, 'zzz 111', 'zzzzzzz', 'zzzzzzzzzzzzz');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(80)  DEFAULT NULL,
  `user_pass` varchar(2048)  DEFAULT NULL,
  `user_level` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `active` char(32)  DEFAULT NULL,
  `registration_date` varchar(50)  DEFAULT NULL,
  `user_email` varchar(80)  DEFAULT NULL,
  `user_telefon` varchar(255)  DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=35  ;
ALTER TABLE `users` ADD `sex` VARCHAR(10) NULL  ;
ALTER TABLE `users` ADD `image` VARCHAR(255) NULL ;
ALTER TABLE `users` ADD `spending` FLOAT NULL ;
--
ALTER TABLE `users` ADD `address` VARCHAR(255) NULL ;
ALTER TABLE `users` ADD `bio` VARCHAR(8000) NULL ;
ALTER TABLE `users` ADD `facebook` VARCHAR(255) NULL ;
ALTER TABLE `users` ADD `linkedin` VARCHAR(255) NULL ;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_level`, `active`, `registration_date`, `user_email`, `user_telefon`) VALUES
(1, 'Guest', 'ss', 1, NULL, '20180101 110000', 'ss@ss.ss', NULL),
(21, 'socnet2', '$2y$10$dbmDO8LTmbq.zU3xO6qxLOchWoAMO7SGfHo0EOQAAwFumf7tc/yC6', 0, NULL, NULL, 'slavkoss22@gmail.com', NULL),
(25, 'a', 'a', 0, NULL, '07092018', 'aaa@aa.aa', NULL),
(26, 'b', 'b', 0, NULL, '07092018', 'bb', NULL),
(27, 'socnet', '$2y$10$eUjrML1GiMdpNQXouRiuiumVwspSnXVJs6RT6eTtJOVP5TWqVkPxm', 0, NULL, NULL, 'slavkoss22@gmail.com', NULL),
(28, 'ggg', 'ggg', 0, NULL, '09142018', 'ggg', NULL),
(34, 'ss', '3691308f2a4c2f6983f2880d32e29c84', 0, NULL, NULL, 'ss@ss.ss', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usrrole` `usrrole_name` varchar(255) max 191 fot 767
--

DROP TABLE IF EXISTS `usrrole`;
CREATE TABLE IF NOT EXISTS `usrrole` (
  `usrrole_name` varchar(191) NOT NULL,
  `usrrole_desc` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`usrrole_name`)
) ENGINE=InnoDB ;

--
-- Dumping data for table `usrrole`
--

INSERT INTO `usrrole` (`usrrole_name`, `usrrole_desc`) VALUES
('Account Administrator', 'Add, remove, and edit users'),
('Content Editor', 'Add, remove, and edit events'),
('Site Administrator', 'Add, remove, and edit eventtype');

-- --------------------------------------------------------

--
-- Table structure for table `usr_usrrole`
--

DROP TABLE IF EXISTS `usr_usrrole`;
CREATE TABLE IF NOT EXISTS `usr_usrrole` (
  `user_id` int(11) NOT NULL,
  `usrrole_name` varchar(191) NOT NULL,
  PRIMARY KEY (`user_id`,`usrrole_name`)
) ENGINE=InnoDB ;

--
-- Dumping data for table `usr_usrrole`
--

INSERT INTO `usr_usrrole` (`user_id`, `usrrole_name`) VALUES
(13, 'Account Administrator');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
