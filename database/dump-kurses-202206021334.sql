-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: kurses
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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_03_30_000000_create_tbl_materi',2),(6,'2022_03_30_181748_add_created_to_tbl_materi',3),(7,'2022_03_31_025004_add_pict_to_users_table',4),(8,'2022_04_02_004726_create_tugas_table',5),(9,'2022_04_02_010832_create_tbl_categories',6),(10,'2022_04_02_010958_create_tbl_status',6),(11,'2022_04_02_020910_add_code_to_tbl_status',7),(12,'2022_04_02_021148_add_code_to_tbl_categories',7),(13,'2022_04_04_050915_add_role_id_to_users_table',8),(14,'2022_04_04_055212_add_status_to_users_table',9),(15,'2022_05_23_000000_create_tbl_tugas_exec',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categories`
--

LOCK TABLES `tbl_categories` WRITE;
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` VALUES (1,'html','html','Belajar HTML','materi'),(2,'boots','Bootstrap','Belajar Bootstrap','materi'),(3,'lar','Laravel','Belajar Laravel','materi'),(4,'mkn','Makanan','Semua jenis makanan','olshop');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_configs`
--

DROP TABLE IF EXISTS `tbl_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_key` varchar(20) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_configs`
--

LOCK TABLES `tbl_configs` WRITE;
/*!40000 ALTER TABLE `tbl_configs` DISABLE KEYS */;
INSERT INTO `tbl_configs` VALUES (1,'Company_name','Company name','PT. Kurses Edutainment',1),(2,'Web_name','App / Web name','Kurses Apps',2),(3,'Web_address','Web address','www.kurses.edu',3),(4,'Tagline','Tagline','KURSUS DENGAN HASIL AKHIR SELANGKAH LEBIH SUKSES',4),(5,'Logo','Web logo','kurses.png',5),(6,'Icon','Web icon','no-camera.png',6),(7,'Email','Email','contact@kurses.edu',7),(8,'Address','Address','Somewhere in the map',8),(9,'Landline','Landline phone','020000000',9),(10,'Mobile','Mobile phone','0800000000',10),(11,'Facebook','Facebook address','www.facebook.com/kurses',11),(12,'Tweeter','Tweeter address','www.tweeter.com/kurses',12),(13,'Instagram','Instagram address','www.instagram.com/kurses',13),(14,'Currency','Default currency','IDR',17),(18,'Whatsapp','Whatsapp','628000000000',16),(19,'Youtube','Youtube','www.youtube.com/kurses',14),(20,'Tiktok','Tiktok','www.tiktok.com/kurses',15);
/*!40000 ALTER TABLE `tbl_configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_courses`
--

DROP TABLE IF EXISTS `tbl_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_courses`
--

LOCK TABLES `tbl_courses` WRITE;
/*!40000 ALTER TABLE `tbl_courses` DISABLE KEYS */;
INSERT INTO `tbl_courses` VALUES (1,'Custom Product Design',1,'Design','One make creepeth man bearing their one firmament won\'t fowl meat over sea',2.50,'c1.jpg','2022-05-22 06:00:00','2022-05-22 07:10:11'),(2,'Social Media Network',2,'Mobile Apps','Asperiores omnis nihil, voluptatum dolorem impedit molestias.',1.65,'c2.jpg','2022-05-22 06:00:00','2022-05-22 07:10:11'),(3,'Custom Product Design',3,'Web Apps','One make creepeth man bearing their one firmament won\'t fowl meat over sea',2.50,'c3.jpg','2022-05-22 06:00:00','2022-05-22 07:10:11'),(4,'Social Media Network',4,'Programming','Asperiores omnis nihil, voluptatum dolorem impedit molestias.',1.65,'c2.jpg','2022-05-22 06:00:00','2022-05-22 07:10:11');
/*!40000 ALTER TABLE `tbl_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_events` (
  `id` int(10) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_events`
--

