-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table moviely_dev.bioskop
DROP TABLE IF EXISTS `bioskop`;
CREATE TABLE IF NOT EXISTS `bioskop` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kd_bioskop` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nama_bioskop` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `alamat_bioskop` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `kota` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `is_active` enum('Y','N') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table moviely_dev.bioskop: ~0 rows (approximately)
DELETE FROM `bioskop`;
/*!40000 ALTER TABLE `bioskop` DISABLE KEYS */;
INSERT INTO `bioskop` (`id`, `kd_bioskop`, `nama_bioskop`, `alamat_bioskop`, `kota`, `is_active`) VALUES
	(1, 'MVX', 'Movimax Dinoyo', 'Mall Dinoyo', 'Malang', 'Y'),
	(2, 'PLS', 'Cinepolis Matos', 'Malang Town Square', 'Malang', 'Y');
/*!40000 ALTER TABLE `bioskop` ENABLE KEYS */;

-- Dumping structure for table moviely_dev.film
DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kd_film` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `judul_film` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `durasi` int NOT NULL DEFAULT '0',
  `rating` int NOT NULL DEFAULT '0',
  `tgl_launch` date NOT NULL,
  `synopsys` text COLLATE utf8mb4_general_ci,
  `image_path` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `produser` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sutradara` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `produksi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cast` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `is_playing` enum('Y','N') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table moviely_dev.film: ~0 rows (approximately)
DELETE FROM `film`;
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id`, `kd_film`, `judul_film`, `genre`, `durasi`, `rating`, `tgl_launch`, `synopsys`, `image_path`, `produser`, `sutradara`, `produksi`, `cast`, `is_playing`) VALUES
	(1, 'JF001', 'Judul Film', 'Comedy, Drama', 104, 13, '2022-08-19', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '1.jpg', 'A', 'B', 'C', 'A,B,C,D', 'Y'),
	(2, 'RW002', 'Run Away', 'Drama', 113, 17, '2022-08-18', 'This is Run Away', '2.jpg', 'Lorem', 'Ipsum', 'Dolor Studios', 'John Doe', 'Y'),
	(3, 'KD005', 'Aku Suka Kamu Apa Adanya', 'Romance', 97, 16, '2022-08-17', 'Aku suka kamu', '3.jpg', 'Sit', 'Amet', 'Z Studios', 'Cast A, Cast B', 'Y'),
	(4, 'NP005', 'Nopeee', 'Thriller', 135, 18, '2022-08-16', 'No problem!', '4.jpg', 'Test', 'John', 'Wicked Studios', 'Josh', 'Y');
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Dumping structure for table moviely_dev.ms_sequences
DROP TABLE IF EXISTS `ms_sequences`;
CREATE TABLE IF NOT EXISTS `ms_sequences` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `value` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table moviely_dev.ms_sequences: ~0 rows (approximately)
DELETE FROM `ms_sequences`;
/*!40000 ALTER TABLE `ms_sequences` DISABLE KEYS */;
INSERT INTO `ms_sequences` (`id`, `code`, `value`) VALUES
	(1, 'MOVIE', 0);
/*!40000 ALTER TABLE `ms_sequences` ENABLE KEYS */;

-- Dumping structure for table moviely_dev.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kd_order` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id_tayang` int unsigned NOT NULL DEFAULT '0',
  `id_user` int unsigned NOT NULL DEFAULT '0',
  `nomor_kursi` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__tayangan` (`id_tayang`),
  KEY `FK__users` (`id_user`),
  CONSTRAINT `FK__tayangan` FOREIGN KEY (`id_tayang`) REFERENCES `tayangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table moviely_dev.orders: ~0 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `kd_order`, `id_tayang`, `id_user`, `nomor_kursi`, `status`, `total`) VALUES
	(2, '16610447730041', 2, 4, '5_4,5_5,5_6', 'PENDING', 90000),
	(7, '16610465910045', 3, 4, '3_2,3_3', 'VERIFIED', 60000);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table moviely_dev.tayangan
DROP TABLE IF EXISTS `tayangan`;
CREATE TABLE IF NOT EXISTS `tayangan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kd_tayang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id_film` int unsigned NOT NULL DEFAULT '0',
  `id_bioskop` int unsigned NOT NULL DEFAULT '0',
  `judul_film` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_tayang` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `jumlah_kursi` int NOT NULL DEFAULT '0',
  `is_active` enum('Y','N') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Y',
  `ticket_price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_TAYANGAN_ID_FILM` (`id_film`),
  KEY `FK_TAYANGAN_ID_BIOSKOP` (`id_bioskop`),
  CONSTRAINT `FK_TAYANGAN_ID_BIOSKOP` FOREIGN KEY (`id_bioskop`) REFERENCES `bioskop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_TAYANGAN_ID_FILM` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table moviely_dev.tayangan: ~0 rows (approximately)
DELETE FROM `tayangan`;
/*!40000 ALTER TABLE `tayangan` DISABLE KEYS */;
INSERT INTO `tayangan` (`id`, `kd_tayang`, `id_film`, `id_bioskop`, `judul_film`, `tgl_tayang`, `jumlah_kursi`, `is_active`, `ticket_price`) VALUES
	(1, 'PLS220820221900RW00200001', 2, 2, 'Run Away', '2022-08-22 19:00:00', 120, 'Y', 25000),
	(2, 'PLS220820222130RW00200002', 2, 2, 'Run Away', '2022-08-22 21:30:00', 120, 'Y', 30000),
	(3, 'PLS220820221630RW00200003', 2, 2, 'Run Away', '2022-08-22 16:30:00', 100, 'Y', 30000);
/*!40000 ALTER TABLE `tayangan` ENABLE KEYS */;

-- Dumping structure for table moviely_dev.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `level` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table moviely_dev.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
	(1, 'test@test.com', 'password', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'test@test2.com', 'password', 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'test@test3.com', 'password', 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'test@test4.com', 'password', 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
