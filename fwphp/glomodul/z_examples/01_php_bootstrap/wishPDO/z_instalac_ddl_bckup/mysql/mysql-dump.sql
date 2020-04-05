-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema wishlist
--

CREATE DATABASE IF NOT EXISTS wishlist;
USE wishlist;

--
-- Definition of table `wishlist`.`wishers`
--

DROP TABLE IF EXISTS `wishlist`.`wishers`;
CREATE TABLE  `wishlist`.`wishers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nameunique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`.`wishers`
--

/*!40000 ALTER TABLE `wishers` DISABLE KEYS */;
LOCK TABLES `wishers` WRITE;
INSERT INTO `wishlist`.`wishers` VALUES  (1,'Tom','tomcat'),
 (2,'Jerry','jerrymouse'),
 (3,'Marry','poppins');
UNLOCK TABLES;
/*!40000 ALTER TABLE `wishers` ENABLE KEYS */;


--
-- Definition of table `wishlist`.`wishes`
--

DROP TABLE IF EXISTS `wishlist`.`wishes`;
CREATE TABLE  `wishlist`.`wishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisher_id` int(10) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  `due_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishes_1` (`wisher_id`),
  CONSTRAINT `fk_wishes_1` FOREIGN KEY (`wisher_id`) REFERENCES `wishers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`.`wishes`
--

/*!40000 ALTER TABLE `wishes` DISABLE KEYS */;
LOCK TABLES `wishes` WRITE;
INSERT INTO `wishlist`.`wishes` VALUES  (1,1,'Sausage','2011-05-25 00:00:00'),
 (3,2,'Cheese','2008-05-01 00:00:00'),
 (4,2,'Candle',NULL),
 (5,1,'Spoon full of sugar','2011-05-26 17:10:57'),
 (6,3,'tee with milk','2011-09-24 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `wishes` ENABLE KEYS */;


--
-- Definition of function `wishlist`.`format_due_date`
--

DROP FUNCTION IF EXISTS `wishlist`.`format_due_date`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` FUNCTION  `wishlist`.`format_due_date`(
`in_date` VARCHAR(255) CHARSET latin1
) RETURNS varchar(255) CHARSET latin1
    SQL SECURITY INVOKER
BEGIN
return CONCAT(in_date, SPACE(1), 'UTC');
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of function `wishlist`.`set_due_date`
--

DROP FUNCTION IF EXISTS `wishlist`.`set_due_date`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` FUNCTION  `wishlist`.`set_due_date`(
`in_date` VARCHAR(255) CHARSET latin1
) RETURNS varchar(255) CHARSET latin1
    SQL SECURITY INVOKER
BEGIN
return SUBSTR(in_date, 1, length(in_date) - 4);
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
