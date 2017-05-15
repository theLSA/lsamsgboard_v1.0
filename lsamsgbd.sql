-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: lsamsgbd
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `auser`
--

DROP TABLE IF EXISTS `auser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auser` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aname` varchar(20) NOT NULL,
  `apass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auser`
--

LOCK TABLES `auser` WRITE;
/*!40000 ALTER TABLE `auser` DISABLE KEYS */;
INSERT INTO `auser` VALUES (1,'lsa','0869a9283df1d949c5c529286716e5ae');
/*!40000 ALTER TABLE `auser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lsamsgcnt`
--

DROP TABLE IF EXISTS `lsamsgcnt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lsamsgcnt` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT 'anonymous',
  `content` varchar(1000) NOT NULL DEFAULT 'I like LSA',
  `date` int(10) NOT NULL,
  `rspnum` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lsamsgcnt`
--

LOCK TABLES `lsamsgcnt` WRITE;
/*!40000 ALTER TABLE `lsamsgcnt` DISABLE KEYS */;
INSERT INTO `lsamsgcnt` VALUES (13,'lsa','i am lsa,i got first blood!',1494406893,0);
/*!40000 ALTER TABLE `lsamsgcnt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rsplist`
--

DROP TABLE IF EXISTS `rsplist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rsplist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `msgid` int(10) NOT NULL,
  `rspuser` varchar(20) NOT NULL,
  `berspuser` varchar(20) NOT NULL,
  `rspcnt` varchar(1000) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `rspdate` int(10) NOT NULL,
  `floor` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rsplist`
--

LOCK TABLES `rsplist` WRITE;
/*!40000 ALTER TABLE `rsplist` DISABLE KEYS */;
/*!40000 ALTER TABLE `rsplist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'lsb','b59c67bf196a4758191e42f76670ceba');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-15 17:50:11
