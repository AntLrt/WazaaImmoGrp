-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 17 déc. 2020 à 09:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `waz_immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `inscr_num` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inscr_civilite` varchar(8) NOT NULL,
  `inscr_nom` varchar(50) NOT NULL,
  `inscr_prenom` varchar(50) NOT NULL,
  `inscr_date` varchar(50) NOT NULL,
  `inscr_mail` varchar(150) NOT NULL,
  `inscr_mp` varchar(50) NOT NULL,
  PRIMARY KEY (`inscr_num`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`inscr_num`, `inscr_civilite`, `inscr_nom`, `inscr_prenom`, `inscr_date`, `inscr_mail`, `inscr_mp`) VALUES
(1, 'Monsieur', 'Loriot', 'Antoine', '15/07/96', 'loriot.antoine.pro@gmail.com', '15ju!llet');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
