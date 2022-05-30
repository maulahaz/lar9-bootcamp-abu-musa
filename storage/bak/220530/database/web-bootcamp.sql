-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table web_bootcamp.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_03_30_000000_create_tbl_materi', 2),
	(6, '2022_03_30_181748_add_created_to_tbl_materi', 3),
	(7, '2022_03_31_025004_add_pict_to_users_table', 4),
	(8, '2022_04_02_004726_create_tugas_table', 5),
	(9, '2022_04_02_010832_create_tbl_categories', 6),
	(10, '2022_04_02_010958_create_tbl_status', 6),
	(11, '2022_04_02_020910_add_code_to_tbl_status', 7),
	(12, '2022_04_02_021148_add_code_to_tbl_categories', 7),
	(13, '2022_04_04_050915_add_role_id_to_users_table', 8),
	(14, '2022_04_04_055212_add_status_to_users_table', 9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.tbl_categories
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.tbl_categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` (`id`, `code`, `title`, `description`, `module`) VALUES
	(1, 'html', 'html', 'Belajar HTML', 'materi'),
	(2, 'boots', 'Bootstrap', 'Belajar Bootstrap', 'materi'),
	(3, 'lar', 'Laravel', 'Belajar Laravel', 'materi'),
	(4, 'mkn', 'Makanan', 'Semua jenis makanan', 'olshop');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.tbl_materi
CREATE TABLE IF NOT EXISTS `tbl_materi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_dt` date NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.tbl_materi: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_materi` DISABLE KEYS */;
INSERT INTO `tbl_materi` (`id`, `title`, `posted_dt`, `category`, `content`, `slug`, `author`, `picture`, `video_url`, `status`, `notes`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	(2, 'Laravel', '2022-04-02', 'umum', 'Ini isi materi nya.', 'laravel', 'Abu Musa', 'kaca-spion.jpg', 'youtube.com/lara1', 'published', 'belajar upload', 'admin', '2022-04-02 02:32:17', NULL, '2022-05-08 14:33:48'),
	(3, 'Laravel 2', '2022-04-15', 'umum', 'Ini isi materi nya.', 'laravel-2', 'Abu Musa', 'paper-curled-glossy-page.jpg', 'www.vimeo.com/kasdjh667', 'published', 'belajar pagination', 'admin', '2022-04-15 03:45:45', NULL, '2022-04-15 07:53:41'),
	(4, 'Materi 3 Bootstrap', '2022-04-15', 'umum', 'Ini isi materi nya.', 'materi-3-bootstrap', 'Abu Isya', 'ride-sharing.png', 'www.youtube.com/v/sdfjk675arwf', 'published', 'belajar auto numbering', 'admin', '2022-04-15 03:49:18', NULL, '2022-04-15 07:53:50');
/*!40000 ALTER TABLE `tbl_materi` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.tbl_status
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.tbl_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` (`id`, `code`, `title`, `description`, `module`) VALUES
	(1, 'drf', 'Draft', 'Drafted', 'tugas'),
	(2, 'appr', 'Approved', 'Approved', 'tugas'),
	(3, 'hld', 'Hold', 'Hold Temporary', 'invoice');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.tbl_tugas
CREATE TABLE IF NOT EXISTS `tbl_tugas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `deadline_at` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.tbl_tugas: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_tugas` DISABLE KEYS */;
INSERT INTO `tbl_tugas` (`id`, `title`, `start_at`, `deadline_at`, `category_id`, `notes`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	(1, 'Pembuatan web portfolio menggunakan Javascript', '2001-01-20', '2030-01-20', 2, 'ket', 'admin', '2022-04-02 04:19:10', 'admin', '2022-05-10 05:58:41'),
	(2, 'Cara Install Laravel 9', '2004-01-20', '2004-01-20', 2, 'Hanya menggunakan mySQL bukan yg lain', 'admin', '2022-04-04 05:01:41', 'admin', '2022-05-10 05:59:00'),
	(3, 'Tugas Membaca Materi', '2022-04-05', '2022-04-06', 1, 'Tugas Membaca Materi', 'admin', '2022-04-05 08:32:53', NULL, '2022-04-05 08:32:53');
/*!40000 ALTER TABLE `tbl_tugas` ENABLE KEYS */;

-- Dumping structure for table web_bootcamp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_bootcamp.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `role_id`, `status`, `picture`) VALUES
	(1, 'Webmaster', 'webmaster@apps.com', '2022-03-02 07:15:17', '$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi', NULL, '2022-04-01 03:32:19', '2022-05-08 13:29:28', 'webmaster', 99, 'Inactive', 'webmaster.png'),
	(3, 'Administrator', 'admin@admin.com', '2022-04-01 06:42:44', '$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi', NULL, '2022-04-01 03:32:19', '2022-04-14 08:29:06', 'admin', 88, 'Active', 'admin.jpg'),
	(4, 'Staff One', 'staff-one@apps.com', '2022-04-04 09:18:17', '$2y$10$ejbQirj.xKIQhh3zqM8RFuYpEdZKGu5J/3tFjNoXv.htcl/C.wX6K', NULL, '2022-04-01 03:32:19', '2022-05-10 08:16:10', 'staff_1', 1, 'Active', 'user.png'),
	(5, 'Supervisor One', 'spv-one@apps.com', '2022-04-04 09:18:17', '$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi', NULL, '2022-04-01 03:32:19', '2022-04-05 11:32:52', 'spv_1', 2, 'Active', 'spv.png'),
	(6, 'Manager One', 'mgr-one@apps.com', '2022-04-04 09:18:17', '$2y$10$Ium80ucfGXGX.igoQq6hTemaCnVNGSEQyLjMMpdRYLaxzNC2VUkFi', NULL, '2022-04-01 03:32:19', '2022-04-05 11:32:53', 'mgr_1', 5, 'Inactive', 'mgr.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
