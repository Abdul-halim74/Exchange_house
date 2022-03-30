-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: etrans_emto
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `account_openings`
--

DROP TABLE IF EXISTS `account_openings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_openings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `branch_id` bigint(20) unsigned NOT NULL,
  `account_type_id` bigint(20) unsigned NOT NULL,
  `interest_rate` decimal(8,2) NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probably_monthly_income` decimal(8,2) DEFAULT NULL,
  `probably_monthly_transaction` decimal(8,2) DEFAULT NULL,
  `nominee_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_with_nominee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_dob` date DEFAULT NULL,
  `nominee_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominee_father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0: created, 1: authorize; 2: declined',
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `auth_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_openings`
--

LOCK TABLES `account_openings` WRITE;
/*!40000 ALTER TABLE `account_openings` DISABLE KEYS */;
INSERT INTO `account_openings` VALUES (3,1,1,1,7.00,'900000-1728624670671297','img/account/900000-1728624670671297/1728624670681977.BRAND_THC_VIKG_195080_TVE_000_2398_060_20161128_00_HD.jpg',77323.00,1432.00,'Rana Strong','349349349349','Tempor quia molestia','Qui tempor culpa al','2009-03-11','13','Deirdre Crane','Teagan Little','349349349349',0,'shahabuddin','2022-03-29',NULL,NULL,'2022-03-29 03:09:11','2022-03-29 03:09:11');
/*!40000 ALTER TABLE `account_openings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_types`
--

DROP TABLE IF EXISTS `account_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cbs_account_code` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` decimal(8,2) DEFAULT NULL COMMENT 'Tk.10,001 to above',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_types`
--

LOCK TABLES `account_types` WRITE;
/*!40000 ALTER TABLE `account_types` DISABLE KEYS */;
INSERT INTO `account_types` VALUES (1,NULL,'Savings',7.00,'2022-03-07 05:32:35','2022-03-07 05:32:35');
/*!40000 ALTER TABLE `account_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_infos`
--

DROP TABLE IF EXISTS `agent_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporate_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) unsigned NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnkOrg` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverFundGL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:created; 1:authorized; 2:declined',
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `auth_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `agent_infos_contact_unique` (`contact`),
  UNIQUE KEY `agent_infos_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_infos`
--

