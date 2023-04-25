-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2023 at 02:56 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `igrice`
--

DROP TABLE IF EXISTS `igrice`;
CREATE TABLE IF NOT EXISTS `igrice` (
  `id_igrice` int(11) NOT NULL AUTO_INCREMENT,
  `ime_igrice` varchar(45) DEFAULT NULL,
  `developer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_igrice`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igrice`
--

INSERT INTO `igrice` (`id_igrice`, `ime_igrice`, `developer`) VALUES
(1, 'Super Mario 64', 'Nintendo'),
(2, 'Minecraft: Java Edition', 'Mojang'),
(3, 'Sonic Frontiers', 'SEGA'),
(4, 'Portal 2', 'Valve'),
(5, 'Dark Souls 3', 'FROMSOFT');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(45) DEFAULT NULL,
  `lozinka` varchar(45) DEFAULT NULL,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `e_mail_adresa` varchar(45) DEFAULT NULL,
  `id_socijalnih_medija` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_korisnika`),
  KEY `id_socijalnih_medija` (`id_socijalnih_medija`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `e_mail_adresa`, `id_socijalnih_medija`) VALUES
(1, 'Weege', 'Luigi123', 'Michael', 'Reeves', 'weegie@gmail.com', 1),
(2, 'cheese', 'Yummy15572', 'Fredric', 'Abuelo', 'themegacheeser@gmail.com', 2),
(3, 'Liam', 'fsrehyg44', 'Richard', 'Liam', 'liam@gmail.com', 3),
(4, 'marlene', 'gmnsri8492', 'Mario', 'Reeves', 'mariomaee@gmail.com', 4),
(5, 'puncayshun', 'es54sethurae', 'Peter', 'Griffin', 'peterman@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `moderatori`
--

DROP TABLE IF EXISTS `moderatori`;
CREATE TABLE IF NOT EXISTS `moderatori` (
  `id_moderatora` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(45) DEFAULT NULL,
  `lozinka` varchar(45) DEFAULT NULL,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `e_mail_adresa` varchar(45) DEFAULT NULL,
  `drzava_porekla` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_moderatora`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderatori`
--

INSERT INTO `moderatori` (`id_moderatora`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `e_mail_adresa`, `drzava_porekla`) VALUES
(1, 'Kyman', '234t4esrdfwFGASE', 'Karter', 'Griffin', 'Kman@gmail.com', 'Camada'),
(2, 'alaris', 'hredtjsre5u', 'Michael', 'Griffin', 'Mman@gmail.com', 'Camada'),
(3, 'Perna64', 'rszjk456j', 'Richard', 'Griffin', 'Rman@gmail.com', 'Camada'),
(4, 'SM64ModerationBot', '234t4esrsjrdfwFGASE', 'Peter', 'Griffin', 'Pman@gmail.com', 'Camada'),
(5, 'VonJim', '4sr5uj4evbh', 'Brian', 'Griffin', 'Bman@gmail.com', 'Camada');

-- --------------------------------------------------------

--
-- Table structure for table `moderatori_igrice`
--

DROP TABLE IF EXISTS `moderatori_igrice`;
CREATE TABLE IF NOT EXISTS `moderatori_igrice` (
  `id_moderatora_igrice` int(11) NOT NULL AUTO_INCREMENT,
  `id_moderatora` int(11) DEFAULT NULL,
  `id_igrice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_moderatora_igrice`),
  KEY `id_moderatora` (`id_moderatora`),
  KEY `id_igrice` (`id_igrice`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderatori_igrice`
--

INSERT INTO `moderatori_igrice` (`id_moderatora_igrice`, `id_moderatora`, `id_igrice`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `run_ovi`
--

DROP TABLE IF EXISTS `run_ovi`;
CREATE TABLE IF NOT EXISTS `run_ovi` (
  `id_runa` int(11) NOT NULL AUTO_INCREMENT,
  `vreme` time DEFAULT NULL,
  `kategorija` enum('any percent','100 precent','low percent','any percent glitchless','100 percent glitchless','low percent glitchless') DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `platforma` varchar(45) DEFAULT NULL,
  `id_igrice` int(11) DEFAULT NULL,
  `id_moderatora` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_runa`),
  KEY `id_igrice` (`id_igrice`),
  KEY `id_moderatora` (`id_moderatora`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `run_ovi`
--

INSERT INTO `run_ovi` (`id_runa`, `vreme`, `kategorija`, `datum`, `platforma`, `id_igrice`, `id_moderatora`) VALUES
(1, '01:37:35', 'any percent', '2022-11-22', 'N64', 1, 1),
(2, '01:22:35', '100 precent', '2022-12-12', 'N64', 1, 1),
(3, '01:37:35', 'any percent', '2021-11-22', 'N64', 1, 1),
(4, '00:22:06', '100 precent', '2020-01-13', 'Xbox', 2, 2),
(5, '02:37:03', 'any percent glitchless', '2016-11-02', 'PC', 3, 3),
(6, '03:22:12', 'any percent', '2021-12-12', 'N64', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `run_ovi_korisnici`
--

DROP TABLE IF EXISTS `run_ovi_korisnici`;
CREATE TABLE IF NOT EXISTS `run_ovi_korisnici` (
  `id_runa_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) DEFAULT NULL,
  `id_runa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_runa_korisnika`),
  KEY `id_korisnika` (`id_korisnika`),
  KEY `id_runa` (`id_runa`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `run_ovi_korisnici`
--

INSERT INTO `run_ovi_korisnici` (`id_runa_korisnika`, `id_korisnika`, `id_runa`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 5, 2),
(4, 4, 3),
(5, 4, 6),
(6, 2, 4),
(7, 3, 1),
(8, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `socijalne_medije`
--

DROP TABLE IF EXISTS `socijalne_medije`;
CREATE TABLE IF NOT EXISTS `socijalne_medije` (
  `id_socijalnih_medija` int(11) NOT NULL AUTO_INCREMENT,
  `twitch` varchar(145) DEFAULT NULL,
  `youtube` varchar(145) DEFAULT NULL,
  `discord` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id_socijalnih_medija`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socijalne_medije`
--

INSERT INTO `socijalne_medije` (`id_socijalnih_medija`, `twitch`, `youtube`, `discord`) VALUES
(1, 'https://www.twitch.tv/weegee', 'https://www.youtube.com/channel/UCyVMD7YzKS7wo7al3wC1VaQ', ''),
(2, '', 'https://www.youtube.com/channel/UClvMduw1MDMQ0PuH753-XSA', ''),
(3, '', 'https://www.youtube.com/channel/UC_Dy7XX7Ol-8NOY28hd4CIA', ''),
(4, 'https://www.twitch.tv/marlene_3521', 'https://www.youtube.com/channel/UCbd65E0BtoRrIOW4AJijklw', ''),
(5, '', 'https://www.youtube.com/channel/UC987-NBnxKdvBp16bLmxm0w', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
