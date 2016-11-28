-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 28 Novembre 2016 à 11:15
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `le_vrai_classement`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `pe` (
  `id` int(11) NOT NULL,
  `Id_match` int(11) NOT NULL,
  `Pe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `rencontres` (
  `id` int(11) NOT NULL,
  `Id_equipe_1` int(11) NOT NULL,
  `Id_equipe_2` int(11) NOT NULL,
  `Score_equipe_1` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Score_equipe_2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Journee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(27, 1, 7, '24', '15', 2),
(28, 2, 9, '30', '15', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2449BA1554231355` (`Nom`);

--
-- Index pour la table `pe`
--
ALTER TABLE `pe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rencontres`
--
ALTER TABLE `rencontres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `pe`
--
ALTER TABLE `pe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `rencontres`
--
ALTER TABLE `rencontres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
