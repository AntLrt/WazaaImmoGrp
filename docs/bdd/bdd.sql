DROP DATABASE IF EXISTS wazaaImmoGroup;

CREATE DATABASE wazaaImmoGroup; 

USE wazaaImmoGroup;

-- Structure de la table waz_biens

CREATE TABLE waz_biens
(
   bi_id INT(10) NOT NULL AUTO_INCREMENT,
   bi_type SMALLINT(6) NOT NULL,
   bi_pieces TINYINT (3) ,
   bi_ref VARCHAR(10) NOT NULL,
   bi_description mediumtext NOT NULL,
   bi_local VARCHAR(100) NOT NULL,
   bi_surf_habitable INT (11) NOT NULL,
   bi_surf_totale INT (11) NOT NULL,
   bi_estimations_vente DECIMAL(8,2) NOT NULL,
   bi_estimation_location DECIMAL(8,2) NOT NULL,
   bi_diagnostic CHAR(1) NOT NULL,
   PRIMARY KEY(bi_id)
);

-- Structure de la table waz_options

CREATE TABLE waz_options
(
   opt_id INT(10) NOT NULL AUTO_INCREMENT,
   opt_libelle VARCHAR(100) NOT NULL,
   PRIMARY KEY(opt_id)
);

-- Structure de la table waz_photos

CREATE TABLE waz_photos
(
   pho_id NOT NULL AUTO_INCREMENT,
   pho_nom VARCHAR(30) NOT NULL,
   bi_id INT (10) NOT NULL,
   PRIMARY KEY(pho_id),
   FOREIGN KEY(bi_id) REFERENCES waz_biens(bi_id)
);

-- Structure de la table waz_employes

CREATE TABLE waz_employes
(
   emp_id NOT NULL AUTO_INCREMENT,
   emp_nom VARCHAR(50) NOT NULL,
   emp_prenom VARCHAR(50) NOT NULL,
   emp_adresse VARCHAR(50) NOT NULL,
   emp_tel VARCHAR(50) NOT NULL,
   emp_mail VARCHAR(50) NOT NULL,
   emp_poste VARCHAR(50) NOT NULL,
   emp_mdp VARCHAR(50) NOT NULL,
   PRIMARY KEY(emp_id),
   UNIQUE(emp_mail)
);

-- Structure de la table waz_utilisateurs

CREATE TABLE waz_utilisateurs
(
   ut_id NOT NULL AUTO_INCREMENT,
   ut_nom VARCHAR(30),
   ut_prenom VARCHAR(30),
   ut_adresse VARCHAR(50),
   ut_telephone VARCHAR(50),
   ut_email VARCHAR(50),
   ut_pays VARCHAR(50),
   PRIMARY KEY(ut_id)
);

-- Structure de la table waz_annonces

CREATE TABLE waz_annonces
(
   an_id NOT NULL AUTO_INCREMENT,
   an_prix INT(10) NOT NULL,
   an_ref CHAR(7) NOT NULL,
   an_date_disponibilite DATE NOT NULL,
   an_offre CHAR(1) NOT NULL,
   an_nbre_vues SMALLINT(6) NOT NULL,
   an_ajout_annonces DATE NOT NULL,
   an_modif_annonces DATETIME DEFAULT NULL,
   an_titre_ VARCHAR(255) NOT NULL,
   bi_id INT(10) NOT NULL,
   PRIMARY KEY(an_id),
   FOREIGN KEY(bi_id) REFERENCES waz_biens(bi_id)
);

-- Structure de la table waz_annonces






