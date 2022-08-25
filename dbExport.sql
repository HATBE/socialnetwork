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
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle socialnetwork.following: ~3 rows (ungefähr)
INSERT INTO `following` (`id`, `date`, `sender_user_id`, `target_user_id`) VALUES
	(61, 1661335612, 'u62fa8fb1280ba546212780', 'u7777777777777777777777'),
	(88, 1661430005, 'u7777777777777777777777', 'u62fa8fb1280ba546212780'),
	(99, 1661438281, 'u7777777777777777777777', 'ub2paffl33t67f52fh6218j');

-- Exportiere Struktur von Tabelle socialnetwork.logins
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `success` int(11) NOT NULL DEFAULT 0,
  `date` int(11) NOT NULL DEFAULT 1,
  `ipaddress` varchar(255) NOT NULL,
  `useragent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users` (`user_id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle socialnetwork.logins: ~41 rows (ungefähr)
INSERT INTO `logins` (`id`, `user_id`, `success`, `date`, `ipaddress`, `useragent`) VALUES
	(1, 'u7777777777777777777777', 0, 1660936871, '10.10.10.157', 'disabled'),

-- Exportiere Struktur von Tabelle socialnetwork.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle socialnetwork.users: ~3 rows (ungefähr)
INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES
	('u62fa8fb1280ba546212780', 'tester1', '$2y$10$/FRBt3XElw5pa/s9MN2Ap.Zyzu57tVKlEWfsR7Rc8OVYwDR0IZeWK', 'a', 'b', 'a@d.ch'),
	('u7777777777777777777777', 'Hatbe', '$2y$10$/FRBt3XElw5pa/s9MN2Ap.Zyzu57tVKlEWfsR7Rc8OVYwDR0IZeWK', 'A', 'G', 'a@b.ch'),
	('ub2paffl33t67f52fh6218j', 'iamauser', '$2y$10$/FRBt3XElw5pa/s9MN2Ap.Zyzu57tVKlEWfsR7Rc8OVYwDR0IZeWK', 'x', 'f', 'a@c.ch');

-- Exportiere Struktur von Tabelle socialnetwork.usersLastPosition
CREATE TABLE IF NOT EXISTS `usersLastPosition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usersLastPosition_users` (`user_id`),
  CONSTRAINT `FK_usersLastPosition_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle socialnetwork.usersLastPosition: ~0 rows (ungefähr)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
