-- Création de la table Erreur
use wazaaimmogroup;
DROP Table IF EXISTS Erreur;
CREATE TABLE Erreur 
(
    id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    erreur VARCHAR(255) UNIQUE
);
-- Insertion de l'erreur qui nous intéresse
INSERT INTO Erreur (erreur) VALUES ('Erreur : neg_date_dernier_contact doit être >= à neg_date_debut_transaction.');
INSERT INTO Erreur (erreur) VALUES ('Erreur : neg_date_transaction_fin doit être >= à neg_date_debut_transaction.');
INSERT INTO Erreur (erreur) VALUES ('Erreur : neg_est_conclu doit valoir TRUE (1) ou FALSE (2).');
INSERT INTO Erreur (erreur) VALUES ('Erreur : an_est_active doit valoir TRUE (1) ou FALSE (2).');
-- Création du trigger pour la table waz_negocier
DELIMITER |
DROP TRIGGER if EXISTS before_update_negocier |
CREATE TRIGGER before_update_negocier 
BEFORE UPDATE 
ON waz_negocier 
FOR EACH ROW
BEGIN

    IF new.neg_date_dernier_contact < old.neg_date_debut_transaction 
        THEN
        -- vérification des dates dans les champs  
            INSERT INTO Erreur (erreur) 
            VALUES ('Erreur : neg_date_dernier_contact doit être >= à neg_date_debut_transaction.');
    ELSEIF new.neg_date_transaction_fin < old.neg_date_debut_transaction
        THEN
            INSERT INTO Erreur (erreur) 
            VALUES ('Erreur : neg_date_transaction_fin doit être >= à neg_date_debut_transaction.');
    ELSEIF new.neg_est_conclu != TRUE -- ni true
    AND new.neg_est_conclu != FALSE -- ni false
        THEN
            INSERT INTO Erreur (erreur) 
            VALUES ('Erreur : neg_est_conclu doit valoir TRUE (1) ou FALSE (2).');
    END IF;
END |
DELIMITER ;

DELIMITER |
DROP TRIGGER if EXISTS before_insert_negocier |
CREATE TRIGGER before_insert_negocier
BEFORE INSERT
ON waz_negocier
FOR EACH ROW
BEGIN
        IF new.neg_date_dernier_contact < new.neg_date_debut_transaction 
        THEN
        -- vérification des dates dans les champs  
            INSERT INTO Erreur (erreur) VALUES ('Erreur : neg_date_dernier_contact doit être >= à neg_date_debut_transaction.');
    ELSEIF new.neg_date_transaction_fin < new.neg_date_debut_transaction
        THEN
            INSERT INTO Erreur (erreur) VALUES ('Erreur : neg_date_transaction_fin doit être >= neg_à date_debut_transaction.');
    ELSEIF new.neg_est_conclu != TRUE -- ni true
    AND new.neg_est_conclu != FALSE -- ni false
        THEN
            INSERT INTO Erreur (erreur) VALUES ('Erreur : neg_est_conclu doit valoir TRUE (1) ou FALSE (2).');
    END IF;
END |
DELIMITER ;

DELIMITER |
-- Création du trigger pour la table waz_annonces
DROP TRIGGER if EXISTS before_update_annonces |
CREATE TRIGGER before_update_annonces
BEFORE UPDATE
ON waz_annonces
FOR EACH ROW 
BEGIN
    IF new.an_est_active != TRUE -- ni true
    AND new.an_est_active != FALSE -- ni false
        THEN
        -- vérification des dates dans les champs 
            INSERT INTO Erreur (erreur) VALUES ('Erreur : an_est_active doit valoir TRUE (1) ou FALSE (2).');
   
   
END |
DELIMITER ;

