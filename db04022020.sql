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

-- Exportiere Struktur von Tabelle test.benutzer
CREATE TABLE IF NOT EXISTS `benutzer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `benutzername` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `erstellt_am` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `benutzername` (`benutzername`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.benutzer: ~7 rows (ungefähr)
/*!40000 ALTER TABLE `benutzer` DISABLE KEYS */;
INSERT INTO `benutzer` (`id`, `benutzername`, `email`, `passwort`, `erstellt_am`) VALUES
	(1, 'test', '2020-01-27 23:20:59', '$2y$10$hNtTusNrYXF9iaFIk/XzGuMU6YVdVWim8uKTbsnhK.pSGUrTFddBC', '2020-01-27 17:07:18'),
	(2, 'test2', '2020-01-27 23:20:59', '$2y$10$z/Jmik9FAQUbhhSqAvhKa.u/Q9JAbPUUtDGpPt.bcQxs/WdvZymg2', '2020-01-27 17:08:06'),
	(3, 'test3', '2020-01-27 23:20:59', '$2y$10$lMNaW3Xoxo3UGG4ML9b7wu2FYLmTXVQcQFUZjyggHBBTlQOexKMQG', '2020-01-27 17:09:10'),
	(4, 'Herb', '2020-01-27 23:20:59', '$2y$10$AaF3FZpBgK4hE/iOYXXM7e0RfmPtVBhwVK4S7BWGN/3owVBxrcQ/.', '2020-01-27 18:02:13'),
	(5, 'TschautschobÃ¤r', '2020-01-27 23:20:59', '$2y$10$4cbOMHg/XFNgMw0.B5cDSeike0h27iKLC0jkUVUURRAgPEtx4ACce', '2020-01-27 18:29:19'),
	(6, 'Herbert', 'h.haida@t-online.de', '$2y$10$K2./b50OyBt8S1NbKhuE.uzZ1/bAd2XCtW68DcncuYD4Tj8LFKwxu', '2020-01-27 23:49:59'),
	(7, 'Herbert Haida', 'haida.herbert@gmail.com', '$2y$10$nH6Jyy8TuCd9x1GlLT9ohucpxwiGyZ.AdF6P4/9550RaFFbilxH/G', '2020-01-27 23:50:59');
/*!40000 ALTER TABLE `benutzer` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.bilder
CREATE TABLE IF NOT EXISTS `bilder` (
  `BildID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `BildName` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `BildVerzeichnis` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `BildAenderungsdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RealerBildname` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`BildID`)
) ENGINE=InnoDB AUTO_INCREMENT=400 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.bilder: ~8 rows (ungefähr)
/*!40000 ALTER TABLE `bilder` DISABLE KEYS */;
INSERT INTO `bilder` (`BildID`, `BildName`, `BildVerzeichnis`, `BildAenderungsdatum`, `RealerBildname`) VALUES
	(0, 'Standard Bild', 'images/web/standard-bild.jpg', '0000-00-00 00:00:00', '0'),
	(128, 'Spagetti Bolognese', 'images/web/spagetti-bolognese.jpg', '0000-00-00 00:00:00', '0'),
	(130, 'Spagetti Carbonara', 'images/web/spagetti-carbonara.jpg', '0000-00-00 00:00:00', '0'),
	(131, 'Gurkensalat Mit Essig', 'images/web/gurkensalat-mit-essig.jpg', '0000-00-00 00:00:00', '0'),
	(150, 'Lasagne', 'images/web/lasagne.jpg', '0000-00-00 00:00:00', '0'),
	(219, '0ca7994e8d880fb2177fe8b844f08a34', 'images/web/0ca7994e8d880fb2177fe8b844f08a34.jpg', '2019-04-26 17:34:48', '0'),
	(220, 'Tumblr_mm56u3Br9b1rm8yh2o1_1280', 'images/web/tumblr_mm56u3Br9b1rm8yh2o1_1280.jpg', '2019-04-26 17:35:41', '0'),
	(399, 'Limetten Curry', 'images/web/limetten-curry.jpg', '2019-04-30 21:07:57', '0');
/*!40000 ALTER TABLE `bilder` ENABLE KEYS */;

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

