-- MySQL dump 10.13  Distrib 5.7.30, for Win64 (x86_64)
--
-- Host: sg2nlmysql51plsk.secureserver.net    Database: prod_vatzapp
-- ------------------------------------------------------
-- Server version	5.5.51-38.1-log

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `region_id` bigint(20) unsigned DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `salary` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_user_id_foreign` (`user_id`),
  KEY `admins_country_id_foreign` (`country_id`),
  KEY `admins_region_id_foreign` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,1,NULL,'876543','Edappally','Kochi',1,1,'+971','9999900000','2021-09-07 16:45:45',10000.00,'2021-09-07 16:45:45','2021-09-19 22:17:52',NULL),(2,2,NULL,'654321','Kakkanad','Ernakulam',2,NULL,'+91','7766554433','2021-09-07 01:30:00',1000.00,'2021-09-07 16:49:56','2021-09-19 22:12:48',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkers`
--

DROP TABLE IF EXISTS `checkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `validator_user_id` bigint(20) unsigned DEFAULT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `region_id` bigint(20) unsigned DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `salary` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `checkers_user_id_foreign` (`user_id`),
  KEY `checkers_validator_user_id_foreign` (`validator_user_id`),
  KEY `checkers_country_id_foreign` (`country_id`),
  KEY `checkers_region_id_foreign` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkers`
--

