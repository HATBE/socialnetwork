-- --------------------------------------------------------
-- Host:                         10.10.10.88
-- Server Version:               10.6.7-MariaDB-2ubuntu1.1 - Ubuntu 22.04
-- Server Betriebssystem:        debian-linux-gnu
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank Struktur für socialnetwork
CREATE DATABASE IF NOT EXISTS `socialnetwork` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `socialnetwork`;

-- Exportiere Struktur von Tabelle socialnetwork.following
CREATE TABLE IF NOT EXISTS `following` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `sender_user_id` varchar(255) NOT NULL,
  `target_user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sender_user_id_target_user_id` (`sender_user_id`,`target_user_id`),
  KEY `FK_following_users_2` (`target_user_id`),
  CONSTRAINT `FK_following_users` FOREIGN KEY (`sender_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_following_users_2` FOREIGN KEY (`target_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle socialnetwork.following: ~1 rows (ungefähr)
INSERT INTO `following` (`id`, `date`, `sender_user_id`, `target_user_id`) VALUES
	(1, 1, 'u7777777777777777777777', 'u62fa8fb1280ba546212780');

-- Exportiere Struktur von Tabelle socialnetwork.logins
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `success` int(11) NOT NULL DEFAULT 0,
  `date` int(11) NOT NULL DEFAULT 1,
  `ipaddress` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users` (`user_id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle socialnetwork.logins: ~0 rows (ungefähr)
INSERT INTO `logins` (`id`, `user_id`, `success`, `date`, `ipaddress`) VALUES
	(1, 'u7777777777777777777777', 0, 1660936871, '10.10.10.157'),
	(2, 'u7777777777777777777777', 1, 1660936885, '10.10.10.157'),
	(3, 'u7777777777777777777777', 0, 1660936919, 'disabled'),
	(4, 'u7777777777777777777777', 0, 1660937470, '10.10.10.157'),
	(6, 'u7777777777777777777777', 0, 1660937851, '10.10.10.157'),
	(7, 'u7777777777777777777777', 1, 1660937858, '10.10.10.157'),
	(8, 'u7777777777777777777777', 0, 1660937911, '10.10.10.157'),
	(9, 'u7777777777777777777777', 0, 1660937994, '10.10.10.157'),
	(10, 'u7777777777777777777777', 0, 1660938003, '10.10.10.157'),
	(11, 'u7777777777777777777777', 0, 1660938009, '10.10.10.157'),
	(12, 'u7777777777777777777777', 1, 1660938015, '10.10.10.157'),
	(13, 'u62fa8fb1280ba546212780', 1, 1660938033, '10.10.10.157'),
	(14, 'u62fa8fb1280ba546212780', 0, 1660938047, '10.10.10.157'),
	(15, 'u62fa8fb1280ba546212780', 0, 1660938053, '10.10.10.157'),
	(16, 'u7777777777777777777777', 0, 1660938058, '10.10.10.157'),
	(17, 'u7777777777777777777777', 0, 1660938212, '10.10.10.157'),
	(18, 'u7777777777777777777777', 0, 1660938299, '10.10.10.157'),
	(19, 'u7777777777777777777777', 0, 1660938375, '10.10.10.157'),
	(20, 'u7777777777777777777777', 0, 1660938515, '10.10.10.157'),
	(21, 'u7777777777777777777777', 1, 1660938523, '10.10.10.157'),
	(22, 'u7777777777777777777777', 0, 1660938571, '10.10.10.157'),
	(23, 'u7777777777777777777777', 1, 1660938662, '10.10.10.157'),
	(24, 'u7777777777777777777777', 0, 1660938672, '10.10.10.157'),
	(25, 'u7777777777777777777777', 0, 1660938676, '10.10.10.157'),
	(26, 'u7777777777777777777777', 1, 1660938832, '10.10.10.157');

-- Exportiere Struktur von Tabelle socialnetwork.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle socialnetwork.users: ~2 rows (ungefähr)
INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
	('u62fa8fb1280ba546212780', 'tester1', '$2y$10$/FRBt3XElw5pa/s9MN2Ap.Zyzu57tVKlEWfsR7Rc8OVYwDR0IZeWK', 'a', 'b'),
	('u7777777777777777777777', 'hatbe', '$2y$10$/FRBt3XElw5pa/s9MN2Ap.Zyzu57tVKlEWfsR7Rc8OVYwDR0IZeWK', 'A', 'G');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
