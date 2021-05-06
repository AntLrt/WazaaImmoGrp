DROP DATABASE IF EXISTS wazaaImmoGroup;

CREATE DATABASE wazaaImmoGroup; 

USE wazaaImmoGroup;

-- Structure de la table waz_biens

CREATE TABLE waz_biens
(
   bi_id INT(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
   bi_type VARCHAR(25) NOT NULL CHECK (bi_type IN('maison','garage','terrain','locaux professionnels','immeuble','bureaux','appartement')) COMMENT 'Type de bien',
   bi_pieces char(4) NOT NULL CHECK (bi_pieces IN ('1','2','3','4','5','6','+6','NULL'))COMMENT 'Nombre de pièces' ,
   bi_ref CHAR(11) NOT NULL  CHECK (REGEXP_LIKE(bi_ref,'^(A{1}P{1}|M{1}A{1}|T{1}E{1}|G{1}A{1}|I{1}M{1}|L{1}P{1}|B{1}U{1})[-]([0-9]{4})[-]([0-9]{2})$')=1)  COMMENT 'Référence du bien',
   bi_description TEXT NOT NULL CHECK (REGEXP_LIKE(bi_description,'^[^ ]')),
   bi_local VARCHAR(100) NOT NULL CHECK (REGEXP_LIKE(bi_local,'^[^ ]')),
   bi_surf_habitable INT (11) NOT NULL CHECK (bi_surf_habitable > 0) COMMENT 'Surface habitable (mètres carrés)',
   bi_surf_totale INT (11) NOT NULL CHECK (bi_surf_totale > 0) COMMENT 'Surface totale/terrain (mètres carrés)',
   bi_estimation_vente DECIMAL(8,2) NOT NULL CHECK (bi_estimation_vente > 0) ,
   bi_estimation_location DECIMAL(8,2) NOT NULL CHECK (bi_estimation_location > 0) ,
   bi_diagnostic CHAR(1) NOT NULL CHECK (bi_diagnostic IN ('A','B','C','D','E','F','G','V')) COMMENT 'Lettre du diagnostic : A à G + V pour vierge ',
   PRIMARY KEY(bi_id),
   INDEX ind_biens_6(bi_type,bi_pieces,bi_ref,bi_local,bi_surf_habitable,bi_surf_totale),
   INDEX ind_biens_4(bi_pieces,bi_ref,bi_local,bi_surf_habitable),
   INDEX ind_biens_2(bi_ref,bi_local)
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
   pho_nom VARCHAR(30) NOT NULL CHECK(REGEXP_LIKE(pho_nom,'^[^ ]')),
   bi_id INT(10) NOT NULL,
   PRIMARY KEY(pho_id),
   FOREIGN KEY(bi_id) REFERENCES waz_biens(bi_id)
);

-- Structure de la table waz_employes

CREATE TABLE waz_employes
(
   emp_id INT(10) NOT NULL AUTO_INCREMENT,
   emp_nom VARCHAR(50) NOT NULL CHECK (REGEXP_LIKE(emp_nom,'(^[^ \\W\\d_-])([A-Za-zàáâäçèéêëìíîïñòóôöùúûüwW ]+)([ -]?)[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+$')),
   emp_prenom VARCHAR(50) NOT NULL CHECK (REGEXP_LIKE(emp_prenom,'(^[^ \\W\\d_-])([A-Za-zàáâäçèéêëìíîïñòóôöùúûüwW ]+)([ -]?)[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+$')),
   emp_adresse VARCHAR(50) NOT NULL CHECK (REGEXP_LIKE(emp_adresse,"^[^ \s][a-zA-Z ,\\d\/\\\*.%&'-]{3,}$")),
   emp_tel VARCHAR(50) NOT NULL CHECK (REGEXP_LIKE(emp_tel,"^[^ \W]([0-9 \/\-])*$")),
   emp_mail VARCHAR(50) NOT NULL UNIQUE CHECK (REGEXP_LIKE(emp_mail,'([a-z0-9.-])+@([a-z0-9.-]{2,})([.]{1})[a-z.-]{2,4}$')),
   emp_poste VARCHAR(50) NOT NULL CHECK (REGEXP_LIKE(emp_poste,'^[a-zA-Z ]{3,}$')),
   emp_mdp VARCHAR(50) NOT NULL CHECK(REGEXP_LIKE(emp_mdp,'^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[+!*$@%_-])([+!*$@%_\\w -]{8,15})$')),
   PRIMARY KEY(emp_id)
);
-- Structure de la table waz_utilisateurs

CREATE TABLE waz_internautes
(
   in_id INT(10) NOT NULL AUTO_INCREMENT,
   in_nom VARCHAR(30) NOT NULL CHECK (REGEXP_LIKE(in_nom,'(^[^ \\W\\d_-])([A-Za-zàáâäçèéêëìíîïñòóôöùúûü ]+)([ -]?)[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+$')),
   in_prenom VARCHAR(30) NOT NULL CHECK(REGEXP_LIKE(in_prenom,'(^[^ \\W\\d_-])([A-Za-zàáâäçèéêëìíîïñòóôöùúûü ]+)([ -]?)[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+$')),
   in_adresse VARCHAR(50) NOT NULL,
   in_telephone VARCHAR(50) NOT NULL CHECK (REGEXP_LIKE (in_telephone,'^[^ \W]([0-9 \/\-])*$')),
   in_email VARCHAR(50) NOT NULL  CHECK (REGEXP_LIKE(in_email,'([a-z0-9.-])+@([a-z0-9.-]{2,})([.]{1})[a-z]{2,4}$')),
   in_pays VARCHAR(50) NOT NULL,
   in_est_contacter BOOLEAN NOT NULL DEFAULT 0 CHECK (in_est_contacter IN ('0', '1') ) 
   COMMENT '1=contacter 0=non contacter', 
   PRIMARY KEY(in_id),
   UNIQUE(in_email)
);



-- Structure de la table waz_annonces

DROP TABLE IF EXISTS waz_annonces;
CREATE TABLE waz_annonces
(
   an_id INT(10) NOT NULL AUTO_INCREMENT,
   an_prix DECIMAL(8,2) NOT NULL CHECK (an_prix>=0) COMMENT 'Prix en euros',
   an_est_active BOOLEAN NOT NULL CHECK (an_est_active IN ('0','1')) COMMENT '1=active 0=non active',
   an_ref CHAR(20) NOT NULL CHECK (REGEXP_LIKE(an_ref,'^((V{1}E{1})|(L{1}O{1})|(A{1}C{1}))[-](A{1}P{1}|M{1}A{1}|T{1}E{1}|G{1}A{1}|I{1}M{1}|L{1}P{1}|B{1}U{1})[-]([0-9]{4})[-]([0-9]{2})$')=1)  COMMENT 'Référence de l''annonce',
   an_date_disponibilite DATE NOT NULL,
   an_offre CHAR(1) NOT NULL CHECK (an_offre IN ('A','L','V')) COMMENT 'Type d''offre. Lettres A, L ou V.',
   an_nbre_vues SMALLINT(6) NOT NULL CHECK (an_nbre_vues >=0),
   an_date_ajout DATE NOT NULL DEFAULT (CURRENT_DATE),
   an_date_modif DATETIME  DEFAULT NULL ,
   an_titre VARCHAR(255) NOT NULL,
   bi_id INT(10) NOT NULL,
   PRIMARY KEY(an_id),
   FOREIGN KEY(bi_id) REFERENCES waz_biens(bi_id),
   CONSTRAINT `chk_dateModif` CHECK (an_date_modif >= an_date_ajout or an_date_modif is NULL) ,
   INDEX ind_prix_offre(an_prix,an_offre)
);

-- Structure de la table waz_commentaire

CREATE TABLE waz_commentaire
(
   com_id  INT(10) NOT NULL AUTO_INCREMENT,
   com_avis TEXT DEFAULT NULL,
   com_notes CHAR(2) DEFAULT NULL,
   com_date_ajout DATETIME NOT NULL DEFAULT (CURRENT_DATE),
   in_id INT(10) ,
   PRIMARY KEY(com_id),
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
   neg_est_conclu BOOLEAN NOT NULL CHECK (neg_est_conclu IN ("0","1")),
   neg_montant_transaction DECIMAL(9,2) NOT NULL CHECK (neg_montant_transaction>=0),
   neg_date_debut_transaction DATE NOT NULL DEFAULT (CURRENT_DATE),
   neg_date_transaction_fin DATE DEFAULT NULL ,
   neg_date_dernier_contact DATE NOT NULL DEFAULT (CURRENT_DATE),
   PRIMARY KEY(emp_id, in_id, an_id),
   FOREIGN KEY(emp_id) REFERENCES waz_employes(emp_id),
   FOREIGN KEY(in_id) REFERENCES waz_internautes(in_id),
   FOREIGN KEY(an_id) REFERENCES waz_annonces(an_id),
   CONSTRAINT chk_datetransactionfin CHECK(neg_date_transaction_fin >=neg_date_debut_transaction or
    neg_date_transaction_fin IS NULL )
);

-- Structure de la table waz_contacter
CREATE TABLE waz_contacter
(
   emp_id INT(10),
   in_id INT(10),
   co_sujet VARCHAR(50) NOT NULL CHECK(co_sujet IN ('acheter','vendre','louer','autres')),
   co_question TEXT NOT NULL,
   PRIMARY KEY(emp_id, in_id),
   FOREIGN KEY(emp_id) REFERENCES waz_employes(emp_id),
   FOREIGN KEY(in_id) REFERENCES waz_internautes(in_id)
);


-- table historisation 

CREATE TABLE histo_negocier
(-- colonnes historisation
   emp_id INT(10),
   in_id INT(10),
   an_id INT(10),
   hist_neg_est_conclu BOOLEAN NOT NULL ,
   hist_neg_montant_transaction DECIMAL(9,2) NOT NULL ,
   hist_neg_date_debut_transaction DATE NOT NULL ,
   hist_neg_date_transaction_fin DATE DEFAULT NULL ,
   hist_neg_date_dernier_contact DATE NOT NULL ,
   -- colonnes techniques
   hist_date DATETIME NOT NULL,
   hist_utilisateur VARCHAR (20) NOT NULL,
   hist_evenement char(6)NOT NULL,
   PRIMARY KEY(emp_id, in_id, an_id,hist_date),
   FOREIGN KEY(emp_id) REFERENCES waz_employes(emp_id),
   FOREIGN KEY(in_id) REFERENCES waz_internautes(in_id),
   FOREIGN KEY(an_id) REFERENCES waz_annonces(an_id)

);




