-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: osticket_admin
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB

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
-- Table structure for table `qrcodes`
--

DROP TABLE IF EXISTS `qrcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qrcodes` (
  `qrcodeID` bigint(20) NOT NULL AUTO_INCREMENT,
  `topicID` bigint(20) DEFAULT NULL,
  `topicName` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `client` varchar(200) DEFAULT NULL,
  `datePurchase` date DEFAULT NULL,
  `validityDate` date DEFAULT NULL,
  `noValidityExpiration` int(11) DEFAULT NULL,
  `systemName` varchar(200) DEFAULT NULL,
  `subscriptionType` varchar(100) DEFAULT NULL,
  `ticketCount` int(11) DEFAULT NULL,
  `noTicketExpiration` int(11) DEFAULT NULL,
  `supportCount` int(11) DEFAULT NULL,
  `noSupportExpiration` int(11) DEFAULT NULL,
  `subscriptionRenewed` date DEFAULT NULL,
  `filename` text DEFAULT NULL,
  `qrKey` text DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`qrcodeID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qrcodes`
--

LOCK TABLES `qrcodes` WRITE;
/*!40000 ALTER TABLE `qrcodes` DISABLE KEYS */;
INSERT INTO `qrcodes` VALUES (1,10,'Report a Problem','TEST',NULL,'2022-03-25','2022-03-25',0,NULL,'Premium Package',0,1,500,0,NULL,'Report a Problem1648178879.png','n3305zPk1FeUltkypecBnDinsrDxvgnFcyOGYhioBkP061HqOuD1NXnDa2g41T0goWfwEdk1MQ==','2022-03-25 03:16:51','2022-03-25 03:27:59'),(2,1,'General Inquiry','test',NULL,'2022-03-25','2022-03-25',0,NULL,'Premium Package',0,1,0,1,NULL,'General Inquiry1648178328.png','n3305zPk1FeUltkysOcfljiy/vGYgArfeD2ac1aqBEPr9lL0Jee8e3vBa3cl1iM/pi7w','2022-03-25 03:18:48','2022-03-25 03:18:48'),(3,11,'Access Issue','test',NULL,'2022-03-25','2022-03-25',0,NULL,'Standard Package',100,0,500,0,NULL,'Access Issue1648178391.png','n3305zPk1FeUltkytuESljmgspiinQ7PbX3TPVa3BkLr9FSlJeLye2bDancn0HI8o2LwWNw1','2022-03-25 03:19:51','2022-03-25 03:19:51'),(4,14,'Tax and Accounting System - Blac','ARJAY PINCA',NULL,'2021-12-06','2022-06-17',0,NULL,'Standard Package',0,1,0,0,NULL,'Tax and Accounting System - Blac1648179413.png','n3305zPk1FeUltkyo+MJ0yu99vGQjRjFZCGXZgr9FiK/tRW8evLtaQmfODlp1z4/on+9X8E1N6dfZIu5/atHEUeIJFrH','2022-03-25 03:20:42','2022-03-25 03:36:53'),(5,10,'Report a Problem','RJ DEE',NULL,'2022-02-28','0000-00-00',1,NULL,'Premium Package',0,1,10,0,NULL,'Report a Problem1648179107.png','n3305zPk1FeUltkypecBnDinsrDxvgnFcyOGYhioBkP061HrOuD4NTePaGo=','2022-03-25 03:23:08','2022-03-25 03:31:47'),(6,10,'Report a Problem','TEST',NULL,'2022-01-04','0000-00-00',1,NULL,'Standard Package',5000,0,500,0,NULL,'Report a Problem1648181533.png','n3305zPk1FeUltkypecBnDinsrDxvgnFcyOGYhioBkP061HoOuL0NTfGaWolmTs9ow==','2022-03-25 04:11:59','2022-03-25 04:12:13');
/*!40000 ALTER TABLE `qrcodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'osticket_admin'
--

--
-- Dumping routines for database 'osticket_admin'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-25 18:01:08
