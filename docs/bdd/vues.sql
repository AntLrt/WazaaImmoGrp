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
