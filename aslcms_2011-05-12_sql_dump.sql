# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: aslcms
# Generation Time: 2011-05-12 09:18:53 -0400
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `articleID` int(11) NOT NULL AUTO_INCREMENT,
  `articleTitle` varchar(65) DEFAULT NULL,
  `articleExcerpt` varchar(350) DEFAULT NULL,
  `articleBody` longtext,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `modDate` datetime DEFAULT NULL,
  `authorID` int(11) NOT NULL,
  `articleCat` int(11) DEFAULT NULL,
  `articleImage` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`articleID`),
  KEY `fk_author` (`authorID`),
  KEY `fk_categories` (`articleCat`),
  CONSTRAINT `fk_author` FOREIGN KEY (`authorID`) REFERENCES `authors` (`authorID`),
  CONSTRAINT `fk_categories` FOREIGN KEY (`articleCat`) REFERENCES `categories` (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`articleID`,`articleTitle`,`articleExcerpt`,`articleBody`,`startDate`,`endDate`,`modDate`,`authorID`,`articleCat`,`articleImage`)
VALUES
	(45,'The Atlanta Braves Rock','Yes! They do.','They are a great team.','2011-05-10 01:47:29',NULL,'2011-05-10 04:22:54',1,1,NULL),
	(47,'This is another Post','This is a small excerpt.','This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. This is just a little bit of repeating body text. ','2011-05-10 05:18:32',NULL,NULL,1,1,NULL),
	(48,'I Can&#39;t Wait For The Braves Game!','Tonight will be a good night. They will win.','Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win.','2011-05-10 18:29:08',NULL,'2011-05-11 20:44:41',1,3,'mail_2.png'),
	(51,'Jeremy\\\'s a cool name','Yes it is','Yes it is','2011-05-11 01:57:09',NULL,NULL,1,1,NULL);

/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `bioImageID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`authorID`),
  KEY `fk_authorid` (`userID`),
  CONSTRAINT `fk_authorid` FOREIGN KEY (`userID`) REFERENCES `simpleauth` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`authorID`,`fname`,`lname`,`bio`,`bioImageID`,`userID`)
VALUES
	(1,'Jeremy','Buff','I am a web developer.',NULL,1),
	(2,'Charlie','Brown',NULL,NULL,2),
	(28,'Jim','Buff',NULL,NULL,101),
	(29,'Will','Bongos',NULL,NULL,103),
	(30,'Billy','Bob',NULL,NULL,104),
	(31,'William','Shatner',NULL,NULL,106),
	(42,'Peter','Pan',NULL,NULL,119),
	(52,'Willy','Wonka',NULL,NULL,130);

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(30) DEFAULT NULL,
  `catParent` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`catID`,`catName`,`catParent`)
VALUES
	(1,'News',NULL),
	(2,'Opportunities',NULL),
	(3,'Student Work',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table image_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image_types`;

CREATE TABLE `image_types` (
  `typeID` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `image_types` WRITE;
/*!40000 ALTER TABLE `image_types` DISABLE KEYS */;
INSERT INTO `image_types` (`typeID`,`typeName`)
VALUES
	(1,'AuthorPic'),
	(2,'PostPic');

/*!40000 ALTER TABLE `image_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `authorID` int(11) NOT NULL,
  `imageType` int(2) DEFAULT NULL,
  `imagePath` varchar(255) NOT NULL,
  PRIMARY KEY (`imageID`),
  KEY `fk_imgType` (`imageType`),
  CONSTRAINT `fk_imgType` FOREIGN KEY (`imageType`) REFERENCES `image_types` (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`imageID`,`title`,`alt`,`authorID`,`imageType`,`imagePath`)
VALUES
	(1,'Example First Image','Cocoa Beach',1,2,'frontend/content/beach.jpg'),
	(2,'Charlie Brown\'s Picture','Charlie Brown',2,1,'frontend/avatars/charliebrown.gif'),
	(3,'Jeremy Buff\'s Picture','Jeremy Buff',1,1,'frontend/avatars/jbuff.png'),
	(4,'Jeremy Buff\'s Picture','Jeremy Buff',101,1,'frontend/avatars/jbuff.png'),
	(12,'Willy Wonka\'s Avatar','Avatar',130,1,'frontend/avatars/wonka.jpg');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table monkeys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `monkeys`;

CREATE TABLE `monkeys` (
  `name` varchar(30) DEFAULT NULL,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `monkeys` WRITE;
/*!40000 ALTER TABLE `monkeys` DISABLE KEYS */;
INSERT INTO `monkeys` (`name`,`description`,`id`)
VALUES
	('Jeremy Buff','This dude is an orangutang. ',1),
	('Bill','He is an ape.',2);

/*!40000 ALTER TABLE `monkeys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table simpleauth
# ------------------------------------------------------------

DROP TABLE IF EXISTS `simpleauth`;

CREATE TABLE `simpleauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_login` varchar(25) DEFAULT NULL,
  `login_hash` varchar(255) DEFAULT NULL,
  `profile_fields` text,
  `company` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

LOCK TABLES `simpleauth` WRITE;
/*!40000 ALTER TABLE `simpleauth` DISABLE KEYS */;
INSERT INTO `simpleauth` (`id`,`username`,`password`,`group`,`email`,`last_login`,`login_hash`,`profile_fields`,`company`)
VALUES
	(1,'jbuff','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',2,'jeremy@avaluxdev.com','1305205815','22e0a44a588d894c53567d98684280b5df8017a7','','Avalux Web Development'),
	(2,'cbrown','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'cbrown@peanuts.com','1305205830','511def124938d9057486fa0cc4e786e9e4cde99a','','Peantus Co.'),
	(101,'jimbuff','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',1,'kwjb76@gmail.com','1305179176','258053e77bb4f0d7252403b46b0bca4d56ca0d98',NULL,NULL),
	(103,'wbongos','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'drum@bongos.com',NULL,NULL,NULL,NULL),
	(104,'billybob','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'asd@a.com','1305179346','e6ab3ba67f2bc03f5ba372dd5a237d6ec5d5cd20',NULL,'ss'),
	(106,'wshatner','BQ74yic1YDDos9x8nOcFWYXUZzJaEpf9ZWidZJ5u6rE=',3,'a@a.com',NULL,NULL,NULL,NULL),
	(119,'ppan','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'a@a.com',NULL,NULL,NULL,NULL),
	(130,'wwonka','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'sweets@candy.com','1305205843','3b8fb9b14d4783b173cfbc290520865c9476b4bc',NULL,NULL);

/*!40000 ALTER TABLE `simpleauth` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(30) DEFAULT NULL,
  `groupNameArticle` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` (`groupID`,`groupName`,`groupNameArticle`)
VALUES
	(1,'Admin','an'),
	(2,'Developer','a'),
	(3,'Author','an'),
	(4,'Editor','an');

/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
