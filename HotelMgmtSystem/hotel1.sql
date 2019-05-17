-- MySQL dump 10.13  Distrib 5.7.23, for Linux (i686)
--
-- Host: localhost    Database: hotel1
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `aname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `aid` bigint(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('Priya Kumari','asdf123',123456),('Sanjib Giri','asdf123',1234567890),('Rupesh Kumar','asdf123',8984679161);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) NOT NULL,
  `idcard` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `mobile_2` (`mobile`),
  UNIQUE KEY `mobile_3` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (9,'Rupesh Kumar Sahu',8984679161,'asdf123','papurupesh@gmail.com','angolan','ZAS123','male','room no 3301, mba hostel nitc'),(10,'Asish Kumar Sahu',8984206654,'sipu','asdfqwer@gmail.com','indian','SIPU89','male','room no 2114, mba hostel nitc'),(11,'Shamant Kumar',1234567890,'1234','asdfqwer@gmail.com','indian','ZAS123','male','karnataka'),(12,'Sanjeet Kumar',7277118639,'asdf123','rsahu700@gmail.com','indian','SIPU89','male','room no 3301, mba hostel nitc'),(14,'Mithu Kumar',123456789,'asdf123','mithun@gmail.com','indian','ZAS123','male','B-18A single storey, Vijay Nagar'),(15,'Sanjib Kumar Giri',9853591944,'asdf123','dsahu9437@gmail.com','indian','ASDFGH','male','ROOM NO 2413');
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `rsid` int(11) NOT NULL AUTO_INCREMENT,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `rmid` int(11) DEFAULT NULL,
  `adults` int(11) DEFAULT '2',
  `childs` int(11) DEFAULT '0',
  `status` varchar(10) DEFAULT 'current',
  `days` int(11) DEFAULT '1',
  PRIMARY KEY (`rsid`),
  KEY `gid` (`gid`),
  KEY `rmid` (`rmid`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `registration` (`uid`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`rmid`) REFERENCES `room` (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (211,'2018-10-11','2018-10-19',10,504,1,0,'past',8),(212,'2018-10-10','2018-10-12',12,505,2,0,'past',2),(213,'2018-10-10','2018-10-13',14,505,2,0,'past',3),(214,'2018-10-10','2018-10-20',15,503,2,2,'past',10);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `rid` int(11) NOT NULL,
  `status` varchar(10) DEFAULT 'notfill',
  `rmtype` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `rmtype` (`rmtype`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`rmtype`) REFERENCES `room_type` (`rtid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (501,'notfill',1001),(502,'notfill',1001),(503,'notfill',1002),(504,'notfill',1002),(505,'notfill',1003),(506,'notfill',1003),(507,'notfill',1002),(508,'notfill',1005),(509,'notfill',1003),(510,'notfill',1004),(511,'notfill',1003),(512,'notfill',1002),(513,'notfill',1004),(514,'notfill',1002),(515,'notfill',1004),(516,'notfill',1004);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_type` (
  `rtid` int(20) NOT NULL,
  `descripition` varchar(200) NOT NULL,
  `max_capasity` int(12) NOT NULL DEFAULT '2',
  `nos` int(11) DEFAULT '3',
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`rtid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_type`
--

LOCK TABLES `room_type` WRITE;
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
INSERT INTO `room_type` VALUES (1001,'A/c Suite',2,3,4500),(1002,'A/c Deluxe',2,3,3800),(1003,'A/c Double Deluxe',4,3,6700),(1004,'Non A/c Double Deluxe',4,3,4400),(1005,'Non A/c Deluxe',2,3,2300);
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-10 21:30:36
