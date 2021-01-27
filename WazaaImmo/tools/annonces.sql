-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 15 nov. 2020 à 10:08
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `afpa_wazaa_immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `an_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `an_offre` char(1) NOT NULL COMMENT 'Type d''offre. Lettres A, L ou V.',
  `an_type` tinyint(3) UNSIGNED NOT NULL COMMENT 'Type de bien',
  `an_pieces` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Nombre de pièces (facultatif)',
  `an_ref` varchar(10) NOT NULL COMMENT 'Référence de l''annonce',
  `an_titre` varchar(200) NOT NULL COMMENT 'Titre',
  `an_description` mediumtext NOT NULL COMMENT 'Description',
  `an_local` varchar(100) NOT NULL,
  `an_surf_hab` smallint(6) DEFAULT NULL COMMENT 'Surface habitable (mètres carrés)',
  `an_surf_tot` int(11) NOT NULL COMMENT 'Surface totale/terrain (mètres carrés)',
  `an_prix` int(11) NOT NULL COMMENT 'Prix en euros',
  `an_diagnostic` char(1) NOT NULL COMMENT 'Lettre du diagnostic : A à G + V pour vierge ',
  `an_d_ajout` date NOT NULL COMMENT 'Date d''ajout',
  `an_d_modif` datetime DEFAULT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`an_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`an_id`, `an_offre`, `an_type`, `an_pieces`, `an_ref`, `an_titre`, `an_description`, `an_local`, `an_surf_hab`, `an_surf_tot`, `an_prix`, `an_diagnostic`, `an_d_ajout`, `an_d_modif`) VALUES
(1, 'A', 1, 5, '20A100', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
