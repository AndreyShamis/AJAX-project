-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.61


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema db_ajax
--

CREATE DATABASE IF NOT EXISTS db_ajax;
USE db_ajax;

--
-- Definition of table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_first_name` varchar(250) NOT NULL,
  `id_last_name` varchar(250) NOT NULL,
  `id_email` varchar(250) DEFAULT NULL,
  `id_birth_date` varchar(50) DEFAULT NULL,
  `id_address` varchar(250) DEFAULT NULL,
  `id_country` varchar(100) DEFAULT NULL,
  `id_city` varchar(250) DEFAULT NULL,
  `id_zip` int(5) DEFAULT NULL,
  `id_phone` varchar(20) DEFAULT NULL,
  `id_confirm_status` tinyint(1) DEFAULT '0',
  `id_admin` tinyint(1) DEFAULT '0',
  `id_confirm_code` varchar(250) DEFAULT NULL,
  `id_password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_uniq` (`id_email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`,`id_first_name`,`id_last_name`,`id_email`,`id_birth_date`,`id_address`,`id_country`,`id_city`,`id_zip`,`id_phone`,`id_confirm_status`,`id_admin`,`id_confirm_code`,`id_password`) VALUES 
 (1,'werd','werd','lolnik@gmail.com','16.04.1983','Bat Kochva 18/13','Israel','Jerusalem',55656,'+972545681761',1,1,'','32ddf06332194edb9d1bd59c6cc582f9'),
 (22,'Ilia','Gaysinsky','apalon83@gmail.com',NULL,'Lalal ','Israel','Jerusalem',0,'02374873874',1,1,'','5f4dcc3b5aa765d61d8327deb882cf99'),
 (67,'tester','tester','tester','08/06/2012','tester','tester','tester',0,'00000000000',1,1,'','5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
