# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: aslcms
# Generation Time: 2011-05-14 09:07:55 -0400
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`articleID`,`articleTitle`,`articleExcerpt`,`articleBody`,`startDate`,`endDate`,`modDate`,`authorID`,`articleCat`,`articleImage`)
VALUES
	(45,'The Atlanta Braves Rock','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','They are a great team.','2011-05-10 01:47:29',NULL,'2011-05-10 04:22:54',1,1,NULL),
	(48,'I Can\\\'t Wait For The Braves Game!','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win. Tonight will be a good night. They will win.','2011-05-10 18:29:08',NULL,'2011-05-13 02:37:48',1,3,'mail_2.png'),
	(51,'Growing my Beard Out','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','Yes it is','2011-05-11 01:57:09',NULL,'2011-05-14 13:02:35',1,1,NULL),
	(72,'Welcome to the Jungle','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.\r\n\r\nNunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.\r\n\r\nNunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','2011-05-13 05:18:58',NULL,'2011-05-14 03:05:26',1,1,NULL),
	(73,'Willy WonkaBong!','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','Willy WonkaBong!','2011-05-13 05:31:44',NULL,NULL,52,1,NULL),
	(74,'Opportunities Test Post','Opportunities Test Post','Opportunities Test Post','2011-05-14 05:20:41',NULL,NULL,1,2,NULL),
	(75,'GPS Events Test Post','GPS Events Test Post','GPS Events Test Post','2011-05-14 05:21:07',NULL,NULL,1,4,NULL),
	(76,'Community News Test Post','Community News Test Post','Community News Test Post','2011-05-14 05:21:20',NULL,'2011-05-14 06:55:50',1,5,NULL),
	(77,'Degrees Test Post','Degrees Test Post','Degrees Test Post','2011-05-14 05:21:34',NULL,'2011-05-14 06:20:44',1,6,NULL),
	(78,'test','test','test','2011-05-14 12:59:17',NULL,NULL,1,1,NULL);

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
  `authorPhone` varchar(20) DEFAULT NULL,
  `bioImageID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`authorID`),
  KEY `fk_authorid` (`userID`),
  CONSTRAINT `fk_authorid` FOREIGN KEY (`userID`) REFERENCES `simpleauth` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`authorID`,`fname`,`lname`,`bio`,`authorPhone`,`bioImageID`,`userID`)
VALUES
	(1,'Jeremy','Buff','I am a web developer.','828-778-6185',NULL,1),
	(2,'Charlie','Brown',NULL,NULL,NULL,2),
	(28,'Jim','Buff','','828-712-5186',NULL,101),
	(29,'Will','Bongos',NULL,NULL,NULL,103),
	(30,'Billy','Bob',NULL,NULL,NULL,104),
	(31,'William','Shatner',NULL,NULL,NULL,106),
	(42,'Peter','Pan',NULL,NULL,NULL,119),
	(52,'Willy','WonkaBong','I like chocolate. I also like weird books.','828-628-3050',NULL,130),
	(53,'Dan','Uggla',NULL,NULL,NULL,133);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`catID`,`catName`,`catParent`)
VALUES
	(1,'News',NULL),
	(2,'Opportunities',NULL),
	(3,'Student Work',NULL),
	(4,'GPS Events',NULL),
	(5,'Community News',NULL),
	(6,'Degrees',NULL);

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
  `articleID` int(11) DEFAULT NULL,
  PRIMARY KEY (`imageID`),
  KEY `fk_imgType` (`imageType`),
  CONSTRAINT `fk_imgType` FOREIGN KEY (`imageType`) REFERENCES `image_types` (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`imageID`,`title`,`alt`,`authorID`,`imageType`,`imagePath`,`articleID`)
VALUES
	(1,'Example First Image','Cocoa Beach',1,2,'frontend/content/beach.jpg',NULL),
	(2,'Charlie Brown\'s Picture','Charlie Brown',2,1,'frontend/avatars/charliebrown.gif',NULL),
	(3,'Jeremy Buff\'s Picture','Jeremy Buff',1,1,'frontend/avatars/jbuff.png',NULL),
	(12,'Willy Wonka\'s Avatar','Avatar',130,1,'frontend/avatars/wonka.jpg',NULL),
	(13,'Dan Uggla\'s Avatar','Avatar',133,1,'frontend/avatars/default.jpg',NULL),
	(14,'Jim Buff\'s Avatar','Avatar',101,1,'frontend/avatars/default.jpg',NULL),
	(16,'Avalux Buds','Hanging Out',1,2,'frontend/content/avaluxbuds.jpg',NULL),
	(17,'Astronauts','Funny',1,2,'frontend/content/astronaut.jpg',NULL),
	(23,'Welcome to the Jungle','1 Image',1,2,'frontend/content/jungle.jpg',72),
	(24,'Willy WonkaBong!','News Image',52,2,'frontend/content/wonka.jpg',73),
	(49,'Very Cool Design','Web Design',1,2,'frontend/content/Screen shot 2011-05-09 at 1.56.49 AM.png',NULL),
	(50,'Crazy Teacher','Full Sail University',1,2,'frontend/content/Screen shot 2011-05-09 at 2.50.40 AM.png',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

LOCK TABLES `simpleauth` WRITE;
/*!40000 ALTER TABLE `simpleauth` DISABLE KEYS */;
INSERT INTO `simpleauth` (`id`,`username`,`password`,`group`,`email`,`last_login`,`login_hash`,`profile_fields`,`company`)
VALUES
	(1,'jbuff','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',2,'jeremy@avaluxdev.com','1305377749','d28529bbfd14634699bc299404e8bb75c15175d2','','Avalux Web Development'),
	(2,'cbrown','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'cbrown@peanuts.com','1305205830','511def124938d9057486fa0cc4e786e9e4cde99a','','Peantus Co.'),
	(101,'jimbuff','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',1,'kwjb76@gmail.com','1305257606','faf84570b1840b8ac155a4274394d46458eff2af',NULL,'Keller Williams Professionals'),
	(103,'wbongos','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'drum@bongos.com',NULL,NULL,NULL,'A Band, Co.'),
	(104,'billybob','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'asd@a.com','1305179346','e6ab3ba67f2bc03f5ba372dd5a237d6ec5d5cd20',NULL,'Redneck, Inc.'),
	(106,'wshatner','BQ74yic1YDDos9x8nOcFWYXUZzJaEpf9ZWidZJ5u6rE=',3,'a@a.com',NULL,NULL,NULL,'Space Industries'),
	(119,'ppan','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'a@a.com',NULL,NULL,NULL,'First Flight, LLC'),
	(130,'wwonka','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'sweets@candy.com','1305260935','6a53dc4ea3b70bb8e1e2ee41bba7acd055608c4c',NULL,'Chocolate Co.'),
	(133,'duggla','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'dan@braves.com',NULL,NULL,NULL,'Atlanta Braves');

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
