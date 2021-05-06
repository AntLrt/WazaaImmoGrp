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

-- GRANT SELECT
    -- ON wazaaimmogroup.v_annonces
    -- TO 'r_wazaaimmogroup_internautes'@'localhost';

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
SET DEFAULT ROLE ALL TO 'wazaaimmogroup_dev1'@'localhost';
SET DEFAULT ROLE 'r_wazaaimmogroup_employes'@'localhost' TO 'wazaaimmogroup_employes1'@'localhost';
SET DEFAULT ROLE 'r_wazaaimmogroup_internautes'@'localhost' TO 'wazaaimmogroup_internaute1'@'localhost';



