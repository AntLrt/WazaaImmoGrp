-- creation de la vue V_nbre_vue_annonce

CREATE VIEW V_nbre_vue_annonce
AS
SELECT an_id,an_prix,est_active,an_ref,an_date_disponibilite,an_offre,max(an_nbre_vues),an_date_ajout,
an_date_modif,an_titre,bi_id
FROM waz_annonces
SELECT an_id,an_prix,est_active,an_ref,an_date_disponibilite,an_offre,max(an_nbre_vues),an_date_ajout,
an_date_modif,an_titre,bi_id
FROM waz_annonce
LIMIT 5 


-- autre version

SELECT an_id,an_prix,est_active,an_ref,an_date_disponibilite,an_offre,an_nbre_vues,an_date_ajout,
an_date_modif,bi_type,bi_pieces,bi_description,bi_local,bi_id,bi_surf_habitable,bi_surf_totale,bi_estimations_vente,
bi_estimation_location,bi_diagnostic
FROM waz_annonces
ORDER BY an_nbre_vues DESC
LIMIT 5


