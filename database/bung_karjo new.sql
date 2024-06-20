-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bung_karjo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table bung_karjo.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tour_package_id` int NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tour_package_id` (`tour_package_id`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`tour_package_id`) REFERENCES `tour_packages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.images: ~0 rows (approximately)
INSERT INTO `images` (`id`, `tour_package_id`, `image_url`, `created_at`, `updated_at`) VALUES
	(1, 1, 'package_tour/IMG_0121.png', '2024-06-20 10:22:53', '2024-06-20 10:22:53'),
	(2, 2, 'package_tour/IMG_0122.png', '2024-06-20 10:22:53', '2024-06-20 10:22:53'),
	(3, 3, 'package_tour/IMG_0123.png', '2024-06-20 10:22:53', '2024-06-20 10:22:53');

-- Dumping structure for table bung_karjo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.migrations: ~10 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_05_06_140725_create_transactions_table', 1),
	(6, '2024_05_06_141652_create_tour_packages_table', 1),
	(7, '2024_05_06_142030_create_services_table', 1),
	(8, '2024_05_06_143735_create_videos_table', 1),
	(9, '2024_05_06_144845_create_images_table', 1),
	(10, '2024_05_06_145221_create_transaction_details_table', 1);

-- Dumping structure for table bung_karjo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.password_resets: ~0 rows (approximately)

-- Dumping structure for table bung_karjo.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
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

-- Dumping data for table bung_karjo.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table bung_karjo.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tour_package_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tour_package_id` (`tour_package_id`),
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`tour_package_id`) REFERENCES `tour_packages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.services: ~0 rows (approximately)

-- Dumping structure for table bung_karjo.tour_packages
CREATE TABLE IF NOT EXISTS `tour_packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bung_karjo.tour_packages: ~3 rows (approximately)
INSERT INTO `tour_packages` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Paket 1 - Ayunan dan Kolam Renang', 10000.00, 'Nikmati pengalaman bermain ayunan dan berenang di kolam renang yang menyegarkan.', '2024-06-20 04:43:30', '2024-06-20 04:43:30'),
	(2, 'Paket 2 - Wisata Pantai', 20000.00, 'Jelajahi keindahan pantai dengan berbagai aktivitas menarik seperti berjemur, berenang, dan snorkeling.', '2024-06-20 04:43:30', '2024-06-20 04:43:30'),
	(3, 'Paket 3 - Mendaki Gunung', 30000.00, 'Petualangan mendaki gunung dengan pemandangan yang memukau dan udara yang sejuk.', '2024-06-20 04:43:30', '2024-06-20 04:43:30');

-- Dumping structure for table bung_karjo.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visitor_id` int NOT NULL,
  `discount` double DEFAULT NULL,
  `status` enum('invoice','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visitor_id` (`visitor_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.transactions: ~1 rows (approximately)
INSERT INTO `transactions` (`id`, `visitor_id`, `discount`, `status`, `created_at`, `updated_at`) VALUES
	(4, 8, 0, 'invoice', '2024-06-20 13:40:32', '2024-06-20 13:40:32'),
	(5, 9, 0, 'invoice', '2024-06-20 15:02:25', '2024-06-20 15:02:25');

-- Dumping structure for table bung_karjo.transaction_details
CREATE TABLE IF NOT EXISTS `transaction_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tour_package_id` int NOT NULL,
  `transaction_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `amount_of_people` int DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tour_package_id` (`tour_package_id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`tour_package_id`) REFERENCES `tour_packages` (`id`),
  CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.transaction_details: ~1 rows (approximately)
INSERT INTO `transaction_details` (`id`, `tour_package_id`, `transaction_id`, `name`, `price`, `amount_of_people`, `created_at`, `updated_at`) VALUES
	(2, 1, 4, 'Paket 1 - Ayunan dan Kolam Renang', 10000, 1, '2024-06-20 13:40:32', '2024-06-20 13:40:32'),
	(3, 3, 5, 'Paket 3 - Mendaki Gunung', 30000, 4, '2024-06-20 15:02:25', '2024-06-20 15:02:25');

-- Dumping structure for table bung_karjo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','manager','visitor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'kayla', 'juniyasyos@gmail.com', '$2y$10$PR0Sv55S.HvodQBY4SJ54egAkE2FVxft0XFZTCyM2I2R2ysiE20ni', 'admin', '2024-06-19 23:55:56', '2024-06-19 23:55:56');

-- Dumping structure for table bung_karjo.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tour_package_id` int NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tour_package_id` (`tour_package_id`),
  CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`tour_package_id`) REFERENCES `tour_packages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.videos: ~0 rows (approximately)

-- Dumping structure for table bung_karjo.visitors
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bung_karjo.visitors: ~1 rows (approximately)
INSERT INTO `visitors` (`id`, `visitor_name`, `region`, `email`, `telp`, `user_id`, `created_at`, `updated_at`) VALUES
	(8, 'pak harun', 'Jember', 'juniyasyos@gmail.com', '085732431396', 1, '2024-06-20 06:40:32', '2024-06-20 06:40:32'),
	(9, 'pak harun', 'Jember', 'juniyasyos@gmail.com', '085732431396', 1, '2024-06-20 08:02:25', '2024-06-20 08:02:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
