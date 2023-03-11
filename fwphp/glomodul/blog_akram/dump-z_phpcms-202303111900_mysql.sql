-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: z_phpcms
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_panel`
--

DROP TABLE IF EXISTS `admin_panel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetim` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `imag` varchar(200) NOT NULL,
  `post` varchar(4000) NOT NULL,
  `img_desc` varchar(4000) NOT NULL,
  `summary` varchar(4000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_panel`
--

LOCK TABLES `admin_panel` WRITE;
/*!40000 ALTER TABLE `admin_panel` DISABLE KEYS */;
INSERT INTO `admin_panel` VALUES (42,'June-04-2017 22:37:46','PHP Secure Login and Registration System + Email Activation','PHP','Alex','PHPbestcourse.jpg','Create Secure Login and Registration System with Email Verification using HTML CSS PHP and  MYSQL from Scratch\r\n\r\nThis course will focus on the process of User Registration and Login System in which students will build the complete project shown in promo video by using HTML CSS PHP and MYSQL.\r\n\r\n<h3 id=\"heading\">This course will cover the followings</h3>\r\n\r\nHow to secure user cardinals\r\nPassword Encryption\r\nHashing Algorithms\r\nProject\r\n\r\nComplete Registration system & Login System\r\nConfirm Account feature Via Email\r\nPassword Reset Via registered Email\r\nValidation Checks\r\nVery Easy to built\r\nCould be applied on any site within Seconds\r\nwe will be using HTML CSS PHP and MYSQL to build this application\r\n\r\nâ€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€“\r\n\r\nStudents should have basic knowledge of HTML CSS AND PHP before taking this course','',''),(43,'June-04-2017 22:44:45','Enabling Self Esteem','Motivation','Elizabeth Doe','17952730_780692818753550_4656810160880692624_n.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\" \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"','',''),(44,'June-05-2017 00:39:27','The Tomorrow','Technology','jazeb','650222_0738_12.jpg','		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	','',''),(45,'June-05-2017 00:08:52','The Blessings in Me','Trending','John','18813415_1639706632729443_6934044706350384040_n.jpg','		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	','',''),(46,'June-04-2017 23:32:03','The Bootstrap 5','Online Courses','Elizabeth Doe','4.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(47,'June-04-2017 23:33:20','The Complete JavaScript Course','Online Courses','Elizabeth Doe','Javascript (2).jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(48,'June-04-2017 23:35:42','Facebook Drooped Assets','Trending','Elizabeth Doe','699946_b940_4.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(49,'June-04-2017 23:36:30','Edge of Today','Technology','Elizabeth Doe','Optimized-person-apple-laptop-notebook-Copy.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(50,'June-04-2017 23:37:28','The Complete HTML CSS3 Course','HTML','Raymond007','HTML5 CSS3.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(51,'June-04-2017 23:38:21','JQuery by Best Slot','Online Courses','Raymond007','logbo.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(52,'June-04-2017 23:39:28','The Test Match ','News','Raymond007','200559.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(53,'June-04-2017 23:41:19','1000  Design Modeling','HTML','Raymond007','htmljazebakram.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(54,'June-04-2017 23:55:59','The CR7 Game','News','Raymond007','Ronaldo Wallpaper 2014 C ronaldo 2014.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...','',''),(55,'June-04-2017 23:58:20','The League','News','Raymond 007','Best Football Players  Share your Moments with ourdunya.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...','',''),(56,'June-05-2017 00:00:11','The Next Programming Language','PHP','Raymond 007','PHP-Logo-Free-Download-PNG.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q...','',''),(57,'June-05-2017 00:02:15','Javascript Power','Online Courses','Raymond 007','JavaScript.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(58,'June-05-2017 00:04:06','The Logical Reasoning','Motivation','Alex','427153_370292216337564_153390773_n.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(59,'June-05-2017 00:06:55','Animation Transforms and 3D Design','CSS','John','Animation.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(60,'June-05-2017 00:12:16','CSS3 Design Pattern','CSS','Elizabeth Doe','htmlcourse.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a ute irure dolor in reprehenderit in voluptate velit esse cill um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(61,'June-05-2017 00:13:56','PHP New Version ','PHP','John','PHP-Logo-Free-Download-PNG.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a ute irure dolor in reprehenderit in voluptate velit esse cill um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(62,'June-05-2017 00:18:37','The HTML and SQL Course','HTML','sajid','sqlconcepts.jpg','		Lorem ipsum dolor sit amet, consectetur adipiscing elit , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a ute irure dolor in reprehenderit in voluptate velit esse cill um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.	','',''),(63,'June-05-2017 00:18:06','The Season is Upon Us ','News','sajid','Soccer Wallpaper Top 30 Soccer Wallpapers.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a ute irure dolor in reprehenderit in voluptate velit esse cill um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(64,'March-09-2023 17:29:53','Post 2','HTML','a','','### Lorem ipsum aaaa\r\n\r\nMachine Lorem ipsum dolor sit amet, consectetur adipiscing elit , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a ute irure dolor in reprehenderit in voluptate velit esse cill um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.','',''),(65,'March-09-2023 17:41:45','About this blog PHP code','PHP','a','Laptop.jpg','#### This is content of column &quot;Post&quot; in table &quot;admin_panel \r\n\r\n\r\n### The Steps you should Take\r\n\r\nCreate markdown text in &quot;Dashboard&quot;, &quot;Edit post&quot; or in one of :     \r\n[ WYSIWYG markdown editor](/fwphp/glomodul/mkd/)\r\n[ Tutorialspoint markdown2html](https://www.tutorialspoint.com/online_markdown_editor.php/) \r\n[ Codebeautify html2markdown](https://codebeautify.org/html-to-markdown/) \r\n[ Browserling html2markdown](https://www.browserling.com/tools/html-to-markdown/)     \r\n\r\nPaste markdown text in &quot;Dashboard&quot;, &quot;Edit post&quot;\r\n\r\n\r\nThis blog code is older procedural programming style but if we want only blog module there is no need for B12phpfw :    \r\nOOP, globals,  classess, autoloaders, routing, dispatching, namespaces, which are useful for big sites - hundreds of modules).\r\n\r\n\r\n&gt; This is blockquoted text : ercitation ul lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a ute irure dolor in reprehenderit in voluptate velit esse cill um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c upidatat no','',''),(85,'2023-03-11 18:19:50','aaaa','Other','a','','aaaaaaaaaaaaaaaaaaaa','','');
/*!40000 ALTER TABLE `admin_panel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetim` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (10,'May-30-2017 22:17:09','PHP','jazeb'),(11,'May-30-2017 22:19:57','Trending','sajid'),(13,'May-30-2017 22:24:28','HTML','Ali'),(15,'June-04-2017 22:26:14','Technology ','Elizabeth Doe'),(16,'June-04-2017 22:27:07','News','Raymond007'),(17,'June-04-2017 22:28:18','Online Courses','Alex'),(18,'June-04-2017 22:43:22','Motivation','Elizabeth Doe'),(19,'June-05-2017 00:06:20','CSS','John'),(21,'February-24-2017 15:11:33','Other','Elizabeth Doe');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetim` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `komentar` varchar(500) NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_panel_id` (`admin_panel_id`),
  CONSTRAINT `Foreign Key to admin_panel table` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (30,'June-04-2017 23:57:26','Rohan','Rohan@hh.com','it was good match\r\n','jazeb','ON',52),(32,'June-05-2017 00:44:58','John Nash','jazebakram@gmail.com','i don\'t think they are going to win it easily because the competition  is too tough for them even though they can not stand for 50 mints in the match','jazeb','ON',63),(33,'June-05-2017 00:50:36','Sam Looki','jazebakram@gmail.com',';/ its gonna be sad\r\nDespite of the match','Alex','ON',63),(34,'June-05-2017 12:11:30','Sarah','jazeb@gg.das','how to make a laptop case?','Elizabeth Doe','ON',65),(35,'June-05-2017 12:12:18','Harsh','Rohan@hh.com','great post','a','ON',63),(36,'June-05-2017 12:14:00','Peter','jazebakraiom@gmail.com','i want this course link','Pending','OFF',62),(37,'June-05-2017 12:15:03','Alexender','jazebakram@gmail.com','drop it in a way. Excepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nExcepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.','Alex','ON',62),(38,'June-05-2017 12:19:47','Mahoone','jazebakraiom@gmail.com','javascript sunt in culpa qui officia deserunt mollit anim id est laborum.','Elizabeth Doe','ON',64),(39,'June-05-2017 12:20:10','Rohit','jazebakraiom@gmail.com','sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nsunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.','Elizabeth Doe','ON',64),(40,'June-05-2017 12:23:44','Mr. Malik','jazeb@gg.das','tur adipiscing elit , sed do eiusmod.','Elizabeth Doe','ON',64),(41,'June-05-2017 12:24:12','Muhammad ALi','jazebakram@gmail.com','Thank you very much','Elizabeth Doe','ON',64),(42,'June-05-2017 12:24:50','Carlos','jazebakram@gmail.com','Great oppertunity. (Y)','Elizabeth Doe','ON',64),(44,'June-05-2017 12:26:23','jazeb','jazebakram@gmail.com','i am damn excited','Alex','ON',61),(45,'June-05-2017 12:27:26','John Mark','jazebakram@gmail.com','hit it on. :) ','Elizabeth Doe','ON',64),(46,'June-05-2017 12:34:28','Janny Miler','jazeb@gg.das','Duis a ute irure dolor in reprehenderit in voluptate velit esse cill um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c upidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum.','John','OFF',63),(50,'February-24-2017 15:08:06','Amir','jazeb@gg.das','Nice post','Elizabeth Doe','OFF',65),(51,'February-24-2017 15:16:37','Romi','romi@gmail.com','good version','a','OFF',61);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetim` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (3,'May-24-2017 13:05:12','jazeb','akram','Jazeb Akram'),(4,'May-24-2017 13:41:55','a','aaaa','Jazeb Akram'),(5,'May-24-2017 14:42:00','sajid','akram','Ali'),(6,'June-04-2017 21:51:23','Alex','akram','jazeb'),(7,'June-04-2017 21:52:34','John','akram','Alex'),(8,'June-04-2017 21:55:42','Raymond 007','akram','Alex'),(9,'June-04-2017 21:58:22','Elizabeth Doe','akram','Raymond007'),(10,'March-05-2023 18:03:49','b','bbbb','a'),(14,'March-05-2023 18:05:07','c','cccc','a'),(15,'March-05-2023 18:05:07','c','cccc','a');
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'z_phpcms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-11 18:35:14
