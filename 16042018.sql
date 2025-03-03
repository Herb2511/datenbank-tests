-- --------------------------------------------------------
-- Host:                         localhost
-- Server Version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Exportiere Datenbank Struktur für test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;

-- Exportiere Struktur von Tabelle test.dauer
CREATE TABLE IF NOT EXISTS `dauer` (
  `DauerID` smallint(6) NOT NULL AUTO_INCREMENT,
  `DauerName` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`DauerID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dauer: ~6 rows (ungefähr)
/*!40000 ALTER TABLE `dauer` DISABLE KEYS */;
INSERT INTO `dauer` (`DauerID`, `DauerName`) VALUES
	(1, '15'),
	(2, '30'),
	(3, '45'),
	(4, '60'),
	(5, '>60'),
	(6, '>90');
/*!40000 ALTER TABLE `dauer` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.produkte
CREATE TABLE IF NOT EXISTS `produkte` (
  `ProduktID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Produktbezeichnung` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Produktpreis` decimal(10,2) NOT NULL,
  `Produktbeschreibung` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Aenderungsdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ProduktSchwierigkeitsgrad` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ProduktKategorie` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ProduktDauer` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `ProduktURL` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ProduktID`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.produkte: ~5 rows (ungefähr)
/*!40000 ALTER TABLE `produkte` DISABLE KEYS */;
INSERT INTO `produkte` (`ProduktID`, `Produktbezeichnung`, `Produktpreis`, `Produktbeschreibung`, `Aenderungsdatum`, `ProduktSchwierigkeitsgrad`, `ProduktKategorie`, `ProduktDauer`, `ProduktURL`) VALUES
	(128, 'Spagetti Bolognese', 12.50, 'Bolo!', '2019-04-16 18:49:03', 'anspruchsvoll', 'Pasta', '60', ''),
	(130, 'Spagetti Carbonara', 12.50, 'Carbonara!', '2019-04-15 23:23:46', 'leicht', 'Pasta', '15', ''),
	(131, 'Gurkensalat mit Essig', 2.50, 'Gurkensalat mit Essig!', '2019-04-16 15:56:31', 'leicht', 'Salate', '15', ''),
	(148, 'Faulis Wundertorte', 2.50, 'Test', '2019-04-16 18:49:38', 'mittel', 'Nachspeisen', '30', ''),
	(150, 'Lasagne', 4.50, 'Lasagne ist lecker!', '2019-04-16 18:38:02', 'mittel', 'Ofengerichte', '45', '');
/*!40000 ALTER TABLE `produkte` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.rezept_bilder
CREATE TABLE IF NOT EXISTS `rezept_bilder` (
  `RezeptBildID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RezeptBildName` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `RezeptBildVerzeichnis` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`RezeptBildID`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.rezept_bilder: ~5 rows (ungefähr)
/*!40000 ALTER TABLE `rezept_bilder` DISABLE KEYS */;
INSERT INTO `rezept_bilder` (`RezeptBildID`, `RezeptBildName`, `RezeptBildVerzeichnis`) VALUES
	(128, 'Spagetti Bolognese', 'images/web/spagetti-bolognese.jpg'),
	(130, 'Spagetti Carbonara', 'images/web/spagetti-carbonara.jpg'),
	(131, 'Gurkensalat Mit Essig', 'images/web/gurkensalat-mit-essig.jpg'),
	(147, 'Tumblr_mm56u3Br9b1rm8yh2o1_1280', 'images/web/tumblr_mm56u3Br9b1rm8yh2o1_1280.jpg'),
	(148, 'Tumblr_mm56u3Br9b1rm8yh2o1_1280', 'images/web/tumblr_mm56u3Br9b1rm8yh2o1_1280.jpg'),
	(150, 'Lasagne', 'images/web/lasagne.jpg');
/*!40000 ALTER TABLE `rezept_bilder` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.rezept_kategorie
CREATE TABLE IF NOT EXISTS `rezept_kategorie` (
  `RezeptKategorieID` int(11) NOT NULL AUTO_INCREMENT,
  `RezeptKategorieName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`RezeptKategorieID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.rezept_kategorie: ~8 rows (ungefähr)
/*!40000 ALTER TABLE `rezept_kategorie` DISABLE KEYS */;
INSERT INTO `rezept_kategorie` (`RezeptKategorieID`, `RezeptKategorieName`) VALUES
	(1, 'Pasta'),
	(2, 'Reis'),
	(3, 'Ofengerichte'),
	(4, 'Fleischgerichte'),
	(5, 'Vegetarisch'),
	(6, 'Salate'),
	(7, 'Vorspeisen'),
	(8, 'Nachspeisen');
/*!40000 ALTER TABLE `rezept_kategorie` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.schwierigkeitsgrad
CREATE TABLE IF NOT EXISTS `schwierigkeitsgrad` (
  `SchwierigkeitsgradID` int(11) NOT NULL AUTO_INCREMENT,
  `SchwierigkeitsgradName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`SchwierigkeitsgradID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.schwierigkeitsgrad: ~2 rows (ungefähr)
/*!40000 ALTER TABLE `schwierigkeitsgrad` DISABLE KEYS */;
INSERT INTO `schwierigkeitsgrad` (`SchwierigkeitsgradID`, `SchwierigkeitsgradName`) VALUES
	(1, 'leicht'),
	(2, 'mittel'),
	(3, 'anspruchsvoll');
/*!40000 ALTER TABLE `schwierigkeitsgrad` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hash` varchar(32) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.users: ~3 rows (ungefähr)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`, `last_login`) VALUES
	(1, 'test', 'test', 'h.haida@t-online.de', '$2y$10$ij5F/NEQgDYiftfqoJp91emWmIU06flxHVxZzrRbD/zuRs1i2cjF2', '428fca9bc1921c25c5121f9da7815cde', 1, '2019-04-13 22:33:44'),
	(8, 'test2', 'test2', 'info@haida-mediadesign.de', '$2y$10$f1cz2eeVK6LHGwGOzYabbevpQZJSTLfuvYuFXbheZBG.cJ3rxwYHu', '3c59dc048e8850243be8079a5c74d079', 0, '2019-04-13 22:33:44'),
	(9, 'Herb', 'Haida', 'haida.herbert@gmail.com', '$2y$10$Gcz71QBUObrJlFiQS1CMMOeZEVuG8Mi4rQ7C2Q1Ms5agA1R.liPXq', 'cdc0d6e63aa8e41c89689f54970bb35f', 0, '2019-04-13 22:33:44');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
