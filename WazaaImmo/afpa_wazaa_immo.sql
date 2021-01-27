-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 17 déc. 2020 à 09:10
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa_wazaa_immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `an_photo` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'jpg' COMMENT 'Extension de la photo',
  `an_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `an_offre` char(1) NOT NULL COMMENT 'Type d''offre. Lettres A, L ou V.',
  `an_type` int NOT NULL COMMENT 'Type de bien',
  `an_pieces` int UNSIGNED DEFAULT NULL COMMENT 'Nombre de pièces (facultatif)',
  `an_ref` varchar(10) NOT NULL COMMENT 'Référence de l''annonce',
  `an_titre` varchar(200) NOT NULL COMMENT 'Titre',
  `an_description` mediumtext NOT NULL COMMENT 'Description',
  `an_local` varchar(100) NOT NULL,
  `an_surf_hab` smallint DEFAULT NULL COMMENT 'Surface habitable (mètres carrés)',
  `an_surf_tot` int NOT NULL COMMENT 'Surface totale/terrain (mètres carrés)',
  `an_prix` int NOT NULL COMMENT 'Prix en euros',
  `an_diagnostic` char(1) NOT NULL COMMENT 'Lettre du diagnostic : A à G + V pour vierge ',
  `an_d_ajout` date NOT NULL COMMENT 'Date d''ajout',
  `an_d_modif` datetime DEFAULT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`an_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`an_photo`, `an_id`, `an_offre`, `an_type`, `an_pieces`, `an_ref`, `an_titre`, `an_description`, `an_local`, `an_surf_hab`, `an_surf_tot`, `an_prix`, `an_diagnostic`, `an_d_ajout`, `an_d_modif`) VALUES
('', 1, 'A', 0, 5, '20A100', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL),
('jpg', 10, '1', 0, 1, 'Bnsoir', 'Bnsoir', 'Bnsoir', 'Bnsoir', 12, 12, 12, '1', '0000-00-00', NULL),
('jpg', 12, '1', 0, 1, 'App01', 'RoyalGran', 'RoyalGran', 'Amiens sud', 500, 520, 4980000, '1', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `opt_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `opt_libelle` varchar(100) NOT NULL COMMENT 'Libellé de l''option',
  PRIMARY KEY (`opt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`opt_id`, `opt_libelle`) VALUES
(1, 'Jardin'),
(2, 'Garage'),
(3, 'Parking'),
(4, 'Piscine'),
(5, 'Combles aménageables'),
(6, 'Cuisine ouverte'),
(7, 'Sans travaux'),
(8, 'Avec travaux'),
(9, 'Cave'),
(10, 'Plain-pied'),
(11, 'Ascenseur'),
(12, 'Terrasse/balcon'),
(13, 'Cheminée');

-- --------------------------------------------------------

--
-- Structure de la table `waz_an_opt`
--

DROP TABLE IF EXISTS `waz_an_opt`;
CREATE TABLE IF NOT EXISTS `waz_an_opt` (
  `id_an` int NOT NULL,
  `id_opt` int NOT NULL,
  PRIMARY KEY (`id_an`,`id_opt`),
  KEY `waz_an_opt_id_opt_FK` (`id_opt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `waz_an_opt`
--

INSERT INTO `waz_an_opt` (`id_an`, `id_opt`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `waz_bien`
--

DROP TABLE IF EXISTS `waz_bien`;
CREATE TABLE IF NOT EXISTS `waz_bien` (
  `bien_id` int NOT NULL AUTO_INCREMENT,
  `bien_libelle` varchar(55) NOT NULL,
  PRIMARY KEY (`bien_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `waz_bien`
--

INSERT INTO `waz_bien` (`bien_id`, `bien_libelle`) VALUES
(1, 'Maison'),
(2, 'Appartement'),
(3, 'Immeuble'),
(4, 'Garage'),
(5, 'Terrain'),
(6, 'Locaux professionnels'),
(7, 'Bureaux');

-- --------------------------------------------------------

--
-- Structure de la table `waz_membre`
--

DROP TABLE IF EXISTS `waz_membre`;
CREATE TABLE IF NOT EXISTS `waz_membre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loginid` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `waz_membre`
--

INSERT INTO `waz_membre` (`id`, `loginid`, `mdp`) VALUES
(1, 'etienneoceane@outlook.com', 'Mdp456789!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
