# ************************************************************
# Sequel Ace SQL dump
# Version 20031
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.7.3-MariaDB-1:10.7.3+maria~focal)
# Database: pubs_of_sheffield
# Generation Time: 2022-04-04 15:34:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table pubs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pubs`;

CREATE TABLE `pubs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `rating` int(10) unsigned DEFAULT NULL,
  `local_brewery` varchar(30) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `what_to_order` varchar(80) DEFAULT NULL,
  `open_fire` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `pubs` WRITE;
/*!40000 ALTER TABLE `pubs` DISABLE KEYS */;

INSERT INTO `pubs` (`id`, `name`, `address`, `rating`, `local_brewery`, `picture`, `what_to_order`, `open_fire`)
VALUES
	(1,'The Blake Hotel','56 Blake Street, S6 5JS',10,'Neepsend Brewery','https://whatpub-new.s3.eu-west-1.amazonaws.com/images/pubs/800x600%402x/SHF-659-66523-blake-hotel-sheffield-north.jpg','\"the usual\"',1),
	(2,'Fagans ','69 Broad Lane, S1 4BS',4,'Abbeydale Brewery','https://sheffield.camra.org.uk/wp-content/uploads/2016/08/SheffieldCityCentre-Fagans-Servery.jpg','\"Guiness\"',1),
	(3,'The Gardeners Rest','105 Neepsend Lane, S3 8AT',8,'Twisted Wheel','https://live.staticflickr.com/2093/2473937927_0e2e984f93_b.jpg','\"A hazy pale and a game on the bar billiards table\"',1),
	(4,'The Fat Cat','23 Alma Street, S3 8SA',9,'Kelham Island Brewery ','https://www.sheffieldmetropolitan.com/media/1447/dsc06302-01.jpeg?anchor=center&mode=crop&width=1200&rnd=131991432170000000','\"Pint of pale rider and a pork sandwich\"',1),
	(5,'The Rutland Arms','86 Brown Street, S1 2BS',8,'Guest Brewery','https://sheffield.camra.org.uk/wp-content/uploads/2018/03/rutland-arms.jpg','\"Rutty Butty and any of the guest ales\"',0),
	(6,'Shakespeares','146 Gibraltar Street',7,'Abbeydale Brewery','http://www.folkandhoney.co.uk/img-venues/venue-1000-1.jpg','\"Deception and 20p for the Juke Box\"',0),
	(7,'The Bath Hotel ','66 Victoria Street, S3 7QL',8,'Thornbridge','https://www.beerinthebath.co.uk/wp-content/uploads/2016/07/bath-hotel-front2.jpg','\"Brother Rabbit\"',1),
	(8,'The Grapes','80 Trippet Lane, S1 4EN',10,'Abbeydale Brewery ','https://whatpub-new.s3.eu-west-1.amazonaws.com/images/pubs/800x600%402x/SHF-245-68040-grapes-sheffield.jpg','\"Guinness\"',0),
	(10,'The Bankers Draft','1 Market Place, S1 2GH',1,'','https://www.jdwetherspoon.com/~/media/images/pubs/0281/1.jpg','\"A taxi...\"',0);

/*!40000 ALTER TABLE `pubs` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