-- exemple d'insertion
-- INSERT INTO `waz_negocier` (`emp_id`, `in_id`, `an_id`, `neg_est_conclu`, `neg_montant_transaction`,
--  `neg_date_debut_transaction`, `neg_date_transaction_fin`, `neg_date_dernier_contact`)VALUES
-- (8, 4, 1, 0, '120.00', '2021-01-27', '2021-03-17', '2021-04-17');

-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- trigger pour historisation de  la table waz_negocier ,quand une valeur est effacer , 
-- elle sera sauvegarder dans la table hist_negocier.
DELIMITER |
DROP TRIGGER if EXISTS after_update_negocier |
CREATE TRIGGER after_update_negocier 
AFTER UPDATE 
ON waz_negocier
FOR EACH ROW 
BEGIN
   INSERT INTO histo_negocier
   (
      emp_id,
      in_id,
      an_id,
      hist_neg_est_conclu,
      hist_neg_montant_transaction,
      hist_neg_date_debut_transaction,
      hist_neg_date_transaction_fin,
      hist_neg_date_dernier_contact,

      hist_date,
      hist_utilisateur,
      hist_evenement
   )
   VALUES
   (
      old.emp_id,
      old.in_id,
      old.an_id,
      old.neg_est_conclu,
      old.neg_montant_transaction,
      old.neg_date_debut_transaction,
      old.neg_date_transaction_fin,
      old.neg_date_dernier_contact,

      now(),
      CURRENT_USER(),
      'update'
   )
END|

CREATE TRIGGER after_delete_negocier 
AFTER DELETE
ON waz_negocier
FOR EACH ROW
BEGIN
    INSERT INTO histo_negocier
    (
      emp_id,
      in_id,
      an_id,
      hist_neg_est_conclu,
      hist_neg_montant_transaction,
      hist_neg_date_debut_transaction,
      hist_neg_date_transaction_fin,
      hist_neg_date_dernier_contact,

      hist_date,
      hist_utilisateur,
      hist_evenement
   )
   VALUES
   (
      old.emp_id,
      old.in_id,
      old.an_id,
      old.neg_est_conclu,
      old.neg_montant_transaction,
      old.neg_date_debut_transaction,
      old.neg_date_transaction_fin,
      old.neg_date_dernier_contact,

      now(),
      CURRENT_USER(),
      'DELETE'
   )
END|

DELIMITER ;
-- ******************************************************************************************************************
-- trigger pour apres la modification ou l'insertion pour la table waz_annonce ,si la regex du champ != de la regex ,
-- alors il aura un message d'erreur .

DELIMITER |
DROP TRIGGER if EXISTS before_update_annonces |
CREATE TRIGGER before_update_annonces
BEFORE UPDATE
ON waz_annonces
FOR EACH ROW
BEGIN
    	IF new.an_ref NOT REGEXP '^((V{1}E{1})|(L{1}O{1})|(A{1}C{1}))[-](A{1}P{1}|M{1}A{1}|T{1}E{1}|G{1}A{1}|I{1}M{1}|
        L{1}P{1}|B{1}U{1})[-]([0-9]{4})[-]([0-9]{2})$'
    THEN
      SIGNAL SQLSTATE '12345'
     SET MESSAGE_TEXT = 'Erreur de format!!!';
   
     END IF;
END |

DROP TRIGGER if EXISTS before_insert_annonces |
CREATE TRIGGER before_insert_annonces
BEFORE INSERT
ON waz_annonces
FOR EACH ROW
BEGIN
    	IF new.an_ref NOT REGEXP '^((V{1}E{1})|(L{1}O{1})|(A{1}C{1}))[-](A{1}P{1}|M{1}A{1}|T{1}E{1}|G{1}A{1}|I{1}M{1}|
        L{1}P{1}|B{1}U{1})[-]([0-9]{4})[-]([0-9]{2})$'
    THEN
      SIGNAL SQLSTATE '12345'
     SET MESSAGE_TEXT = 'Erreur de format!!!';
   
     END IF;
END |
DELIMITER ;