LOCK TABLES `tbl_events` WRITE;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` VALUES (1,'Bootcamp Ramadhan 2022','bootcamp-ramadhan-2022','Lorem ipsum dolor sit amet consectetur adipisicing elit.','Lorem ipsum dolor sit amet consectetur adipisicing elit. ','2022-04-02 09:00:00','2022-05-02 10:00:00','Jakarta International Stadium, Hall 14, Jakarta','workshop-11.jpg',1,'Testing-1','2022-04-01 22:32:17','2022-05-29 23:36:50'),(2,'Mobile App Workshop','mobile-app-workshop','Voluptates eveniet reprehenderit laborum aliquam facere2','Lorem ipsum dolor sit amet consectetur adipisicing elit. Musa','2022-04-15 08:30:00','2022-04-30 03:00:00','Cibaduyut Cicuit, Bandung','workshop-2.jpg',1,'Testing-1','2022-04-14 23:45:45','2022-05-29 23:36:43');
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_materi`
--

DROP TABLE IF EXISTS `tbl_materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_materi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posted_dt` date NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materi`
--

LOCK TABLES `tbl_materi` WRITE;
/*!40000 ALTER TABLE `tbl_materi` DISABLE KEYS */;
INSERT INTO `tbl_materi` VALUES (2,'Video Ringkas Laravel (1) - Apa itu Laravel ?','2022-05-30','umum','Ini isi materi nya.','video-ringkas-laravel-1-apa-itu-laravel','Abu Musa from Halal Creative','laravel-9-halal-creative-2.png','www.youtube.com/watch?v=Lu4EI2-s-50','published','Seri belajar Laravel-9','admin','2022-04-01 22:32:17','spv_1','2022-05-30 12:49:58'),(3,'Video Ringkas Laravel (2) - Mengapa Harus Menggunakan Framework','2022-05-30','umum','Ini isi materi nya.','video-ringkas-laravel-2-mengapa-harus-menggunakan-framework','Abu Musa from Halal Creative','laravel-9-halal-creative-3.png','www.youtube.com/watch?v=XAVo96UWkbc','published','Seri belajar Laravel-9','admin','2022-04-14 23:45:45','spv_1','2022-05-30 12:49:53'),(4,'Video Ringkas Laravel (3) - Mengapa Memilih Laravel','2022-05-30','umum','Ini isi materi nya.','video-ringkas-laravel-3-mengapa-memilih-laravel','Abu Musa from Halal Creative','laravel-9-halal-creative-4.png','www.youtube.com/watch?v=oDghFsRj9E4','published','Seri belajar Laravel-9','admin','2022-04-14 23:49:18','spv_1','2022-05-30 12:49:45');
/*!40000 ALTER TABLE `tbl_materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_socmed`
--

DROP TABLE IF EXISTS `tbl_socmed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_socmed` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_socmed`
--