-- Exportiere Struktur von Tabelle test.dbbenutzer
CREATE TABLE IF NOT EXISTS `dbbenutzer` (
  `dbdbbenutzerid` int(11) NOT NULL AUTO_INCREMENT,
  `dbbenutzername` varchar(100) NOT NULL,
  `dbbenutzeremail` varchar(100) NOT NULL,
  `dbbenutzerverifiziert` tinyint(1) NOT NULL DEFAULT '0',
  `dbbenutzertoken` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dbbenutzererstellt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dbdbbenutzerid`),
  UNIQUE KEY `email` (`dbbenutzeremail`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbbenutzer: ~2 rows (ungefähr)
/*!40000 ALTER TABLE `dbbenutzer` DISABLE KEYS */;
INSERT INTO `dbbenutzer` (`dbdbbenutzerid`, `dbbenutzername`, `dbbenutzeremail`, `dbbenutzerverifiziert`, `dbbenutzertoken`, `password`, `dbbenutzererstellt`) VALUES
	(39, 'Herb', 'h.haida@t-online.de', 1, '6505ea0b4d3a293c38f7664f70d33cb8a79bfdbbd39f63f7ee1d750d6341d01e805bc60c3914eca17651f20ee4c5f4554414', '$2y$10$y1Bc5yLz1i6tg/offpwXMe9yJkRhZcE7Ub.lnyIhggxX.PbEqC.7O', '2020-02-03 23:08:03'),
	(40, 'Herb2', 'info@haida-mediadesign.de', 1, '57062a52784d1ce7cdfafbe9b24e32174ce107562f3ad21146209e629aae5e7a57153db7f8af3a34e652a31c5a2a049edeea', '$2y$10$./9bf8pR5MN33DcKvk7Ouuo9UKCFrRYUkdNaY.sUNFbI6ImCx5eaq', '2020-02-03 23:22:03');
/*!40000 ALTER TABLE `dbbenutzer` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbdauer
CREATE TABLE IF NOT EXISTS `dbdauer` (
  `dbdauerid` smallint(6) NOT NULL AUTO_INCREMENT,
  `dbdauername` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`dbdauerid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbdauer: ~6 rows (ungefähr)
/*!40000 ALTER TABLE `dbdauer` DISABLE KEYS */;
INSERT INTO `dbdauer` (`dbdauerid`, `dbdauername`) VALUES
	(1, '15'),
	(2, '30'),
	(3, '45'),
	(4, '60'),
	(5, '>60'),
	(6, '>90');
/*!40000 ALTER TABLE `dbdauer` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbeinheiten
CREATE TABLE IF NOT EXISTS `dbeinheiten` (
  `dbeinheitid` smallint(6) NOT NULL AUTO_INCREMENT,
  `dbeinheitname` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`dbeinheitid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbeinheiten: ~7 rows (ungefähr)
/*!40000 ALTER TABLE `dbeinheiten` DISABLE KEYS */;
INSERT INTO `dbeinheiten` (`dbeinheitid`, `dbeinheitname`) VALUES
	(1, 'g'),
	(2, 'ml'),
	(3, 'St.'),
	(4, 'EL'),
	(5, 'Prise(n)'),
	(6, 'Dose(n)'),
	(7, 'beliebig');
/*!40000 ALTER TABLE `dbeinheiten` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbkueche
CREATE TABLE IF NOT EXISTS `dbkueche` (
  `dbkuecheid` smallint(6) NOT NULL AUTO_INCREMENT,
  `dbkuechename` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`dbkuecheid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbkueche: ~4 rows (ungefähr)
/*!40000 ALTER TABLE `dbkueche` DISABLE KEYS */;
INSERT INTO `dbkueche` (`dbkuecheid`, `dbkuechename`) VALUES
	(1, 'mediterran'),
	(2, 'rustikal'),
	(3, 'asiatisch'),
	(4, 'fränkisch');
/*!40000 ALTER TABLE `dbkueche` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbpasswordzuruecksetzen
CREATE TABLE IF NOT EXISTS `dbpasswordzuruecksetzen` (
  `dbpasswordzuruecksetzenid` int(11) NOT NULL,
  `dbpasswordzuruecksetzenemail` varchar(255) NOT NULL,
  `dbpasswordzuruecksetzentoken` varchar(255) NOT NULL,
  UNIQUE KEY `token` (`dbpasswordzuruecksetzentoken`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbpasswordzuruecksetzen: ~0 rows (ungefähr)
/*!40000 ALTER TABLE `dbpasswordzuruecksetzen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dbpasswordzuruecksetzen` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbrezeptbilder
CREATE TABLE IF NOT EXISTS `dbrezeptbilder` (
  `dbrezeptbildid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbrezeptbildname` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `dbrezeptbildverzeichnis` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `dbrezeptbildaenderungsdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dbrezeptbildrealerbildname` varchar(255) CHARACTER SET ucs2 NOT NULL DEFAULT '0',
  PRIMARY KEY (`dbrezeptbildid`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbrezeptbilder: ~9 rows (ungefähr)
/*!40000 ALTER TABLE `dbrezeptbilder` DISABLE KEYS */;
INSERT INTO `dbrezeptbilder` (`dbrezeptbildid`, `dbrezeptbildname`, `dbrezeptbildverzeichnis`, `dbrezeptbildaenderungsdatum`, `dbrezeptbildrealerbildname`) VALUES
	(0, 'Standard Bild', 'images/web/standard-bild.jpg', '0000-00-00 00:00:00', '0'),
	(128, 'Spagetti Bolognese', 'images/web/spagetti-bolognese.jpg', '0000-00-00 00:00:00', 'spagetti-bolognese.jpg'),
	(130, 'Spagetti Carbonara', 'images/web/spagetti-carbonara.jpg', '0000-00-00 00:00:00', '0'),
	(131, 'Gurkensalat Mit Essig', 'images/web/gurkensalat-mit-essig.jpg', '0000-00-00 00:00:00', '0'),
	(150, 'Lasagne', 'images/web/lasagne.jpg', '0000-00-00 00:00:00', '0'),
	(220, '0ca7994e8d880fb2177fe8b844f08a34', 'images/web/0ca7994e8d880fb2177fe8b844f08a34.jpg', '2019-04-26 17:34:48', '0'),
	(221, 'Tumblr_mm56u3Br9b1rm8yh2o1_1280', 'images/web/tumblr_mm56u3Br9b1rm8yh2o1_1280.jpg', '2019-04-26 17:35:41', '0'),
	(399, 'Limetten Curry', 'images/web/limetten-curry.jpg', '2019-04-30 21:07:57', '0'),
	(503, 'Mb1801_jessen_m_3118598', 'images/web/mb1801_jessen_m_3118598.jpg', '2020-02-02 01:02:27', 'mb1801_jessen_m_3118598.jpg');
/*!40000 ALTER TABLE `dbrezeptbilder` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbrezepte
CREATE TABLE IF NOT EXISTS `dbrezepte` (
  `dbrezeptid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbrezeptbezeichnung` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dbrezeptpreis` decimal(10,2) NOT NULL,
  `dbrezeptbeschreibung` varchar(500) CHARACTER SET utf8 NOT NULL,
  `dbaenderungsdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dbrezeptschwierigkeit` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dbrezeptkategorie` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dbrezeptdauer` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `dbrezepturl` varchar(100) NOT NULL DEFAULT '',
  `dbrezeptbildid` int(10) unsigned DEFAULT '1',
  `dbrezeptkueche` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dbrezpetuserid` int(10) NOT NULL,
  PRIMARY KEY (`dbrezeptid`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbrezepte: ~8 rows (ungefähr)
/*!40000 ALTER TABLE `dbrezepte` DISABLE KEYS */;
INSERT INTO `dbrezepte` (`dbrezeptid`, `dbrezeptbezeichnung`, `dbrezeptpreis`, `dbrezeptbeschreibung`, `dbaenderungsdatum`, `dbrezeptschwierigkeit`, `dbrezeptkategorie`, `dbrezeptdauer`, `dbrezepturl`, `dbrezeptbildid`, `dbrezeptkueche`, `dbrezpetuserid`) VALUES
	(128, 'Spagetti Bolognese', 12.50, 'Unsere leckere Bolognese ist Faulis geheim Rezept.', '2020-02-03 01:44:05', 'mittel', 'Pasta', '60', '', 0, 'mediterran', 34),
	(130, 'Spagetti Carbonara', 12.50, 'Carbonara!', '2020-02-03 01:44:07', 'mittel', 'Pasta', '30', '', 130, 'mediterran', 34),
	(131, 'Gurkensalat mit Essig', 2.50, 'Gurkensalat mit Essig!', '2020-02-03 01:15:30', 'leicht', 'Salate', '15', '', 131, 'rustikal', 0),
	(150, 'Lasagne', 4.50, 'Lasagne ist lecker!', '2020-02-03 00:30:48', 'mittel', 'Ofengerichte', '60', '', 150, 'mediterran', 33),
	(220, 'Traum', 0.00, '', '2020-02-03 00:30:51', 'mittel', 'Ofengerichte', '45', '', 219, 'rustikal', 33),
	(221, 'Fauli', 0.00, '', '2020-02-03 00:32:16', 'mittel', 'Salate', '60', '', 220, 'rustikal', 33),
	(399, 'Limetten Curry', 0.00, '', '2020-02-03 01:24:06', 'mittel', 'Reis', '45', '', 399, 'asiatisch', 1),
	(503, 'Kuchentraum', 0.00, 'Kek', '2020-02-03 01:02:07', 'mittel', 'Nachspeisen', '>90', '', 0, 'rustikal', 33);
/*!40000 ALTER TABLE `dbrezepte` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbrezeptkategorie
CREATE TABLE IF NOT EXISTS `dbrezeptkategorie` (
  `dbrezeptkategorieid` int(11) NOT NULL AUTO_INCREMENT,
  `dbrezeptkategoriename` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`dbrezeptkategorieid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbrezeptkategorie: ~8 rows (ungefähr)
/*!40000 ALTER TABLE `dbrezeptkategorie` DISABLE KEYS */;
INSERT INTO `dbrezeptkategorie` (`dbrezeptkategorieid`, `dbrezeptkategoriename`) VALUES
	(1, 'Pasta'),
	(2, 'Reis'),
	(3, 'Ofengerichte'),
	(4, 'Fleischgerichte'),
	(5, 'Vegetarisch'),
	(6, 'Salate'),
	(7, 'Vorspeisen'),
	(8, 'Nachspeisen');
/*!40000 ALTER TABLE `dbrezeptkategorie` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbschwierigkeitsgrad
CREATE TABLE IF NOT EXISTS `dbschwierigkeitsgrad` (
  `dbschwierigkeitsgradid` int(11) NOT NULL AUTO_INCREMENT,
  `dbschwierigkeitsgradname` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`dbschwierigkeitsgradid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbschwierigkeitsgrad: ~3 rows (ungefähr)
/*!40000 ALTER TABLE `dbschwierigkeitsgrad` DISABLE KEYS */;
INSERT INTO `dbschwierigkeitsgrad` (`dbschwierigkeitsgradid`, `dbschwierigkeitsgradname`) VALUES
	(1, 'leicht'),
	(2, 'mittel'),
	(3, 'anspruchsvoll');
/*!40000 ALTER TABLE `dbschwierigkeitsgrad` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.dbzutaten
CREATE TABLE IF NOT EXISTS `dbzutaten` (
  `dbzutatenid` int(11) NOT NULL AUTO_INCREMENT,
  `dbzutatenname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dbzutateneinheit` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`dbzutatenid`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.dbzutaten: ~64 rows (ungefähr)
/*!40000 ALTER TABLE `dbzutaten` DISABLE KEYS */;
INSERT INTO `dbzutaten` (`dbzutatenid`, `dbzutatenname`, `dbzutateneinheit`) VALUES
	(1, 'a', ''),
	(2, 'c', ''),
	(3, 'asdas', ''),
	(4, 'Beeren', ''),
	(5, 'dasdsad', ''),
	(6, 'ddddddddd', ''),
	(7, 'dasdasd', ''),
	(8, 'dasdasd', ''),
	(9, 'dasdas', ''),
	(10, 'g', ''),
	(11, 'fadsfasfd', ''),
	(12, 'g', ''),
	(13, 'ssssssssss', ''),
	(14, 'St.', ''),
	(15, 'Brot', ''),
	(16, 'g', ''),
	(17, 'zzzzzzzz', ''),
	(18, 'g', ''),
	(19, 'ggg', ''),
	(20, 'g', ''),
	(21, 'ugg', ''),
	(22, 'g', ''),
	(23, 'ggggg', ''),
	(24, 'g', ''),
	(25, 'Array', 'ml'),
	(26, '', ''),
	(27, '', ''),
	(28, '', ''),
	(29, '', ''),
	(30, '', ''),
	(31, '', ''),
	(32, 'Array', 'g'),
	(33, 'Array', 'St.'),
	(34, 'test, Array', 'g'),
	(35, 'test, ', 'g'),
	(36, 'dasdas, ', 'g'),
	(37, ' Array', 'St.'),
	(38, 'a, ', 'St.'),
	(39, 'gg, ', 'EL'),
	(40, 'Kartoffeln, ', 'g'),
	(41, 'MÃ¶hren, ', 'g'),
	(42, 'g, ', 'g'),
	(43, 'g, ', 'g'),
	(44, 'g, ', 'g'),
	(45, 'Apfel, ', 'St.'),
	(46, 'Eier, ', 'St.'),
	(47, '100, ', 'g'),
	(48, 'Eier, ', 'g'),
	(49, '1, ', 'Dose(n)'),
	(50, 'Tomaten, ', 'Dose(n)'),
	(51, '12, ', 'St.'),
	(52, 'trestz, ', 'St.'),
	(53, '300, ', 'g'),
	(54, 'Spagetti, ', 'g'),
	(55, '200, ', 'ml'),
	(56, 'Milch, ', 'ml'),
	(57, '1, ', 'ml'),
	(58, 'Prise(n), ', 'ml'),
	(59, 'Salz, ', 'ml'),
	(60, '2, ', 'St.'),
	(61, 'Butter, ', 'St.'),
	(62, '1, ', 'St.'),
	(63, 'Stein, ', 'St.'),
	(64, 'asd, ', 'g');
/*!40000 ALTER TABLE `dbzutaten` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.einheiten
CREATE TABLE IF NOT EXISTS `einheiten` (
  `EinheitID` smallint(6) NOT NULL AUTO_INCREMENT,
  `EinheitName` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`EinheitID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.einheiten: ~7 rows (ungefähr)
/*!40000 ALTER TABLE `einheiten` DISABLE KEYS */;
INSERT INTO `einheiten` (`EinheitID`, `EinheitName`) VALUES
	(1, 'g'),
	(2, 'ml'),
	(3, 'St.'),
	(4, 'EL'),
	(5, 'Prise(n)'),
	(6, 'Dose(n)'),
	(7, 'beliebig');
/*!40000 ALTER TABLE `einheiten` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.kueche
CREATE TABLE IF NOT EXISTS `kueche` (
  `KuecheID` smallint(6) NOT NULL AUTO_INCREMENT,
  `KuecheName` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`KuecheID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.kueche: ~4 rows (ungefähr)
/*!40000 ALTER TABLE `kueche` DISABLE KEYS */;
INSERT INTO `kueche` (`KuecheID`, `KuecheName`) VALUES
	(1, 'mediterran'),
	(2, 'rustikal'),
	(3, 'asiatisch'),
	(4, 'fränkisch');
/*!40000 ALTER TABLE `kueche` ENABLE KEYS */;

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
  `ProduktBildID` int(10) unsigned DEFAULT '1',
  `ProduktKueche` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ProduktUserID` int(10) NOT NULL,
  PRIMARY KEY (`ProduktID`)
) ENGINE=InnoDB AUTO_INCREMENT=400 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.produkte: ~7 rows (ungefähr)
/*!40000 ALTER TABLE `produkte` DISABLE KEYS */;
INSERT INTO `produkte` (`ProduktID`, `Produktbezeichnung`, `Produktpreis`, `Produktbeschreibung`, `Aenderungsdatum`, `ProduktSchwierigkeitsgrad`, `ProduktKategorie`, `ProduktDauer`, `ProduktURL`, `ProduktBildID`, `ProduktKueche`, `ProduktUserID`) VALUES
	(128, 'Spagetti Bolognese', 12.50, 'Unsere leckere Bolognese ist Faulis geheim Rezept.', '2020-02-03 23:48:19', 'mittel', 'Pasta', '>60', '', 0, 'mediterran', 1),
	(130, 'Spagetti Carbonara', 12.50, 'Carbonara!', '2020-02-03 23:50:53', 'leicht', 'Pasta', '30', '', 130, 'mediterran', 1),
	(131, 'Gurkensalat mit Essig', 2.50, 'Gurkensalat mit Essig!', '2019-04-21 13:10:27', 'leicht', 'Salate', '15', '', 131, 'rustikal', 0),
	(150, 'Lasagne', 4.50, 'Lasagne ist lecker!', '2020-01-27 12:19:35', 'mittel', 'Ofengerichte', '60', '', 150, 'mediterran', 0),
	(220, '0ca7994e8d880fb2177fe8b844f08a34', 0.00, '', '2019-04-26 17:35:04', 'mittel', 'Ofengerichte', '45', '', 0, 'rustikal', 0),
	(221, 'tumblr_mm56u3Br9b1rm8yh2o1_1280', 0.00, '', '2019-04-26 17:35:41', 'mittel', 'Salate', '60', '', 0, 'rustikal', 0),
	(399, 'Limetten Curry', 0.00, '', '2020-01-27 18:35:53', 'mittel', 'Reis', '45', '', 0, 'asiatisch', 0);
/*!40000 ALTER TABLE `produkte` ENABLE KEYS */;

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

-- Exportiere Daten aus Tabelle test.schwierigkeitsgrad: ~3 rows (ungefähr)
/*!40000 ALTER TABLE `schwierigkeitsgrad` DISABLE KEYS */;
INSERT INTO `schwierigkeitsgrad` (`SchwierigkeitsgradID`, `SchwierigkeitsgradName`) VALUES
	(1, 'leicht'),
	(2, 'mittel'),
	(3, 'anspruchsvoll');
/*!40000 ALTER TABLE `schwierigkeitsgrad` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.users: ~1 rows (ungefähr)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `password`) VALUES
	(1, 'Herb', 'h.haida@t-online.de', 1, 'bd109bfef2425dfdda5e0133ff12c5aee58a7c512471378aa82e99315fca2042578e4f4b13e75b3c62480bbcd3fa0584cb28', '$2y$10$Mf8caCAKYBdHnatXBmb6kenm.xR2d.8MIWpcSFdwxZ5CvvrofOoRq');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.zutaten
CREATE TABLE IF NOT EXISTS `zutaten` (
  `ZutatenID` int(11) NOT NULL AUTO_INCREMENT,
  `ZutatenName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ZutatenEinheit` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ZutatenID`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.zutaten: ~64 rows (ungefähr)
/*!40000 ALTER TABLE `zutaten` DISABLE KEYS */;
INSERT INTO `zutaten` (`ZutatenID`, `ZutatenName`, `ZutatenEinheit`) VALUES
	(1, 'a', ''),
	(2, 'c', ''),
	(3, 'asdas', ''),
	(4, 'Beeren', ''),
	(5, 'dasdsad', ''),
	(6, 'ddddddddd', ''),
	(7, 'dasdasd', ''),
	(8, 'dasdasd', ''),
	(9, 'dasdas', ''),
	(10, 'g', ''),
	(11, 'fadsfasfd', ''),
	(12, 'g', ''),
	(13, 'ssssssssss', ''),
	(14, 'St.', ''),
	(15, 'Brot', ''),
	(16, 'g', ''),
	(17, 'zzzzzzzz', ''),
	(18, 'g', ''),
	(19, 'ggg', ''),
	(20, 'g', ''),
	(21, 'ugg', ''),
	(22, 'g', ''),
	(23, 'ggggg', ''),
	(24, 'g', ''),
	(25, 'Array', 'ml'),
	(26, '', ''),
	(27, '', ''),
	(28, '', ''),
	(29, '', ''),
	(30, '', ''),
	(31, '', ''),
	(32, 'Array', 'g'),
	(33, 'Array', 'St.'),
	(34, 'test, Array', 'g'),
	(35, 'test, ', 'g'),
	(36, 'dasdas, ', 'g'),
	(37, ' Array', 'St.'),
	(38, 'a, ', 'St.'),
	(39, 'gg, ', 'EL'),
	(40, 'Kartoffeln, ', 'g'),
	(41, 'MÃ¶hren, ', 'g'),
	(42, 'g, ', 'g'),
	(43, 'g, ', 'g'),
	(44, 'g, ', 'g'),
	(45, 'Apfel, ', 'St.'),
	(46, 'Eier, ', 'St.'),
	(47, '100, ', 'g'),
	(48, 'Eier, ', 'g'),
	(49, '1, ', 'Dose(n)'),
	(50, 'Tomaten, ', 'Dose(n)'),
	(51, '12, ', 'St.'),
	(52, 'trestz, ', 'St.'),
	(53, '300, ', 'g'),
	(54, 'Spagetti, ', 'g'),
	(55, '200, ', 'ml'),
	(56, 'Milch, ', 'ml'),
	(57, '1, ', 'ml'),
	(58, 'Prise(n), ', 'ml'),
	(59, 'Salz, ', 'ml'),
	(60, '2, ', 'St.'),
	(61, 'Butter, ', 'St.'),
	(62, '1, ', 'St.'),
	(63, 'Stein, ', 'St.'),
	(64, 'asd, ', 'g');
/*!40000 ALTER TABLE `zutaten` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