LOCK TABLES `agent_infos` WRITE;
/*!40000 ALTER TABLE `agent_infos` DISABLE KEYS */;
INSERT INTO `agent_infos` VALUES (1,NULL,'Dhaka-1217, Bangladesh',2,'01680850224','shahabuddin650@gmail.com',NULL,NULL,'12',NULL,1,'shahabuddin','2022-03-20','admin','2022-03-20','2022-03-19 22:34:39','2022-03-20 00:45:35');
/*!40000 ALTER TABLE `agent_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_infos`
--

DROP TABLE IF EXISTS `bank_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) unsigned NOT NULL,
  `bic_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankCode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bbFICodeRemit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_infos`
--

LOCK TABLES `bank_infos` WRITE;
/*!40000 ALTER TABLE `bank_infos` DISABLE KEYS */;
INSERT INTO `bank_infos` VALUES (1,2,'HVBKBDDH','255','Woori Bank','',NULL,NULL),(2,2,'UTBLBDDH','250','Uttara Bank Limited','',NULL,NULL),(3,2,'UCBLBDDH','245','United Commercial Bank Limited','',NULL,NULL),(4,2,'UBLDBDDH','265','Union Bank Limited','',NULL,NULL),(5,2,'TTBLBDDH','240','TRUST BANK LTD','',NULL,NULL),(6,2,'PRMRBDDH','235','The Premier Bank Limited','',NULL,NULL),(7,2,'FRMSBDDH','280','The Farmers Bank Limited','',NULL,NULL),(8,2,'CIBLBDDH','225','The City Bank Limited','',NULL,NULL),(9,2,'SBINBDDH','220','State Bank of India','',NULL,NULL),(10,2,'SCBLBDDX','215','Standard Chartered Bank Limited','',NULL,NULL),(11,2,'SDBLBDDH','210','Standard Bank Limited','',NULL,NULL),(12,2,'SEBDBDDH','205','Southeast Bank Limited','',NULL,NULL),(13,2,'SBACBDDH','270','SOUTH BANGLA AGRICULTURE AND COMMERCE BANK LTD','',NULL,NULL),(14,2,'BSONBDDH','200','Sonali Bank Limited','',NULL,NULL),(15,2,'SOIVBDDH','195','Social Islami Bank Limited','',NULL,NULL),(16,2,'SJBLBDDH','190','Shahjalal Islami Bank Limited','',NULL,NULL),(17,2,'RUPBBDDH','185','Rupali Bank Limited','',NULL,NULL),(18,2,'PUBABDDH','175','Pubali Bank Limited','',NULL,NULL),(19,2,'PRBLBDDH','170','Prime Bank Limited','',NULL,NULL),(20,2,'ONEBBDDH','165','One Bank Limited','',NULL,NULL),(21,2,'NGBLBDDH','300','NRB Global Bank Limited','',NULL,NULL),(22,2,'NRBBBDDH','260','NRB Commercial Bank Limited','',NULL,NULL),(23,2,'NRBDBDDH','290','NRB Bank Limited','',NULL,NULL),(24,2,'NCCLBDDH','160','NATIONAL CREDIT & COMMERCE BANK LTD','',NULL,NULL),(25,2,'NBPABDDH','155','National Bank Pakistan','',NULL,NULL),(26,2,'NBLBBDDH','150','National Bank Limited','',NULL,NULL),(27,2,'MTBLBDDH','145','Mutual Trust Bank Limited','',NULL,NULL),(28,2,'MODHBDDH','295','Modhumoti Bank Limited','',NULL,NULL),(29,2,'MDBLBDDH','285','Midland Bank Limited','',NULL,NULL),(30,2,'MBLBBDDH','140','Mercantile Bank Limited','',NULL,NULL),(31,2,'MGBLBDDH','275','Meghna Bank Limited','',NULL,NULL),(32,2,'JANBBDDH','135','Janata Bank Limited','',NULL,NULL),(33,2,'JAMUBDDH','130','Jamuna Bank Limited','',NULL,NULL),(34,2,'IBBLBDDH','125','Islami Bank Bangladesh Limited','',NULL,NULL),(35,2,'IFICBDDH','120','IFIC Bank Limited','',NULL,NULL),(36,2,'BBSHBDDH','230','ICB Islamic Bank Limited','',NULL,NULL),(37,2,'HSBCBDDH','115','HSBC Bank Limited','',NULL,NULL),(38,2,'HABBBDDH','110','Habib Bank Limited','',NULL,NULL),(39,2,'FSEBBDDH','105','First Security Islami Bank Limited','',NULL,NULL),(40,2,'EXBKBDDH','100','EXIM BANK LIMITED','',NULL,NULL),(41,2,'EBLDBDDH','095','Eastern Bank Limited','',NULL,NULL),(42,2,'DBBLBDDH','090','Dutch Bangla Bank Limited','',NULL,NULL),(43,2,'DHBLBDDH','085','Dhaka Bank Limited','',NULL,NULL),(44,2,'CCEYBDDH','080','COMMERCIAL BANK OF CYLON','',NULL,NULL),(45,2,'CITIBDDH','075','CITI Bank N.A.','',NULL,NULL),(46,2,'BRAKBDDH','060','BRAC Bank Limited','',NULL,NULL),(47,2,'BKSIBDDH','055','BASIC Bank Limited','',NULL,NULL),(48,2,'BALBBDDH','070','Bank Asia Limited','',NULL,NULL),(49,2,'ALFHBDDH','065','Bank Al-Falah Limited','',NULL,NULL),(50,2,'BKBABDDH','035','Bangladesh Krishi Bank','',NULL,NULL),(51,2,'BDDBBDDH','047','BDBL','',NULL,NULL),(52,2,'BCBLBDDH','030','BANGLADESH COMMERCE BANK Limited','',NULL,NULL),(53,2,'ALARBDDH','015','Al-Arafah Islami Bank Limited','',NULL,NULL),(54,2,'AGBKBDDH','010','Agrani Bank Limited','',NULL,NULL);
/*!40000 ALTER TABLE `bank_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_infos`
--

DROP TABLE IF EXISTS `branch_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bank_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routingNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_infos`
--

LOCK TABLES `branch_infos` WRITE;
/*!40000 ALTER TABLE `branch_infos` DISABLE KEYS */;
INSERT INTO `branch_infos` VALUES (1,12,'Agargaon Branch','545','656323235',NULL,NULL),(2,12,'Mohammadpur Branch','546','756566',NULL,NULL),(3,11,'Imamgonj Branch','7678','134345',NULL,NULL);
/*!40000 ALTER TABLE `branch_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) unsigned NOT NULL,
  `sub_country_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbCodeRemit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbCodeRouting` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,2,1,'Dhaka','210','26','master','2022-02-16','2022-02-16 05:26:08','2022-02-16 05:26:08'),(2,3,2,'Los Angeles','220','30','master','2022-02-16','2022-02-16 05:26:08','2022-02-16 05:26:08'),(3,1,3,'Abbey Wood','230','40','master','2022-02-16','2022-02-16 05:26:08','2022-02-16 05:26:08');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_infos`
--

DROP TABLE IF EXISTS `country_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` bigint(20) unsigned NOT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `country_infos_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_infos`
--

LOCK TABLES `country_infos` WRITE;
/*!40000 ALTER TABLE `country_infos` DISABLE KEYS */;
INSERT INTO `country_infos` VALUES (1,'United Kingdom','UK',4,'master','2022-02-22','2022-02-21 21:45:08','2022-02-21 21:45:08'),(2,'Bangladesh','BD',2,'master','2022-02-22','2022-02-21 21:45:08','2022-02-21 21:45:08'),(3,'United States Of America','USA',5,'master','2022-02-22','2022-02-21 21:45:08','2022-02-21 21:45:08');
/*!40000 ALTER TABLE `country_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency_infos`
--

DROP TABLE IF EXISTS `currency_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency_infos`
--

LOCK TABLES `currency_infos` WRITE;
/*!40000 ALTER TABLE `currency_infos` DISABLE KEYS */;
INSERT INTO `currency_infos` VALUES (1,'AED','784','master','2022-02-22','2022-02-21 21:24:57','2022-02-21 21:24:57'),(2,'BDT','50','master','2022-02-22','2022-02-21 21:24:58','2022-02-21 21:24:57'),(3,'EURO','978','master','2022-02-22','2022-02-21 21:24:59','2022-02-21 21:24:57'),(4,'GBP','826','master','2022-02-22','2022-02-21 21:25:00','2022-02-21 21:24:57'),(5,'USD','840','master','2022-02-22','2022-02-21 21:25:01','2022-02-21 21:24:57');
/*!40000 ALTER TABLE `currency_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency_rates`
--

DROP TABLE IF EXISTS `currency_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency_rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_currency_id` bigint(20) unsigned DEFAULT NULL,
  `to_currency_id` bigint(20) unsigned DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `bank_id` bigint(20) unsigned DEFAULT NULL,
  `rate_amount` decimal(8,2) unsigned DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:created, 1:authorized, 2:declined',
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `auth_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency_rates`
--

LOCK TABLES `currency_rates` WRITE;
/*!40000 ALTER TABLE `currency_rates` DISABLE KEYS */;
INSERT INTO `currency_rates` VALUES (1,5,2,2,12,88.97,1,'shahabuddin','2022-03-20','admin','2022-03-27','2022-03-19 22:35:32','2022-03-27 03:24:52');
/*!40000 ALTER TABLE `currency_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_infos`
--

DROP TABLE IF EXISTS `customer_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) unsigned NOT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  `id_type` bigint(20) unsigned DEFAULT NULL,
  `occupation_id` bigint(20) unsigned DEFAULT NULL,
  `work_permit_id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_permit_id_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `auth_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:created, 1:authorized; 2:declined',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_infos_id_number_unique` (`id_number`),
  UNIQUE KEY `customer_infos_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_infos`
--

LOCK TABLES `customer_infos` WRITE;
/*!40000 ALTER TABLE `customer_infos` DISABLE KEYS */;
INSERT INTO `customer_infos` VALUES (1,2,1,2,31,'795795795795','img/customer/795795795795/1727792181265011.benjamin-voros-phIFdC6lA4E-unsplash.jpg','Nora Duke','Zorita Small','Joan Herman','Male','1991-11-09','Exercitationem accus','Married','Elit do veritatis s','Natus laborum Sapie','Corporate','494494494494','img/customer/494494494494/1727792181264219.BRAND_THC_VIKG_195080_TVE_000_2398_060_20161128_00_HD.jpg','521521521521521','vita@mailinator.com','Bright Nolan Plc','Galloway Spears Associates','1234545667','shahabuddin','2022-03-20','admin','2022-03-20',1,'2022-03-19 22:37:07','2022-03-19 22:41:50');
/*!40000 ALTER TABLE `customer_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_types`
--

DROP TABLE IF EXISTS `customer_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_types`
--

LOCK TABLES `customer_types` WRITE;
/*!40000 ALTER TABLE `customer_types` DISABLE KEYS */;
INSERT INTO `customer_types` VALUES (1,'Individual','2022-03-12 00:32:41','2022-03-12 00:32:41'),(2,'Company','2022-03-12 00:32:41','2022-03-12 00:32:41'),(3,'Corporate','2022-03-12 00:34:19','2022-03-12 00:34:19');
/*!40000 ALTER TABLE `customer_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'Female','2022-03-12 00:17:10','2022-03-12 00:17:10'),(2,'Male','2022-03-12 00:19:27','2022-03-12 00:19:27'),(3,'Others','2022-03-12 00:19:27','2022-03-12 00:19:27');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identification_types`
--

DROP TABLE IF EXISTS `identification_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `identification_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identification_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identification_types`
--

LOCK TABLES `identification_types` WRITE;
/*!40000 ALTER TABLE `identification_types` DISABLE KEYS */;
INSERT INTO `identification_types` VALUES (1,'National ID','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40'),(2,'Passport','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40'),(3,'Driving License','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40'),(4,'Government official ID','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40'),(5,'Birth Certificate & Other ID','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40'),(6,'Arm force ID','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40'),(7,'Work Permit','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40'),(8,'Other ID','master','2022-02-22','2022-02-21 21:20:40','2022-02-21 21:20:40');
/*!40000 ALTER TABLE `identification_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_infos`
--

DROP TABLE IF EXISTS `log_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_infos`
--

LOCK TABLES `log_infos` WRITE;
/*!40000 ALTER TABLE `log_infos` DISABLE KEYS */;
INSERT INTO `log_infos` VALUES (1,'TransactionFee','Transaction charge store','Failed','Charge is greater than end amount',NULL,NULL,'shahabuddin','2022-03-20','2022-03-20 00:33:35','2022-03-20 00:33:35'),(2,'TransactionFee','Transaction charge store','Failed','Charge is greater than end amount',NULL,'127.0.0.1','shahabuddin','2022-03-20','2022-03-20 00:36:41','2022-03-20 00:36:41'),(3,'TransactionFee','Transaction charge store','Failed','Charge is greater than end amount',NULL,'127.0.0.1','shahabuddin','2022-03-20','2022-03-20 00:38:03','2022-03-20 00:38:03'),(4,'TransactionFee','Transaction charge store','Failed','Start is greater than end amount',NULL,'127.0.0.1','shahabuddin','2022-03-20','2022-03-20 00:38:40','2022-03-20 00:38:40'),(5,'CustomerInfo','Customer store','Success','Customer has been added successfully','{\"name\":\"Quemby Wynn\",\"customer_type\":\"Company\",\"id_type\":\"3\",\"id_number\":\"781781781781\",\"doc_name\":\"img\\/customer\\/781781781781\\/1727909497502305.BRAND_THC_VIKG_195080_TVE_000_2398_060_20161128_00_HD.jpg\",\"contact_number\":\"677677677677\",\"email\":\"quzafaxehi@mailinator.com\",\"country_id\":\"3\",\"city_id\":\"2\",\"company_name\":\"Joseph and Manning Plc\",\"company_address\":\"Mccray Lambert Associates\",\"company_phone\":\"677123123432\",\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-21T11:41:50.694224Z\",\"work_permit_id_number\":\"435435435435\",\"work_permit_id_image\":\"img\\/customer\\/435435435435\\/1727909499409463.BRAND_THC_VIKG_195080_TVE_000_2398_060_20161128_00_HD.jpg\",\"updated_at\":\"2022-03-21T11:41:50.000000Z\",\"created_at\":\"2022-03-21T11:41:50.000000Z\",\"id\":2}','127.0.0.1','shahabuddin','2022-03-21','2022-03-21 05:41:50','2022-03-21 05:41:50'),(6,'CustomerInfo','Customer authorize','Failed','You do not have the permission',NULL,'127.0.0.1','shahabuddin','2022-03-21','2022-03-21 05:47:31','2022-03-21 05:47:31'),(7,'CustomerInfo','Customer authorize','Success','Customer is being authorized successfully','{\"id\":2,\"country_id\":3,\"city_id\":2,\"id_type\":3,\"occupation_id\":null,\"work_permit_id_number\":\"435435435435\",\"work_permit_id_image\":\"img\\/customer\\/435435435435\\/1727909499409463.BRAND_THC_VIKG_195080_TVE_000_2398_060_20161128_00_HD.jpg\",\"name\":\"Quemby Wynn\",\"mother_name\":null,\"father_name\":null,\"gender\":null,\"dob\":null,\"place_of_birth\":null,\"marital_status\":null,\"permanent_address\":null,\"present_address\":null,\"customer_type\":\"Company\",\"id_number\":\"781781781781\",\"doc_name\":\"img\\/customer\\/781781781781\\/1727909497502305.BRAND_THC_VIKG_195080_TVE_000_2398_060_20161128_00_HD.jpg\",\"contact_number\":\"677677677677\",\"email\":\"quzafaxehi@mailinator.com\",\"company_name\":\"Joseph and Manning Plc\",\"company_address\":\"Mccray Lambert Associates\",\"company_phone\":\"677123123432\",\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-21\",\"auth_by\":null,\"auth_date\":null,\"status\":0,\"created_at\":\"2022-03-21T11:41:50.000000Z\",\"updated_at\":\"2022-03-21T11:41:50.000000Z\"}','127.0.0.1','admin','2022-03-21','2022-03-21 05:47:54','2022-03-21 05:47:54'),(8,'AccountOpening','Account store','Success','Account has been created successfully','{\"customer_id\":\"2\",\"branch_id\":1,\"account_type_id\":\"1\",\"interest_rate\":\"7.00\",\"account_no\":\"900000-1727911688281211\",\"signature_image\":\"img\\/account\\/900000-1727911688281211\\/1727911688281305.19780769_867846480033763_2172166078806762519_o.jpg\",\"probably_monthly_income\":\"895\",\"probably_monthly_transaction\":\"10\",\"nominee_name\":null,\"nominee_nid_number\":null,\"nominee_address\":null,\"relation_with_nominee\":null,\"nominee_dob\":null,\"nominee_age\":0,\"nominee_father_name\":null,\"nominee_mother_name\":null,\"nominee_contact_no\":null,\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-21T12:16:38.139323Z\",\"updated_at\":\"2022-03-21T12:16:38.000000Z\",\"created_at\":\"2022-03-21T12:16:38.000000Z\",\"id\":2}','127.0.0.1','shahabuddin','2022-03-21','2022-03-21 06:16:38','2022-03-21 06:16:38'),(9,'AccountOpening','Account update','Success','Account has been updated successfully','{\"id\":1,\"customer_id\":1,\"branch_id\":1,\"account_type_id\":\"1\",\"interest_rate\":\"7.00\",\"account_no\":\"900000-1727792974755246\",\"signature_image\":\"img\\/account\\/900000-1727792974755246\\/1727793312051664.benjamin-voros-phIFdC6lA4E-unsplash.jpg\",\"probably_monthly_income\":\"18000.00\",\"probably_monthly_transaction\":\"800.00\",\"nominee_name\":null,\"nominee_nid_number\":null,\"nominee_address\":null,\"relation_with_nominee\":null,\"nominee_dob\":null,\"nominee_age\":0,\"nominee_father_name\":null,\"nominee_mother_name\":null,\"nominee_contact_no\":null,\"status\":0,\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-21T12:17:21.286111Z\",\"auth_by\":\"admin\",\"auth_date\":\"2022-03-20\",\"created_at\":\"2022-03-20T04:49:44.000000Z\",\"updated_at\":\"2022-03-21T12:17:21.000000Z\"}','127.0.0.1','shahabuddin','2022-03-21','2022-03-21 06:17:21','2022-03-21 06:17:21'),(10,'AccountOpening','Account authorize','Success','Account is being authorized successfully','{\"id\":2,\"customer_id\":2,\"branch_id\":1,\"account_type_id\":1,\"interest_rate\":\"7.00\",\"account_no\":\"900000-1727911688281211\",\"signature_image\":\"img\\/account\\/900000-1727911688281211\\/1727911688281305.19780769_867846480033763_2172166078806762519_o.jpg\",\"probably_monthly_income\":\"895.00\",\"probably_monthly_transaction\":\"10.00\",\"nominee_name\":null,\"nominee_nid_number\":null,\"nominee_address\":null,\"relation_with_nominee\":null,\"nominee_dob\":null,\"nominee_age\":\"0\",\"nominee_father_name\":null,\"nominee_mother_name\":null,\"nominee_contact_no\":null,\"status\":0,\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-21\",\"auth_by\":null,\"auth_date\":null,\"created_at\":\"2022-03-21T12:16:38.000000Z\",\"updated_at\":\"2022-03-21T12:16:38.000000Z\"}','127.0.0.1','admin','2022-03-21','2022-03-21 06:19:13','2022-03-21 06:19:13'),(11,'AccountOpening','Account update','Success','Account has been updated successfully','{\"id\":2,\"customer_id\":2,\"branch_id\":1,\"account_type_id\":\"1\",\"interest_rate\":\"7.00\",\"account_no\":\"900000-1727911688281211\",\"signature_image\":\"img\\/account\\/900000-1727911688281211\\/1727911688281305.19780769_867846480033763_2172166078806762519_o.jpg\",\"probably_monthly_income\":\"895.00\",\"probably_monthly_transaction\":\"10.00\",\"nominee_name\":null,\"nominee_nid_number\":null,\"nominee_address\":null,\"relation_with_nominee\":null,\"nominee_dob\":null,\"nominee_age\":0,\"nominee_father_name\":null,\"nominee_mother_name\":null,\"nominee_contact_no\":null,\"status\":0,\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-21T12:42:25.055386Z\",\"auth_by\":\"admin\",\"auth_date\":\"2022-03-21\",\"created_at\":\"2022-03-21T12:16:38.000000Z\",\"updated_at\":\"2022-03-21T12:42:25.000000Z\"}','127.0.0.1','shahabuddin','2022-03-21','2022-03-21 06:42:25','2022-03-21 06:42:25'),(12,'AccountOpening','Account authorize','Success','Account is being authorized successfully','{\"id\":2,\"customer_id\":2,\"branch_id\":1,\"account_type_id\":1,\"interest_rate\":\"7.00\",\"account_no\":\"900000-1727911688281211\",\"signature_image\":\"img\\/account\\/900000-1727911688281211\\/1727911688281305.19780769_867846480033763_2172166078806762519_o.jpg\",\"probably_monthly_income\":\"895.00\",\"probably_monthly_transaction\":\"10.00\",\"nominee_name\":null,\"nominee_nid_number\":null,\"nominee_address\":null,\"relation_with_nominee\":null,\"nominee_dob\":null,\"nominee_age\":\"0\",\"nominee_father_name\":null,\"nominee_mother_name\":null,\"nominee_contact_no\":null,\"status\":0,\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-21\",\"auth_by\":\"admin\",\"auth_date\":\"2022-03-21\",\"created_at\":\"2022-03-21T12:16:38.000000Z\",\"updated_at\":\"2022-03-21T12:42:25.000000Z\"}','127.0.0.1','admin','2022-03-21','2022-03-21 06:43:01','2022-03-21 06:43:01'),(13,'RoleTable','Role store','Failed','Data already Exist',NULL,'127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:26:32','2022-03-25 13:26:32'),(14,'RoleTable','Role store','Success','Role  has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:28:51','2022-03-25 13:28:51'),(15,'RoleTable','Role update','Success','Role Info has been updated successfully','{\"id\":3,\"role_name\":\"Test\",\"created_by\":\"admin\",\"created_at\":\"2022-03-26T00:58:18.000000Z\",\"updated_at\":\"2022-03-26T00:58:18.000000Z\"}','127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:46:15','2022-03-25 13:46:15'),(16,'RoleTable','Role update','Success','Role Info has been updated successfully','{\"id\":3,\"role_name\":\"Test\",\"created_by\":\"shahabuddin\",\"created_at\":\"2022-03-26T00:58:18.000000Z\",\"updated_at\":\"2022-03-25T19:46:15.000000Z\"}','127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:46:25','2022-03-25 13:46:25'),(17,'RoleTable','Role update','Failed','Data already exist',NULL,'127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:47:44','2022-03-25 13:47:44'),(18,'RoleTable','Role update','Success','Role Info has been updated successfully','{\"id\":3,\"role_name\":\"Test\",\"created_by\":\"shahabuddin\",\"created_at\":\"2022-03-26T00:58:18.000000Z\",\"updated_at\":\"2022-03-25T19:46:25.000000Z\"}','127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:47:51','2022-03-25 13:47:51'),(19,'RoleTable','Role update','Success','Role Info has been updated successfully','{\"id\":3,\"role_name\":\"Test3\",\"created_by\":\"shahabuddin\",\"created_at\":\"2022-03-26T00:58:18.000000Z\",\"updated_at\":\"2022-03-25T19:47:51.000000Z\"}','127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:47:59','2022-03-25 13:47:59'),(20,'RoleTable','Role delete','Success','Role Info has been deleted successfully','{\"id\":3,\"role_name\":\"Test\",\"created_by\":\"shahabuddin\",\"created_at\":\"2022-03-26T00:58:18.000000Z\",\"updated_at\":\"2022-03-25T19:47:59.000000Z\"}','127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:58:34','2022-03-25 13:58:34'),(21,'RoleTable','Role store','Success','Role  has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:58:43','2022-03-25 13:58:43'),(22,'RoleTable','Role delete','Success','Role Info has been deleted successfully','{\"id\":5,\"role_name\":\"jonesdew\",\"created_by\":\"shahabuddin\",\"created_at\":\"2022-03-25T19:58:43.000000Z\",\"updated_at\":\"2022-03-25T19:58:43.000000Z\"}','127.0.0.1','shahabuddin','2022-03-25','2022-03-25 13:59:17','2022-03-25 13:59:17'),(23,'RoleTable','Role store','Success','Role  has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-25','2022-03-25 14:16:37','2022-03-25 14:16:37'),(24,'RoleTable','Role update','Failed','Data already exist',NULL,'127.0.0.1','shahabuddin','2022-03-25','2022-03-25 14:16:55','2022-03-25 14:16:55'),(25,'Permission','Permission store','Success','Permission has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-25','2022-03-25 14:54:20','2022-03-25 14:54:20'),(26,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":1,\"role_id\":6,\"permission\":{\"role.create\":{\"create\":\"1\"},\"role\":{\"view\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.destroy\":{\"delete\":\"1\"},\"role.index\":{\"list\":\"1\"}},\"created_at\":\"2022-03-25T20:54:20.000000Z\",\"updated_at\":\"2022-03-25T20:54:20.000000Z\"}','127.0.0.1','shahabuddin','2022-03-27','2022-03-27 01:37:22','2022-03-27 01:37:22'),(27,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":1,\"role_id\":6,\"permission\":{\"role.create\":{\"create\":\"1\"},\"role\":{\"view\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.index\":{\"list\":\"1\"}},\"created_at\":\"2022-03-25T20:54:20.000000Z\",\"updated_at\":\"2022-03-27T07:37:22.000000Z\"}','127.0.0.1','shahabuddin','2022-03-27','2022-03-27 01:37:36','2022-03-27 01:37:36'),(28,'Permission','Permission delete','Success','Permission has been delete successfully','{\"id\":1,\"role_id\":6,\"permission\":{\"role.create\":{\"create\":\"1\"},\"role\":{\"view\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.destroy\":{\"delete\":\"1\"},\"role.index\":{\"list\":\"1\"}},\"created_at\":\"2022-03-25T20:54:20.000000Z\",\"updated_at\":\"2022-03-27T07:37:36.000000Z\"}','127.0.0.1','shahabuddin','2022-03-27','2022-03-27 01:43:38','2022-03-27 01:43:38'),(29,'Permission','Permission store','Success','Permission has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-27','2022-03-27 02:00:04','2022-03-27 02:00:04'),(30,'CurrencyRate','Currency rate authorize','Success','Currency rate has been authorized successfully','{\"id\":1,\"from_currency_id\":5,\"to_currency_id\":2,\"country_id\":2,\"bank_id\":12,\"rate_amount\":\"88.97\",\"status\":0,\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-20\",\"auth_by\":null,\"auth_date\":null,\"created_at\":\"2022-03-20T04:35:32.000000Z\",\"updated_at\":\"2022-03-20T04:35:32.000000Z\"}','127.0.0.1','admin','2022-03-27','2022-03-27 03:24:52','2022-03-27 03:24:52'),(31,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"role.create\":{\"create\":\"1\"},\"role\":{\"view\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.destroy\":{\"delete\":\"1\"},\"role.index\":{\"list\":\"1\"},\"permission.create\":{\"create\":\"1\"},\"permission\":{\"view\":\"1\"},\"permission.edit\":{\"edit\":\"1\"},\"permission.destroy\":{\"delete\":\"1\"},\"permission.index\":{\"list\":\"1\"},\"agent.create\":{\"create\":\"1\"},\"agent\":{\"view\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.destroy\":{\"delete\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.auth\":{\"auth\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-27T08:00:04.000000Z\"}','127.0.0.1','admin','2022-03-27','2022-03-27 04:06:21','2022-03-27 04:06:21'),(32,'Permission','Permission store','Success','Permission has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-27','2022-03-27 05:39:12','2022-03-27 05:39:12'),(33,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":3,\"role_id\":4,\"permission\":{\"role\":{\"view\":\"1\"},\"role.index\":{\"list\":\"1\"},\"role.create\":{\"create\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.destroy\":{\"delete\":\"1\"},\"permission\":{\"view\":\"1\"},\"permission.index\":{\"list\":\"1\"},\"permission.create\":{\"create\":\"1\"},\"permission.edit\":{\"edit\":\"1\"},\"permission.destroy\":{\"delete\":\"1\"},\"agent\":{\"view\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.create\":{\"create\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.auth\":{\"auth\":\"1\"},\"agent.decline\":{\"decline\":\"1\"},\"currency\":{\"view\":\"1\"},\"currency.create\":{\"create\":\"1\"},\"currency.edit\":{\"edit\":\"1\"},\"rate\":{\"view\":\"1\"},\"rate.index\":{\"list\":\"1\"},\"rate.create\":{\"create\":\"1\"},\"rate.edit\":{\"edit\":\"1\"},\"rate.auth\":{\"auth\":\"1\"},\"rate.decline\":{\"decline\":\"1\"},\"fee\":{\"view\":\"1\"},\"fee.index\":{\"list\":\"1\"},\"fee.create\":{\"create\":\"1\"},\"fee.edit\":{\"edit\":\"1\"},\"fee.auth\":{\"auth\":\"1\"},\"fee.decline\":{\"decline\":\"1\"},\"customer\":{\"view\":\"1\"},\"customer.index\":{\"list\":\"1\"},\"customer.create\":{\"create\":\"1\"},\"customer.edit\":{\"edit\":\"1\"},\"customer.auth\":{\"auth\":\"1\"},\"customer.decline\":{\"decline\":\"1\"},\"account\":{\"view\":\"1\"},\"account.index\":{\"list\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"},\"account.decline\":{\"decline\":\"1\"},\"remittance\":{\"view\":\"1\"},\"remittance.index\":{\"list\":\"1\"},\"remittance.create\":{\"create\":\"1\"},\"remittance.edit\":{\"edit\":\"1\"},\"remittance.auth\":{\"auth\":\"1\"},\"remittance.decline\":{\"decline\":\"1\"}},\"created_at\":\"2022-03-27T11:39:11.000000Z\",\"updated_at\":\"2022-03-27T11:39:11.000000Z\"}','127.0.0.1','shahabuddin','2022-03-27','2022-03-27 06:45:50','2022-03-27 06:45:50'),(34,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"role.create\":{\"create\":\"1\"},\"role\":{\"view\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.index\":{\"list\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-27T10:06:21.000000Z\"}','127.0.0.1','shahabuddin','2022-03-27','2022-03-27 06:59:00','2022-03-27 06:59:00'),(35,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"permission\":{\"view\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-27T12:59:00.000000Z\"}','127.0.0.1','shahabuddin','2022-03-28','2022-03-27 22:32:17','2022-03-27 22:32:17'),(36,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"permission\":{\"view\":\"1\"},\"customer\":{\"view\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-28T04:32:17.000000Z\"}','127.0.0.1','shahabuddin','2022-03-28','2022-03-27 22:35:52','2022-03-27 22:35:52'),(37,'User','user store','Failed','Data already Exist',NULL,'127.0.0.1','shahabuddin','2022-03-28','2022-03-28 03:31:14','2022-03-28 03:31:14'),(38,'User','User store','Success','User  has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-28','2022-03-28 03:34:20','2022-03-28 03:34:20'),(39,'User','User store','Success','User  has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-29','2022-03-28 22:57:21','2022-03-28 22:57:21'),(40,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"permission\":{\"view\":\"1\"},\"customer\":{\"view\":\"1\"},\"customer.edit\":{\"edit\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-28T04:35:52.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-28 23:17:59','2022-03-28 23:17:59'),(41,'RoleTable','Role store','Success','Role  has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-29','2022-03-28 23:19:20','2022-03-28 23:19:20'),(42,'User','User update','Failed','Data already exist','{\"id\":4,\"user_id\":\"nyfovygu\",\"name\":\"Samuel Cunningham\",\"agent_id\":null,\"agent_br_id\":null,\"agnt_tp\":null,\"emp_id\":null,\"status\":null,\"entry_usr_key_id\":null,\"entry_date\":null,\"entry_time\":null,\"role_id\":4,\"ip\":\"0\",\"screening\":null,\"login_type\":null,\"email\":\"nyjaxapu@mailinator.com\",\"email_verified_at\":null,\"created_at\":\"2022-03-29T04:57:21.000000Z\",\"updated_at\":\"2022-03-29T05:13:20.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-28 23:35:44','2022-03-28 23:35:44'),(43,'User','User authorize','Success','User is being authorized successfully','{\"id\":4,\"user_id\":\"nyfovygu\",\"name\":\"Samuel Cunningham\",\"agent_id\":null,\"agent_br_id\":null,\"agnt_tp\":null,\"emp_id\":null,\"status\":null,\"entry_usr_key_id\":null,\"entry_date\":null,\"entry_time\":null,\"role_id\":4,\"ip\":\"0\",\"screening\":null,\"login_type\":null,\"email\":\"nyjaxapu@mailinator.com\",\"email_verified_at\":null,\"created_at\":\"2022-03-29T04:57:21.000000Z\",\"updated_at\":\"2022-03-29T05:13:20.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-28 23:36:27','2022-03-28 23:36:27'),(44,'Permission','Permission store','Success','Permission has been created successfully',NULL,'127.0.0.1','shahabuddin','2022-03-29','2022-03-29 01:54:35','2022-03-29 01:54:35'),(45,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"customer.edit\":{\"edit\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-29T05:17:59.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 02:38:24','2022-03-29 02:38:24'),(46,'AccountOpening','Account store','Success','Account has been created successfully','{\"customer_id\":\"1\",\"branch_id\":1,\"account_type_id\":\"1\",\"interest_rate\":\"7.00\",\"account_no\":\"900000-1728624670671297\",\"signature_image\":\"img\\/account\\/900000-1728624670671297\\/1728624670681977.BRAND_THC_VIKG_195080_TVE_000_2398_060_20161128_00_HD.jpg\",\"probably_monthly_income\":\"77323\",\"probably_monthly_transaction\":\"1432\",\"nominee_name\":\"Rana Strong\",\"nominee_nid_number\":\"349349349349\",\"nominee_address\":\"Tempor quia molestia\",\"relation_with_nominee\":\"Qui tempor culpa al\",\"nominee_dob\":\"2009-03-11\",\"nominee_age\":13,\"nominee_father_name\":\"Deirdre Crane\",\"nominee_mother_name\":\"Teagan Little\",\"nominee_contact_no\":\"349349349349\",\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-29T09:09:11.170200Z\",\"updated_at\":\"2022-03-29T09:09:11.000000Z\",\"created_at\":\"2022-03-29T09:09:11.000000Z\",\"id\":3}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 03:09:11','2022-03-29 03:09:11'),(47,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"customer.edit\":{\"edit\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-29T05:17:59.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 03:10:53','2022-03-29 03:10:53'),(48,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"customer.edit\":{\"edit\":\"1\"},\"account\":{\"view\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-29T09:10:53.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 03:11:18','2022-03-29 03:11:18'),(49,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"customer.edit\":{\"edit\":\"1\"},\"account\":{\"view\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-29T09:11:18.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 03:13:03','2022-03-29 03:13:03'),(50,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"agent\":{\"view\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.create\":{\"create\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.auth\":{\"auth\":\"1\"},\"agent.decline\":{\"decline\":\"1\"},\"customer.edit\":{\"edit\":\"1\"},\"account\":{\"view\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-29T09:13:03.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 03:17:12','2022-03-29 03:17:12'),(51,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"agent\":{\"view\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.auth\":{\"auth\":\"1\"},\"agent.decline\":{\"decline\":\"1\"},\"customer.edit\":{\"edit\":\"1\"},\"account\":{\"view\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-29T09:17:11.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 03:26:33','2022-03-29 03:26:33'),(52,'Permission','Permission update','Success','Permission has been created successfully','{\"id\":2,\"role_id\":6,\"permission\":{\"agent\":{\"view\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.auth\":{\"auth\":\"1\"},\"agent.decline\":{\"decline\":\"1\"},\"currency\":{\"view\":\"1\"},\"currency.index\":{\"list\":\"1\"},\"customer.edit\":{\"edit\":\"1\"},\"account\":{\"view\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"}},\"created_at\":\"2022-03-27T08:00:04.000000Z\",\"updated_at\":\"2022-03-29T09:26:33.000000Z\"}','127.0.0.1','shahabuddin','2022-03-29','2022-03-29 03:27:20','2022-03-29 03:27:20');
/*!40000 ALTER TABLE `log_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marital_statuses`
--

DROP TABLE IF EXISTS `marital_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marital_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marital_statuses`
--

LOCK TABLES `marital_statuses` WRITE;
/*!40000 ALTER TABLE `marital_statuses` DISABLE KEYS */;
INSERT INTO `marital_statuses` VALUES (1,'Single','2022-03-12 00:20:30','2022-03-12 00:20:30'),(2,'Married','2022-03-12 00:20:51','2022-03-12 00:20:51'),(3,'Widowed','2022-03-12 00:20:51','2022-03-12 00:20:51'),(4,'Divorced','2022-03-12 00:20:51','2022-03-12 00:20:51');
/*!40000 ALTER TABLE `marital_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_01_25_100936_create_role_tables_table',1),(6,'2022_02_15_110805_create_cities_table',1),(7,'2022_02_15_111428_create_customer_infos_table',1),(8,'2022_02_16_072213_create_country_infos_table',1),(9,'2022_02_16_072323_create_identification_types_table',1),(10,'2022_02_16_095841_create_currency_infos_table',1),(11,'2022_02_16_100017_create_sub_country_infos_table',1),(12,'2022_02_17_114519_create_log_infos_table',1),(13,'2022_02_22_084108_create_occupations_table',1),(14,'2022_02_23_052602_create_currency_rates_table',1),(15,'2022_02_23_070010_create_transactions_table',1),(16,'2022_02_23_071153_create_transaction_accepts_table',1),(17,'2022_02_26_045527_create_account_types_table',1),(18,'2022_02_26_061818_create_account_openings_table',1),(19,'2022_03_01_045208_create_transaction_fees_table',1),(20,'2022_03_01_110423_create_bank_infos_table',1),(21,'2022_03_01_111559_create_branch_infos_table',1),(22,'2022_03_01_115155_create_agent_infos_table',1),(23,'2022_03_07_123139_add_currency_id_to_transaction_fees_table',1),(24,'2022_03_10_064744_add_work_permit_and_work_parmit_image_to_customer_infos_table',1),(25,'2022_03_12_060933_create_genders_table',1),(26,'2022_03_12_061214_create_marital_statuses_table',1),(27,'2022_03_12_062258_create_customer_types_table',1),(28,'2022_03_21_055611_create_transaction_logs_table',2),(29,'2022_03_25_200159_create_permissions_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `occupations`
--

DROP TABLE IF EXISTS `occupations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `occupations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `occupations`
--

LOCK TABLES `occupations` WRITE;
/*!40000 ALTER TABLE `occupations` DISABLE KEYS */;
INSERT INTO `occupations` VALUES (1,'001','Jewelry/Gold related Bussiness','2021-02-28 18:34:30','2021-02-28 18:34:30'),(2,'002','Money Changer/Courier Service Agent','2021-02-28 18:34:30','2021-02-28 18:34:30'),(3,'003','Real Estate Agent','2021-02-28 18:34:30','2021-02-28 18:34:30'),(4,'004','Constrution Project Promoter','2021-02-28 18:34:30','2021-02-28 18:34:30'),(5,'005','Offshore Corporation','2021-02-28 18:34:30','2021-02-28 18:34:30'),(6,'006','Art/Antique Deater','2021-02-28 18:34:30','2021-02-28 18:34:30'),(7,'007','Restaurant/Bar/Night Club/Residential Hotel Owner','2021-02-28 18:34:30','2021-02-28 18:34:30'),(8,'008','Import/Export Agent','2021-02-28 18:34:30','2021-02-28 18:34:30'),(9,'009','Money Lenders(Taka 25 Lacs per month)','2021-02-28 18:34:30','2021-02-28 18:34:30'),(10,'010','Share/Stock Dealer','2021-02-28 18:34:30','2021-02-28 18:34:30'),(11,'011','Manpower Export Bussiness','2021-02-28 18:34:30','2021-02-28 18:34:30'),(12,'012','Operation in/from several location','2021-02-28 18:34:30','2021-02-28 18:34:30'),(13,'013','Film Production/Distribution','2021-02-28 18:34:30','2021-02-28 18:34:30'),(14,'014','Arms Bussiness','2021-02-28 18:34:31','2021-02-28 18:34:31'),(15,'015','Mobile Phone Operation','2021-02-28 18:34:31','2021-02-28 18:34:31'),(16,'016','Money Lender(Taka 1 Crore per annum','2021-02-28 18:34:31','2021-02-28 18:34:31'),(17,'017','Travel Agent','2021-02-28 18:34:31','2021-02-28 18:34:31'),(18,'018','Transport Operator','2021-02-28 18:34:31','2021-02-28 18:34:31'),(19,'019','Auto Dealer(Recondition vehicles)','2021-02-28 18:34:31','2021-02-28 18:34:31'),(20,'020','Leasing/Financing Company','2021-02-28 18:34:31','2021-02-28 18:34:31'),(21,'021','Freight/Shipping/Cargo Agent','2021-02-28 18:34:31','2021-02-28 18:34:31'),(22,'022','Insurance/Brokerage Agency','2021-02-28 18:34:31','2021-02-28 18:34:31'),(23,'023','Religious Organization','2021-02-28 18:34:31','2021-02-28 18:34:31'),(24,'024','Recreation Firm/Park','2021-02-28 18:34:31','2021-02-28 18:34:31'),(25,'025','Motor Parts Business','2021-02-28 18:34:31','2021-02-28 18:34:31'),(26,'026','Tobacco/Cigarette Business','2021-02-28 18:34:31','2021-02-28 18:34:31'),(27,'027','Auto Primary(New Vehicle','2021-02-28 18:34:31','2021-02-28 18:34:31'),(28,'028','Retail Shop Owner','2021-02-28 18:34:31','2021-02-28 18:34:31'),(29,'029','Business Agent','2021-02-28 18:34:31','2021-02-28 18:34:31'),(30,'030','Small Business(Turnover of below Tk. 50 Lacs per Annum','2021-02-28 18:34:31','2021-02-28 18:34:31'),(31,'031','Self Employed','2021-02-28 18:34:31','2021-02-28 18:34:31'),(32,'032','Corporate Customer','2021-02-28 18:34:31','2021-02-28 18:34:31'),(33,'033','Building Material Business','2021-02-28 18:34:31','2021-02-28 18:34:31'),(34,'034','Computer/Mobile Phone Dealer','2021-02-28 18:34:31','2021-02-28 18:34:31'),(35,'035','Software Business','2021-02-28 18:34:31','2021-02-28 18:34:31'),(36,'036','Manufacturer(Excluding Weapons)','2021-02-28 18:34:31','2021-02-28 18:34:31'),(37,'037','Retired from job','2021-02-28 18:34:31','2021-02-28 18:34:31'),(38,'038','Job','2021-02-28 18:34:31','2021-02-28 18:34:31'),(39,'039','Student','2021-02-28 18:34:31','2021-02-28 18:34:31'),(40,'040','Housewife','2021-02-28 18:34:31','2021-02-28 18:34:31'),(41,'041','Farmer','2021-02-28 18:34:32','2021-02-28 18:34:32'),(42,'042','Other(Bank to assign Risk Score based on nature and type)','2021-02-28 18:34:32','2021-02-28 18:34:32');
/*!40000 ALTER TABLE `occupations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_tables` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (2,6,'{\"agent\":{\"view\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.auth\":{\"auth\":\"1\"},\"agent.decline\":{\"decline\":\"1\"},\"currency\":{\"view\":\"1\"},\"currency.index\":{\"list\":\"1\"},\"customer.edit\":{\"edit\":\"1\"},\"account\":{\"view\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"}}','2022-03-27 02:00:04','2022-03-29 03:26:33'),(3,1,'{\"role\":{\"view\":\"1\"},\"role.index\":{\"list\":\"1\"},\"role.create\":{\"create\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.destroy\":{\"delete\":\"1\"},\"permission\":{\"view\":\"1\"},\"permission.index\":{\"list\":\"1\"},\"permission.create\":{\"create\":\"1\"},\"permission.edit\":{\"edit\":\"1\"},\"permission.destroy\":{\"delete\":\"1\"},\"user\":{\"view\":\"1\"},\"user.index\":{\"list\":\"1\"},\"user.create\":{\"create\":\"1\"},\"user.edit\":{\"edit\":\"1\"},\"agent\":{\"view\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.create\":{\"create\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.auth\":{\"auth\":\"1\"},\"agent.decline\":{\"decline\":\"1\"},\"currency\":{\"view\":\"1\"},\"currency.index\":{\"list\":\"1\"},\"currency.create\":{\"create\":\"1\"},\"currency.edit\":{\"edit\":\"1\"},\"rate\":{\"view\":\"1\"},\"rate.index\":{\"list\":\"1\"},\"rate.create\":{\"create\":\"1\"},\"rate.edit\":{\"edit\":\"1\"},\"rate.auth\":{\"auth\":\"1\"},\"rate.decline\":{\"decline\":\"1\"},\"fee\":{\"view\":\"1\"},\"fee.index\":{\"list\":\"1\"},\"fee.create\":{\"create\":\"1\"},\"fee.edit\":{\"edit\":\"1\"},\"fee.auth\":{\"auth\":\"1\"},\"fee.decline\":{\"decline\":\"1\"},\"customer\":{\"view\":\"1\"},\"customer.index\":{\"list\":\"1\"},\"customer.create\":{\"create\":\"1\"},\"customer.edit\":{\"edit\":\"1\"},\"customer.auth\":{\"auth\":\"1\"},\"customer.decline\":{\"decline\":\"1\"},\"account\":{\"view\":\"1\"},\"account.index\":{\"list\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"},\"account.decline\":{\"decline\":\"1\"},\"remittance\":{\"view\":\"1\"},\"remittance.index\":{\"list\":\"1\"},\"remittance.create\":{\"create\":\"1\"},\"remittance.edit\":{\"edit\":\"1\"},\"remittance.auth\":{\"auth\":\"1\"},\"remittance.decline\":{\"decline\":\"1\"}}','2022-03-27 05:39:11','2022-03-27 06:45:50'),(4,7,'{\"role\":{\"view\":\"1\"},\"role.index\":{\"list\":\"1\"},\"role.create\":{\"create\":\"1\"},\"role.edit\":{\"edit\":\"1\"},\"role.destroy\":{\"delete\":\"1\"},\"permission\":{\"view\":\"1\"},\"permission.index\":{\"list\":\"1\"},\"permission.create\":{\"create\":\"1\"},\"permission.edit\":{\"edit\":\"1\"},\"permission.destroy\":{\"delete\":\"1\"},\"user\":{\"view\":\"1\"},\"user.index\":{\"list\":\"1\"},\"user.create\":{\"create\":\"1\"},\"user.edit\":{\"edit\":\"1\"},\"agent\":{\"view\":\"1\"},\"agent.index\":{\"list\":\"1\"},\"agent.create\":{\"create\":\"1\"},\"agent.edit\":{\"edit\":\"1\"},\"agent.auth\":{\"auth\":\"1\"},\"agent.decline\":{\"decline\":\"1\"},\"currency\":{\"view\":\"1\"},\"currency.index\":{\"list\":\"1\"},\"currency.create\":{\"create\":\"1\"},\"currency.edit\":{\"edit\":\"1\"},\"rate\":{\"view\":\"1\"},\"rate.index\":{\"list\":\"1\"},\"rate.create\":{\"create\":\"1\"},\"rate.edit\":{\"edit\":\"1\"},\"rate.auth\":{\"auth\":\"1\"},\"rate.decline\":{\"decline\":\"1\"},\"fee\":{\"view\":\"1\"},\"fee.index\":{\"list\":\"1\"},\"fee.create\":{\"create\":\"1\"},\"fee.edit\":{\"edit\":\"1\"},\"fee.auth\":{\"auth\":\"1\"},\"fee.decline\":{\"decline\":\"1\"},\"customer\":{\"view\":\"1\"},\"customer.index\":{\"list\":\"1\"},\"customer.create\":{\"create\":\"1\"},\"customer.edit\":{\"edit\":\"1\"},\"customer.auth\":{\"auth\":\"1\"},\"customer.decline\":{\"decline\":\"1\"},\"account\":{\"view\":\"1\"},\"account.index\":{\"list\":\"1\"},\"account.create\":{\"create\":\"1\"},\"account.edit\":{\"edit\":\"1\"},\"account.auth\":{\"auth\":\"1\"},\"account.decline\":{\"decline\":\"1\"},\"remittance\":{\"view\":\"1\"},\"remittance.index\":{\"list\":\"1\"},\"remittance.create\":{\"create\":\"1\"},\"remittance.edit\":{\"edit\":\"1\"},\"remittance.auth\":{\"auth\":\"1\"},\"remittance.decline\":{\"decline\":\"1\"}}','2022-03-29 01:54:34','2022-03-29 01:54:34');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_tables`
--

DROP TABLE IF EXISTS `role_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_tables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_tables_role_name_unique` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_tables`
--

LOCK TABLES `role_tables` WRITE;
/*!40000 ALTER TABLE `role_tables` DISABLE KEYS */;
INSERT INTO `role_tables` VALUES (1,'Admin',NULL,'2022-01-25 05:11:38','2022-01-25 05:11:38'),(2,'User',NULL,'2022-01-25 05:11:38','2022-01-25 05:11:38'),(4,'jones dew','shahabuddin','2022-03-25 13:28:51','2022-03-25 13:28:51'),(6,'Test','shahabuddin','2022-03-25 14:16:37','2022-03-25 14:16:37'),(7,'Test3','shahabuddin','2022-03-28 23:19:20','2022-03-28 23:19:20');
/*!40000 ALTER TABLE `role_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_country_infos`
--

DROP TABLE IF EXISTS `sub_country_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_country_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_country_infos`
--

LOCK TABLES `sub_country_infos` WRITE;
/*!40000 ALTER TABLE `sub_country_infos` DISABLE KEYS */;
INSERT INTO `sub_country_infos` VALUES (1,2,'Dhaka','master','2022-02-22','2022-02-21 21:52:26','2022-02-21 21:52:37'),(2,3,'California','master','2022-02-22','2022-02-21 21:53:27','2022-02-21 21:53:27'),(3,1,'London','master','2022-02-22','2022-02-21 21:53:27','2022-02-21 21:53:27');
/*!40000 ALTER TABLE `sub_country_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_accepts`
--

DROP TABLE IF EXISTS `transaction_accepts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_accepts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trn_id` bigint(20) unsigned NOT NULL,
  `trnTp` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountNo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnkCode` int(11) DEFAULT NULL,
  `brCode` int(11) DEFAULT NULL,
  `selDistCode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acceptBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acceptDate` date DEFAULT NULL,
  `authBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authDate` date DEFAULT NULL,
  `sts` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0: accepted, 1: Authorized, 2: disbursed',
  `stsDate` date DEFAULT NULL,
  `disburseAmt` decimal(8,2) DEFAULT NULL,
  `disburseThru` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1: cash, 2: eft, 3: rtgs, 4: Own bank ACC',
  `disburseBranch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disburseAgent` int(11) DEFAULT NULL,
  `disburseAgentBr` int(11) DEFAULT NULL,
  `disburseBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disburseDate` date DEFAULT NULL,
  `disburseTime` time DEFAULT NULL,
  `cashTr_ID_tp` int(11) DEFAULT NULL,
  `cashTr_IDN` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cashTr_bearerContact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cashTr_Rem` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oprCode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slab` int(11) NOT NULL DEFAULT 0,
  `fileReference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_print` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_accepts`
--

LOCK TABLES `transaction_accepts` WRITE;
/*!40000 ALTER TABLE `transaction_accepts` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_accepts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_fees`
--

DROP TABLE IF EXISTS `transaction_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_fees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) unsigned NOT NULL,
  `currency_id` bigint(20) unsigned NOT NULL,
  `charge` decimal(8,2) NOT NULL,
  `start_amount` decimal(8,2) NOT NULL,
  `end_amount` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0: created, 1: authorized; 2: declined',
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `auth_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_fees`
--

LOCK TABLES `transaction_fees` WRITE;
/*!40000 ALTER TABLE `transaction_fees` DISABLE KEYS */;
INSERT INTO `transaction_fees` VALUES (1,2,5,14.00,1.00,1000.00,1,'shahabuddin','2022-03-20','admin','2022-03-20','2022-03-19 22:35:55','2022-03-19 22:38:18');
/*!40000 ALTER TABLE `transaction_fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_logs`
--

DROP TABLE IF EXISTS `transaction_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trn_id` bigint(20) unsigned DEFAULT NULL,
  `model_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_logs`
--

LOCK TABLES `transaction_logs` WRITE;
/*!40000 ALTER TABLE `transaction_logs` DISABLE KEYS */;
INSERT INTO `transaction_logs` VALUES (1,NULL,'Transaction','transact create search','Failed','Empty field found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 05:52:47','2022-03-22 05:52:47'),(2,NULL,'Transaction','transact create search','Failed','No data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 06:11:45','2022-03-22 06:11:45'),(3,NULL,'Transaction','transact create search','Failed','No data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 06:11:57','2022-03-22 06:11:57'),(4,NULL,'Transaction','Track transaction search','Failed','No data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 06:59:50','2022-03-22 06:59:50'),(5,1,'Transaction','Transaction authorize','Success','Transaction is being authorized successfully','{\"id\":1,\"insKey\":null,\"orgFileName\":null,\"uploadedFileName\":null,\"stLevel\":\"0\",\"trnTp\":\"C\",\"agent_code\":12,\"order_no\":\"50800000000002\",\"inv_identity\":null,\"inv_identity_country\":null,\"trn_date\":\"2022-03-20\",\"receiver_name\":\"Cruz Cruz\",\"receiver_country\":\"2\",\"receiver_sub_country_level_1\":\"1\",\"receiver_sub_country_level_2\":\"1\",\"receiver_sub_country_level_3\":null,\"receiver_address\":\"Nesciunt ullamco et\",\"receiver_contact\":\"01680850224\",\"receiver_and_sender_relation\":\"Dolor doloribus reic\",\"purpose_of_sending\":\"Sequi do consequat\",\"receiver_bank_br_routing_number\":\"\",\"receiver_bank\":null,\"receiver_bank_branch\":null,\"receiver_account_number\":null,\"sender_name\":\"Nora Duke\",\"sender_country\":\"Bangladesh\",\"sender_sub_country_level_1\":\"Dhaka\",\"sender_sub_country_level_2\":null,\"sender_sub_country_level_3\":null,\"sender_address_line\":\"Natus laborum Sapie\",\"sender_contact\":\"521521521521521\",\"sender_email\":\"vita@mailinator.com\",\"payment_mode\":\"1\",\"payment_status\":null,\"transaction_pin\":\"50800000000002\",\"payee_agent_or_bank_code\":null,\"transaction_make_user\":null,\"agent_received_date\":null,\"originated_currency\":5,\"originated_amount\":\"650.00\",\"disbursement_currency\":2,\"disbursement_amount\":\"57830.50\",\"exchange_rate\":\"88.97\",\"date_of_payment\":null,\"originated_customer_fee\":null,\"originated_amount_fixing_profit\":null,\"distributing_commission_amount\":null,\"distributing_commission_currency\":null,\"remarks\":\"Tempore aut magnam\",\"upload_tag\":null,\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-20\",\"auth_by\":\"admin\",\"auth_date\":\"2022-03-20\",\"voucher_print\":1,\"created_at\":\"2022-03-20T05:19:19.000000Z\",\"updated_at\":\"2022-03-20T05:24:24.000000Z\"}','127.0.0.1','admin','2022-03-22','2022-03-22 07:00:51','2022-03-22 07:00:51'),(6,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:01:31','2022-03-22 07:01:31'),(7,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:03:56','2022-03-22 07:03:56'),(8,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:04:59','2022-03-22 07:04:59'),(9,NULL,'Transaction','Track transaction search','Failed','No data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:05:30','2022-03-22 07:05:30'),(10,NULL,'Transaction','Track transaction search','Failed','No data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:06:19','2022-03-22 07:06:19'),(11,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:06:49','2022-03-22 07:06:49'),(12,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:07:09','2022-03-22 07:07:09'),(13,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:07:50','2022-03-22 07:07:50'),(14,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-22','2022-03-22 07:08:05','2022-03-22 07:08:05'),(15,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-23','2022-03-23 03:22:34','2022-03-23 03:22:34'),(16,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-23','2022-03-23 03:23:34','2022-03-23 03:23:34'),(17,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-23','2022-03-23 03:26:05','2022-03-23 03:26:05'),(18,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-23','2022-03-23 03:27:11','2022-03-23 03:27:11'),(19,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-23','2022-03-23 03:30:22','2022-03-23 03:30:22'),(20,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-23','2022-03-23 06:43:49','2022-03-23 06:43:49'),(21,NULL,'Transaction','Track transaction search','Success','Data found',NULL,'127.0.0.1','shahabuddin','2022-03-23','2022-03-23 06:47:06','2022-03-23 06:47:06'),(22,NULL,'Transaction','Transaction store','Success','Transaction has been added successfully','{\"sender_name\":\"Nora Duke\",\"sender_contact\":\"521521521521521\",\"sender_email\":\"vita@mailinator.com\",\"sender_country\":\"Bangladesh\",\"sender_sub_country_level_1\":\"Dhaka\",\"sender_address_line\":\"Natus laborum Sapie\",\"receiver_name\":\"Raven Black\",\"receiver_country\":\"2\",\"receiver_sub_country_level_1\":\"1\",\"receiver_sub_country_level_2\":\"1\",\"receiver_address\":\"Exercitationem nihil\",\"receiver_contact\":\"12345676543\",\"receiver_and_sender_relation\":\"Est adipisci natus\",\"purpose_of_sending\":\"Veniam ex illo minu\",\"payment_mode\":\"1\",\"receiver_bank\":null,\"receiver_bank_branch\":null,\"receiver_account_number\":\"Ipsum deleniti non v\",\"originated_currency\":\"5\",\"originated_amount\":\"678\",\"disbursement_currency\":\"2\",\"disbursement_amount\":\"60321.66\",\"originated_customer_fee\":14,\"order_no\":50800000000007,\"transaction_pin\":50800000000007,\"trn_date\":\"2022-03-28T05:29:12.262776Z\",\"stLevel\":0,\"agent_code\":\"12\",\"trnTp\":\"C\",\"exchange_rate\":\"88.97\",\"remarks\":\"Inventore aliquid ne\",\"receiver_bank_br_routing_number\":\"\",\"entry_by\":\"shahabuddin\",\"entry_date\":\"2022-03-28T05:29:12.266543Z\",\"updated_at\":\"2022-03-28T05:29:12.000000Z\",\"created_at\":\"2022-03-28T05:29:12.000000Z\",\"id\":6}','127.0.0.1','shahabuddin','2022-03-28','2022-03-27 23:29:12','2022-03-27 23:29:12'),(23,6,'Transaction','Transaction authorize','Failed','You do not have the permission',NULL,'127.0.0.1','shahabuddin','2022-03-28','2022-03-28 11:57:02','2022-03-28 11:57:02'),(24,6,'Transaction','Transaction decline','Failed','You do not have the permission',NULL,'127.0.0.1','shahabuddin','2022-03-28','2022-03-28 11:57:17','2022-03-28 11:57:17'),(25,6,'Transaction','Transaction authorize','Failed','You do not have the permission',NULL,'127.0.0.1','shahabuddin','2022-03-28','2022-03-28 11:59:26','2022-03-28 11:59:26');
/*!40000 ALTER TABLE `transaction_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insKey` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orgFileName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploadedFileName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stLevel` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:Uploaded, 1:Accepted, 2:disburse, 3:declined, 4:cash authorized decline, 5:manual cash waiting, 7:branch cash waiting, 8:agent cash waiting',
  `trnTp` char(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A: Account credit, C: Cash',
  `agent_code` bigint(20) unsigned DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inv_identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inv_identity_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trn_date` date NOT NULL,
  `receiver_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_sub_country_level_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_sub_country_level_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_sub_country_level_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_and_sender_relation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_of_sending` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_bank_br_routing_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_bank_branch` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_account_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_sub_country_level_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_sub_country_level_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_sub_country_level_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_address_line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1: Cash Pickup; 2: Bank Deposit',
  `payment_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_pin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payee_agent_or_bank_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_make_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_received_date` date DEFAULT NULL,
  `originated_currency` int(11) NOT NULL,
  `originated_amount` decimal(8,2) NOT NULL,
  `disbursement_currency` int(11) NOT NULL,
  `disbursement_amount` decimal(8,2) NOT NULL,
  `exchange_rate` decimal(8,2) NOT NULL,
  `date_of_payment` date DEFAULT NULL,
  `originated_customer_fee` decimal(8,2) DEFAULT NULL,
  `originated_amount_fixing_profit` decimal(8,2) DEFAULT NULL,
  `distributing_commission_amount` decimal(8,2) DEFAULT NULL,
  `distributing_commission_currency` decimal(8,2) DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `auth_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_date` date DEFAULT NULL,
  `voucher_print` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_order_no_unique` (`order_no`),
  KEY `transactions_inskey_index` (`insKey`),
  KEY `transactions_orgfilename_index` (`orgFileName`),
  KEY `transactions_inv_identity_index` (`inv_identity`),
  KEY `transactions_inv_identity_country_index` (`inv_identity_country`),
  KEY `transactions_trn_date_index` (`trn_date`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,NULL,NULL,NULL,'1','C',12,'50800000000002',NULL,NULL,'2022-03-20','Cruz Cruz','2','1','1',NULL,'Nesciunt ullamco et','01680850224','Dolor doloribus reic','Sequi do consequat','',NULL,NULL,NULL,'Nora Duke','Bangladesh','Dhaka',NULL,NULL,'Natus laborum Sapie','521521521521521','vita@mailinator.com','1',NULL,'50800000000002',NULL,NULL,NULL,5,650.00,2,57830.50,88.97,NULL,NULL,NULL,NULL,NULL,'Tempore aut magnam',NULL,'shahabuddin','2022-03-20','admin','2022-03-22',1,'2022-03-19 23:19:19','2022-03-22 07:00:51'),(2,NULL,NULL,NULL,'1','A',12,'50800000000003',NULL,NULL,'2022-03-20','Donna Massey','2','1','1',NULL,'Provident molestias','01680850224','Dolore et eos maxime','Eiusmod proident au','756566','12','2','1234567789','Nora Duke','Bangladesh','Dhaka',NULL,NULL,'Natus laborum Sapie','521521521521521','vita@mailinator.com','2',NULL,'50800000000003',NULL,NULL,NULL,5,560.00,2,49823.20,88.97,'2022-03-20',NULL,NULL,NULL,NULL,'Eos quo minus qui c',NULL,'shahabuddin','2022-03-20','admin','2022-03-20',1,'2022-03-19 23:36:33','2022-03-20 00:21:32'),(3,NULL,NULL,NULL,'0','C',12,'50800000000004',NULL,NULL,'2022-03-21','Cassady Rios','2','1','1',NULL,'Esse reprehenderit','98765432187','Sit aute ullamco vo','Magni magna qui cill','',NULL,NULL,NULL,'Nora Duke','Bangladesh','Dhaka',NULL,NULL,'Natus laborum Sapie','521521521521521','vita@mailinator.com','1',NULL,'50800000000004',NULL,NULL,NULL,5,500.00,2,44485.00,88.97,NULL,14.00,NULL,NULL,NULL,'Aut similique id pro',NULL,'shahabuddin','2022-03-21',NULL,NULL,0,'2022-03-21 06:10:41','2022-03-21 06:10:41'),(4,NULL,NULL,NULL,'0','C',12,'50800000000005',NULL,NULL,'2022-03-21','Amity Tucker','2','1','1',NULL,'Voluptas unde volupt','123456789876','Tempore est sed ali','Blanditiis sunt qui','',NULL,NULL,NULL,'Quemby Wynn','United States Of America','Los Angeles',NULL,NULL,'Mccray Lambert Associates','677677677677','quzafaxehi@mailinator.com','2',NULL,'50800000000005',NULL,NULL,NULL,5,123.00,2,10943.31,88.97,NULL,14.00,NULL,NULL,NULL,'Odio est laborum De',NULL,'shahabuddin','2022-03-21',NULL,NULL,0,'2022-03-21 06:54:53','2022-03-21 06:54:53'),(5,NULL,NULL,NULL,'0','C',12,'50800000000006',NULL,NULL,'2022-03-22','Vance Roth','2','1','1',NULL,'Consequatur totam a','12345678987','Minim id illum qui','Dolor aliquip repudi','',NULL,NULL,NULL,'Nora Duke','Bangladesh','Dhaka',NULL,NULL,'Natus laborum Sapie','521521521521521','vita@mailinator.com','1',NULL,'50800000000006',NULL,NULL,NULL,5,500.00,2,44485.00,88.97,NULL,14.00,NULL,NULL,NULL,'Architecto molestiae',NULL,'shahabuddin','2022-03-22',NULL,NULL,0,'2022-03-22 04:58:24','2022-03-22 04:58:24'),(6,NULL,NULL,NULL,'0','C',12,'50800000000007',NULL,NULL,'2022-03-28','Raven Black','2','1','1',NULL,'Exercitationem nihil','12345676543','Est adipisci natus','Veniam ex illo minu','',NULL,NULL,'Ipsum deleniti non v','Nora Duke','Bangladesh','Dhaka',NULL,NULL,'Natus laborum Sapie','521521521521521','vita@mailinator.com','1',NULL,'50800000000007',NULL,NULL,NULL,5,678.00,2,60321.66,88.97,NULL,14.00,NULL,NULL,NULL,'Inventore aliquid ne',NULL,'shahabuddin','2022-03-28',NULL,NULL,0,'2022-03-27 23:29:12','2022-03-27 23:29:12');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` bigint(20) unsigned DEFAULT NULL,
  `agent_br_id` bigint(20) unsigned DEFAULT NULL,
  `agnt_tp` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_usr_key_id` bigint(20) unsigned DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `entry_time` time DEFAULT NULL,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `screening` bigint(20) unsigned DEFAULT NULL,
  `login_type` int(11) DEFAULT NULL COMMENT '1=ad 2=agent 3=buru',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_user_id_unique` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'shahabuddin','Shahabuddin','$2y$10$Wd9pxyC697mhlPuOsQcXyeb/ai1f7FuuLDVF0vQoPTzZ.5EvFTDd6',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'0',NULL,NULL,'shahabuddin650@gmail.com',NULL,NULL,'2022-01-24 23:12:14','2022-01-24 23:12:14'),(2,'admin','vsl','$2y$10$Wd9pxyC697mhlPuOsQcXyeb/ai1f7FuuLDVF0vQoPTzZ.5EvFTDd6',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,6,'0',NULL,NULL,'info@venturenxt.com',NULL,NULL,'2022-01-24 23:12:14','2022-01-24 23:12:14'),(3,'kojypak','Judah Haynes','$2y$10$Ufbg9haFocgKO0PD31ZTw.3/ynvrcPqNxeWBX6Wk7hB8Pqu0I5TmW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'0',NULL,NULL,'tiwyteqege@mailinator.com',NULL,NULL,'2022-03-28 03:34:20','2022-03-28 03:34:20'),(4,'mynys','Sandra Greene','$2y$10$Jg/2cXoaLYDJhPnXM9X03um/f90.R0myd4xUwcL99c68vKfqqRRYG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,'0',NULL,NULL,'bunojy@mailinator.com',NULL,NULL,'2022-03-28 22:57:21','2022-03-28 23:36:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-29 18:47:42
