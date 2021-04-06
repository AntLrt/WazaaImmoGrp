-- Création de la table Erreur
use wazaaimmogroup;
DROP Table IF EXISTS Erreur;
CREATE TABLE Erreur 
(
    id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    erreur VARCHAR(255) UNIQUE
);
-- Insertion de l'erreur qui nous intéresse
INSERT INTO Erreur (erreur) VALUES ('Erreur : date_dernier_contact doit être >= à date_debut_transaction.');
INSERT INTO Erreur (erreur) VALUES ('Erreur : date_transaction_fin doit être >= à date_debut_transaction.');
INSERT INTO Erreur (erreur) VALUES ('Erreur : est_conclu doit valoir TRUE (1) ou FALSE (2).');
INSERT INTO Erreur (erreur) VALUES ('Erreur : est_active doit valoir TRUE (1) ou FALSE (2).');
-- Création du trigger pour la table waz_negocier
DELIMITER |
DROP TRIGGER if EXISTS before_update_negocier |
CREATE TRIGGER before_update_negocier 
BEFORE UPDATE 
ON waz_negocier 
FOR EACH ROW
BEGIN

    IF new.date_dernier_contact < old.date_debut_transaction 
        THEN
        -- vérification des dates dans les champs  
            INSERT INTO Erreur (erreur) VALUES ('Erreur : date_dernier_contact doit être >= à date_debut_transaction.');
    ELSEIF new.date_transaction_fin < old.date_debut_transaction
        THEN
            INSERT INTO Erreur (erreur) VALUES ('Erreur : date_transaction_fin doit être >= à date_debut_transaction.');
    ELSEIF new.est_conclu != TRUE -- ni true
    AND new.est_conclu != FALSE -- ni false
        THEN
            INSERT INTO Erreur (erreur) VALUES ('Erreur : est_conclu doit valoir TRUE (1) ou FALSE (2).');
    END IF;
END |

DROP TRIGGER if EXISTS before_insert_negocier |
CREATE TRIGGER before_insert_negocier
BEFORE INSERT
ON waz_negocier
FOR EACH ROW
BEGIN
        IF new.date_dernier_contact < new.date_debut_transaction 
        THEN
        -- vérification des dates dans les champs  
            INSERT INTO Erreur (erreur) VALUES ('Erreur : date_dernier_contact doit être >= à date_debut_transaction.');
    ELSEIF new.date_transaction_fin < new.date_debut_transaction
        THEN
            INSERT INTO Erreur (erreur) VALUES ('Erreur : date_transaction_fin doit être >= à date_debut_transaction.');
    ELSEIF new.est_conclu != TRUE -- ni true
    AND new.est_conclu != FALSE -- ni false
        THEN
            INSERT INTO Erreur (erreur) VALUES ('Erreur : est_conclu doit valoir TRUE (1) ou FALSE (2).');
    END IF;
END |

-- Création du trigger pour la table waz_annonces
DROP TRIGGER if EXISTS before_update_annonces |
CREATE TRIGGER before_update_annonces
BEFORE UPDATE
ON waz_annonces
FOR EACH ROW 
BEGIN
    IF new.est_active != TRUE -- ni true
    AND new.est_active != FALSE -- ni false
        THEN
        -- vérification des dates dans les champs 
            INSERT INTO Erreur (erreur) VALUES ('Erreur : est_active doit valoir TRUE (1) ou FALSE (2).');
    ELSEIF 
    END IF;


END |
DELIMITER ;

-- Insertion de l'erreur qui nous intéresse pour la table annonce






