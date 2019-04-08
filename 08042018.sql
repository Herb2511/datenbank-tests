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

-- Exportiere Struktur von Tabelle test.produkte
CREATE TABLE IF NOT EXISTS `produkte` (
  `ProduktID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Produktbezeichnung` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Produktpreis` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ProduktID`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.produkte: ~6 rows (ungefähr)
/*!40000 ALTER TABLE `produkte` DISABLE KEYS */;
INSERT INTO `produkte` (`ProduktID`, `Produktbezeichnung`, `Produktpreis`) VALUES
	(50, 'Lampe', 34.00),
	(52, 'Stein', 3.00),
	(70, 'GlÃ¼hbirne', 4.00),
	(71, 'Tisch', 199.00),
	(72, 'Stuhl', 45.00),
	(74, 'Bilderrahmen', 16.00);
/*!40000 ALTER TABLE `produkte` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
