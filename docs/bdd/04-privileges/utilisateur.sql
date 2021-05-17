-- creation des roles pour la bdd wazaaimmogroup
create role if not exists 'r_wazaaimmogroup_dev'@'localhost',
    'r_wazaaimmogroup_employes'@'localhost',
    'r_wazaaimmogroup_internautes'@'localhost';


-- accorder des privilèges au rôles
-- accorde tous les privilèges pour les devs
GRANT ALL
    ON wazaaimmogroup.*
    TO 'r_wazaaimmogroup_dev'@'localhost';

-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_annonces
GRANT SELECT,INSERT,UPDATE,DELETE
    ON wazaaimmogroup.waz_annonces
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_biens
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_biens
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_commentaire
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_commentaire
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_composer
GRANT INSERT,SELECT,DELETE
    ON wazaaimmogroup.waz_composer
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_contacter
GRANT SELECT
    ON wazaaimmogroup.waz_contacter
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_employes
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_employes
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_internautes
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_internautes
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_negocier
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_negocier
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_options
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_options
    TO 'r_wazaaimmogroup_employes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_employes sur la table waz_photos
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_photos
    TO 'r_wazaaimmogroup_employes'@'localhost';

-- accorde des privilège  pour r_wazaaimmogroup_internautes sur la table waz_annonces
GRANT SELECT
    ON wazaaimmogroup.waz_annonces
    TO 'r_wazaaimmogroup_internautes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_internautes sur la table waz_biens
GRANT SELECT
    ON wazaaimmogroup.waz_biens
    TO 'r_wazaaimmogroup_internautes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_internautes sur la table waz_commentaire
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_commentaire
    TO 'r_wazaaimmogroup_internautes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_internautes sur la table waz_contacter
GRANT INSERT
    ON wazaaimmogroup.waz_contacter
    TO 'r_wazaaimmogroup_internautes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_internautes sur la table waz_internautes
GRANT INSERT,SELECT,UPDATE,DELETE
    ON wazaaimmogroup.waz_internautes
    TO 'r_wazaaimmogroup_internautes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_internautes sur la table waz_options
GRANT SELECT
    ON wazaaimmogroup.waz_options
    TO 'r_wazaaimmogroup_internautes'@'localhost';
-- accorde des privilège  pour r_wazaaimmogroup_internautes sur la table waz_photos
GRANT SELECT
    ON wazaaimmogroup.waz_photos
    TO 'r_wazaaimmogroup_internautes'@'localhost';


-- Création de utilisateurs pour la bdd  wazaaimmogroup
-- Developpeur1 utilisateur
CREATE USER IF NOT EXISTS 'wazaaimmogroup_dev1'@'localhost' IDENTIFIED BY 'DEV1643u!';
-- Employés1 utilisateur
CREATE USER IF NOT EXISTS 'wazaaimmogroup_employes1'@'localhost' IDENTIFIED BY 'EMP1641u!';
-- Internaute1 utilisateur
CREATE USER IF NOT EXISTS 'wazaaimmogroup_internaute1'@'localhost' IDENTIFIED BY 'INT1642u!';

-- Attribution de rôles aux comptes d'utilisateurs
-- pour l'utilisateur wazaaimmogroup_dev1
GRANT 'r_wazaaimmogroup_dev'@'localhost' TO 'wazaaimmogroup_dev1'@'localhost';
-- pour l'utilisateur wazaaimmogroup_employes1
GRANT 'r_wazaaimmogroup_employes'@'localhost' TO 'wazaaimmogroup_employes1'@'localhost';
-- pour l'utilisateur wazaaimmogroup_internaute1
GRANT 'r_wazaaimmogroup_internautes'@'localhost' TO 'wazaaimmogroup_internaute1'@'localhost';

-- attributions des rôles par défaut
SET DEFAULT ROLE 'r_wazaaimmogroup_dev'@'localhost' TO 'wazaaimmogroup_dev1'@'localhost' ;
SET DEFAULT ROLE 'r_wazaaimmogroup_employes'@'localhost' TO 'wazaaimmogroup_employes1'@'localhost';
SET DEFAULT ROLE 'r_wazaaimmogroup_internautes'@'localhost' TO 'wazaaimmogroup_internaute1'@'localhost';

-- autorisations pour les vues pour les utilisateurs internautes

GRANT SELECT
    ON wazaaimmogroup.v_annonces
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_annonces_ancienne
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_an_act
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_an_nonact
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_appart
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_bureaux
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_garage
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_immeuble
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_locauxpro
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_maison
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_terrain
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_annonce
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_an_achat
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_an_louer
    TO 'r_wazaaimmogroup_internautes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_an_lou_act
    TO 'r_wazaaimmogroup_internautes'@'localhost';

-- autorisations pour les vues pour les utilisateurs employes

GRANT SELECT
    ON wazaaimmogroup.v_annonces
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_annonces_ancienne
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_an_act
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_an_nonact
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_appart
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_bureaux
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_immeuble
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_locauxpro
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_maison
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_bien_terrain
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_annonce
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_an_achat
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_an_ach_act
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_an_louer
    TO 'r_wazaaimmogroup_employes'@'localhost';

GRANT SELECT
    ON wazaaimmogroup.v_nbre_vue_an_lou_act
    TO 'r_wazaaimmogroup_employes'@'localhost';

-- accorde les privilèges que ces utilisateurs possedent eux-même
-- GRANT grant option on wazaimmogroup.* to 'wazaaimmogroup_dev1'@'localhost';
-- GRANT grant option on wazaimmogroup.* to 'wazaaimmogroup_employes1'@'localhost';

-- enleve les privilèges à l'utilisateur
-- REVOKE ALL PRIVILEGES , grant option from 'wazaaimmogroup_internaute1'@'localhost';