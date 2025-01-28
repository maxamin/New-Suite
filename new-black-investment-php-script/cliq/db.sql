-- MariaDB dump 10.19  Distrib 10.11.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sell
-- ------------------------------------------------------
-- Server version	10.11.3-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `db_bonus`
--

DROP TABLE IF EXISTS `db_bonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT 0,
  `login` varchar(80) NOT NULL,
  `sum` float(10,2) NOT NULL,
  `add` int(11) NOT NULL DEFAULT 0,
  `del` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_bonus`
--

LOCK TABLES `db_bonus` WRITE;
/*!40000 ALTER TABLE `db_bonus` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_bonus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_conf`
--

DROP TABLE IF EXISTS `db_conf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coint` int(11) NOT NULL,
  `bounty` int(11) NOT NULL,
  `p_sell` int(11) NOT NULL,
  `p_swap` int(11) NOT NULL,
  `min_s` float(10,2) NOT NULL,
  `acc_pay` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_conf`
--

LOCK TABLES `db_conf` WRITE;
/*!40000 ALTER TABLE `db_conf` DISABLE KEYS */;
INSERT INTO `db_conf` VALUES
(1,1,100,100,1,0.10,20);
/*!40000 ALTER TABLE `db_conf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_insert`
--

DROP TABLE IF EXISTS `db_insert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_insert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `login` varchar(85) NOT NULL DEFAULT '',
  `sum` float(10,2) NOT NULL,
  `sum_x` float(10,2) NOT NULL DEFAULT 0.00,
  `sys` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `add` int(11) NOT NULL DEFAULT 0,
  `end` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_insert`
--

LOCK TABLES `db_insert` WRITE;
/*!40000 ALTER TABLE `db_insert` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_insert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_news`
--

DROP TABLE IF EXISTS `db_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `cat` int(11) NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL DEFAULT 0,
  `add` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_news`
--

LOCK TABLES `db_news` WRITE;
/*!40000 ALTER TABLE `db_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_payout`
--

DROP TABLE IF EXISTS `db_payout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_payout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `login` varchar(80) NOT NULL,
  `sum` double NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `sys` int(11) NOT NULL,
  `psys` int(11) NOT NULL DEFAULT 0,
  `add` int(11) NOT NULL DEFAULT 0,
  `del` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_payout`
--

LOCK TABLES `db_payout` WRITE;
/*!40000 ALTER TABLE `db_payout` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_payout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_percent`
--

DROP TABLE IF EXISTS `db_percent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_percent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `sum_a` float(10,2) NOT NULL,
  `sum_b` float(10,2) NOT NULL,
  `sum_x` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_percent`
--

LOCK TABLES `db_percent` WRITE;
/*!40000 ALTER TABLE `db_percent` DISABLE KEYS */;
INSERT INTO `db_percent` VALUES
(1,1,0.00,9.99,0.00),
(2,1,10.00,49.99,0.10),
(3,1,50.00,99.99,0.15),
(4,1,100.00,499.99,0.20),
(5,1,500.00,99999.00,0.30);
/*!40000 ALTER TABLE `db_percent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_stats`
--

DROP TABLE IF EXISTS `db_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users` int(11) NOT NULL DEFAULT 0,
  `inserts` float(10,2) NOT NULL DEFAULT 0.00,
  `payments` float(10,2) NOT NULL DEFAULT 0.00,
  `views` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_stats`
--

LOCK TABLES `db_stats` WRITE;
/*!40000 ALTER TABLE `db_stats` DISABLE KEYS */;
INSERT INTO `db_stats` VALUES
(1,0,0.00,0.00,0);
/*!40000 ALTER TABLE `db_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_store`
--

DROP TABLE IF EXISTS `db_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `tarif` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `speed` decimal(10,6) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `add` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `last` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_store`
--

LOCK TABLES `db_store` WRITE;
/*!40000 ALTER TABLE `db_store` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_surf`
--

DROP TABLE IF EXISTS `db_surf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_surf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `url` varchar(255) NOT NULL,
  `country` varchar(555) NOT NULL DEFAULT 'XX|',
  `crev` int(11) NOT NULL DEFAULT 0,
  `price_click` float(10,6) NOT NULL,
  `per_click` float(10,6) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `balance` float(10,6) NOT NULL DEFAULT 0.000000,
  `timer` int(11) NOT NULL DEFAULT 10,
  `reply` int(11) NOT NULL DEFAULT 24,
  `wind` int(11) NOT NULL DEFAULT 0,
  `vip` int(11) NOT NULL DEFAULT 0,
  `date_add` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_surf`
--

LOCK TABLES `db_surf` WRITE;
/*!40000 ALTER TABLE `db_surf` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_surf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_surf_config`
--

DROP TABLE IF EXISTS `db_surf_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_surf_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timer` int(11) NOT NULL,
  `price_click` float(10,6) NOT NULL,
  `per_click` float(10,6) NOT NULL,
  `timer_pay` float(10,6) NOT NULL,
  `wind` float(10,6) NOT NULL,
  `vip` float(10,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_surf_config`
--

LOCK TABLES `db_surf_config` WRITE;
/*!40000 ALTER TABLE `db_surf_config` DISABLE KEYS */;
INSERT INTO `db_surf_config` VALUES
(1,10,0.005000,0.010000,0.005000,0.000000,0.005000);
/*!40000 ALTER TABLE `db_surf_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_surf_views`
--

DROP TABLE IF EXISTS `db_surf_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_surf_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `link` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_surf_views`
--

LOCK TABLES `db_surf_views` WRITE;
/*!40000 ALTER TABLE `db_surf_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_surf_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_tarif`
--

DROP TABLE IF EXISTS `db_tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `img` int(11) NOT NULL,
  `speed` decimal(10,6) NOT NULL,
  `profit_speed` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_tarif`
--

LOCK TABLES `db_tarif` WRITE;
/*!40000 ALTER TABLE `db_tarif` DISABLE KEYS */;
INSERT INTO `db_tarif` VALUES
(1,'Mining #1',1,2.500000,1.500000,10),
(2,'Mining #2',2,3.000000,1.700000,50),
(3,'Mining #3',3,3.500000,2.000000,100),
(4,'Mining #4',4,4.000000,2.200000,250),
(5,'Mining #5',5,4.500000,2.500000,500),
(6,'Mining #6',6,5.000000,3.000000,1000);
/*!40000 ALTER TABLE `db_tarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_uips`
--

DROP TABLE IF EXISTS `db_uips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_uips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(125) NOT NULL DEFAULT '',
  `ip2` varchar(125) NOT NULL DEFAULT '',
  `country` varchar(2) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_uips`
--

LOCK TABLES `db_uips` WRITE;
/*!40000 ALTER TABLE `db_uips` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_uips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_users`
--

DROP TABLE IF EXISTS `db_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(90) NOT NULL DEFAULT '0',
  `reg` int(11) NOT NULL DEFAULT 0,
  `auth` int(11) NOT NULL DEFAULT 0,
  `ban` int(11) NOT NULL DEFAULT 0,
  `hold` float(10,6) NOT NULL DEFAULT 0.000000,
  `money_p` float(10,6) NOT NULL DEFAULT 0.000000,
  `sum_in` float(10,2) NOT NULL DEFAULT 0.00,
  `sum_out` float(10,2) NOT NULL DEFAULT 0.00,
  `surf_view` int(11) NOT NULL DEFAULT 0,
  `surf_earn` float(10,6) NOT NULL DEFAULT 0.000000,
  `earn_bonus` float(10,2) NOT NULL DEFAULT 0.00,
  `speed` decimal(50,6) NOT NULL DEFAULT 0.000000,
  `bank` decimal(50,4) NOT NULL DEFAULT 0.0000,
  `bankin` float(10,4) NOT NULL DEFAULT 0.0000,
  `bankout` float(10,4) NOT NULL DEFAULT 0.0000,
  `last` int(11) NOT NULL DEFAULT 0,
  `refsite` varchar(255) NOT NULL DEFAULT '0',
  `referer` varchar(80) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT 0,
  `refs` int(11) NOT NULL DEFAULT 0,
  `income` float(10,6) NOT NULL DEFAULT 0.000000,
  `ref_views` int(11) NOT NULL DEFAULT 0,
  `ref_to` float(10,6) NOT NULL DEFAULT 0.000000,
  `ref_ok` int(11) NOT NULL DEFAULT 0,
  `freebet` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`),
  KEY `ref_to` (`ref_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_users`
--

LOCK TABLES `db_users` WRITE;
/*!40000 ALTER TABLE `db_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-01 20:10:43
