-- creation de la vue V_nbre_vue_annonce .
-- les annonces les plus vues toute catégorie . avec invocateur

DROP VIEW IF EXISTS v_nbre_vue_annonce;
CREATE DEFINER = CURRENT_USER
        SQL SECURITY DEFINER
        VIEW v_nbre_vue_annonce
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
       a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
       b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
         INNER JOIN waz_biens as b
                    ON a.an_id = b.bi_id
ORDER BY an_nbre_vues DESC;


--creation de la vue les annonces les plus vues par rapport aux biens à acheter . 

DROP VIEW IF EXISTS v_nbre_vue_an_achat;
CREATE DEFINER = CURRENT_USER
                SQL SECURITY INVOKER
                VIEW v_nbre_vue_an_achat
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
       a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
       b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
         INNER JOIN waz_biens as b
                    ON a.an_id = b.bi_id
WHERE an_offre = "A"
ORDER BY an_nbre_vues DESC

--creation de la vue les annonces les  plus vues par rapport aux biens à acheter et active . 

DROP VIEW IF EXISTS v_nbre_vue_an_ach_act;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_nbre_vue_an_ach_act
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
       a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
       b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
         INNER JOIN waz_biens as b
                    ON a.an_id = b.bi_id
WHERE a.an_offre = "A" AND a.an_est_active = 1
ORDER BY an_nbre_vues DESC



--creation de la vue des annonces les plus vues par rapport aux biens à louer .

DROP VIEW IF EXISTS v_nbre_vue_an_louer;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_nbre_vue_an_louer
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
       a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
       b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
         INNER JOIN waz_biens as b
                    ON a.an_id = b.bi_id
WHERE a.an_offre = "L"
ORDER BY an_nbre_vues DESC


--creation de la vue des annonces les plus vues par rapport aux biens à louer et active .

DROP VIEW IF EXISTS v_nbre_vue_an_lou_act;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_nbre_vue_an_lou_act
AS 
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE a.an_offre = "L" AND a.an_est_active = 1 
ORDER BY an_nbre_vues DESC


--creation de la vue des annonces  par rapport annonce  active .

DROP VIEW IF EXISTS v_an_act;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_an_act
AS 
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
       a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
       b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE  a.an_est_active = 1

--creation de la vue des annonces  par rapport annonce non  active .

DROP VIEW IF EXISTS v_an_nonact;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_an_nonact
AS 
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE  a.an_est_active = 0 

--creation de la vue afficher tout les annonces toute catégorie confondu  .

DROP VIEW IF EXISTS v_annonces;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_annonces
AS 
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id

--creation de la vue des annonces ajouter les plus recentes  .

DROP VIEW IF EXISTS v_annonces_recente;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
VIEW v_annonces_recente
AS 
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
ORDER BY an_date_ajout DESC

--creation de la vue des annonces ajouter les plus anciennes

DROP VIEW IF EXISTS v_annonces_ancienne;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_annonces_ancienne
AS 
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
ORDER BY an_date_ajout ASC

-- creation de vue : affichage des annonces que de type maison 

DROP VIEW IF EXISTS v_bien_maison;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_bien_maison
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE b.bi_type = "maison"

-- creation de vue : affichage des annonces que de type de bien

DROP VIEW IF EXISTS v_bien_appart;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_bien_appart
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE b.bi_type like '%appartement%'

-- creation de vue : affichage des annonces que de type de terrain

DROP VIEW IF EXISTS v_bien_terrain;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_bien_terrain
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE b.bi_type = "terrain"

-- creation de vue : affichage des annonces que de type de bureaux
DROP VIEW IF EXISTS v_bien_bureaux;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_bien_bureaux
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE b.bi_type = "bureaux"

-- creation de vue : affichage des annonces que de type de immeuble

DROP VIEW IF EXISTS v_bien_immeuble;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_bien_immeuble
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE b.bi_type = "immeuble"

-- creation de vue : affichage des annonces que de type de garage

DROP VIEW IF EXISTS v_bien_garage;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_bien_garage
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE b.bi_type = "garage"

-- creation de vue : affichage des annonces que de type de locaux professionnelles

DROP VIEW IF EXISTS v_bien_locauxPro;
CREATE DEFINER = CURRENT_USER
    SQL SECURITY INVOKER
    VIEW v_bien_locauxPro
AS
SELECT a.an_id,a.an_prix,a.an_est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimation_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE b.bi_type = "locaux_professionnels"