LOCK TABLES `checkers` WRITE;
/*!40000 ALTER TABLE `checkers` DISABLE KEYS */;
INSERT INTO `checkers` VALUES (1,4,3,NULL,'string','string','string',1,NULL,'+971','9876543210','2021-09-22 19:11:40',100.00,'2021-09-07 16:51:23','2021-09-26 05:09:28',NULL),(2,9,8,NULL,'POB','Place','MUSAFFAH',4,NULL,'+973','05228234192','2021-08-31 03:00:00',1000.00,'2021-09-12 01:44:21','2021-09-22 19:23:50',NULL),(3,10,8,NULL,'po','place','string',1,NULL,'+971','777777777','2021-09-18 20:41:55',1500.00,'2021-09-18 20:44:41','2021-09-22 19:29:16',NULL),(4,12,13,NULL,'POB','PCM','Thrissur',2,NULL,'+91',NULL,'2021-09-24 03:00:00',7000.00,'2021-09-25 19:34:20','2021-09-25 19:36:22',NULL),(5,18,19,NULL,'341223','Dubai','DUBAI',1,NULL,'+971','555','2021-10-05 03:00:00',1000.00,'2021-10-17 12:49:58','2021-10-17 13:32:58',NULL),(6,30,32,NULL,'125465','dubai','Dubai',1,NULL,'+971','5531445121','2021-10-22 03:00:00',2500.00,'2021-10-22 20:08:31','2021-10-22 20:46:46',NULL),(7,42,41,NULL,'37473','POIU','Dubai',1,NULL,'+971','568688665','2021-11-29 01:30:00',65000.00,'2021-11-29 14:39:14','2021-11-29 14:39:14',NULL),(8,45,8,NULL,'ertert','Address','Palakkad',1,NULL,'+971','12345678901','2021-12-12 07:00:00',10000.00,'2021-12-14 01:09:17','2021-12-14 01:09:17',NULL);
/*!40000 ALTER TABLE `checkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `region_id` bigint(20) unsigned DEFAULT NULL,
  `trade_license_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_license_image_id` bigint(20) unsigned DEFAULT NULL,
  `trn_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fta_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fta_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_on` timestamp NULL DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tran_certificate_id` bigint(20) unsigned DEFAULT NULL,
  `checker_user_id` bigint(20) unsigned DEFAULT NULL,
  `vat_period` int(11) DEFAULT NULL,
  `vat_percentage` double(8,2) DEFAULT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` timestamp NULL DEFAULT NULL,
  `to` timestamp NULL DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `payment_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `payment_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `start_month` int(11) NOT NULL DEFAULT '0',
  `start_year` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `clients_user_id_foreign` (`user_id`),
  KEY `clients_checker_user_id_foreign` (`checker_user_id`),
  KEY `clients_country_id_foreign` (`country_id`),
  KEY `clients_region_id_foreign` (`region_id`),
  KEY `clients_trade_license_image_id_foreign` (`trade_license_image_id`),
  KEY `clients_tran_certificate_id_foreign` (`tran_certificate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,5,'Trinity','682030','Kakkanad','Kochi',1,2,'KTR228809',28,'TRN451296','marvel@vatzapp.com','12345678','2021-09-07 07:00:00','+971','7766554431','+971','9090878765','Jane Doe','+971','9888776715',29,4,3,5.00,'Diamond',NULL,'2021-09-07 01:30:00','2021-10-07 01:30:00','Bank','2021-09-07 01:30:00',2000.00,'AED','2021-09-07 16:58:04','2021-09-25 22:06:04',NULL,1,2021),(2,7,'Bldg',NULL,'Place','MUSAFFAH',1,1,'234234234',NULL,'234234234',NULL,NULL,'2021-09-11 07:00:00','+971',NULL,'+971','0522823419','Madhu Menon Mathilakath','+971','522823419',NULL,9,1,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-09-12 01:38:31','2021-09-12 01:44:50',NULL,0,0),(3,11,'Bldg A1',NULL,NULL,NULL,1,1,'123123123123132',NULL,'345345345345',NULL,NULL,'2021-09-25 07:00:00','+971',NULL,'+971',NULL,'A1 Contact','+971','522862233',NULL,9,1,5.00,'Silver','wer','2021-09-24 03:00:00','2021-09-30 03:00:00','Cash','2021-09-25 03:00:00',500.00,'AED','2021-09-25 19:29:38','2021-11-08 23:01:51',NULL,6,2021),(4,14,'Bldg B1','PO',NULL,'B1 City',1,3,'2345234234',40,'ert56456456456',NULL,NULL,'2021-09-25 07:00:00','+971','4564646','+971','456456456','B1 Madhu','+971','56456456',NULL,9,3,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-09-25 20:00:40','2021-09-25 20:07:27',NULL,7,2021),(5,15,'Bldg C1','C1 Po Box','C1 Street','C1 City',1,6,'46456456456',43,'56456456',NULL,NULL,'2021-09-25 07:00:00','+971','456456','+971','456456','C1 Madhu','+971','345345',44,9,6,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-09-25 20:02:05','2021-09-25 20:40:54',NULL,1,2021),(6,16,'Bldg D1','D1 Po Box','D1 Street','D1 City',1,6,'3453245345345',48,'564564564',NULL,NULL,'2021-09-25 07:00:00','+971','345345345','+971','345345345','D1 Madhu','+971','567567',47,12,3,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-09-25 20:03:51','2021-09-25 20:10:15',NULL,8,2021),(7,17,'BACK','DDD','Mann','Lkkk',1,2,'433',NULL,'100011',NULL,NULL,'2021-10-17 07:00:00','+971','5555','+971','5555','jjja','+971','555',NULL,18,3,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-10-17 12:37:15','2021-10-17 12:53:03',NULL,3,2021),(8,20,'Bldg','PO','Place','MUSAFFAH',1,1,'3434',73,'324e34',NULL,NULL,NULL,'+971',NULL,'+971','0522823419','Madhu Menon Mathilakath','+971','4545445',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-10-20 13:23:54','2021-10-20 13:23:54',NULL,0,0),(9,21,'Bldg','PO','Place','MUSAFFAH',1,1,'4535345',79,'345345345',NULL,NULL,'2021-10-25 07:00:00','+971','654654654000122','+971','0522823419','Madhu Menon Mathilakath','+971','78678678',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-10-20 13:25:38','2021-10-25 14:52:14',NULL,0,0),(13,25,'POIU','465747','MNB','Dubai',1,2,'353453453453453',NULL,'34534534534534534','sujith.xtreama@gmail.com','Welcome1','2021-10-20 07:00:00','+971','7777666603','+971','7777666602','Kiran','+971','7777666604',NULL,12,1,5.00,'Silver','VAT343222','2021-12-01 01:30:00','2021-12-31 01:30:00','Free','2021-12-01 01:30:00',0.00,'AED','2021-10-21 00:43:04','2021-12-02 00:33:39',NULL,1,2021),(14,26,'Bldg','PO','PSN','City',1,1,'ertert',115,'dgdfgdfg',NULL,NULL,'2021-10-21 07:00:00','+971','56456456','+971','456456456','Validator Menon M','+971','456456456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-10-21 12:25:16','2021-10-21 12:27:01',NULL,0,0),(15,27,'Mosque buidling','854124','Muweilah','RIYAD',1,4,'1478478542',NULL,'1234566',NULL,NULL,'2021-10-22 07:00:00','+971','553714038','+971','48122550','Abdul Azeez','+971','553714038',NULL,30,3,5.00,'Silver',NULL,'2021-12-10 03:00:00','2022-01-31 03:00:00','Cash','2021-12-10 03:00:00',500.00,'AED','2021-10-22 16:23:48','2021-12-11 22:18:33',NULL,10,2021),(16,28,'Karama','785475',NULL,'Dubai',1,2,'147847854278',NULL,'78745212',NULL,NULL,'2021-10-22 07:00:00','+971','553714038','+971','553714038','Azeez','+971','553714038',NULL,30,3,5.00,'Silver',NULL,'2021-10-22 03:00:00','2021-11-22 03:00:00','Cash','2021-10-22 03:00:00',500.00,'AED','2021-10-22 17:04:38','2021-10-22 20:28:20',NULL,10,2021),(17,29,'BACK','DDDD','PO BOX 341223','DUBAI',1,4,'sss',NULL,'2222',NULL,NULL,'2021-10-22 07:00:00','+971','222','+971','555599706','rahul','+971','555599706',NULL,18,3,5.00,'Silver',NULL,'2021-10-22 03:00:00','2021-11-22 03:00:00','Cash','2021-10-22 03:00:00',500.00,'AED','2021-10-22 20:02:23','2021-10-22 20:06:10',NULL,10,2021),(18,31,'gfghfgh','342112','jjhjk','hghjg',1,2,'887',NULL,'tyutuy',NULL,NULL,'2021-10-22 07:00:00','+971','555599706','+971','555599706','jams','+971','555599706',NULL,30,3,5.00,'Silver',NULL,'2021-10-22 03:00:00','2021-12-22 03:00:00','Cash','2021-10-22 03:00:00',500.00,'AED','2021-10-22 20:13:26','2021-10-22 21:44:35',NULL,10,2021),(19,33,'sdfsdf','sdfsdf','sdfsdf','sdfsdf',1,1,'356456',NULL,'dfgdfg',NULL,NULL,NULL,'+971','345345','+971','654654','Madhu Menon Mathilakath','+971','456456456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-10-25 13:56:56','2021-10-25 13:56:56',NULL,0,0),(20,35,'sdfsdf','sdfsdf','sdfsdf','sdfsdf',1,1,'sdfsdf345345345',NULL,'123456789012345',NULL,NULL,NULL,'+971','234234234','+971',NULL,'345345','+971','56456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-11-14 12:34:25','2021-11-14 12:34:25',NULL,0,0),(21,36,'Bldg','3112','Place','MUSAFFAH',1,1,'asdasdasd/-32323',NULL,'123456789012345',NULL,NULL,'2021-11-14 07:00:00','+971','654654','+971','52282341911','Madhu Menon Mathilakath','+971','1234',NULL,9,1,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-11-14 13:25:31','2021-11-14 13:42:05',NULL,11,2021),(22,37,'Bldg','PO','Place','MUSAFFAH',1,1,'234234234234234',NULL,'123456789012345',NULL,NULL,NULL,'+971','5454564654','+971','52282341922','Madhu Menon Mathilakath','+971','5454546',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-11-14 13:34:05','2021-11-14 13:34:05',NULL,0,0),(23,38,'EF Building','1234','Dubail','Dubai',1,2,'5678',NULL,'100291164000003',NULL,NULL,'2021-11-21 07:00:00','+971','505840326','+971','505840326','suhail','+971','505840326',NULL,30,3,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-11-21 17:18:58','2021-11-21 17:31:21',NULL,1,2021),(24,39,'Tcom','2541','Dubai','Dubai',1,2,'1478478548asa2',195,'111111111111111',NULL,NULL,'2021-11-22 07:00:00','+971','553714031','+971','553714031','Zia','+971','553714031',NULL,NULL,NULL,NULL,'Silver',NULL,'2021-11-22 03:00:00','2021-12-31 03:00:00','Cash','2021-11-22 03:00:00',500.00,'AED','2021-11-22 22:40:26','2021-11-22 22:42:00',NULL,0,0),(25,40,'Test building','364634','ABC Street','City name',1,2,'53534534543543534',206,'736475847364543','sujith.xtream@gmail.com','Welcome1','2021-11-29 07:00:00','+971','978786565','+971','987878765','Akhil','+971','909876273',207,42,1,5.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,'2021-11-29 14:35:09','2021-11-29 14:42:46',NULL,1,2021),(26,43,'Alain','8738','Alain','Al ain',1,3,'87777',NULL,'886889876541235',NULL,NULL,'2021-12-11 07:00:00','+971','87788666','+971','7887763','Hai','+971','8897',NULL,30,3,5.00,'Silver',NULL,'2021-12-10 03:00:00','2022-01-31 03:00:00','Cash','2021-12-10 03:00:00',500.00,'AED','2021-12-11 22:20:43','2021-12-11 22:23:54',NULL,10,2021);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'United Arab Emirates','+971','AED','2021-09-07 16:45:28','2021-09-07 16:45:28',NULL),(2,'India','+91','INR','2021-09-07 16:45:28','2021-09-07 16:45:28',NULL),(3,'Saudi Arabia','+966','SAR','2021-09-07 16:45:28','2021-09-07 16:45:28',NULL),(4,'Bahrain','+973','BD','2021-09-07 16:45:29','2021-09-07 16:45:29',NULL),(5,'Qatar','+974','QR','2021-09-07 16:45:29','2021-09-07 16:45:29',NULL),(6,'Kuwait','+965','KWD','2021-09-07 16:45:29','2021-09-07 16:45:29',NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_user_id` bigint(20) unsigned NOT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `entry_status_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `entry_type` int(10) unsigned DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requested_for_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entries_client_user_id_foreign` (`client_user_id`),
  KEY `entries_file_id_foreign` (`file_id`),
  KEY `entries_entry_status_id_foreign` (`entry_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entries`
--

LOCK TABLES `entries` WRITE;
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
INSERT INTO `entries` VALUES (1,5,3,4,1,'Approved',0,'2021-09-07 17:01:04','2021-09-07 17:12:45',NULL),(2,5,4,4,3,'Approved',0,'2021-09-07 17:01:04','2021-09-07 17:27:08',NULL),(3,5,5,3,3,NULL,0,'2021-09-07 17:28:49','2021-09-11 07:47:40',NULL),(4,5,6,4,3,'Approved',0,'2021-09-07 17:28:49','2021-09-07 18:22:54',NULL),(5,5,7,4,2,'Approved',0,'2021-09-08 02:30:25','2021-09-11 19:52:41',NULL),(6,5,8,3,1,NULL,0,'2021-09-11 07:50:16','2021-09-11 07:51:43',NULL),(7,5,9,3,2,'Recheck this',0,'2021-09-11 17:55:21','2021-10-17 13:43:41',NULL),(8,5,10,4,2,'Approved',0,'2021-09-11 20:08:24','2021-09-15 04:01:28',NULL),(12,5,33,1,NULL,NULL,0,'2021-09-24 03:23:18','2021-09-24 03:23:18',NULL),(11,7,13,1,NULL,NULL,0,'2021-09-12 01:41:01','2021-09-12 01:41:01',NULL),(13,5,34,1,NULL,NULL,0,'2021-09-24 03:23:32','2021-09-24 03:23:32',NULL),(14,5,35,1,NULL,NULL,0,'2021-09-24 03:23:32','2021-09-24 03:23:32',NULL),(15,5,36,1,NULL,NULL,0,'2021-09-24 03:23:32','2021-09-24 03:23:32',NULL),(16,5,37,3,1,NULL,1,'2021-09-25 06:31:37','2021-09-26 05:35:52',NULL),(17,14,49,4,1,NULL,0,'2021-09-25 20:15:42','2021-09-27 00:32:57',NULL),(18,14,51,3,1,NULL,0,'2021-09-25 20:16:12','2021-09-25 20:35:58',NULL),(19,14,50,4,2,NULL,0,'2021-09-25 20:16:12','2021-09-25 20:43:49',NULL),(20,15,52,4,2,NULL,0,'2021-09-25 20:19:45','2021-09-25 20:43:44',NULL),(21,15,53,1,NULL,NULL,0,'2021-09-25 20:19:45','2021-09-25 20:19:45',NULL),(22,15,54,3,1,NULL,0,'2021-09-25 20:21:45','2021-09-25 20:42:35',NULL),(23,16,55,1,NULL,NULL,0,'2021-09-25 20:25:23','2021-09-25 20:25:23',NULL),(24,16,56,4,2,NULL,0,'2021-09-25 20:25:23','2021-09-25 20:44:26',NULL),(25,16,57,4,3,NULL,0,'2021-09-25 20:25:49','2021-09-25 20:44:33',NULL),(26,16,58,3,3,NULL,0,'2021-09-25 20:25:49','2021-09-25 20:39:12',NULL),(27,7,59,1,NULL,NULL,0,'2021-09-25 20:29:10','2021-09-25 20:29:10',NULL),(28,7,60,3,2,NULL,0,'2021-09-25 20:34:19','2021-11-16 21:33:36',NULL),(29,14,61,4,2,'Check again',0,'2021-09-27 00:21:48','2021-09-27 00:29:01',NULL),(30,15,63,4,1,NULL,0,'2021-10-05 16:38:24','2021-10-05 16:54:41',NULL),(31,15,64,4,2,NULL,0,'2021-10-05 16:58:14','2021-10-05 16:59:59',NULL),(32,15,65,1,NULL,NULL,0,'2021-10-05 17:02:15','2021-10-05 17:02:15',NULL),(33,15,66,3,1,NULL,0,'2021-10-05 17:02:30','2021-10-05 17:02:57',NULL),(34,17,67,4,2,NULL,0,'2021-10-17 13:09:13','2021-10-17 13:40:05',NULL),(35,17,68,4,3,NULL,0,'2021-10-17 13:19:57','2021-10-17 13:44:38',NULL),(37,17,69,4,2,'post dated',0,'2021-10-17 13:20:31','2021-10-17 13:44:54',NULL),(38,17,71,4,1,NULL,0,'2021-10-17 13:20:31','2021-10-17 13:40:22',NULL),(39,26,116,1,NULL,NULL,0,'2021-10-21 12:27:43','2021-10-21 12:27:43',NULL),(43,31,121,4,1,NULL,0,'2021-10-22 21:30:20','2021-10-22 22:30:41',NULL),(44,31,122,4,3,NULL,1,'2021-10-22 21:30:39','2021-10-22 23:04:05',NULL),(42,28,119,4,1,'please check the date',0,'2021-10-22 20:22:04','2021-10-22 21:34:01',NULL),(45,31,123,4,3,NULL,1,'2021-10-22 21:32:52','2021-10-22 23:04:19',NULL),(46,31,125,4,2,NULL,0,'2021-10-22 21:33:12','2021-10-22 21:55:27',NULL),(47,31,124,4,2,NULL,0,'2021-10-22 21:33:12','2021-10-22 23:04:39',NULL),(48,28,126,5,NULL,'no value',0,'2021-10-22 22:05:49','2021-10-22 22:09:00',NULL),(49,31,127,4,2,NULL,0,'2021-10-22 22:49:25','2021-10-22 22:55:05',NULL),(54,25,141,3,1,NULL,0,'2021-10-28 15:48:33','2021-10-28 16:06:19',NULL),(53,31,131,4,1,NULL,0,'2021-10-22 23:30:35','2021-10-22 23:32:55',NULL),(55,25,142,5,NULL,'Not correct entry',1,'2021-10-28 16:10:56','2021-10-28 16:18:48',NULL),(56,28,143,3,2,NULL,0,'2021-10-30 14:37:31','2021-10-30 14:41:04',NULL),(57,31,144,1,NULL,NULL,0,'2021-10-30 14:40:11','2021-10-30 14:40:11',NULL),(58,31,145,1,NULL,NULL,0,'2021-10-30 14:40:55','2021-10-30 14:40:55',NULL),(59,31,146,1,NULL,NULL,0,'2021-10-30 14:41:26','2021-10-30 14:41:26',NULL),(60,31,147,1,NULL,NULL,0,'2021-10-30 14:54:31','2021-10-30 14:54:31',NULL),(61,31,148,1,NULL,NULL,0,'2021-10-30 14:56:33','2021-10-30 14:56:33',NULL),(62,31,149,3,2,NULL,0,'2021-10-30 15:01:14','2021-11-14 12:47:45',NULL),(63,31,150,1,NULL,NULL,0,'2021-10-30 15:01:14','2021-10-30 15:01:14',NULL),(64,31,151,1,NULL,NULL,0,'2021-10-30 15:01:14','2021-10-30 15:01:14',NULL),(65,31,152,3,1,NULL,0,'2021-10-30 15:01:14','2021-11-14 12:52:06',NULL),(66,31,153,4,1,'With comment',1,'2021-10-30 15:01:14','2021-10-30 17:00:52',NULL),(67,31,154,3,2,NULL,0,'2021-10-30 15:01:14','2021-11-14 12:49:47',NULL),(68,31,155,3,2,NULL,0,'2021-10-30 15:01:14','2021-11-14 12:48:09',NULL),(69,25,156,1,NULL,NULL,0,'2021-11-01 22:46:06','2021-11-01 22:46:06',NULL),(70,11,157,4,1,'This is correct',1,'2021-11-02 12:10:50','2021-11-02 12:12:38',NULL),(71,11,158,3,1,NULL,1,'2021-11-05 13:17:27','2021-11-05 13:20:33',NULL),(72,11,159,4,1,'No problem',1,'2021-11-08 23:03:12','2021-11-08 23:08:18',NULL),(73,11,160,3,1,NULL,0,'2021-11-14 12:45:21','2021-11-14 12:46:44',NULL),(74,11,161,4,1,'No problem',1,'2021-11-14 13:09:29','2021-11-14 13:10:59',NULL),(75,36,162,1,NULL,NULL,0,'2021-11-14 13:42:38','2021-11-14 13:42:38',NULL),(76,36,163,4,1,NULL,0,'2021-11-14 13:44:31','2021-11-14 13:46:33',NULL),(77,5,164,3,1,NULL,0,'2021-11-16 21:06:42','2021-11-16 21:13:00',NULL),(78,11,165,1,NULL,NULL,0,'2021-11-18 13:57:02','2021-11-18 13:57:02',NULL),(79,11,166,1,NULL,NULL,0,'2021-11-18 14:22:28','2021-11-18 14:22:28',NULL),(80,11,167,4,2,NULL,0,'2021-11-18 14:38:42','2021-12-02 00:36:37',NULL),(81,11,168,4,1,'Check Naming',0,'2021-11-18 14:44:51','2021-11-23 16:19:06',NULL),(82,38,173,4,1,NULL,0,'2021-11-21 17:35:18','2021-11-22 23:03:21',NULL),(83,38,174,4,2,NULL,0,'2021-11-21 17:35:18','2021-11-22 23:06:01',NULL),(84,28,175,1,NULL,NULL,0,'2021-11-21 17:36:38','2021-11-21 17:36:38',NULL),(85,31,176,1,NULL,NULL,0,'2021-11-22 21:58:02','2021-11-22 21:58:02',NULL),(86,28,177,4,1,NULL,0,'2021-11-22 22:04:44','2021-11-22 23:07:02',NULL),(87,31,178,1,NULL,NULL,0,'2021-11-22 22:06:35','2021-11-22 22:06:35',NULL),(88,31,179,1,NULL,NULL,0,'2021-11-22 22:06:35','2021-11-22 22:06:35',NULL),(89,31,180,1,NULL,NULL,0,'2021-11-22 22:06:35','2021-11-22 22:06:35',NULL),(90,31,181,1,NULL,NULL,0,'2021-11-22 22:06:35','2021-11-22 22:06:35',NULL),(91,31,182,1,NULL,NULL,0,'2021-11-22 22:11:09','2021-11-22 22:11:09',NULL),(92,31,183,1,NULL,NULL,0,'2021-11-22 22:11:09','2021-11-22 22:11:09',NULL),(93,31,184,1,NULL,NULL,0,'2021-11-22 22:11:09','2021-11-22 22:11:09',NULL),(94,31,185,1,NULL,NULL,0,'2021-11-22 22:11:09','2021-11-22 22:11:09',NULL),(95,31,186,1,NULL,NULL,0,'2021-11-22 22:11:09','2021-11-22 22:11:09',NULL),(96,31,187,1,NULL,NULL,0,'2021-11-22 22:11:09','2021-11-22 22:11:09',NULL),(97,31,188,1,NULL,NULL,0,'2021-11-22 22:11:10','2021-11-22 22:11:10',NULL),(98,31,189,1,NULL,NULL,0,'2021-11-22 22:18:48','2021-11-22 22:18:48',NULL),(99,31,190,1,NULL,NULL,0,'2021-11-22 22:22:37','2021-11-22 22:22:37',NULL),(100,28,191,1,NULL,NULL,0,'2021-11-22 22:36:31','2021-11-22 22:36:31',NULL),(101,31,196,1,NULL,NULL,0,'2021-11-22 23:06:40','2021-11-22 23:06:40',NULL),(102,11,197,4,1,NULL,0,'2021-11-27 12:00:25','2021-11-27 12:07:49',NULL),(103,5,198,1,NULL,NULL,0,'2021-11-28 14:27:18','2021-11-28 14:27:18',NULL),(104,11,199,4,1,NULL,0,'2021-11-29 12:37:08','2021-12-02 00:36:45',NULL),(105,11,200,3,1,NULL,0,'2021-11-29 12:37:08','2021-11-29 12:49:41',NULL),(106,38,201,1,NULL,NULL,0,'2021-11-29 12:44:54','2021-11-29 12:44:54',NULL),(107,11,202,3,2,NULL,0,'2021-11-29 12:45:23','2021-11-29 12:46:59',NULL),(108,38,203,1,NULL,NULL,0,'2021-11-29 12:45:39','2021-11-29 12:45:39',NULL),(111,40,210,4,1,NULL,0,'2021-11-29 14:47:13','2021-12-02 00:29:39',NULL),(110,40,209,1,NULL,NULL,0,'2021-11-29 14:46:08','2021-11-29 14:46:08',NULL),(112,25,211,4,1,'Approved',0,'2021-11-30 13:29:21','2021-12-02 00:29:08',NULL),(113,25,212,4,1,NULL,0,'2021-11-30 14:04:47','2021-12-02 00:29:51',NULL),(114,25,213,3,1,NULL,0,'2021-11-30 14:05:31','2021-11-30 14:11:13',NULL),(115,5,214,1,NULL,NULL,0,'2021-12-01 23:18:35','2021-12-01 23:18:35',NULL),(116,25,215,4,1,NULL,0,'2021-12-02 00:30:47','2021-12-02 00:32:00',NULL),(117,11,216,3,1,NULL,0,'2021-12-02 00:38:00','2021-12-02 00:38:55',NULL),(118,25,217,3,1,NULL,0,'2021-12-02 13:16:20','2021-12-02 13:17:29',NULL),(119,5,218,4,1,NULL,0,'2021-12-02 13:20:40','2021-12-02 13:23:07',NULL),(120,25,219,4,1,NULL,0,'2021-12-02 14:18:18','2021-12-02 14:20:41',NULL),(121,25,220,4,1,NULL,0,'2021-12-05 16:26:24','2021-12-05 16:32:28',NULL),(122,11,221,4,1,'sadasdasd',0,'2021-12-05 16:37:31','2022-01-03 14:14:23',NULL),(123,11,222,4,1,NULL,0,'2021-12-05 16:38:57','2021-12-05 16:44:03',NULL),(124,11,223,4,2,NULL,0,'2021-12-05 17:04:37','2021-12-06 13:22:17',NULL),(125,11,224,4,1,NULL,0,'2021-12-06 12:47:54','2021-12-06 12:52:39',NULL),(126,11,225,5,NULL,NULL,0,'2021-12-06 13:02:27','2021-12-06 13:04:07',NULL),(143,11,242,1,NULL,NULL,0,'2022-01-05 15:33:09','2022-01-05 15:33:09',NULL),(128,11,227,4,3,NULL,0,'2021-12-06 13:23:10','2021-12-06 13:24:07',NULL),(129,38,228,1,NULL,NULL,0,'2021-12-06 16:54:04','2021-12-06 16:54:04',NULL),(131,25,230,4,1,NULL,0,'2021-12-08 00:04:53','2021-12-08 00:15:31',NULL),(132,28,231,1,NULL,NULL,0,'2021-12-11 02:53:44','2021-12-11 02:53:44',NULL),(133,38,232,4,1,'approved',0,'2021-12-11 22:21:08','2021-12-11 23:27:49',NULL),(134,43,233,3,1,'Hh',1,'2021-12-11 22:25:00','2021-12-11 22:32:04',NULL),(135,43,234,4,1,'approved',0,'2021-12-11 22:34:18','2021-12-11 23:01:33',NULL),(136,43,235,1,NULL,NULL,0,'2021-12-11 22:34:56','2021-12-11 22:34:56',NULL),(137,43,236,1,NULL,NULL,0,'2021-12-11 22:35:17','2021-12-11 22:35:17',NULL),(138,31,237,1,NULL,NULL,0,'2021-12-11 23:41:59','2021-12-11 23:41:59',NULL),(139,31,238,1,NULL,NULL,0,'2021-12-11 23:41:59','2021-12-11 23:41:59',NULL),(140,31,239,1,NULL,NULL,0,'2021-12-11 23:41:59','2021-12-11 23:41:59',NULL),(141,38,240,1,NULL,NULL,0,'2021-12-11 23:43:02','2021-12-11 23:43:02',NULL);
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entry_statuses`
--

DROP TABLE IF EXISTS `entry_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entry_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entry_statuses`
--

LOCK TABLES `entry_statuses` WRITE;
/*!40000 ALTER TABLE `entry_statuses` DISABLE KEYS */;
INSERT INTO `entry_statuses` VALUES (1,'Pending','Wiating for checker reponse','2021-09-07 16:45:45','2021-09-07 16:45:45'),(2,'In progress','Wiating for checker reponse','2021-09-07 16:45:45','2021-09-07 16:45:45'),(3,'In progress','Wiating for validator reponse','2021-09-07 16:45:45','2021-09-07 16:45:45'),(4,'Approved','Approved','2021-09-07 16:45:45','2021-09-07 16:45:45'),(5,'In progress','Validator rejected','2021-09-07 16:45:46','2021-09-07 16:45:46');
/*!40000 ALTER TABLE `entry_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenditures`
--

DROP TABLE IF EXISTS `expenditures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenditures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entry_id` bigint(20) unsigned NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_group_id` bigint(20) unsigned DEFAULT NULL,
  `invoice_sub_group_id` bigint(20) unsigned DEFAULT NULL,
  `invoice_item_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenditures_entry_id_foreign` (`entry_id`),
  KEY `expenditures_invoice_group_id_foreign` (`invoice_group_id`),
  KEY `expenditures_invoice_sub_group_id_foreign` (`invoice_sub_group_id`),
  KEY `expenditures_invoice_item_id_foreign` (`invoice_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenditures`
--

LOCK TABLES `expenditures` WRITE;
/*!40000 ALTER TABLE `expenditures` DISABLE KEYS */;
INSERT INTO `expenditures` VALUES (2,2,'2021-09-07 01:30:00',101.70,'Sidecar bar & grill','150001',5,10,29,'2021-09-07 17:26:25','2021-09-07 17:26:25',NULL),(3,4,'2021-09-07 01:30:00',1379.96,'Stuart Weitzman Bicester','150003',5,10,29,'2021-09-07 17:34:44','2021-09-07 17:34:44',NULL),(4,3,'2021-09-11 01:30:00',10.00,'Adventure Outdoor','150009',5,10,29,'2021-09-11 07:47:40','2021-09-11 07:47:40',NULL),(5,25,'2021-09-15 03:00:00',500.00,'ments','4w5345',5,11,30,'2021-09-25 20:38:56','2021-09-25 20:38:56',NULL),(6,26,'2021-08-30 03:00:00',250.00,'mmen','234234',6,12,34,'2021-09-25 20:39:12','2021-09-25 20:39:12',NULL),(7,35,'2021-10-20 23:00:00',500.00,'ff','255',5,11,31,'2021-10-17 13:27:29','2021-10-17 13:43:30',NULL),(8,45,'2021-10-01 03:00:00',1000.00,'staff1','005',5,10,27,'2021-10-22 22:03:04','2021-10-22 22:03:04',NULL),(9,44,'2021-08-30 03:00:00',105.00,'005','010',6,12,33,'2021-10-22 22:14:52','2021-10-22 22:14:52',NULL),(11,128,'2021-12-01 07:00:00',1.00,'232','Date 01122021',5,10,29,'2021-12-06 13:23:48','2021-12-06 13:23:48',NULL);
/*!40000 ALTER TABLE `expenditures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,NULL,'resources/F5kQ4f4NDqNUw6rtt03I4IcaMek2gQbwLlIVEQvJ.jpg','2021-09-07 16:58:03','2021-09-07 16:58:03',NULL),(2,NULL,'resources/OPKA63g2cmgxVGVXO5DAhUt7i9BkubF3yAfaftrj.webp','2021-09-07 16:58:03','2021-09-07 16:58:03',NULL),(3,NULL,'resources/g4imls3ihAlws2KqyyQYzYRjBWLaQgTBAAR77HNH.png','2021-09-07 17:01:03','2021-09-07 17:01:03',NULL),(4,NULL,'resources/RXTCeyAcNnVIHCJGzNG3mCAyEne8szgQeiPO0Hco.png','2021-09-07 17:01:03','2021-09-07 17:01:03',NULL),(5,NULL,'resources/SmSxAdjEP4JKDmQ2y1GS19G762jofrUl3TfmyW4C.png','2021-09-07 17:28:48','2021-09-07 17:28:48',NULL),(6,NULL,'resources/UlX2MjMhr0OBqNKCH2zj0X6ZePzXdaAEAR3IFyJF.jpg','2021-09-07 17:28:48','2021-09-07 17:28:48',NULL),(7,NULL,'resources/h9MPjcTvOS70Cau1VSjOOraH3rzNTKWrymCt1nMS.jpg','2021-09-08 02:30:23','2021-09-08 02:30:23',NULL),(8,NULL,'resources/k02mZvsWfOl24TokyiQmubhXdAaiKjzXLD7H7xfj.png','2021-09-11 07:50:15','2021-09-11 07:50:15',NULL),(9,NULL,'resources/jzeybghD5lzPXAWJciF8Oc2KVhN4gMx8KrgKuAtt.png','2021-09-11 17:55:18','2021-09-11 17:55:18',NULL),(10,NULL,'resources/W88h9Z58c5gKxJBXQFwA2EvFrpyN83WgjWiOjnlY.png','2021-09-11 20:08:23','2021-09-11 20:08:23',NULL),(11,NULL,'resources/hpGxvCCGDBjTT8B80gNIJtIAZCVzy2894a4kdCvT.webp','2021-09-11 21:12:18','2021-09-11 21:12:18',NULL),(12,NULL,'resources/Jo494IuDzMZxPkYvBOOllVcV8dhQWB3XdCeLoxti.jpg','2021-09-11 21:12:41','2021-09-11 21:12:41',NULL),(13,NULL,'resources/MVubF3MyDqHhawdb9JygSElZVNyFt9KPFkZcde9K.jpg','2021-09-12 01:40:58','2021-09-12 01:40:58',NULL),(14,NULL,'resources/KAxygn26skGWhhDMq81wYLp3GLZMIm5ms8CHFDuK.jpg','2021-09-19 04:55:47','2021-09-19 04:55:47',NULL),(15,NULL,'resources/0Hr2ddq3mVayZPTSVVnH3z2u6h30Yk9hwvWD3PMQ.jpg','2021-09-19 05:07:28','2021-09-19 05:07:28',NULL),(16,NULL,'resources/X30nGUbplCuUy5vS9lIG0fiqiAMfxpcGYRyxsxjj.jpg','2021-09-19 05:31:45','2021-09-19 05:31:45',NULL),(17,NULL,'resources/lVsoHtyms7UHVMe8ZGixs4jax40IxXpyug0K5wub.jpg','2021-09-19 05:59:39','2021-09-19 05:59:39',NULL),(18,NULL,'resources/5x9mFArp7o67cTUVDOIlPaCzUfLf9ZohW22Xmoow.jpg','2021-09-19 16:37:38','2021-09-19 16:37:38',NULL),(19,NULL,'resources/7vGVReqKX4nIVNS9HX7tQzR8hQDz9lFTP7DRoNXN.webp','2021-09-19 17:55:59','2021-09-19 17:55:59',NULL),(20,NULL,'resources/ANHdAB7NVsdnQ4oQI89kXBXLn780uhkfoH3Q25Al.webp','2021-09-19 22:13:06','2021-09-19 22:13:06',NULL),(21,NULL,'resources/A797P6rBnjLL0EW8KHoRRqG67bPcmPJwVdz98Rn9.jpg','2021-09-19 22:13:36','2021-09-19 22:13:36',NULL),(22,NULL,'resources/wwBOlWstlrfAFLWdwvoIUiPFBp4O777ovbXuB1yJ.jpg','2021-09-22 05:10:51','2021-09-22 05:10:51',NULL),(23,NULL,'resources/Dq6n2vGOXlxgbB3sebBporlZANPl9QdHbXfW22Dl.jpg','2021-09-22 05:10:58','2021-09-22 05:10:58',NULL),(24,NULL,'resources/OruATRF35wFYtJyVUkRDN5mPlleRz8K7g7ZVCVO1.jpg','2021-09-22 05:11:04','2021-09-22 05:11:04',NULL),(25,NULL,'resources/ian4cjzZPUOUlp3enUAW3LhieAntP8d58OA95sf4.jpg','2021-09-22 05:27:49','2021-09-22 05:27:49',NULL),(26,NULL,'resources/QG0aklsQdFQEAZgqK1renWqPR1WysxVry2sZyL7j.jpg','2021-09-22 05:27:50','2021-09-22 05:27:50',NULL),(27,NULL,'resources/eZVV3iE8yKF4HDw9acUjuPJnrc7RijLvlDepDhmE.jpg','2021-09-22 05:27:51','2021-09-22 05:27:51',NULL),(28,NULL,'resources/z9IvlgejHKWp05EQpiCosO0P6i9oDtAGTTfKicJA.jpg','2021-09-22 05:30:00','2021-09-22 05:30:00',NULL),(29,NULL,'resources/a0BEg5gI0qLBf7he3vWQyCMChRaAl2jY3F36lnii.jpg','2021-09-22 05:30:00','2021-09-22 05:30:00',NULL),(30,NULL,'resources/YlPnoc2hPL3uQSNktgDm96jPuTvEjuYWQ0uDjJdh.jpg','2021-09-22 05:30:01','2021-09-22 05:30:01',NULL),(31,NULL,'resources/qzEnUtngCdqlyUKvqlXdhFiI7OEhBu55lMU6Dpf3.webp','2021-09-22 05:31:55','2021-09-22 05:31:55',NULL),(32,NULL,'resources/PFIW2VKiSxcFhRGciYlMGYlnfLQY7Fm7nCyq4mvv.png','2021-09-23 20:28:10','2021-09-23 20:28:10',NULL),(33,NULL,'resources/bOChnr97g1X5Rv9k8fYNvHgJGgKWKdhiKo7bfbUz.png','2021-09-24 03:23:16','2021-09-24 03:23:16',NULL),(34,NULL,'resources/HROgQQhEVWwpKWO7TWsnR9yEf4GYjFf1lW9ll466.png','2021-09-24 03:23:30','2021-09-24 03:23:30',NULL),(35,NULL,'resources/dI4RuyAU8kqD2hwuTbM7MvSJ1in4YoTAJ6GN4AxB.png','2021-09-24 03:23:30','2021-09-24 03:23:30',NULL),(36,NULL,'resources/SaVjSLpyg25mkKD0EopOn3ZPNGIFQf3c7BtdCkHb.png','2021-09-24 03:23:31','2021-09-24 03:23:31',NULL),(37,NULL,'resources/R2GtC5HSQehguAaFrj4sxKYSLfGBR844nDrSB6I3.pdf','2021-09-25 06:31:35','2021-09-25 06:31:35',NULL),(38,NULL,'resources/xDTJy7Dp1LdMrrOOIp6pTpddcZKWSIA8SUchT5GB.jpg','2021-09-25 16:00:12','2021-09-25 16:00:12',NULL),(39,NULL,'resources/fePEug2KYePr0QZ4nhGPvkX3fX9mo1MhDLSOkvcC.pdf','2021-09-25 20:00:38','2021-09-25 20:00:38',NULL),(40,NULL,'resources/Br0Phd4huLgNT01O7B319Vw4rNWMhMiNE0WwfzLQ.pdf','2021-09-25 20:00:38','2021-09-25 20:00:38',NULL),(41,NULL,'resources/PmfvM72AZxLiOUoyuith397BScSeHYIFl00PHi13.pdf','2021-09-25 20:02:03','2021-09-25 20:02:03',NULL),(42,NULL,'resources/GEQJhlF2G4wMXyQAJvnC5Tbuzrz73CVaSqfIeWi4.pdf','2021-09-25 20:02:04','2021-09-25 20:02:04',NULL),(43,NULL,'resources/Ye7CzcIRV7jueKlGH6ZqIXkKvoZ2Git3aMcBqwGb.pdf','2021-09-25 20:02:04','2021-09-25 20:02:04',NULL),(44,NULL,'resources/1DEV4LVlktW1wohaMOdfMIazLQvDphvWAt70S8qY.pdf','2021-09-25 20:02:04','2021-09-25 20:02:04',NULL),(45,NULL,'resources/MVYOvye99sTN3y4A9HArNAEp9empCS60EsLshfPi.pdf','2021-09-25 20:03:50','2021-09-25 20:03:50',NULL),(46,NULL,'resources/utwwXdvEW0ieKVUl6Y74qGJHsWhFOdhU9jfNer0n.pdf','2021-09-25 20:03:50','2021-09-25 20:03:50',NULL),(47,NULL,'resources/BXuXN14tGninPmgSt4G9WGvH3RdFawBIiHPUXQHh.pdf','2021-09-25 20:03:51','2021-09-25 20:03:51',NULL),(48,NULL,'resources/iIDxjTRgOuYvd2OyQ2XJZSmDFmJXg0Madn0i7VX0.pdf','2021-09-25 20:03:51','2021-09-25 20:03:51',NULL),(49,NULL,'resources/kVMm4EPgkHanlcP5mJwVRxlrVJryxtKBTufmXgzX.png','2021-09-25 20:15:41','2021-09-25 20:15:41',NULL),(50,NULL,'resources/rw1hEqJg3vdcxT8jlLcAi495uM3DM8yhCC4zAfFS.png','2021-09-25 20:16:11','2021-09-25 20:16:11',NULL),(51,NULL,'resources/AFKFahrYFDlgQ4sfQsPS6Ucr31oBmd0DXzZsoN0Z.png','2021-09-25 20:16:11','2021-09-25 20:16:11',NULL),(52,NULL,'resources/aKBn1v5VfpjH2xzijlWbQFbWIfyFwEvePdladzBn.png','2021-09-25 20:19:43','2021-09-25 20:19:43',NULL),(53,NULL,'resources/eUconG7CbXzvCA6UqFuS35bGHL3DcrpsSAg9gNdk.jpg','2021-09-25 20:19:43','2021-09-25 20:19:43',NULL),(54,NULL,'resources/QLsXDsM0fegmYfytUIMyOLCGx6QI1bucxnpjmyLS.jpg','2021-09-25 20:21:44','2021-09-25 20:21:44',NULL),(55,NULL,'resources/zwgj5i7MwFRWdO2CdGwQEdNOqf9mc4nvCyUAYKjG.jpg','2021-09-25 20:25:21','2021-09-25 20:25:21',NULL),(56,NULL,'resources/w1BRIHoTdooBD6ZW4gwjGfnQ0vZMjiJRfKegsOXg.jpg','2021-09-25 20:25:21','2021-09-25 20:25:21',NULL),(57,NULL,'resources/UAWQdCTQdQ1qtIHX3pEJJy7WY9VfawxMnOurqyFY.jpg','2021-09-25 20:25:47','2021-09-25 20:25:47',NULL),(58,NULL,'resources/cnanV8je06QAl2TEcX5HUJQkOIJfgS9y8naoqXuz.jpg','2021-09-25 20:25:47','2021-09-25 20:25:47',NULL),(59,NULL,'resources/tKGh5IC2GmeQCbMINdBYz2jz0kZKimWUPMZnEsNr.png','2021-09-25 20:29:08','2021-09-25 20:29:08',NULL),(60,NULL,'resources/HXKEhAnI27fJkXtyyXBJdSfZgbgtp1umksbfdQeI.png','2021-09-25 20:34:18','2021-09-25 20:34:18',NULL),(61,NULL,'resources/PgcR2xqCLlNuw0RgvdqNbuHpqSCyTr0t1X2vKS4x.png','2021-09-27 00:21:46','2021-09-27 00:21:46',NULL),(62,NULL,'resources/qaIcnCb4Xwn2zchtA1kBj23YrDcq2fmjnx0WpeP1.jpg','2021-09-29 21:31:58','2021-09-29 21:31:58',NULL),(63,NULL,'resources/AjlfuMEA6sT9nuaWuf59yMuAgSmdYP5AxJEnPh9U.jpg','2021-10-05 16:38:21','2021-10-05 16:38:21',NULL),(64,NULL,'resources/Y7wrWdRKWvLkUMpKbrF6Y7ovyeCFGFP6ql8LIed9.jpg','2021-10-05 16:58:12','2021-10-05 16:58:12',NULL),(65,NULL,'resources/qzyKIp3ZDmRnUdat9wYNSuMn3ZdgP3ymppI7maHc.jpg','2021-10-05 17:02:12','2021-10-05 17:02:12',NULL),(66,NULL,'resources/RXc92ltgqT0DfHBX3FNbX248fCTP1PjWH7zSSWj6.jpg','2021-10-05 17:02:27','2021-10-05 17:02:27',NULL),(67,NULL,'resources/7z61tnZA4jrvZvtxyvkvu0nMbi3EYGgUX9tbtSPt.png','2021-10-17 13:09:10','2021-10-17 13:09:10',NULL),(68,NULL,'resources/vJN8zFDpniYzoiBqsm9K4rXLbpnQzOkSMbYsr5Sk.pdf','2021-10-17 13:19:54','2021-10-17 13:19:54',NULL),(69,NULL,'resources/BXLSjbFA285AnfoEC8FNJgPOspVWwMKHQoA1GYgs.pdf','2021-10-17 13:20:28','2021-10-17 13:20:28',NULL),(70,NULL,'resources/v0xkUyLHIBwXWe4t1EiKnShpqjway4awfNGtZDaN.pdf','2021-10-17 13:20:28','2021-10-17 13:20:28',NULL),(71,NULL,'resources/ZjSDU5XKkE887x5vfcMlRRDxVx0JbvnWuHAZbkMB.pdf','2021-10-17 13:20:28','2021-10-17 13:20:28',NULL),(72,NULL,'resources/K2xKywT9tNHXZFK3dzMsBWKdqFRiLvN13HdfO5A9.png','2021-10-20 13:23:50','2021-10-20 13:23:50',NULL),(73,NULL,'resources/1q98bjOTtEdRHHH9D7BARghtaDRoCgufkWaoFMmH.png','2021-10-20 13:23:52','2021-10-20 13:23:52',NULL),(74,NULL,'resources/Iy4az2EBgYzoaLJ0aAMw47iPUZ84ZfX5MaG37ILP.png','2021-10-20 13:25:06','2021-10-20 13:25:06',NULL),(75,NULL,'resources/rQL3pL59hiAItC9mKskBUpu2X4rN7wqFycBzLWtZ.png','2021-10-20 13:25:06','2021-10-20 13:25:06',NULL),(76,NULL,'resources/sFrnovfc6gnA4Fiegh2auV7vkqkO7kKWbigXZDZv.png','2021-10-20 13:25:23','2021-10-20 13:25:23',NULL),(77,NULL,'resources/gPZLoh1h8QOmhM6IJNbRXPoE9UHAwvf99dN5Gpud.png','2021-10-20 13:25:23','2021-10-20 13:25:23',NULL),(78,NULL,'resources/qQFceX6pLANz5XuMFWELNsQzwntTNbGHJ06EKKfi.png','2021-10-20 13:25:37','2021-10-20 13:25:37',NULL),(79,NULL,'resources/4hbkUJvbDylAxx9FNVzzBtN4ftkqp1uaTsCKCvKK.png','2021-10-20 13:25:38','2021-10-20 13:25:38',NULL),(80,NULL,'resources/rbqa1dSjA2ERk63Yxa5gtpsL3wM6rUXWSuKSl2wq.pdf','2021-10-20 13:32:34','2021-10-20 13:32:34',NULL),(81,NULL,'resources/Ta8PSMplaVcRm2XJyYYnlQtpr6I0HJYFeCS56LFf.pdf','2021-10-20 13:32:36','2021-10-20 13:32:36',NULL),(82,NULL,'resources/yuMGgqxOMAtZ7zKwKFRgEBU7ZqsR0A29lfrgEIH2.pdf','2021-10-20 13:32:37','2021-10-20 13:32:37',NULL),(83,NULL,'resources/tEdIkNoAosMP0zsze6Ieco7JJAQRXrA5IsdGZIyU.pdf','2021-10-20 13:32:38','2021-10-20 13:32:38',NULL),(84,NULL,'resources/aJbQhHf4VChLnTRwlJpJaypFv2QVJN2Dfk4aUPo7.pdf','2021-10-20 13:32:55','2021-10-20 13:32:55',NULL),(85,NULL,'resources/AG39klzdRnmxJFvDuKrFuwhGq4yP7Hj6ydD21PJ8.pdf','2021-10-20 13:32:55','2021-10-20 13:32:55',NULL),(86,NULL,'resources/EOenwpS5VFvgcprk75Xfphpyq5ww5LRL8GsiQZ9W.pdf','2021-10-20 13:32:57','2021-10-20 13:32:57',NULL),(87,NULL,'resources/fcgvpOuFrRZmZiXdr2gzKRRhKT0uKHvQuMgN6yY4.pdf','2021-10-20 13:32:57','2021-10-20 13:32:57',NULL),(88,NULL,'resources/5T5Bx68fFaATNQ0nSX7Ur4xHmtrRKSktpBxH196R.pdf','2021-10-20 13:33:12','2021-10-20 13:33:12',NULL),(89,NULL,'resources/l3eqjAmCeBuWySEJTVVCMRdpltxuEL17jdNuVd2s.pdf','2021-10-20 13:33:13','2021-10-20 13:33:13',NULL),(90,NULL,'resources/ktmSD6QUkOIf5RRkxh6ourf66e4T3Jw4is083nkF.pdf','2021-10-20 13:33:15','2021-10-20 13:33:15',NULL),(91,NULL,'resources/x9rlUBUT6eYrQp7jxv9yPw2fAT6UxJSDnMPxSwla.pdf','2021-10-20 13:33:15','2021-10-20 13:33:15',NULL),(92,NULL,'resources/BAm5jqvarRrsK47zK0waHp84RyCDWOqGmzGCTEXp.pdf','2021-10-20 13:33:24','2021-10-20 13:33:24',NULL),(93,NULL,'resources/H7N8biwptcaFzOdhNoEXQ0nlXHiPeQJFAQD5Y5xd.pdf','2021-10-20 13:33:25','2021-10-20 13:33:25',NULL),(94,NULL,'resources/HFDUBmDkg4jUFwfifk6NFp5L617aOwn0YWt8TW6U.pdf','2021-10-20 13:33:26','2021-10-20 13:33:26',NULL),(95,NULL,'resources/AWiltQ0QliqyFsg1EVMSatL26CXww6pZBU7HpBE4.pdf','2021-10-20 13:33:26','2021-10-20 13:33:26',NULL),(96,NULL,'resources/ByvwUwbjZBOWRNggUN5MrH9J434rpBEZuvyRDeHB.pdf','2021-10-20 13:33:42','2021-10-20 13:33:42',NULL),(97,NULL,'resources/Ts7ccHQXRwhbRAwgv6OKzMLH8oXc8S5t0HWtQsCy.pdf','2021-10-20 13:33:43','2021-10-20 13:33:43',NULL),(98,NULL,'resources/kJyKaRFMEBNlVpM9yfhDjSqtroXZ2nO5TQpfrIAr.pdf','2021-10-20 13:33:45','2021-10-20 13:33:45',NULL),(99,NULL,'resources/AsxrCjCymPy8nCh8IwUTNkUc2urxa177YvDqy0C8.pdf','2021-10-20 13:33:45','2021-10-20 13:33:45',NULL),(100,NULL,'resources/DeSoaulQIFCFcr17kiKeZ280dSDn8fPbbHWZQMgl.pdf','2021-10-20 13:34:28','2021-10-20 13:34:28',NULL),(101,NULL,'resources/5mzFaa2cWMHae9nwL4Ek6ZHrjLXSqgqy8vtV8HHn.pdf','2021-10-20 13:34:28','2021-10-20 13:34:28',NULL),(102,NULL,'resources/qcntpYC9ydVnImRpqVq51Y0JHOvQkiuaVwsBH9d7.pdf','2021-10-20 13:34:30','2021-10-20 13:34:30',NULL),(103,NULL,'resources/XTztPygsQWIkqEJ132rO8ml3oSCU5OuREDR873TF.pdf','2021-10-20 13:34:30','2021-10-20 13:34:30',NULL),(104,NULL,'resources/Xn0Z8IhjZshXVqcKrtNXvqZVVGzq3aIu8kMQCADp.pdf','2021-10-20 13:34:46','2021-10-20 13:34:46',NULL),(105,NULL,'resources/bNqOvYwu9ZvP4FRNGasWCZkhIMZKgbpUw1ysy3Wp.pdf','2021-10-20 13:34:47','2021-10-20 13:34:47',NULL),(106,NULL,'resources/rDw4Ee6z7zqd1iBodCBIiNPQD35qjCvBFs04udBy.pdf','2021-10-20 13:34:47','2021-10-20 13:34:47',NULL),(107,NULL,'resources/lk8ZnnOqJAWGTfTSv63ixdnyPRDBany5O1yoTwxt.pdf','2021-10-20 13:34:47','2021-10-20 13:34:47',NULL),(108,NULL,'resources/QPANrhRPWgGB1uZK7eWxWEB8JQRhQYi4utLZ6vuG.pdf','2021-10-20 13:34:59','2021-10-20 13:34:59',NULL),(109,NULL,'resources/L6XuDEsVCvGlm4UbUHyAXHxXxUowGYPnOq2v8vaB.pdf','2021-10-20 13:35:00','2021-10-20 13:35:00',NULL),(110,NULL,'resources/GvexBnNmzoy7IA7ecSOGfFVecYBnnX1sXa5r0W0v.pdf','2021-10-20 13:35:01','2021-10-20 13:35:01',NULL),(111,NULL,'resources/BAuMGGZ5TtYDKmwbCAyDdO8vyGIhw1CFSA73LSZw.pdf','2021-10-20 13:35:01','2021-10-20 13:35:01',NULL),(112,NULL,'resources/cRMWdMxUckyzeaUzVrbVhqcG9B1B0BTg3sUAKkm4.png','2021-10-21 12:24:57','2021-10-21 12:24:57',NULL),(113,NULL,'resources/5tO2XjWEc8wMywcObGrVwZnNQfAeOqzTASqfTfc7.png','2021-10-21 12:24:57','2021-10-21 12:24:57',NULL),(114,NULL,'resources/BHW92uWVWhd4Ai5Pmo5ZXFmMPSl2TKB6wwNPKThb.png','2021-10-21 12:25:15','2021-10-21 12:25:15',NULL),(115,NULL,'resources/DkImSvySJe99pghlaMVSW8Xogvn04WOzRWdSa6rC.png','2021-10-21 12:25:15','2021-10-21 12:25:15',NULL),(116,NULL,'resources/yOvaXWIwa0Sy09552nFhYjtmq1MjI52lAxX5ImgY.jpg','2021-10-21 12:27:40','2021-10-21 12:27:40',NULL),(117,NULL,'resources/vpUh7U9e13cUVt6sluIBlfSooSuU0J1LiZzAsjxU.png','2021-10-22 17:09:45','2021-10-22 17:09:45',NULL),(118,NULL,'resources/VbbuOxWzKeh26F5JyVFcAqTevAFmKm9xGwsv7FC8.jpg','2021-10-22 17:16:01','2021-10-22 17:16:01',NULL),(119,NULL,'resources/J4YDvF9he75ExGZcoaD51IFS5Ro9r64zdlTc1m3u.jpg','2021-10-22 20:22:03','2021-10-22 20:22:03',NULL),(120,NULL,'resources/zMYsty5Lc822oPT9deGcyXDgL2hawGZD0g9UFA3p.jpg','2021-10-22 20:39:41','2021-10-22 20:39:41',NULL),(121,NULL,'resources/N6STgQRuMPdAfKkiLwpPJJZ9oVYjSmyvYE5u8Q8x.jpg','2021-10-22 21:30:19','2021-10-22 21:30:19',NULL),(122,NULL,'resources/PRKdGttyCNdRLCJVjqpgd8Ny0870YTTfGPWTZAI1.jpg','2021-10-22 21:30:38','2021-10-22 21:30:38',NULL),(123,NULL,'resources/pFuYy4M4tgbrC6dWuJYP19U1osfFW4awE5zrUDaO.jpg','2021-10-22 21:32:51','2021-10-22 21:32:51',NULL),(124,NULL,'resources/EiKiMI8tsa5ZfBfr1hlzHMntrqn1WmUPPZpCL32O.jpg','2021-10-22 21:33:11','2021-10-22 21:33:11',NULL),(125,NULL,'resources/A8qmGhYkiuPm4mMM5iJo8wnPWoUfypfFqbDKLS6N.jpg','2021-10-22 21:33:11','2021-10-22 21:33:11',NULL),(126,NULL,'resources/ISIYVkKnOgZNWpcPlwqnkeEof7UpBmH1pXWt0s0D.png','2021-10-22 22:05:47','2021-10-22 22:05:47',NULL),(127,NULL,'resources/yI3WGlNImpYq8Mp5Vsscwnc0s9DDoi2TaiP2ZxVB.png','2021-10-22 22:49:22','2021-10-22 22:49:22',NULL),(128,NULL,'resources/H7drC4naO6T2vt8C3ivM3OTAScKQynKbzcJmQDnM.jpg','2021-10-22 23:07:46','2021-10-22 23:07:46',NULL),(129,NULL,'resources/lvwyt0Xxr9k3ngMWG3W8hanD59xyqY986CD5P47d.jpg','2021-10-22 23:09:05','2021-10-22 23:09:05',NULL),(130,NULL,'resources/x1K3S7N20wFQpGlbQihxwBdCxeCMm7E1tJP1i3xI.jpg','2021-10-22 23:16:17','2021-10-22 23:16:17',NULL),(131,NULL,'resources/OVynW3qF02ES0FexZ1HYax1ArqM3tV9bR9IXOQIP.png','2021-10-22 23:30:33','2021-10-22 23:30:33',NULL),(132,NULL,'resources/TieVuvPUdsMBlUohSPzsrpbWYBykir6mQqPAyuqL.png','2021-10-24 02:54:35','2021-10-24 02:54:35',NULL),(133,NULL,'resources/awYh68q8TZ2eVz1TrhqoOTexv4h5yGS5tTLZO6dX.webp','2021-10-24 03:02:02','2021-10-24 03:02:02',NULL),(134,NULL,'resources/BzqesNe8Dpj6ZaBt87dbp3DgE0LWUkg6ht1U3rzY.jpg','2021-10-24 03:04:39','2021-10-24 03:04:39',NULL),(135,NULL,'resources/KlJ1pCCCkYsWtAjWVGFw6MfEyGW9XikOPEVDhJ1Z.webp','2021-10-24 03:12:27','2021-10-24 03:12:27',NULL),(136,NULL,'resources/2mXAWIyiJRY5yPsU9YeFVlMB3hibie1Xu40CfA3U.jpg','2021-10-24 03:21:10','2021-10-24 03:21:10',NULL),(137,NULL,'resources/YvpVss8wM3dTwFMIBOoKKPKL14qzMldus0eU5Utc.jpg','2021-10-27 17:42:26','2021-10-27 17:42:26',NULL),(138,NULL,'resources/zXvqpwkpt6Ky3rlXtl8VPDrwn66kHOABk2vxETtp.pdf','2021-10-27 17:42:28','2021-10-27 17:42:28',NULL),(139,NULL,'resources/Zs2JzB5KRTdGUkzExMCgZyCDUmF9wYky0WHg87Lt.jpg','2021-10-27 17:42:30','2021-10-27 17:42:30',NULL),(140,NULL,'resources/4FLYyiME6nL6rMrhIefokoNIw4xCtkXN1lsOHUWC.pdf','2021-10-27 17:42:32','2021-10-27 17:42:32',NULL),(141,NULL,'resources/mczwWyr7ESZwvAB3ZHZHUDRwoPWzM9uXj4mM6ZxG.pdf','2021-10-28 15:48:30','2021-10-28 15:48:30',NULL),(142,NULL,'resources/9ChIupIZUGRkEBosz3Js9kEWVJyh4EZovILaUItZ.pdf','2021-10-28 16:10:53','2021-10-28 16:10:53',NULL),(143,NULL,'resources/0Cbj2dpASYAWJUrgBRbyScg1Xuxn2EsKeBqjnoMd.jpg','2021-10-30 14:37:23','2021-10-30 14:37:23',NULL),(144,NULL,'resources/KkldFf9fa0rLo5cD2d4qlrrw0dQ8OanEVF815g48.png','2021-10-30 14:40:09','2021-10-30 14:40:09',NULL),(145,NULL,'resources/GTQ2RO3fCXBGl6sIZaxRaQRR6awBYUBmOdAoVdVM.png','2021-10-30 14:40:52','2021-10-30 14:40:52',NULL),(146,NULL,'resources/d5XeIk5H2K8B4tUW0xRZB0y4txprihDyhbNfblq3.png','2021-10-30 14:41:23','2021-10-30 14:41:23',NULL),(147,NULL,'resources/sLN3rijkwxIquXDwr3AhAEKdyMl3dsWxUggWHrVU.png','2021-10-30 14:54:28','2021-10-30 14:54:28',NULL),(148,NULL,'resources/tLeYWxc0XdJQqVBb11YEOF35GD3bWYcQzZs4B33a.jpg','2021-10-30 14:56:30','2021-10-30 14:56:30',NULL),(149,NULL,'resources/k54eZpu1TnNUI4Yo34fBbOxLy7ByLx8MzWaG4Ys2.jpg','2021-10-30 15:01:06','2021-10-30 15:01:06',NULL),(150,NULL,'resources/W2byCpMc56QFyDtk1gB5C2x7yw681kt1HGeDBiXd.jpg','2021-10-30 15:01:06','2021-10-30 15:01:06',NULL),(151,NULL,'resources/Q5i6VOhha6EnOlDdZ76y0iVrADm4x95VXQgjt0y6.jpg','2021-10-30 15:01:08','2021-10-30 15:01:08',NULL),(152,NULL,'resources/lbGAkWHBaDGXkYXRLAqQq99lTPxhUsplSoXVvGjf.jpg','2021-10-30 15:01:08','2021-10-30 15:01:08',NULL),(153,NULL,'resources/1syiWHJbAWgaaLYPnRZrh3ualFYkEZKv5mZNxkwQ.jpg','2021-10-30 15:01:10','2021-10-30 15:01:10',NULL),(154,NULL,'resources/u0uIjKJvIxXORN3blTqBnwPPlsEhT9ErmJtSodyE.jpg','2021-10-30 15:01:10','2021-10-30 15:01:10',NULL),(155,NULL,'resources/L478gpARrsjYYHewdPESAEIJdQAc6mNHPSscfoUw.jpg','2021-10-30 15:01:11','2021-10-30 15:01:11',NULL),(156,NULL,'resources/DkUd4D36RqLqqSTMVqrq6LzyjYBQM9gtbRu34VQw.png','2021-11-01 22:46:03','2021-11-01 22:46:03',NULL),(157,NULL,'resources/dWG0NcDVXkqsaTDS25UyFHFIAQlzfzIy17htaAMd.png','2021-11-02 12:10:48','2021-11-02 12:10:48',NULL),(158,NULL,'resources/mTuYki72XqDZsP7T4RsuMId9YwgzlDkSDW9dFxHE.png','2021-11-05 13:17:24','2021-11-05 13:17:24',NULL),(159,NULL,'resources/FUB7m2VB6SzFesKbDfGv1b9zWAiCrQUPUylkiTIo.png','2021-11-08 23:03:09','2021-11-08 23:03:09',NULL),(160,NULL,'resources/POHPCL6XVibFEiNCJOApEkMeSExVQvHYavUCvfJ1.png','2021-11-14 12:45:18','2021-11-14 12:45:18',NULL),(161,NULL,'resources/71GKJROk6ofLgR1NNgXMX6qzr5Y5OOIFgDRyt2eb.png','2021-11-14 13:09:26','2021-11-14 13:09:26',NULL),(162,NULL,'resources/hyHftftFTHBCk8LypfA6tBG3GfVbYS4RATbup1ke.png','2021-11-14 13:42:36','2021-11-14 13:42:36',NULL),(163,NULL,'resources/Z65RJitzQ7pMgK7njdLzDwOA0bhctBQqboG1zwki.png','2021-11-14 13:44:29','2021-11-14 13:44:29',NULL),(164,NULL,'resources/Ti6WQL6XjggaYDgqX3Efegh7coUiR8RvF95xt6Fj.png','2021-11-16 21:06:40','2021-11-16 21:06:40',NULL),(165,NULL,'resources/40sEePZ0qNZHQyqCUYWJzIhHgFirmHPDB7321nW1.jpg','2021-11-18 13:57:00','2021-11-18 13:57:00',NULL),(166,NULL,'resources/HTFIV8wQV5AwtOA4hBSl2x4mjy67uQEaRjDk7Plk.jpg','2021-11-18 14:22:25','2021-11-18 14:22:25',NULL),(167,NULL,'resources/TG2aNwL4XXxjS25sXzyeIFSTU9Jf2jdYaEHUyJuj.jpg','2021-11-18 14:38:39','2021-11-18 14:38:39',NULL),(168,NULL,'resources/BZWTI1H7O4FeIR0vINCRnp572EPWcOWFirc8mxZt.gif','2021-11-18 14:44:49','2021-11-18 14:44:49',NULL),(169,NULL,'resources/euG1ASioHAmw3pplIp3ZTZK2waJn8Bu42gUAf2Ff.pdf','2021-11-21 17:13:49','2021-11-21 17:13:49',NULL),(170,NULL,'resources/JwNZhxuhMGbjdKE3StTUfFkQSRJLKUwL2rNYUUoK.pdf','2021-11-21 17:13:49','2021-11-21 17:13:49',NULL),(171,NULL,'resources/GBVOoTnnVMef4WufArzuqHOCuO4UXPKz2smISIpF.pdf','2021-11-21 17:13:50','2021-11-21 17:13:50',NULL),(172,NULL,'resources/dq6QdTcfcp9Rk27pPHVVS9E1KKNQqySt3rgUtYYm.pdf','2021-11-21 17:13:54','2021-11-21 17:13:54',NULL),(173,NULL,'resources/ObelwFFAgJSenimVhGdWjcybPezuC6oaXMTRxRm0.jpg','2021-11-21 17:35:10','2021-11-21 17:35:10',NULL),(174,NULL,'resources/IIoGl3pDsuLCqv3BsppPJewZIkEyQRMv19DLpgnO.jpg','2021-11-21 17:35:17','2021-11-21 17:35:17',NULL),(175,NULL,'resources/Pjuwc3AqE1RhTan6OUNQNThGMYQAjj1RBZRhgNi3.jpg','2021-11-21 17:36:37','2021-11-21 17:36:37',NULL),(176,NULL,'resources/dF61IZoOwG076uq4oEvzuMcXStmYvj5VuLzf1fFF.png','2021-11-22 21:57:59','2021-11-22 21:57:59',NULL),(177,NULL,'resources/XMke5TwHvHY8cSmWyUPgd046aenh86skVOwQWZgm.png','2021-11-22 22:04:41','2021-11-22 22:04:41',NULL),(178,NULL,'resources/wgH1GPEvgdWd8LfKF1HGggbCfNrIQTX2wgnhGurj.jpg','2021-11-22 22:06:30','2021-11-22 22:06:30',NULL),(179,NULL,'resources/NYVExXAf0dhdg6m9qXC8EBa5eHkENpkTtbtx48k4.jpg','2021-11-22 22:06:31','2021-11-22 22:06:31',NULL),(180,NULL,'resources/1ZrLMivN19RvkQembEGnqq9ZluIYJNlilI4Qh1t1.jpg','2021-11-22 22:06:31','2021-11-22 22:06:31',NULL),(181,NULL,'resources/FOQRGX6cs2Ze1XLRibxix62aWVy0TqjBuA7KLdJw.jpg','2021-11-22 22:06:32','2021-11-22 22:06:32',NULL),(182,NULL,'resources/wogAoyFQ5yzYhvHCv8eNyLBdxk7ee85B3s3TZDnq.jpg','2021-11-22 22:11:02','2021-11-22 22:11:02',NULL),(183,NULL,'resources/Gxr5R7cnSccyozuLBlFAfdCTPF7J2mxfC3PhUEX8.png','2021-11-22 22:11:03','2021-11-22 22:11:03',NULL),(184,NULL,'resources/GsHLpm4Ty9xEMrmo5DP08kxsSBBN3FLhexEbAVAa.jpg','2021-11-22 22:11:05','2021-11-22 22:11:05',NULL),(185,NULL,'resources/9v51JP5QyI055u1kBtcK7MVNbPhluTDfRzywWWTd.jpg','2021-11-22 22:11:05','2021-11-22 22:11:05',NULL),(186,NULL,'resources/d7jSwM0XQKEcQySHIdswUzcsQXQmQagLctoOpRpS.jpg','2021-11-22 22:11:06','2021-11-22 22:11:06',NULL),(187,NULL,'resources/63NilRoRQQN2Mbt0w0F1C19URrGBQDFloVLEfihh.jpg','2021-11-22 22:11:07','2021-11-22 22:11:07',NULL),(188,NULL,'resources/sXahrnMKKuh09H6PCzAVfizQHiuSyBK8HHJ3JV1t.png','2021-11-22 22:11:07','2021-11-22 22:11:07',NULL),(189,NULL,'resources/Ka2Xb1wteTqbBDQNsqm7ppYacEZa5MhrNYRfBfz8.jpg','2021-11-22 22:18:46','2021-11-22 22:18:46',NULL),(190,NULL,'resources/hr0gZQKqhIFlvK10HcfZh2a3VjgLnVDowMSlTC3l.jpg','2021-11-22 22:22:34','2021-11-22 22:22:34',NULL),(191,NULL,'resources/FHcjHLQ8LzZqBwgtexja1FA7TtgGa8LxGzbFzeRQ.gif','2021-11-22 22:36:29','2021-11-22 22:36:29',NULL),(192,NULL,'resources/KC5D3yNfh1nvy82Euf63I6bGJbDwDYJqknCDyPis.jpg','2021-11-22 22:40:02','2021-11-22 22:40:02',NULL),(193,NULL,'resources/aAomp7KpLXNoXmlLgAmCY9uV5Tvkvb3rS8j6IsQR.jpg','2021-11-22 22:40:03','2021-11-22 22:40:03',NULL),(194,NULL,'resources/geY5UHwFP99E1MIWhdYmomEcc8CTH3errVS34bNA.jpg','2021-11-22 22:40:24','2021-11-22 22:40:24',NULL),(195,NULL,'resources/OfuwaN3ntfb8ekM4hWVl7CdfOMHfjcruwBoJVEpm.jpg','2021-11-22 22:40:25','2021-11-22 22:40:25',NULL),(196,NULL,'resources/dIuTaMsJA86XzRNwG1aUR0WDtTml4bvHn0EEbrCo.jpg','2021-11-22 23:06:37','2021-11-22 23:06:37',NULL),(197,NULL,'resources/CvL2imG2SspQo4HBHKstVxalCQzr6DVlhssz4t6P.jpg','2021-11-27 12:00:22','2021-11-27 12:00:22',NULL),(198,NULL,'resources/ZvGvoZoLcIRG4e4JvkkSoG8gj1sUdwrjfal0PMoT.jpg','2021-11-28 14:27:16','2021-11-28 14:27:16',NULL),(199,NULL,'resources/ym15474iRd84gO0iozO3K0pmPxfRRTgWkcjmml2X.jpg','2021-11-29 12:37:06','2021-11-29 12:37:06',NULL),(200,NULL,'resources/X4dAHdDrwSDFeLuiCNDAKgvjuxiXWkGQvH3daFLq.png','2021-11-29 12:37:06','2021-11-29 12:37:06',NULL),(201,NULL,'resources/46osnS559kQQVD9AVEo2ZUWiWg2EU8j9g6oM7tjV.jpg','2021-11-29 12:44:53','2021-11-29 12:44:53',NULL),(202,NULL,'resources/pqgL284u9yoJ3B8m3ZOGo8k2fVfp2g8cMfrNNue0.jpg','2021-11-29 12:45:21','2021-11-29 12:45:21',NULL),(203,NULL,'resources/aalsDfwXaooF0HopmYhsEchnkSiDtRZCVAUmivIQ.jpg','2021-11-29 12:45:38','2021-11-29 12:45:38',NULL),(204,NULL,'resources/RouigeizuXpoLCVd2KVdkqvzg7gbSPpuxhXU8BGE.jpg','2021-11-29 14:35:07','2021-11-29 14:35:07',NULL),(205,NULL,'resources/jeIa8IWAGxjxUiBTP93KCBGnWf19dTsh5vD2t7QX.jpg','2021-11-29 14:35:08','2021-11-29 14:35:08',NULL),(206,NULL,'resources/TREA6iOJlP4eNmHeiqoBJ1fmlve1wBhH1rPaNtfD.jpg','2021-11-29 14:35:08','2021-11-29 14:35:08',NULL),(207,NULL,'resources/AELjI4fuJWWJ67FrlvKIchoVtMKCskEPoZRmxmsl.jpg','2021-11-29 14:35:08','2021-11-29 14:35:08',NULL),(208,NULL,'resources/z0qNCDneIHeozH8txqmNEsgPuFOGaTm9ribRn6Lr.jpg','2021-11-29 14:45:20','2021-11-29 14:45:20',NULL),(209,NULL,'resources/eSkOfFtKVbNI3zXORw0NTL0MNGjP32Serpc34Te4.png','2021-11-29 14:46:06','2021-11-29 14:46:06',NULL),(210,NULL,'resources/Vzu9pCtllvfKVcMw8Ri9v16ijxilH0BjM0Vm6bWf.jpg','2021-11-29 14:47:12','2021-11-29 14:47:12',NULL),(211,NULL,'resources/eenDdZE4tXUj62dSSgiYymsxOVXireX8PBQOZwUE.jpg','2021-11-30 13:29:18','2021-11-30 13:29:18',NULL),(212,NULL,'resources/j7pWEW7fhdm2WxmRLKYQyuJqn1yOHuiEjOtJUaDu.jpg','2021-11-30 14:04:44','2021-11-30 14:04:44',NULL),(213,NULL,'resources/i9NG55sZ0GyPinVQvpKBH61aIf811G0zPdcM4qRA.png','2021-11-30 14:05:28','2021-11-30 14:05:28',NULL),(214,NULL,'resources/zCtXwziSUV3JB3vzyhbrIeNnpjo22yC6a0rOOyrn.jpg','2021-12-01 23:18:33','2021-12-01 23:18:33',NULL),(215,NULL,'resources/jryBCCrG16nab8QE3tNM3pbqVDQD6W4qGWU1AFtw.png','2021-12-02 00:30:44','2021-12-02 00:30:44',NULL),(216,NULL,'resources/68IKYxandHVciPo7UplI17fkfoqXJz1o90cViMTD.png','2021-12-02 00:37:58','2021-12-02 00:37:58',NULL),(217,NULL,'resources/C48cZoWUrFsvOJpm3SgO2BZyCLexds9vZQ1Ubn2X.png','2021-12-02 13:16:19','2021-12-02 13:16:19',NULL),(218,NULL,'resources/AeBc1CJOHl5Ki4L00EVi75EvjU7Dgd3kke2CEAOF.png','2021-12-02 13:20:34','2021-12-02 13:20:34',NULL),(219,NULL,'resources/4IyIcOWuIgnkJnNHMYv4ibT9F3v8HXelFZCCZ7Mx.png','2021-12-02 14:18:15','2021-12-02 14:18:15',NULL),(220,NULL,'resources/ICGikzxxnrTBOfIO5aH8R5H5b9mItwvRYAYERPHJ.png','2021-12-05 16:26:21','2021-12-05 16:26:21',NULL),(221,NULL,'resources/b4BvQi5DUtrPxtyXtjnDITepVIALfJwxCmmHYdxB.jpg','2021-12-05 16:37:28','2021-12-05 16:37:28',NULL),(222,NULL,'resources/syiJvrLULqBqPRN0EBkbYYZsGw07hkC5NnojBUwx.jpg','2021-12-05 16:38:54','2021-12-05 16:38:54',NULL),(223,NULL,'resources/ZZpr6XPONfaRWQpHVTZ6iaK1fBylxIPQrxIbfKt0.jpg','2021-12-05 17:04:36','2021-12-05 17:04:36',NULL),(224,NULL,'resources/ZueaQc973Jki9g9gAzhRcBkqzLPAX3UIPBHwjKJB.jpg','2021-12-06 12:47:51','2021-12-06 12:47:51',NULL),(225,NULL,'resources/75YOu0IFpw86Q98kQ67r3FsijyC5Lqe7JAP30dID.png','2021-12-06 13:02:24','2021-12-06 13:02:24',NULL),(226,NULL,'resources/EP68BzIF2AMwdz2CXWs5bchUnEFyN3ildiDWQSGi.jpg','2021-12-06 13:09:00','2021-12-06 13:09:00',NULL),(227,NULL,'resources/LKsW8x51Fc40nV2XU1smIQpbaN7AlZ2iEkccx9Q1.png','2021-12-06 13:23:07','2021-12-06 13:23:07',NULL),(228,NULL,'resources/SIYQvSVzFDBPnRcyvPsVdC2ylArc0j9m562ok0aF.jpg','2021-12-06 16:54:01','2021-12-06 16:54:01',NULL),(229,NULL,'resources/ds7UetUspyN80QbubtLGySZcwo08btsrMq08A0Zb.jpg','2021-12-07 19:07:25','2021-12-07 19:07:25',NULL),(230,NULL,'resources/8nMypGg6qwZ2aUjvAf5Gxya5YDQ2i0KBVHLL81c4.png','2021-12-08 00:04:50','2021-12-08 00:04:50',NULL),(231,NULL,'resources/FNrHtsQgDQqUCXqDn0OEocqAkCsSfwkScxZTk2ht.jpg','2021-12-11 02:53:42','2021-12-11 02:53:42',NULL),(232,NULL,'resources/8fRBwWArRHTGHYn3MkefYYBzbxySySrI68j6cJFP.jpg','2021-12-11 22:21:06','2021-12-11 22:21:06',NULL),(233,NULL,'resources/yBAsAFAFDx3k7cQdaS0u3WOT784SCLMjVtHfliiI.jpg','2021-12-11 22:24:58','2021-12-11 22:24:58',NULL),(234,NULL,'resources/gnlw3E1MZuqeKiJFY3lUHieas6rdeyx9Yuns3FIo.jpg','2021-12-11 22:34:17','2021-12-11 22:34:17',NULL),(235,NULL,'resources/B7Onb78P5GNXOm43GbQE7dGslbGEX8TmzOKyrOet.jpg','2021-12-11 22:34:54','2021-12-11 22:34:54',NULL),(236,NULL,'resources/3qjEbaL5dJYzd1EupfF73gXwzmPlYBjGFMmHScR2.jpg','2021-12-11 22:35:15','2021-12-11 22:35:15',NULL),(237,NULL,'resources/PfnJytnvXzgUM6yVd4swFbVkT7ufiOQibIFwPe9X.jpg','2021-12-11 23:41:57','2021-12-11 23:41:57',NULL),(238,NULL,'resources/Ev2j2sPLVol9W266OEK54Z9H5O1b1kjDL3RXCSHP.jpg','2021-12-11 23:41:57','2021-12-11 23:41:57',NULL),(239,NULL,'resources/LT4POidS5kpD7YcR8OzfLZdsQuGWZ8UUq1G4dJCW.jpg','2021-12-11 23:41:57','2021-12-11 23:41:57',NULL),(240,NULL,'resources/a5RCZzmpaLRluu9JU8bo7IvoJFKmHjsRi33cGZho.jpg','2021-12-11 23:43:01','2021-12-11 23:43:01',NULL),(241,NULL,'resources/S5gl04ioa9sZNiHqZZZRIcKFA95ylhmRV5RFXbdT.gif','2022-01-03 13:55:10','2022-01-03 13:55:10',NULL),(242,NULL,'resources/TA0c8IGXn25wL50zasWaqtmE7rDo7rXwfH1Nx11j.jpg','2022-01-05 15:33:07','2022-01-05 15:33:07',NULL);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_groups`
--

DROP TABLE IF EXISTS `invoice_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_groups`
--

LOCK TABLES `invoice_groups` WRITE;
/*!40000 ALTER TABLE `invoice_groups` DISABLE KEYS */;
INSERT INTO `invoice_groups` VALUES (1,'Packing Items',2,'2021-09-07 16:45:46','2021-09-07 16:45:46'),(2,'Vegetables',2,'2021-09-07 16:45:46','2021-09-07 16:45:46'),(3,'Electronics',2,'2021-09-07 16:45:46','2021-09-07 16:45:46'),(4,'Home Appliances',2,'2021-09-07 16:45:47','2021-09-07 16:45:47'),(5,'Salary',3,'2021-09-07 16:45:47','2021-09-07 16:45:47'),(6,'Utility',3,'2021-09-07 16:45:47','2021-09-07 16:45:47');
/*!40000 ALTER TABLE `invoice_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_sub_group_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_items_invoice_sub_group_id_foreign` (`invoice_sub_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_items`
--

LOCK TABLES `invoice_items` WRITE;
/*!40000 ALTER TABLE `invoice_items` DISABLE KEYS */;
INSERT INTO `invoice_items` VALUES (1,'Plates',1,'2021-09-07 16:45:50','2021-09-07 16:45:50'),(2,'Glasses',1,'2021-09-07 16:45:50','2021-09-07 16:45:50'),(3,'Spoons',1,'2021-09-07 16:45:51','2021-09-07 16:45:51'),(4,'Cello',2,'2021-09-07 16:45:51','2021-09-07 16:45:51'),(5,'3M',2,'2021-09-07 16:45:51','2021-09-07 16:45:51'),(6,'Stick',2,'2021-09-07 16:45:51','2021-09-07 16:45:51'),(7,'Zajel',2,'2021-09-07 16:45:51','2021-09-07 16:45:51'),(8,'Tomato',3,'2021-09-07 16:45:52','2021-09-07 16:45:52'),(9,'Potato',3,'2021-09-07 16:45:52','2021-09-07 16:45:52'),(10,'Carrot',3,'2021-09-07 16:45:52','2021-09-07 16:45:52'),(11,'Mint',4,'2021-09-07 16:45:52','2021-09-07 16:45:52'),(12,'Coriander',4,'2021-09-07 16:45:53','2021-09-07 16:45:53'),(13,'Curry Leaves',4,'2021-09-07 16:45:53','2021-09-07 16:45:53'),(14,'Cashew',5,'2021-09-07 16:45:53','2021-09-07 16:45:53'),(15,'Apricot',5,'2021-09-07 16:45:53','2021-09-07 16:45:53'),(16,'Almond',5,'2021-09-07 16:45:54','2021-09-07 16:45:54'),(17,'Samsung',6,'2021-09-07 16:45:54','2021-09-07 16:45:54'),(18,'Oppo',6,'2021-09-07 16:45:54','2021-09-07 16:45:54'),(19,'Apple',6,'2021-09-07 16:45:54','2021-09-07 16:45:54'),(20,'Bosch',7,'2021-09-07 16:45:55','2021-09-07 16:45:55'),(21,'OneOdio',7,'2021-09-07 16:45:55','2021-09-07 16:45:55'),(22,'boAT',7,'2021-09-07 16:45:55','2021-09-07 16:45:55'),(23,'LG',8,'2021-09-07 16:45:55','2021-09-07 16:45:55'),(24,'Panasonic',8,'2021-09-07 16:45:56','2021-09-07 16:45:56'),(25,'Samsung',9,'2021-09-07 16:45:56','2021-09-07 16:45:56'),(26,'Panasonic',9,'2021-09-07 16:45:56','2021-09-07 16:45:56'),(27,'Supervisor',10,'2021-09-07 16:45:56','2021-09-07 16:45:56'),(28,'Field operator',10,'2021-09-07 16:45:56','2021-09-07 16:45:56'),(29,'Fire fighter',10,'2021-09-07 16:45:57','2021-09-07 16:45:57'),(30,'Manager Salary',11,'2021-09-07 16:45:57','2021-09-07 16:45:57'),(31,'Cook Salary',11,'2021-09-07 16:45:57','2021-09-07 16:45:57'),(32,'Admin Salary',11,'2021-09-07 16:45:57','2021-09-07 16:45:57'),(33,'DEWA Bill',12,'2021-09-07 16:45:57','2021-09-07 16:45:57'),(34,'SEWA Bill',12,'2021-09-07 16:45:58','2021-09-07 16:45:58'),(35,'FEWA Bill',12,'2021-09-07 16:45:58','2021-09-07 16:45:58'),(36,'Etisalat',13,'2021-09-07 16:45:58','2021-09-07 16:45:58'),(37,'Du',13,'2021-09-07 16:45:58','2021-09-07 16:45:58'),(38,'Orange',13,'2021-09-07 16:45:59','2021-09-07 16:45:59');
/*!40000 ALTER TABLE `invoice_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_sub_groups`
--

DROP TABLE IF EXISTS `invoice_sub_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_sub_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_group_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_sub_groups_invoice_group_id_foreign` (`invoice_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_sub_groups`
--

LOCK TABLES `invoice_sub_groups` WRITE;
/*!40000 ALTER TABLE `invoice_sub_groups` DISABLE KEYS */;
INSERT INTO `invoice_sub_groups` VALUES (1,'Disposable',1,'2021-09-07 16:45:47','2021-09-07 16:45:47'),(2,'Adhesive Tapes',1,'2021-09-07 16:45:47','2021-09-07 16:45:47'),(3,'Fresh Vegetable',2,'2021-09-07 16:45:48','2021-09-07 16:45:48'),(4,'Leaves',2,'2021-09-07 16:45:48','2021-09-07 16:45:48'),(5,'Dry Fruits',2,'2021-09-07 16:45:48','2021-09-07 16:45:48'),(6,'Mobile Phones',3,'2021-09-07 16:45:48','2021-09-07 16:45:48'),(7,'Head Phones',3,'2021-09-07 16:45:49','2021-09-07 16:45:49'),(8,'Television',4,'2021-09-07 16:45:49','2021-09-07 16:45:49'),(9,'Fridge',4,'2021-09-07 16:45:49','2021-09-07 16:45:49'),(10,'Field Staff',5,'2021-09-07 16:45:49','2021-09-07 16:45:49'),(11,'Office Staff',5,'2021-09-07 16:45:49','2021-09-07 16:45:49'),(12,'Electricity Bill',6,'2021-09-07 16:45:50','2021-09-07 16:45:50'),(13,'Telephone Bill',6,'2021-09-07 16:45:50','2021-09-07 16:45:50');
/*!40000 ALTER TABLE `invoice_sub_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_statuses`
--

DROP TABLE IF EXISTS `message_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_statuses_user_id_foreign` (`user_id`),
  KEY `message_statuses_message_id_foreign` (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_statuses`
--

LOCK TABLES `message_statuses` WRITE;
/*!40000 ALTER TABLE `message_statuses` DISABLE KEYS */;
INSERT INTO `message_statuses` VALUES (67,10,1,NULL,NULL),(72,10,5,NULL,NULL),(71,9,5,NULL,NULL),(20,3,5,NULL,NULL),(44,6,25,NULL,NULL),(40,6,1,NULL,NULL),(43,5,25,NULL,NULL),(39,5,1,NULL,NULL),(38,4,1,NULL,NULL),(42,4,25,NULL,NULL),(41,7,1,NULL,NULL),(45,7,25,NULL,NULL),(47,8,1,NULL,NULL),(66,9,1,NULL,NULL),(65,2,1,NULL,NULL),(70,2,5,NULL,NULL),(69,1,5,NULL,NULL),(64,1,1,NULL,NULL),(68,11,1,NULL,NULL),(73,11,5,NULL,NULL),(74,12,11,NULL,NULL),(77,13,1,NULL,NULL),(76,13,11,NULL,NULL),(78,14,1,NULL,NULL),(91,16,30,NULL,NULL),(98,17,38,NULL,NULL),(90,15,30,NULL,NULL),(97,16,38,NULL,NULL),(96,15,38,NULL,NULL),(92,17,30,NULL,NULL);
/*!40000 ALTER TABLE `message_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` bigint(20) unsigned NOT NULL,
  `to_user_id` bigint(20) unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_from_user_id_foreign` (`from_user_id`),
  KEY `messages_to_user_id_foreign` (`to_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,5,'Hi','2021-10-24 03:06:05','2021-10-24 03:06:05'),(2,5,1,'Hello','2021-10-24 03:14:47','2021-10-24 03:14:47'),(3,5,4,'hello','2021-10-24 03:15:28','2021-10-24 03:15:28'),(4,25,1,'Hi','2021-10-24 21:51:38','2021-10-24 21:51:38'),(5,25,1,'Test','2021-10-24 21:53:25','2021-10-24 21:53:25'),(6,1,25,'Reply 1','2021-10-24 21:53:40','2021-10-24 21:53:40'),(7,1,25,'New message test','2021-10-24 21:54:32','2021-10-24 21:54:32'),(8,1,8,'Hi Madhu..hru?','2021-10-26 14:14:26','2021-10-26 14:14:26'),(9,1,5,'hi','2021-10-29 13:47:19','2021-10-29 13:47:19'),(10,5,1,'test msg','2021-10-29 18:29:55','2021-10-29 18:29:55'),(11,1,5,'test msg from admoin','2021-10-29 18:32:54','2021-10-29 18:32:54'),(12,11,12,'hi','2021-11-05 14:03:52','2021-11-05 14:03:52'),(13,1,11,'Hi A1','2021-11-14 12:26:55','2021-11-14 12:26:55'),(14,1,11,'Hello','2021-11-14 12:27:42','2021-11-14 12:27:42'),(15,30,38,'hi','2021-11-22 22:12:15','2021-11-22 22:12:15'),(16,30,38,'hello','2021-11-22 22:14:06','2021-11-22 22:14:06'),(17,38,30,'Hi','2021-11-22 22:14:19','2021-11-22 22:14:19');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_0000001_create_countries_table',1),(2,'2014_10_12_0000002_create_regions_table',1),(3,'2014_10_12_0000004_create_files_table',1),(4,'2014_10_12_000000_create_roles_table',1),(5,'2014_10_12_0000010_create_users_table',1),(6,'2014_10_12_100000_create_password_resets_table',1),(7,'2019_08_19_000000_create_failed_jobs_table',1),(8,'2021_08_03_184249_create_clients_table',1),(9,'2021_08_12_100000_create_checkers_table',1),(10,'2021_08_12_105900_create_validator_users_table',1),(11,'2021_08_12_122633_create_admins_table',1),(12,'2021_08_18_110726_create_plan_histories_table',1),(13,'2021_08_19_114600_create_suppliers_table',1),(14,'2021_08_27_172018_create_entry_statuses_table',1),(15,'2021_08_27_172128_create_entries_table',1),(16,'2021_08_29_143207_create_sales_table',1),(17,'2021_09_05_060657_create_invoice_groups_table',1),(18,'2021_09_05_060723_create_invoice_sub_groups_table',1),(19,'2021_09_05_060739_create_invoice_items_table',1),(20,'2021_09_05_112935_create_expenditures_table',1),(21,'2021_09_06_103859_create_purchases_table',1),(22,'2021_09_06_105007_create_purchase_details_table',1),(23,'2021_10_21_055056_create_messages_table',2),(24,'2021_10_22_113448_create_message_statuses_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_histories`
--

DROP TABLE IF EXISTS `plan_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` timestamp NULL DEFAULT NULL,
  `to` timestamp NULL DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `payment_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `payment_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_histories_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_histories`
--

LOCK TABLES `plan_histories` WRITE;
/*!40000 ALTER TABLE `plan_histories` DISABLE KEYS */;
INSERT INTO `plan_histories` VALUES (1,5,'Diamond',NULL,'2021-09-07 01:30:00','2021-10-07 01:30:00','Bank','2021-09-07 01:30:00',2000.00,'AED','2021-09-07 16:59:35','2021-09-07 16:59:35'),(2,11,'Silver','wer','2021-09-24 03:00:00','2021-09-30 03:00:00','Cash','2021-09-25 03:00:00',500.00,'AED','2021-09-25 20:10:48','2021-09-25 20:10:48'),(3,27,'Silver',NULL,'2021-10-22 03:00:00','2021-11-22 03:00:00','Cash','2021-10-22 03:00:00',500.00,'AED','2021-10-22 16:28:50','2021-10-22 16:28:50'),(4,28,'Silver',NULL,'2021-10-22 03:00:00','2021-11-22 03:00:00','Cash','2021-10-22 03:00:00',500.00,'AED','2021-10-22 17:06:59','2021-10-22 17:06:59'),(5,29,'Silver',NULL,'2021-10-22 03:00:00','2021-11-22 03:00:00','Cash','2021-10-22 03:00:00',500.00,'AED','2021-10-22 20:05:32','2021-10-22 20:05:32'),(6,31,'Silver',NULL,'2021-10-22 03:00:00','2021-12-22 03:00:00','Cash','2021-10-22 03:00:00',500.00,'AED','2021-10-22 20:15:25','2021-10-22 20:15:25'),(7,39,'Silver',NULL,'2021-11-22 03:00:00','2021-12-31 03:00:00','Cash','2021-11-22 03:00:00',500.00,'AED','2021-11-22 22:41:54','2021-11-22 22:41:54'),(8,25,'Silver','VAT343222','2021-12-01 01:30:00','2021-12-31 01:30:00','Free','2021-12-01 01:30:00',0.00,'AED','2021-12-02 00:33:39','2021-12-02 00:33:39'),(9,27,'Silver',NULL,'2021-12-10 03:00:00','2022-01-31 03:00:00','Cash','2021-12-10 03:00:00',500.00,'AED','2021-12-11 22:18:33','2021-12-11 22:18:33'),(10,43,'Silver',NULL,'2021-12-10 03:00:00','2022-01-31 03:00:00','Cash','2021-12-10 03:00:00',500.00,'AED','2021-12-11 22:21:57','2021-12-11 22:21:57');
/*!40000 ALTER TABLE `plan_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_details`
--

DROP TABLE IF EXISTS `purchase_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) unsigned NOT NULL,
  `invoice_group_id` bigint(20) unsigned DEFAULT NULL,
  `invoice_sub_group_id` bigint(20) unsigned DEFAULT NULL,
  `invoice_item_id` bigint(20) unsigned DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `qty` double(8,2) NOT NULL DEFAULT '0.00',
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  KEY `purchase_details_invoice_group_id_foreign` (`invoice_group_id`),
  KEY `purchase_details_invoice_sub_group_id_foreign` (`invoice_sub_group_id`),
  KEY `purchase_details_invoice_item_id_foreign` (`invoice_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_details`
--

LOCK TABLES `purchase_details` WRITE;
/*!40000 ALTER TABLE `purchase_details` DISABLE KEYS */;
INSERT INTO `purchase_details` VALUES (6,1,1,1,3,1.00,100.00,100.00,'2021-09-11 19:52:08','2021-09-11 19:52:08'),(5,1,1,1,2,2.00,100.00,200.00,'2021-09-11 19:52:08','2021-09-11 19:52:08'),(4,1,1,1,1,3.00,100.00,300.00,'2021-09-11 19:52:08','2021-09-11 19:52:08'),(25,2,1,1,1,3.00,100.00,300.00,'2021-10-17 13:43:41','2021-10-17 13:43:41'),(10,3,1,1,2,2.00,100.00,200.00,'2021-09-15 04:00:54','2021-09-15 04:00:54'),(11,3,1,1,1,4.00,100.00,400.00,'2021-09-15 04:00:54','2021-09-15 04:00:54'),(12,3,1,1,3,3.00,100.00,300.00,'2021-09-15 04:00:54','2021-09-15 04:00:54'),(13,4,1,1,1,300.00,50.00,15000.00,'2021-09-25 20:36:34','2021-09-25 20:36:34'),(14,4,3,6,18,10.00,20.00,200.00,'2021-09-25 20:36:34','2021-09-25 20:36:34'),(15,5,1,2,4,200.00,10.00,2000.00,'2021-09-25 20:39:44','2021-09-25 20:39:44'),(16,5,4,8,24,25.00,10.00,250.00,'2021-09-25 20:39:44','2021-09-25 20:39:44'),(17,6,2,4,13,25.00,10.00,250.00,'2021-09-25 20:42:52','2021-09-25 20:42:52'),(19,8,4,9,26,50000.00,2.00,100000.00,'2021-09-27 00:28:38','2021-09-27 00:28:38'),(20,9,4,8,24,5000.00,2.00,10000.00,'2021-10-05 16:58:50','2021-10-05 16:58:50'),(21,10,2,5,15,15.00,3.00,45.00,'2021-10-17 13:18:14','2021-10-17 13:18:14'),(22,10,3,7,21,76.00,4.00,304.00,'2021-10-17 13:18:14','2021-10-17 13:18:14'),(24,11,4,9,26,3450.00,2.00,6900.00,'2021-10-17 13:43:23','2021-10-17 13:43:23'),(26,12,1,1,1,17.00,10.00,170.00,'2021-10-22 21:53:01','2021-10-22 21:53:01'),(27,12,2,3,8,5.00,2.00,10.00,'2021-10-22 21:53:01','2021-10-22 21:53:01'),(28,12,3,6,17,1.00,800.00,800.00,'2021-10-22 21:53:01','2021-10-22 21:53:01'),(29,13,2,4,11,10.00,1.00,10.00,'2021-10-22 22:01:01','2021-10-22 22:01:01'),(30,14,1,1,1,525.00,1.00,525.00,'2021-10-22 22:52:12','2021-10-22 22:52:12'),(31,15,1,1,1,1000.00,2.00,2000.00,'2021-10-30 14:41:04','2021-10-30 14:41:04'),(32,16,1,1,1,1.00,1.00,1.00,'2021-11-14 12:47:45','2021-11-14 12:47:45'),(33,17,1,1,1,1.00,1.00,1.00,'2021-11-14 12:48:09','2021-11-14 12:48:09'),(34,18,1,1,1,1.00,1.00,1.00,'2021-11-14 12:49:47','2021-11-14 12:49:47'),(35,19,1,2,4,1.00,100.00,100.00,'2021-11-16 21:33:36','2021-11-16 21:33:36'),(36,20,4,8,24,10.00,250.00,2500.00,'2021-11-22 22:56:29','2021-11-22 22:56:29'),(37,21,1,1,1,100.00,50.00,5000.00,'2021-11-29 12:46:59','2021-11-29 12:46:59'),(38,22,1,1,2,3.00,1.00,3.00,'2021-12-02 00:35:39','2021-12-02 00:35:39'),(39,23,1,2,4,500.00,1.00,500.00,'2021-12-05 17:05:12','2021-12-05 17:05:12');
/*!40000 ALTER TABLE `purchase_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entry_id` bigint(20) unsigned NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(8,2) NOT NULL DEFAULT '0.00',
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `vat_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `total_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchases_entry_id_foreign` (`entry_id`),
  KEY `purchases_supplier_id_foreign` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,5,6,'2021-09-09 20:00:00','150002',600.00,50.00,27.50,577.50,'2021-09-11 06:56:03','2021-09-11 19:52:08',NULL),(2,7,6,'2021-09-10 10:30:00','150011',300.00,20.00,14.00,294.00,'2021-09-11 20:01:32','2021-10-17 13:43:41',NULL),(3,8,6,'2021-09-15 01:30:00','150012',900.00,45.00,42.75,897.75,'2021-09-15 04:00:54','2021-09-15 04:00:54',NULL),(4,19,6,'2021-09-23 03:00:00','asdasd',15200.00,25.00,758.75,15933.75,'2021-09-25 20:36:34','2021-09-25 20:36:34',NULL),(5,24,6,'2021-08-30 03:00:00','23423424',2250.00,0.00,112.50,2362.50,'2021-09-25 20:39:44','2021-09-25 20:39:44',NULL),(6,20,6,'2021-09-06 03:00:00','ouip',250.00,0.00,12.50,262.50,'2021-09-25 20:42:52','2021-09-25 20:42:52',NULL),(8,29,6,'2021-09-26 03:00:00','Inv No.52635',100000.00,0.00,5000.00,105000.00,'2021-09-27 00:28:38','2021-09-27 00:28:38',NULL),(9,31,6,'2021-10-04 03:00:00','oiu9i',10000.00,0.00,500.00,10500.00,'2021-10-05 16:58:50','2021-10-05 16:58:50',NULL),(10,34,6,'2021-10-05 03:00:00','255',349.00,0.00,17.45,366.45,'2021-10-17 13:18:14','2021-10-17 13:18:14',NULL),(11,37,6,'2021-10-11 23:00:00','255',6900.00,0.00,345.00,7245.00,'2021-10-17 13:25:39','2021-10-17 13:43:23',NULL),(12,46,6,'2021-10-22 03:00:00','001',980.00,0.00,49.00,1029.00,'2021-10-22 21:53:01','2021-10-22 21:53:01',NULL),(13,47,6,'2021-10-22 03:00:00','001',10.00,0.00,0.50,10.50,'2021-10-22 22:01:01','2021-10-22 22:01:01',NULL),(14,49,6,'2021-10-22 03:00:00','001',525.00,0.00,26.25,551.25,'2021-10-22 22:52:12','2021-10-22 22:52:12',NULL),(15,56,6,'2021-10-01 03:00:00','123456',2000.00,0.00,100.00,2100.00,'2021-10-30 14:41:04','2021-10-30 14:41:04',NULL),(16,62,6,'2021-11-15 03:00:00','1',1.00,0.00,0.05,1.05,'2021-11-14 12:47:45','2021-11-14 12:47:45',NULL),(17,68,6,'2021-11-14 03:00:00','1',1.00,0.00,0.05,1.05,'2021-11-14 12:48:09','2021-11-14 12:48:09',NULL),(18,67,6,'2021-11-09 03:00:00','1',1.00,0.00,0.05,1.05,'2021-11-14 12:49:47','2021-11-14 12:49:47',NULL),(19,28,6,'2021-11-16 01:30:00','10000',100.00,0.00,5.00,105.00,'2021-11-16 21:33:36','2021-11-16 21:33:36',NULL),(20,83,6,'2021-11-10 03:00:00','3287',2500.00,0.00,125.00,2625.00,'2021-11-22 22:56:29','2021-11-22 22:56:29',NULL),(21,107,34,'2021-11-15 03:00:00','321321321',5000.00,0.00,250.00,5250.00,'2021-11-29 12:46:59','2021-11-29 12:46:59',NULL),(22,80,6,'2021-12-01 01:30:00','2234324234',3.00,0.00,0.15,3.15,'2021-12-02 00:35:39','2021-12-02 00:35:39',NULL),(23,124,6,'2021-12-04 07:00:00','321321',500.00,0.00,25.00,525.00,'2021-12-05 17:05:12','2021-12-05 17:05:12',NULL);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_country_id_foreign` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Abu Dhabi',1,'2021-09-07 16:45:29','2021-09-07 16:45:29',NULL),(2,'Dubai',1,'2021-09-07 16:45:30','2021-09-07 16:45:30',NULL),(3,'Ajman',1,'2021-09-07 16:45:30','2021-09-07 16:45:30',NULL),(4,'Sharjah',1,'2021-09-07 16:45:30','2021-09-07 16:45:30',NULL),(5,'Umm-Al-Quwain',1,'2021-09-07 16:45:30','2021-09-07 16:45:30',NULL),(6,'Ras-Al-Khaimah',1,'2021-09-07 16:45:30','2021-09-07 16:45:30',NULL),(7,'Fujairah',1,'2021-09-07 16:45:31','2021-09-07 16:45:31',NULL),(8,'Andhra Pradesh',2,'2021-09-07 16:45:31','2021-09-07 16:45:31',NULL),(9,'Arunachal Pradesh',2,'2021-09-07 16:45:31','2021-09-07 16:45:31',NULL),(10,'Assam',2,'2021-09-07 16:45:31','2021-09-07 16:45:31',NULL),(11,'Bihar',2,'2021-09-07 16:45:32','2021-09-07 16:45:32',NULL),(12,'Chhattisgarh',2,'2021-09-07 16:45:32','2021-09-07 16:45:32',NULL),(13,'Goa',2,'2021-09-07 16:45:32','2021-09-07 16:45:32',NULL),(14,'Gujarat',2,'2021-09-07 16:45:32','2021-09-07 16:45:32',NULL),(15,'Haryana',2,'2021-09-07 16:45:33','2021-09-07 16:45:33',NULL),(16,'Himachal Pradesh',2,'2021-09-07 16:45:33','2021-09-07 16:45:33',NULL),(17,'Jharkhand',2,'2021-09-07 16:45:33','2021-09-07 16:45:33',NULL),(18,'Karnataka',2,'2021-09-07 16:45:33','2021-09-07 16:45:33',NULL),(19,'Kerala',2,'2021-09-07 16:45:33','2021-09-07 16:45:33',NULL),(20,'Madhya Pradesh',2,'2021-09-07 16:45:34','2021-09-07 16:45:34',NULL),(21,'Maharashtra',2,'2021-09-07 16:45:34','2021-09-07 16:45:34',NULL),(22,'Manipur',2,'2021-09-07 16:45:34','2021-09-07 16:45:34',NULL),(23,'Meghalaya',2,'2021-09-07 16:45:34','2021-09-07 16:45:34',NULL),(24,'Mizoram',2,'2021-09-07 16:45:34','2021-09-07 16:45:34',NULL),(25,'Nagaland',2,'2021-09-07 16:45:35','2021-09-07 16:45:35',NULL),(26,'Odisha',2,'2021-09-07 16:45:35','2021-09-07 16:45:35',NULL),(27,'Punjab',2,'2021-09-07 16:45:35','2021-09-07 16:45:35',NULL),(28,'Rajasthan',2,'2021-09-07 16:45:35','2021-09-07 16:45:35',NULL),(29,'Sikkim',2,'2021-09-07 16:45:36','2021-09-07 16:45:36',NULL),(30,'Tamil Nadu',2,'2021-09-07 16:45:36','2021-09-07 16:45:36',NULL),(31,'Telangana',2,'2021-09-07 16:45:36','2021-09-07 16:45:36',NULL),(32,'Tripura',2,'2021-09-07 16:45:36','2021-09-07 16:45:36',NULL),(33,'Uttarakhand',2,'2021-09-07 16:45:36','2021-09-07 16:45:36',NULL),(34,'Uttar Pradesh',2,'2021-09-07 16:45:37','2021-09-07 16:45:37',NULL),(35,'West Bengal',2,'2021-09-07 16:45:37','2021-09-07 16:45:37',NULL),(36,'Mecca',3,'2021-09-07 16:45:37','2021-09-07 16:45:37',NULL),(37,'Riyadh',3,'2021-09-07 16:45:37','2021-09-07 16:45:37',NULL),(38,'Eastern',3,'2021-09-07 16:45:38','2021-09-07 16:45:38',NULL),(39,'Asir',3,'2021-09-07 16:45:38','2021-09-07 16:45:38',NULL),(40,'Jizan',3,'2021-09-07 16:45:38','2021-09-07 16:45:38',NULL),(41,'Medina',3,'2021-09-07 16:45:38','2021-09-07 16:45:38',NULL),(42,'Al-Qassim',3,'2021-09-07 16:45:38','2021-09-07 16:45:38',NULL),(43,'Tabuk',3,'2021-09-07 16:45:39','2021-09-07 16:45:39',NULL),(44,'Hail',3,'2021-09-07 16:45:39','2021-09-07 16:45:39',NULL),(45,'Najran',3,'2021-09-07 16:45:39','2021-09-07 16:45:39',NULL),(46,'Al-Jawf',3,'2021-09-07 16:45:39','2021-09-07 16:45:39',NULL),(47,'Al-Bahah',3,'2021-09-07 16:45:39','2021-09-07 16:45:39',NULL),(48,'Northern Borders',3,'2021-09-07 16:45:40','2021-09-07 16:45:40',NULL),(49,'Al Manamah',4,'2021-09-07 16:45:40','2021-09-07 16:45:40',NULL),(50,'Sitrah',4,'2021-09-07 16:45:40','2021-09-07 16:45:40',NULL),(51,'Al Mintaqah al Gharbiyah',4,'2021-09-07 16:45:40','2021-09-07 16:45:40',NULL),(52,'Al Mintaqah al Wusta',4,'2021-09-07 16:45:41','2021-09-07 16:45:41',NULL),(53,'Al Mintaqah ash Shamaliyah',4,'2021-09-07 16:45:41','2021-09-07 16:45:41',NULL),(54,'Al Muharraq',4,'2021-09-07 16:45:41','2021-09-07 16:45:41',NULL),(55,'Al Asimah',4,'2021-09-07 16:45:41','2021-09-07 16:45:41',NULL),(56,'Ash Shamaliyah',4,'2021-09-07 16:45:41','2021-09-07 16:45:41',NULL),(57,'Jidd Hafs',4,'2021-09-07 16:45:42','2021-09-07 16:45:42',NULL),(58,'Madinat',4,'2021-09-07 16:45:42','2021-09-07 16:45:42',NULL),(59,'Madinat Hamad',4,'2021-09-07 16:45:42','2021-09-07 16:45:42',NULL),(60,'Mintaqat Juzur Hawar',4,'2021-09-07 16:45:42','2021-09-07 16:45:42',NULL),(61,'Ar Rifa',4,'2021-09-07 16:45:42','2021-09-07 16:45:42',NULL),(62,'Al Hadd',4,'2021-09-07 16:45:43','2021-09-07 16:45:43',NULL),(63,'Ad Dawhah',5,'2021-09-07 16:45:43','2021-09-07 16:45:43',NULL),(64,'Ahmadi',6,'2021-09-07 16:45:43','2021-09-07 16:45:43',NULL),(65,'Al-Asimah',6,'2021-09-07 16:45:43','2021-09-07 16:45:43',NULL),(66,'Farwaniya',6,'2021-09-07 16:45:44','2021-09-07 16:45:44',NULL),(67,'Hawalli',6,'2021-09-07 16:45:44','2021-09-07 16:45:44',NULL),(68,'Jahra',6,'2021-09-07 16:45:44','2021-09-07 16:45:44',NULL),(69,'Mubarak Al-Kabeer',6,'2021-09-07 16:45:44','2021-09-07 16:45:44',NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Administrator','Super Administrator','2021-09-07 16:45:27','2021-09-07 16:45:27',NULL),(2,'Administrator','Administrator','2021-09-07 16:45:27','2021-09-07 16:45:27',NULL),(3,'Checker','Checker','2021-09-07 16:45:27','2021-09-07 16:45:27',NULL),(4,'Validator','Validator','2021-09-07 16:45:27','2021-09-07 16:45:27',NULL),(5,'Client','Client','2021-09-07 16:45:27','2021-09-07 16:45:27',NULL),(6,'Supplier','Supplier','2021-09-07 16:45:28','2021-09-07 16:45:28',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entry_id` bigint(20) unsigned NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_exclude_vat` double(8,2) NOT NULL DEFAULT '0.00',
  `vat_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_entry_id_foreign` (`entry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (2,1,'2021-09-07 01:30:00',50.00,'central perk','150000',47.62,2.38,'2021-09-07 17:12:22','2021-09-07 17:12:22',NULL),(3,6,'2021-09-11 01:30:00',200.00,'Castle Restaurant','150009',190.48,9.52,'2021-09-11 07:51:43','2021-09-11 07:51:43',NULL),(4,18,'2021-09-23 03:00:00',500.00,'Comm','121',476.19,23.81,'2021-09-25 20:35:58','2021-09-25 20:35:58',NULL),(5,22,'2021-09-01 03:00:00',300.00,'omm','654654',285.71,14.29,'2021-09-25 20:42:35','2021-09-25 20:42:35',NULL),(6,16,'2021-09-26 01:30:00',200.00,'central perk','150001',190.48,9.52,'2021-09-26 05:08:17','2021-09-26 05:08:17',NULL),(7,17,'2021-09-26 03:00:00',200000.00,'sales','5656565',190476.19,9523.81,'2021-09-27 00:32:38','2021-09-27 00:32:38',NULL),(8,30,'2021-10-05 03:00:00',100000.00,'65564','654654',95238.10,4761.90,'2021-10-05 16:53:30','2021-10-05 16:53:30',NULL),(9,33,'2021-10-05 03:00:00',100.00,'werwer','werwer',95.24,4.76,'2021-10-05 17:02:57','2021-10-05 17:02:57',NULL),(10,38,'2021-10-27 03:00:00',800.00,'cc','255',761.90,38.10,'2021-10-17 13:26:09','2021-10-17 13:26:09',NULL),(13,42,'2021-10-21 03:00:00',5000.00,'001','cn001',4761.90,238.10,'2021-10-22 21:32:44','2021-10-22 21:32:44',NULL),(15,43,'2015-06-22 03:00:00',105.00,'006','006',100.00,5.00,'2021-10-22 22:29:24','2021-10-22 22:29:24',NULL),(18,53,'2021-10-20 03:00:00',2100.00,'test','2254',2000.00,100.00,'2021-10-22 23:32:34','2021-10-22 23:32:34',NULL),(19,54,'2021-10-22 01:30:00',200.00,'test','3445333',190.48,9.52,'2021-10-28 16:06:19','2021-10-28 16:06:19',NULL),(21,66,'2021-10-22 03:00:00',1500.00,'20','201',1428.57,71.43,'2021-10-30 16:52:05','2021-10-30 16:52:05',NULL),(22,70,'2021-11-02 03:00:00',500.00,'qwsedqwe','qweqwe',476.19,23.81,'2021-11-02 12:11:35','2021-11-02 12:11:35',NULL),(23,71,'2021-11-01 01:30:00',200.00,'Test','1231231',190.48,9.52,'2021-11-05 13:19:59','2021-11-05 13:19:59',NULL),(24,72,'2021-10-31 03:00:00',50.00,'Commenta','sadasdasd232323',47.62,2.38,'2021-11-08 23:05:09','2021-11-08 23:05:09',NULL),(25,73,'2021-11-26 03:00:00',45345.00,'345345','345345',43185.71,2159.29,'2021-11-14 12:46:44','2021-11-14 12:46:44',NULL),(26,65,'2021-11-14 03:00:00',100.00,'ertert','ertert',95.24,4.76,'2021-11-14 12:52:06','2021-11-14 12:52:06',NULL),(27,74,'2021-11-14 03:00:00',500.00,'kjhkjh','kjhkjh',476.19,23.81,'2021-11-14 13:10:11','2021-11-14 13:10:11',NULL),(28,76,'2021-11-04 03:00:00',100.00,'234','1',95.24,4.76,'2021-11-14 13:45:45','2021-11-14 13:45:45',NULL),(29,77,'2021-11-16 01:30:00',1200.00,'Test','10000',1142.86,57.14,'2021-11-16 21:13:00','2021-11-16 21:13:00',NULL),(30,82,'2021-11-11 03:00:00',5000.00,'PTROLO','235',4761.90,238.10,'2021-11-22 22:59:03','2021-11-22 22:59:03',NULL),(31,86,'2021-11-22 03:00:00',1000.00,'001','0098',952.38,47.62,'2021-11-22 23:06:20','2021-11-22 23:06:20',NULL),(32,81,'2021-11-23 03:00:00',500.00,'Check Naming','Check Naming',476.19,23.81,'2021-11-23 16:17:55','2021-11-23 16:17:55',NULL),(33,102,'2021-11-17 03:00:00',100.00,'Com','789',95.24,4.76,'2021-11-27 12:05:04','2021-11-27 12:05:04',NULL),(34,105,'2021-11-15 03:00:00',500.00,'Scribbled','112233',476.19,23.81,'2021-11-29 12:49:41','2021-11-29 12:49:41',NULL),(35,111,'2021-11-19 01:30:00',340.00,'Test ABC Test','57674754',323.81,16.19,'2021-11-29 14:48:34','2021-11-29 14:48:34',NULL),(36,112,'2021-11-26 01:30:00',400.00,'Test 26th date','33774744',380.95,19.05,'2021-11-30 13:31:22','2021-11-30 13:31:22',NULL),(37,113,'2021-11-29 01:30:00',1.00,'29 th Nov','1',0.95,0.05,'2021-11-30 14:09:54','2021-11-30 14:09:54',NULL),(38,114,'2021-11-28 01:30:00',1.00,'28 th Nov','0025',0.95,0.05,'2021-11-30 14:11:13','2021-11-30 14:11:13',NULL),(39,116,'2021-12-01 01:30:00',450.00,'Test','363663',428.57,21.43,'2021-12-02 00:31:33','2021-12-02 00:31:33',NULL),(40,104,'2021-12-01 01:30:00',340.00,'test','3424234234',323.81,16.19,'2021-12-02 00:34:59','2021-12-02 00:34:59',NULL),(41,117,'2021-12-01 01:30:00',450.00,'qwerty','2344455',428.57,21.43,'2021-12-02 00:38:55','2021-12-02 00:38:55',NULL),(42,118,'2021-12-01 01:30:00',675.00,'Test for dec 1st','2423423',642.86,32.14,'2021-12-02 13:17:29','2021-12-02 13:17:29',NULL),(43,119,'2021-12-01 01:30:00',675.00,'Test for dec 1st','2342423',642.86,32.14,'2021-12-02 13:21:39','2021-12-02 13:21:39',NULL),(44,120,'2021-12-02 01:30:00',275.00,'testing for dec 2nd','234234234',261.90,13.10,'2021-12-02 14:19:43','2021-12-02 14:19:43',NULL),(45,121,'2021-12-01 07:00:00',386.00,'Test for dec 1st again','123123213',367.62,18.38,'2021-12-05 16:27:10','2021-12-05 16:27:10',NULL),(54,122,'2022-01-03 07:00:00',500.00,'asd','asd',476.19,23.81,'2022-01-03 14:14:09','2022-01-03 14:14:09',NULL),(47,123,'2021-12-03 07:00:00',83.00,'dfsdf','sdfsdfsdf',79.05,3.95,'2021-12-05 16:39:38','2021-12-05 16:39:38',NULL),(48,125,'2021-12-05 07:00:00',50000.00,'Testing date','Testing date 0512',47619.05,2380.95,'2021-12-06 12:49:05','2021-12-06 12:49:05',NULL),(49,131,'2021-12-03 07:00:00',346.00,'3rd date','232342',329.52,16.48,'2021-12-08 00:07:51','2021-12-08 00:07:51',NULL),(50,134,'2021-12-11 07:00:00',250.00,'rec','25878',238.10,11.90,'2021-12-11 22:29:43','2021-12-11 22:29:43',NULL),(51,135,'2021-12-09 07:00:00',3150.00,'this for amoun 3150','369',3000.00,150.00,'2021-12-11 22:35:11','2021-12-11 22:35:11',NULL),(52,133,'2021-04-22 07:00:00',250.00,'approved','987',238.10,11.90,'2021-12-11 23:27:28','2021-12-11 23:27:28',NULL);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `trn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `region_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suppliers_user_id_foreign` (`user_id`),
  KEY `suppliers_country_id_foreign` (`country_id`),
  KEY `suppliers_region_id_foreign` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,6,'TRN8322110','Trinity','682031','Kochi','Ernakulam',2,19,'2021-09-07 18:48:50','2021-09-23 20:11:09',NULL),(2,34,'TRN8322110','Mbanrak','854124','Karama','Dubai',1,2,'2021-10-30 15:21:30','2021-10-30 15:21:30',NULL);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `w_country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `whatsapp_no_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `primary_role` bigint(20) unsigned DEFAULT NULL,
  `profile_image_id` bigint(20) unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_whatsapp_no_unique` (`whatsapp_no`),
  KEY `users_primary_role_foreign` (`primary_role`),
  KEY `users_profile_image_id_foreign` (`profile_image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','+91','9999900000','2021-09-07 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-07 16:45:44','2021-10-24 03:21:11',1,136,1,NULL),(2,'Test Admin','test_admin@vatzapp.com','+91','9988776655','2021-09-07 07:00:00',NULL,'$2y$10$le.83KKYDCfE4LOqItwhP.RjwynWK8CNA02aKd/JlMV5Qsme2L07q',NULL,'2021-09-07 16:49:56','2021-10-24 03:12:27',2,135,1,NULL),(3,'Test Validator 123','test_validator@vatzapp.com','+91','9984571255','2021-09-07 07:00:00',NULL,'$2y$10$UYjqJ.9uqdagqbS0g8jvGe6PAKpnF4LzCkYUCfCMOdUBu2pvQsSsG',NULL,'2021-09-07 16:50:39','2021-10-24 03:04:39',4,134,1,NULL),(4,'Test Checker','test_checker@vatzapp.com','+971','4556234556','2021-09-07 07:00:00',NULL,'$2y$10$soLye8mjTcZIJUzWap4JXeJ/SgfzOtwHoU8LD0zpsOJ1Oi7jniX82',NULL,'2021-09-07 16:51:23','2021-10-24 02:54:35',3,132,1,NULL),(5,'Marvel Universe','marvel@vatzapp.com','+971','9984571200','2021-10-24 03:01:41',NULL,'$2y$10$0gPTS4npuHUJlL/VAOaPIO2tUZi9jjO9hlil.lXl7T0yoPxh57ZH.',NULL,'2021-09-07 16:58:04','2021-11-14 12:26:17',5,133,1,NULL),(6,'Test Supplier','test_supplier@vatzapp.com','+91','9984571211','2021-09-07 07:00:00',NULL,'$2y$10$R/.XFDesXj5udvhGAGHh1OFSvVuv/YVA.Kg.L4gW10QG7YQBUoDzy',NULL,'2021-09-07 18:48:50','2021-09-07 18:48:50',6,NULL,1,NULL),(7,'AMIS INNOVATIONS FZ-LLC','menon@gmail.com','+971','522823419','2021-10-31 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-12 01:38:31','2021-09-12 01:38:31',5,NULL,1,NULL),(8,'Validator Menon M','vmenon@gmail.com','+91','522623335','2021-09-11 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-12 01:43:27','2021-09-12 01:43:27',4,NULL,1,NULL),(9,'Checker Menon M','cmenon@gmail.com','+973','5228234111','2021-09-11 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-12 01:44:21','2021-09-22 19:23:50',3,NULL,1,NULL),(10,'Checker','checker@gmail.com','+971','6666666666','2021-09-18 07:00:00',NULL,'$2y$10$d5ot3USzwmb7nF.Io1zWKO65Xu3yATeZZAgj/p8b5KUP7NxtYdMZy',NULL,'2021-09-18 20:44:41','2021-09-22 19:29:15',3,NULL,1,NULL),(11,'A1 LLC','a1@gmail.com','+971','522823411','2021-10-31 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-25 19:29:38','2021-09-25 19:29:38',5,NULL,1,NULL),(12,'Checker Madhu','cmadhu@gmail.com','+91','5226655555','2021-09-25 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-25 19:34:20','2021-09-25 19:34:20',3,NULL,1,NULL),(13,'Validator New','v_new@amazon.com','+973','345345345','2021-09-25 07:00:00',NULL,'$2y$10$0PgMsK7cc.yXGrS6qEVPQOgNpG2gmw3yzUoldiYd2AF9qnID4M2x.',NULL,'2021-09-25 19:35:50','2021-09-25 19:35:50',4,NULL,1,NULL),(14,'B1 LLC','b1@gmail.com','+971','65757567','2021-10-31 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-25 20:00:40','2021-09-25 20:00:40',5,NULL,1,NULL),(15,'C1 LLC','c1@gmail.com','+971','456456','2021-10-31 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-25 20:02:05','2021-09-25 20:02:05',5,NULL,1,NULL),(16,'D1 LLC','d1@gmail.com','+971','5345345','2021-10-31 07:00:00',NULL,'$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',NULL,'2021-09-25 20:03:51','2021-09-25 20:03:51',5,NULL,1,NULL),(17,'ABC Enterprises','jj@abc.com','+971','5555',NULL,NULL,'$2y$10$jeSeERcjmlYhUJNO5S.FVOAkw7FcxSygiKl2pLC3vnkgktYaCu4tW',NULL,'2021-10-17 12:37:15','2021-10-17 12:37:15',5,NULL,1,NULL),(18,'checker Jamshad','jamshad666@gmail.com','+971','555555','2021-10-17 07:00:00',NULL,'$2y$10$3pz2LSZyWgTQefkrMSgSCu8vs0kWlYousy9bieBhWU8FuVeHkkOLG',NULL,'2021-10-17 12:49:58','2021-10-17 12:49:58',3,NULL,1,NULL),(19,'jams','jams@gmail.com','+971','5555555','2021-10-17 07:00:00',NULL,'$2y$10$GyuzpOkjgloqw7l3hpsuEeHGzoM8cK16spvO4gxl0PLTZYAk2JMVm',NULL,'2021-10-17 12:51:31','2021-10-17 12:51:31',4,NULL,1,NULL),(20,'madhu','madhu@amisinnovations.com','+971','5228255500',NULL,NULL,'$2y$10$6HYYy2vzULjG8wktXhqHI.6SS/oxwEqT/RHGKVhVozefEIZB1sVxO',NULL,'2021-10-20 13:23:54','2021-10-20 13:23:54',5,NULL,1,NULL),(21,'madhuTestManager','kj.deepa.nair@gmail.com','+971','654654654',NULL,NULL,'$2y$10$lRE6loFCph1RB7dC0.zMSeOEP83uySHgA79dmgy39unJS078rPXMu',NULL,'2021-10-20 13:25:38','2021-10-25 14:04:41',5,NULL,1,NULL),(27,'Aquasoft','kallayiasees99@gmail.com','+971','553714038',NULL,NULL,'$2y$10$EhgKSLdeu.ZhAA15SVGJNuGfoFbxanee6EYxT4kZoQa3JgdsHjo2a',NULL,'2021-10-22 16:23:48','2021-10-22 16:30:35',5,NULL,1,NULL),(26,'ABC Company','madhumenonm@gmail.com','+971','56567567','2021-10-21 12:25:51',NULL,'$2y$10$7jN.6jzC.Xpiq3lxo0YUI..ysNqlYDkUU7aEsE6NOkC0QB09pUWKW',NULL,'2021-10-21 12:25:16','2021-10-21 12:25:51',5,NULL,1,NULL),(25,'ZXV Tech','aadhi.user1@gmail.com','+971','7777666601','2021-10-21 00:51:02',NULL,'$2y$10$uic3Fia8rnTIvuZlohVl8.U2MEdual/IL4kXWo/gATt9AFmOQzWu.',NULL,'2021-10-21 00:43:04','2021-10-21 00:51:02',5,NULL,1,NULL),(28,'Kalbrosoft','shahalaazeez92@gmail.com','+971','553714039','2021-10-22 17:05:29',NULL,'$2y$10$MMExV0xekTvxZQ4JubBuH.h131Pgpv36MGYoCX/tGcz72Q5XB6koq','ikuqcoBRbMDknmr7VTfLOwWEgKtDK1ARbdKoCgF5xyPZheISuMzQDxqmMxqG','2021-10-22 17:04:38','2021-11-21 17:35:38',5,NULL,1,NULL),(29,'JAMSHADCO','lappfinance@gmail.com','+971','555599706',NULL,NULL,'$2y$10$KAqexGUjVmRLo7b3cG/KU.pYd0fvzSoail3jGQ3o25e.cWWZCHVWe',NULL,'2021-10-22 20:02:23','2021-10-22 20:02:23',5,NULL,1,NULL),(30,'Suhail','checkersuhail@gmail.com','+971','553214563','2021-10-22 20:08:31',NULL,'$2y$10$HAJAqT5/l.ipT8j3Gre2UeFSzCrGYUmZWOiB01NzeHM1IqZOgBrY.',NULL,'2021-10-22 20:08:31','2021-11-21 17:16:55',3,NULL,1,NULL),(31,'JVCO','jamshadvadakethil@me.com','+971','555599707','2021-10-22 20:13:51',NULL,'$2y$10$yoVJsoAWXWL4klWjPJXxsumX4iXrFP8eIgmwvtiLht420tRtQnRHy',NULL,'2021-10-22 20:13:26','2021-10-22 20:13:51',5,NULL,1,NULL),(32,'nasaru','cnddubai@gmail.com','+971','564744021','2021-10-22 20:33:16',NULL,'$2y$10$.qrEFGkDnlQpxUKKfnUCHOtiHcSZet.VhGyhR8PO2eNhw1Ukobzdy','JtPR2ZakMWj7aNK3pPOHn6EOR7NRjYGcKWNcdAezuvkFMWUTXSoCPC9XQ1aK','2021-10-22 20:33:16','2021-12-11 22:57:06',4,120,1,NULL),(33,'madhumenon','abcd@123.com','+971','45345345',NULL,NULL,'$2y$10$Iesf1AGFViKRUAu68ewteuPyIdH0uphbbYxQGQEP5VBYC//Bwd6pi',NULL,'2021-10-25 13:56:56','2021-10-25 13:56:56',5,NULL,1,NULL),(34,'Test Supplier 2','test2supplier@gmail.com','+971','551478523','2021-10-30 15:21:30',NULL,'$2y$10$zivUJwbV32QxKq0Ix0IrtuHlB.IEJCIECfjcCEB4ZkaNYJpD5mDri',NULL,'2021-10-30 15:21:30','2021-10-30 15:21:30',6,NULL,1,NULL),(35,'dfsdfsdf','abc@gmail.com','+971','2345242',NULL,NULL,'$2y$10$Yxq/njMnl4fW0uyr4LLFoup3TM13EeNc7s1qBvi4bVfcaA/QHPznS',NULL,'2021-11-14 12:34:25','2021-11-14 12:34:25',5,NULL,1,NULL),(36,'Suma','info@amisinnovations.com','+971','654654','2021-11-14 07:00:00',NULL,'$2y$10$l/p3Rp/oRyyjh/5cCq1BZehOPgoR43WUiJGMkqkPiSKlT.ftXlewy',NULL,'2021-11-14 13:25:31','2021-11-14 13:25:31',5,NULL,1,NULL),(37,'AMIS INNOVATIONS FZ-LLC-Yahoo','madhumenonm@yahoo.com','+971','654654654654',NULL,NULL,'$2y$10$rpIqTOaw2ns3mlP0TwANI.zi7KSx8fDH25inqfi5KDIKIeAUllvWi',NULL,'2021-11-14 13:34:05','2021-11-14 13:34:05',5,NULL,1,NULL),(38,'ABCD Cafeteria','epsuhail@gmail.com','+971','505840326','2021-11-21 17:21:53',NULL,'$2y$10$YBVWGJ8DB5sriTGZe8ARROseUBIVPnDqmlzKl4Rv2wKeFtQ3wuFYK',NULL,'2021-11-21 17:18:58','2021-12-11 23:34:42',5,NULL,1,NULL),(39,'ABM','azeez@dubaiinvestments.com','+971','553714031',NULL,NULL,'$2y$10$IvKDhZn0cDMpge/ss7P0eO8rPgfesfGD9f1dXOXHsNxhXJMwUSIwK',NULL,'2021-11-22 22:40:26','2021-11-22 22:40:26',5,NULL,1,NULL),(40,'Aadtech','sujith.xtream@gmail.com','+971','987659876','2021-11-29 14:40:44',NULL,'$2y$10$d.lqVmI4Ol3WpBdBgIv2buflfJi9DzrhVx98jTIr0ZXtfpyqVyg02',NULL,'2021-11-29 14:35:09','2021-11-29 14:40:44',5,NULL,1,NULL),(41,'ATI Validator','aadhi.user2@gmail.com','+971','838483823','2021-11-29 14:38:18',NULL,'$2y$10$Do17BIglAfkmnYx6suDA1OTReFjxRM78fW8pKQVtvxzaY.Gln63im',NULL,'2021-11-29 14:38:18','2021-11-29 14:53:10',4,NULL,1,NULL),(42,'ATI Checker','aadhi.user3@gmail.com','+971','848583338','2021-11-29 14:39:14',NULL,'$2y$10$/rlEwfMfLJxstEgHYTsoc.83q/URduwYpHKBH67W3So0tdU9kzE8i',NULL,'2021-11-29 14:39:14','2021-11-29 14:39:14',3,NULL,1,NULL),(43,'binhussain','nasru.mba@gmail.com','+971','8672868','2021-12-11 22:22:56',NULL,'$2y$10$gxcfxIIghSaK23MryoauUueWxl9Rpu6jETZa3/wQ3Jf.7SfI8NAGm',NULL,'2021-12-11 22:20:43','2021-12-11 22:22:56',5,NULL,1,NULL),(44,'D3','deepakj_nair1@yahoo.co.in','+971','65465465454','2021-12-14 01:05:41',NULL,'$2y$10$tRQonu5ABb0HtblIZ0xNJeK8riNzvjSp4xtzv0/Ys2TZikzrRc/j2',NULL,'2021-12-14 01:05:41','2021-12-14 01:05:41',3,NULL,1,NULL),(45,'D322','deepakj_nair@yahoo.co.in','+971','6546546545411','2021-12-14 01:09:17',NULL,'$2y$10$TDJ6n43DCYtgtP.dunCqtO38zyGLF/cITxcltdK/P7ezWjgvHzpmq',NULL,'2021-12-14 01:09:17','2021-12-14 01:09:17',3,NULL,1,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validator_users`
--

DROP TABLE IF EXISTS `validator_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validator_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `region_id` bigint(20) unsigned DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `salary` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `validator_users_user_id_foreign` (`user_id`),
  KEY `validator_users_country_id_foreign` (`country_id`),
  KEY `validator_users_region_id_foreign` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validator_users`
--

LOCK TABLES `validator_users` WRITE;
/*!40000 ALTER TABLE `validator_users` DISABLE KEYS */;
INSERT INTO `validator_users` VALUES (1,3,NULL,'234567','Kakkanad','Kochi',2,NULL,'+91','7766554433','2021-09-07 01:30:00',1200.00,'2021-09-07 16:50:39','2021-09-07 16:50:39',NULL),(2,8,NULL,'e','PSN','City',2,NULL,'+91',NULL,'2021-09-11 03:00:00',3000.00,'2021-09-12 01:43:27','2021-09-12 01:43:27',NULL),(3,13,NULL,'pob','place','Manama',4,NULL,'+973',NULL,'2021-09-22 03:00:00',250.00,'2021-09-25 19:35:50','2021-09-25 19:35:50',NULL),(4,19,NULL,'341223','Dubai','Dubai',1,NULL,'+971','5555555','2021-10-12 03:00:00',1500.00,'2021-10-17 12:51:31','2021-10-17 12:51:31',NULL),(5,32,NULL,'435','ajman','123',1,NULL,'+971','564744021','2021-10-22 03:00:00',0.00,'2021-10-22 20:33:16','2021-10-22 20:33:16',NULL),(6,41,NULL,'37473','Qwerty','Dubai',1,NULL,'+971','948372635','2021-11-29 01:30:00',450000.00,'2021-11-29 14:38:18','2021-11-29 14:38:18',NULL);
/*!40000 ALTER TABLE `validator_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'prod_vatzapp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-15 22:02:06
