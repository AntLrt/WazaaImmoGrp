DROP DATABASE IF EXISTS wazaaImmoGroup;

CREATE DATABASE wazaaImmoGroup; 

USE wazaaImmoGroup;

-- Structure de la table waz_biens

CREATE TABLE waz_biens
(
   bi_id INT(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
   bi_type VARCHAR(11) NOT NULL COMMENT 'Type de bien',
   bi_pieces TINYINT (3) NOT NULL  COMMENT 'Nombre de pièces' ,
   bi_ref CHAR(11) NOT NULL COMMENT 'Référence de l''annonce',
   bi_description TEXT NOT NULL,
   bi_local VARCHAR(100) NOT NULL,
   bi_surf_habitable INT (11) NOT NULL COMMENT 'Surface habitable (mètres carrés)',
   bi_surf_totale INT (11) NOT NULL COMMENT 'Surface totale/terrain (mètres carrés)',
   bi_estimations_vente DECIMAL(8,2) NOT NULL ,
   bi_estimation_location DECIMAL(8,2) NOT NULL ,
   bi_diagnostic CHAR(1) NOT NULL COMMENT 'Lettre du diagnostic : A à G + V pour vierge ',
   PRIMARY KEY(bi_id)
);

-- Structure de la table waz_options

CREATE TABLE waz_options
(
   opt_id INT(10) NOT NULL AUTO_INCREMENT,
   opt_libelle VARCHAR(100) NOT NULL,
   PRIMARY KEY(opt_id)
);

-- Déchargement des données de la table options

INSERT INTO waz_options (opt_id, opt_libelle) VALUES
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

-- Structure de la table waz_photos

CREATE TABLE waz_photos
(
   pho_id INT(10) NOT NULL AUTO_INCREMENT,
   pho_nom VARCHAR(30) NOT NULL,
   bi_id INT(10) NOT NULL,
   PRIMARY KEY(pho_id),
   FOREIGN KEY(bi_id) REFERENCES waz_biens(bi_id)
);

-- Structure de la table waz_employes

CREATE TABLE waz_employes
(
   emp_id INT(10) NOT NULL AUTO_INCREMENT,
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

CREATE TABLE waz_internautes
(
   in_id INT(10) NOT NULL AUTO_INCREMENT,
   in_nom VARCHAR(30),
   in_prenom VARCHAR(30),
   in_adresse VARCHAR(50),
   in_telephone VARCHAR(50),
   in_email VARCHAR(50),
   in_pays VARCHAR(50),
   PRIMARY KEY(in_id)
);

-- Structure de la table waz_annonces

CREATE TABLE waz_annonces
(
   an_id INT(10) NOT NULL AUTO_INCREMENT,
   an_prix DECIMAL(8,2) NOT NULL COMMENT 'Prix en euros',
   est_active BOOLEAN NOT NULL COMMENT '1=active 0=non active',
   an_ref CHAR(20) NOT NULL COMMENT 'Référence de l''annonce',
   an_date_disponibilite DATE NOT NULL,
   an_offre CHAR(1) NOT NULL COMMENT 'Type d''offre. Lettres A, L ou V.',
   an_nbre_vues SMALLINT(6) NOT NULL,
   an_date_ajout DATE NOT NULL,
   an_date_modif DATETIME DEFAULT NULL,
   an_titre VARCHAR(255) NOT NULL,
   bi_id INT(10) NOT NULL,
   PRIMARY KEY(an_id),
   FOREIGN KEY(bi_id) REFERENCES waz_biens(bi_id)
);

-- Structure de la table waz_commentaire

CREATE TABLE waz_commentaire
(
   co_id  INT(10) NOT NULL AUTO_INCREMENT,
   co_avis TEXT DEFAULT NULL,
   co_notes CHAR(1) DEFAULT NULL,
   co_date_ajout DATETIME NOT NULL,
   in_id INT(10) ,
   PRIMARY KEY(co_id),
   FOREIGN KEY(in_id) REFERENCES waz_internautes(in_id)
);
-- Structure de la table waz_annonces

CREATE TABLE waz_composer
(
   bi_id INT (10) ,
   opt_id INT (10),
   PRIMARY KEY(bi_id, opt_id),
   FOREIGN KEY(bi_id) REFERENCES waz_biens(bi_id),
   FOREIGN KEY(opt_id) REFERENCES waz_options(opt_id)
);


-- Structure de la table waz_negocier

CREATE TABLE waz_negocier
(
   emp_id INT(10),
   in_id INT(10),
   an_id INT(10),
   est_conclu BOOLEAN NOT NULL,
   montant_transaction DECIMAL(9,2) NOT NULL,
   date_debut_transaction DATE NOT NULL,
   date_transaction_fin DATE DEFAULT NULL,
   date_dernier_contact DATE NOT NULL,
   PRIMARY KEY(emp_id, in_id, an_id),
   FOREIGN KEY(emp_id) REFERENCES waz_employes(emp_id),
   FOREIGN KEY(in_id) REFERENCES waz_internautes(in_id),
   FOREIGN KEY(an_id) REFERENCES waz_annonces(an_id)
);

-- Structure de la table waz_contacter
CREATE TABLE waz_contacter
(
   emp_id INT(10),
   in_id INT(10),
   sujet VARCHAR(50) NOT NULL,
   question TEXT NOT NULL,
   PRIMARY KEY(emp_id, in_id),
   FOREIGN KEY(emp_id) REFERENCES waz_employes(emp_id),
   FOREIGN KEY(in_id) REFERENCES waz_internautes(in_id)
);