LOCK TABLES `tbl_socmed` WRITE;
/*!40000 ALTER TABLE `tbl_socmed` DISABLE KEYS */;
INSERT INTO `tbl_socmed` VALUES (1,'facebook.com/user1','User biasa',NULL,NULL,NULL),(2,'facebook.com/supervisor','Supervisor',NULL,NULL,NULL),(3,'facebook.com/manager','Manager',NULL,NULL,NULL),(4,'facebook.com/admin','Administrator',NULL,NULL,NULL),(5,'facebook.com/webmaster','Webmaster',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_socmed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status`
--

LOCK TABLES `tbl_status` WRITE;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` VALUES (1,'drf','Draft','Drafted','tugas'),(2,'appr','Approved','Approved','tugas'),(3,'hld','Hold','Hold Temporary','invoice');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_testimonis`
--

DROP TABLE IF EXISTS `tbl_testimonis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_testimonis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_testimonis`
--

LOCK TABLES `tbl_testimonis` WRITE;
/*!40000 ALTER TABLE `tbl_testimonis` DISABLE KEYS */;
INSERT INTO `tbl_testimonis` VALUES (1,'Mated Nithan','If you are looking at blank cassettes on the web, you may be very confused at the.',1,'t1.jpg',NULL,NULL,'2022-05-22 08:32:25'),(2,'David Cameron','Him, made can\'t called over won\'t there on divide there',1,'t2.jpg',NULL,NULL,'2022-05-22 08:32:31'),(3,'Jain Redmel','Awesome Course Ever. If you are looking at blank cassettes on the web, you may be very confused at the.',1,'t3.jpeg',NULL,NULL,'2022-05-22 08:33:40'),(4,'Nathan Macken','Satu kata... \"Terbaik\".',1,'t4.png',NULL,NULL,'2022-05-22 08:32:56');
/*!40000 ALTER TABLE `tbl_testimonis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_trainers`
--

DROP TABLE IF EXISTS `tbl_trainers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_trainers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `expert` varchar(50) NOT NULL,
  `socmed_id` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `picture` varchar(255) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_trainers`
--

LOCK TABLES `tbl_trainers` WRITE;
/*!40000 ALTER TABLE `tbl_trainers` DISABLE KEYS */;
INSERT INTO `tbl_trainers` VALUES (1,'Mated Nithan','Sr. Web Designer',NULL,'If you are looking at blank cassettes on the web, you may be very confused at the.',1,'author1.png',NULL,NULL,NULL,'2022-05-22 08:32:25'),(2,'David Cameron','Sr. Web Application',NULL,'test',1,'author2.png',NULL,NULL,NULL,'2022-05-22 08:32:31'),(3,'Jain Redmel','Sr. Web Designer',NULL,'If you are looking at blank cassettes on the web, you may be very confused at the.',1,'author3.png',NULL,NULL,NULL,'2022-05-22 08:33:40'),(4,'Nathan Macken','Sr. Mobile Application',NULL,'test 3',1,'author1.png',NULL,NULL,NULL,'2022-05-22 08:32:56');
/*!40000 ALTER TABLE `tbl_trainers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tugas`
--

DROP TABLE IF EXISTS `tbl_tugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tugas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `deadline_at` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tugas`
--

LOCK TABLES `tbl_tugas` WRITE;
/*!40000 ALTER TABLE `tbl_tugas` DISABLE KEYS */;
INSERT INTO `tbl_tugas` VALUES (1,'Pembuatan web portfolio menggunakan Javascript','2001-01-20','2030-01-20',2,'ket','admin','2022-04-02 00:19:10','admin','2022-05-10 01:58:41'),(2,'Cara Install Laravel 9','2004-01-20','2004-01-20',2,'Hanya menggunakan mySQL bukan yg lain','admin','2022-04-04 01:01:41','admin','2022-05-10 01:59:00'),(3,'Tugas Membaca Materi','2022-04-05','2022-04-06',1,'Tugas Membaca Materi','admin','2022-04-05 04:32:53',NULL,'2022-04-05 04:32:53'),(4,'Tugas Deploy project Laravel','2022-04-05','2022-04-06',1,'Notes: Harus di server myhost.com','admin','2022-04-05 04:32:53',NULL,'2022-04-05 04:32:53');
/*!40000 ALTER TABLE `tbl_tugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tugas_exec`
--

DROP TABLE IF EXISTS `tbl_tugas_exec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tugas_exec` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tugas_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `evidence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `points` tinyint(4) NOT NULL DEFAULT 0,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tugas_exec`
--

LOCK TABLES `tbl_tugas_exec` WRITE;
/*!40000 ALTER TABLE `tbl_tugas_exec` DISABLE KEYS */;
INSERT INTO `tbl_tugas_exec` VALUES (1,1,'user_1','disetujui','tugas-1-by-user-1.txt',70,'sdfdf','Lampiran kurang sempurna','spv_1','2022-05-29 20:55:21'),(2,1,'user_1','selesai','tugas-1-by-user-1.txt',0,'Ditolak krn udah telat',NULL,'user_1','2022-05-24 03:15:15'),(3,1,'user_2','selesai','tugas-1-by-user-2.txt',0,'Selesai juga',NULL,'user_2','2022-05-24 03:15:18'),(4,2,'user_1','selesai','tugas-2-by-user-1.txt',0,'Selesai walopun telat',NULL,'user_1','2022-05-24 03:15:21'),(5,1,'user_2','selesai','tugas-2-by-user-2.txt',0,'Selesai telat 2 mnit',NULL,'user_2','2022-05-24 03:15:25'),(6,3,'user_1','selesai','Cara Install Laravel di Linux Ubuntu 20.zip',0,'update:Ini catatan sementara aza...',NULL,'user_1','2022-05-28 22:28:54'),(7,1,'staff_1','disetujui','Cara Install Laravel di Linux Ubuntu 20.zip',100,'Hampir telat','Mumtaaz','spv_1','2022-05-29 21:02:53'),(8,2,'staff_1','selesai','dummy-file-3.zip',0,'is file-3',NULL,'staff_1','2022-05-28 03:35:16'),(9,3,'staff_1','selesai','dummy-file-1.zip',0,'Tugas ke-3, file-1',NULL,'staff_1','2022-05-28 03:36:21'),(10,4,'user_1','selesai','borouge.rar',0,'Tugas-4 by User-1, attch Borouge-rar',NULL,'user_1','2022-05-29 22:15:30');
/*!40000 ALTER TABLE `tbl_tugas_exec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Webmaster','webmaster@apps.com','2022-03-02 03:15:17','$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi',NULL,'2022-03-31 23:32:19','2022-05-08 09:29:28','webmaster',99,'Inactive','webmaster.png'),(3,'Administrator','admin@admin.com','2022-04-01 02:42:44','$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi',NULL,'2022-03-31 23:32:19','2022-04-14 04:29:06','admin',88,'Active','admin.jpg'),(4,'Staff One 1','staff-one@apps.com','2022-04-04 05:18:17','$2y$10$ejbQirj.xKIQhh3zqM8RFuYpEdZKGu5J/3tFjNoXv.htcl/C.wX6K',NULL,'2022-03-31 23:32:19','2022-06-01 14:27:21','staff_1',1,'Active','user.png'),(5,'Supervisor One','spv-one@apps.com','2022-04-04 05:18:17','$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi',NULL,'2022-03-31 23:32:19','2022-04-05 07:32:52','spv_1',2,'Active','spv.png'),(6,'Manager One','mgr-one@apps.com','2022-04-04 05:18:17','$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi',NULL,'2022-03-31 23:32:19','2022-04-05 07:32:53','mgr_1',5,'Inactive','mgr.png'),(7,'User One 1','user-one@apps.com','2022-04-04 05:18:17','$2y$10$ejbQirj.xKIQhh3zqM8RFuYpEdZKGu5J/3tFjNoXv.htcl/C.wX6K',NULL,'2022-03-31 23:32:19','2022-06-01 14:25:32','user_1',1,'Active','user1.png'),(8,'User Four','user-four@apps.com','2022-04-04 05:18:17','$2y$10$ejbQirj.xKIQhh3zqM8RFuYpEdZKGu5J/3tFjNoXv.htcl/C.wX6K',NULL,'2022-03-31 23:32:19','2022-05-30 13:05:02','user_4',1,'Active','1653915902-user.png'),(9,'Staff 2','staff2@apps.com',NULL,'$2y$10$2q171i.G22p6VmwRS7uiUOtEhO11TpwKRcnxGWgNzvy1CUvU3VmB2',NULL,'2022-06-01 14:28:10','2022-06-01 14:48:49','staff_2',1,'Active',NULL),(11,'User Nomor 3','user3@apps.com',NULL,'$2y$10$0GXSunG40Pz0yh8OKrXY/eApzARBeJId1cqGezeCoUf4SAniuyVTS',NULL,'2022-06-01 14:33:24','2022-06-01 14:33:24','user_3',1,'Active',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'kurses'
--
