
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 14 Février 2017 à 09:26
-- Version du serveur: 10.0.28-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u221718894_lvrc`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE IF NOT EXISTS `equipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2449BA1554231355` (`Nom`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `equipes`
--

INSERT INTO `equipes` (`id`, `Nom`) VALUES
(4, 'MARTIGUA SCL 3'),
(6, 'PARIS 18 2'),
(5, 'PARIS HBA 4'),
(2, 'PARIS SPORT CLUB 4'),
(1, 'PARIS SPORT CLUB 5'),
(8, 'PUC 4'),
(7, 'PUC 5'),
(3, 'STADE FRANCAIS 2'),
(9, 'US METRO T 3');

-- --------------------------------------------------------

--
-- Structure de la table `pe`
--

CREATE TABLE IF NOT EXISTS `pe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_match` int(11) NOT NULL,
  `Pe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pe`
--

INSERT INTO `pe` (`id`, `Id_match`, `Pe`) VALUES
(1, 27, 1),
(2, 28, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rencontres`
--

CREATE TABLE IF NOT EXISTS `rencontres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_equipe_1` int(11) NOT NULL,
  `Id_equipe_2` int(11) NOT NULL,
  `Score_equipe_1` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Score_equipe_2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Journee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Contenu de la table `rencontres`
--

INSERT INTO `rencontres` (`id`, `Id_equipe_1`, `Id_equipe_2`, `Score_equipe_1`, `Score_equipe_2`, `Journee`) VALUES
(2, 3, 6, '30', '27', 1),
(3, 4, 5, '24', '18', 1),
(4, 9, 8, '15', '26', 1),
(5, 8, 1, '25', '22', 2),
(6, 7, 4, '21', '21', 2),
(7, 2, 6, '21', '12', 3),
(8, 3, 7, '28', '26', 3),
(9, 4, 8, '22', '20', 3),
(10, 1, 9, '27', '23', 3),
(11, 8, 3, '23', '26', 4),
(12, 5, 3, '27', '31', 2),
(13, 5, 6, '28', '25', 4),
(14, 1, 2, '21', '30', 4),
(15, 9, 4, '16', '33', 4),
(16, 2, 5, '38', '21', 5),
(17, 3, 9, '20', 'FO', 5),
(18, 6, 7, '21', '21', 5),
(19, 8, 6, '22', '32', 6),
(20, 7, 5, '17', '32', 6),
(21, 4, 2, '21', '29', 6),
(22, 1, 3, '21', '21', 6),
(23, 2, 7, '37', '19', 7),
(24, 3, 4, '20', '25', 7),
(25, 5, 8, '34', '19', 7),
(26, 6, 9, '39', '15', 7),
(27, 1, 7, '24', '15', 1),
(28, 2, 9, '30', '15', 2),
(29, 3, 2, '25', '25', 8),
(30, 9, 5, '23', '39', 8),
(31, 1, 6, '20', '26', 8),
(37, 6, 3, '21', '24', 10),
(33, 2, 8, '37', '18', 9),
(34, 7, 9, '30', '23', 9),
(35, 5, 1, '20', '19', 9),
(36, 6, 4, '28', '24', 9),
(38, 5, 4, '24', '23', 10),
(39, 7, 1, '27', '28', 10),
(40, 8, 9, '19', '22', 10),
(41, 9, 2, '23', '40', 11),
(42, 1, 8, '27', '20', 11),
(43, 4, 7, '45', '9', 11),
(44, 3, 5, '18', '28', 11),
(45, 4, 1, '21', '25', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
