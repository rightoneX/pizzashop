CREATE DATABASE  IF NOT EXISTS `pizzashop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pizzashop`;
-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: pizzashop
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `bookingID` int unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int unsigned NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `bookingdate` datetime DEFAULT NULL,
  `people` int DEFAULT '1',
  PRIMARY KEY (`bookingID`),
  KEY `customerID_idx` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,1,'592-232-0521','2021-12-18 17:29:36',2),(2,8,'775-120-6785','2021-05-18 06:13:06',4),(3,4,'393-916-0672','2021-02-11 08:39:29',1),(4,9,'114-541-0005','2021-11-28 12:20:58',1),(5,2,'561-687-0825','2021-06-10 03:52:37',4),(6,9,'959-512-2639','2021-03-24 17:06:28',3),(7,2,'593-781-9360','2021-03-01 04:11:27',4),(8,7,'473-595-2768','2021-11-04 08:16:06',5),(9,4,'673-132-5499','2021-01-29 16:57:48',3),(10,1,'151-149-9447','2021-05-20 14:13:23',2),(11,4,'382-125-5641','2021-01-16 17:42:15',5),(12,7,'507-644-2363','2021-03-24 05:13:46',3);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customerID` int unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '.',
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Admin','Admin','admin@pizza.com','password'),(2,'Desiree','Collier','Maecenas@non.co.uk','.'),(3,'Irene','Walker','id.erat.Etiam@id.org','.'),(4,'Forrest','Baldwin','eget.nisi.dictum@a.com','.'),(5,'Beverly','Sellers','ultricies.sem@pharetraQuisqueac.co.uk','.'),(6,'Glenna','Kinney','dolor@orcilobortisaugue.org','.'),(7,'Montana','Gallagher','sapien.cursus@ultriciesdignissimlacus.edu','.'),(8,'Harlan','Lara','Duis@aliquetodioEtiam.edu','.'),(9,'Benjamin','King','mollis@Nullainterdum.org','.'),(10,'Rajah','Olsen','Vestibulum.ut.eros@nequevenenatislacus.ca','.'),(11,'Castor','Kelly','Fusce.feugiat.Lorem@porta.co.uk','.'),(12,'Omar','Oconnor','eu.turpis@auctorvelit.co.uk','.'),(13,'Porter','Leonard','dui.Fusce@accumsanlaoreet.net','.'),(14,'Buckminster','Gaines','convallis.convallis.dolor@ligula.co.uk','.'),(15,'Hunter','Rodriquez','ridiculus.mus.Donec@est.co.uk','.'),(16,'Zahir','Harper','vel@estNunc.com','.'),(17,'Sopoline','Warner','vestibulum.nec.euismod@sitamet.co.uk','.'),(18,'Burton','Parrish','consequat.nec.mollis@nequenonquam.org','.'),(19,'Abbot','Rose','non@et.ca','.'),(20,'Barry','Burks','risus@libero.net','.');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fooditems`
--

DROP TABLE IF EXISTS `fooditems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fooditems` (
  `itemID` int unsigned NOT NULL AUTO_INCREMENT,
  `pizza` varchar(15) NOT NULL,
  `description` text,
  `pizzatype` char(1) DEFAULT 'S',
  `price` float NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fooditems`
--

LOCK TABLES `fooditems` WRITE;
/*!40000 ALTER TABLE `fooditems` DISABLE KEYS */;
INSERT INTO `fooditems` VALUES (1,'PIZZA 1','Lorem ipsum dolor sit amet, consec. Integer aliquam adipiscing','S',10),(2,'PIZZA 2','Lorem ipsum dolor sit amet, consectetuer','S',10),(3,'PIZZA 3','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur','S',6),(4,'PIZZA 4','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam','S',6),(5,'PIZZA 5','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.','S',8),(6,'PIZZA 6','Lorem ipsum dolor sit amet, consectetuer adipiscing','S',7),(7,'PIZZA 7','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.','S',8),(8,'PIZZA 8','Lorem ipsum dolor sit amet,','S',9),(9,'PIZZA 9','Lorem ipsum dolor sit','V',9),(10,'PIZZA 10','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer','V',6),(11,'PIZZA 11','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur','V',6),(12,'PIZZA 12','Lorem','V',7);
/*!40000 ALTER TABLE `fooditems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderlines`
--

DROP TABLE IF EXISTS `orderlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderlines` (
  `orderlineID` int unsigned NOT NULL AUTO_INCREMENT,
  `orderID` int unsigned NOT NULL,
  `itemID` int unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `createtime` timestamp NOT NULL,
  PRIMARY KEY (`orderlineID`),
  KEY `orderID_idx` (`orderID`),
  KEY `itemID_idx` (`itemID`),
  CONSTRAINT `itemID` FOREIGN KEY (`itemID`) REFERENCES `fooditems` (`itemID`),
  CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderlines`
--

LOCK TABLES `orderlines` WRITE;
/*!40000 ALTER TABLE `orderlines` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderlines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderID` int unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int unsigned NOT NULL,
  `deliverytype` varchar(1) NOT NULL DEFAULT 'P',
  `createtime` timestamp NOT NULL,
  `deliverytime` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `customerID_idx` (`customerID`),
  CONSTRAINT `customerID` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-03 18:22:03
