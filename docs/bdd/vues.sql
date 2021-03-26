-- creation de la vue V_nbre_vue_annonce .
-- les 5 annonces les plus vues toute catégorie . 

DROP VIEW IF EXISTS v_nbre_vue_annonce;
CREATE VIEW v_nbre_vue_annonce
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
ORDER BY an_nbre_vues DESC
LIMIT 5

--creation de la vue des 5 annonces les plus vues par rapport aux biens à acheter . 

DROP VIEW IF EXISTS v_nbre_vue_an_achat;
CREATE VIEW v_nbre_vue_an_achat
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE an_offre = "A" 
ORDER BY an_nbre_vues DESC
LIMIT 5

--creation de la vue des 5 annonces les plus vues par rapport aux biens à acheter et active . 

DROP VIEW IF EXISTS v_nbre_vue_an_ach_act;
CREATE VIEW v_nbre_vue_an_ach_act
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE a.an_offre = "A" AND a.est_active = 1
ORDER BY an_nbre_vues DESC
LIMIT 5

--creation de la vue des 5 annonces les plus vues par rapport aux biens à louer .

DROP VIEW IF EXISTS v_nbre_vue_an_louer;
CREATE VIEW v_nbre_vue_an_louer
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE a.an_offre = "L" 
ORDER BY an_nbre_vues DESC
LIMIT 5

--creation de la vue des 5 annonces les plus vues par rapport aux biens à louer et active .

DROP VIEW IF EXISTS v_nbre_vue_an_lou_act;
CREATE VIEW v_nbre_vue_an_lou_act
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE a.an_offre = "L" AND a.est_active = 1 
ORDER BY an_nbre_vues DESC
LIMIT 5

--creation de la vue des annonces  par rapport annonce  active .

DROP VIEW IF EXISTS v_an_act;
CREATE VIEW v_an_act
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE  a.est_active = 1 

--creation de la vue des annonces  par rapport annonce non  active .

DROP VIEW IF EXISTS v_an_nonact;
CREATE VIEW v_an_nonact
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
WHERE  a.est_active = 0 

--creation de la vue afficher tout les annonces toute catégorie confondu  .

DROP VIEW IF EXISTS v_annonces;
CREATE VIEW v_annonces
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id

--creation de la vue des annonces ajouter les plus recentes  .

DROP VIEW IF EXISTS v_annonces_recente;
CREATE VIEW v_annonces_recente
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
ORDER BY an_date_ajout DESC

--creation de la vue des annonces ajouter les plus anciennes

DROP VIEW IF EXISTS v_annonces_ancienne;
CREATE VIEW v_annonces_ancienne
AS 
SELECT a.an_id,a.an_prix,a.est_active,a.an_ref,a.an_date_disponibilite,a.an_offre,a.an_nbre_vues,a.an_date_ajout,
a.an_date_modif,b.bi_id,b.bi_type,b.bi_pieces,b.bi_description,b.bi_local,b.bi_surf_habitable,b.bi_surf_totale,
b.bi_estimations_vente,b.bi_estimation_location,b.bi_diagnostic
FROM waz_annonces as a
INNER JOIN waz_biens as b
ON a.an_id = b.bi_id
ORDER BY an_date_ajout ASC


