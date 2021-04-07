                                                liste
- - - 
- pour les vues : 
    v_nbre_vue_annonce -> les annonces les plus vues toute catégorie .
    v_nbre_vue_an_achat -> les annonces les plus vues par rapport aux biens à acheter .
    v_nbre_vue_an_ach_act -> les annonces les plus vues par rapport aux biens à acheter et active .
    v_nbre_vue_an_louer -> les annonces les plus vues par rapport aux biens à louer .
    v_nbre_vue_an_lou_act -> les annonces les plus vues par rapport aux biens à louer et active .
    v_an_act -> Toutes les annonces  actives .
    v_an_nonact -> Toutes les annonce non  active .
    v_annonces -> Afficher tout les annonces toute catégorie confondu .
    v_annonces_recente -> Les annonces ajouter les plus recentes .
    v_annonces_ancienne -> Les annonces ajouter les plus anciennes .
    v_bien_maison -> les affichages de type "maison".
    v_bien_appart -> les affichages de type "appartement".
    v_bien_terrain -> les affichages de type "terrain".
    v_bien_bureaux -> les affichages de type "bureaux".
    v_bien_garage -> les affichages de type "garage".
    v_bien_immeuble -> les affichages de type "immeuble".
    v_bien_locauxPro -> les affichages de type "locaux_professionnels".
    
- - - 
- pour les triggers (de verification): 

    - pour la table negocier avant modification :
    nom du trigger : before_update_negocier .
        -> La colonne date_dernier_contact accepte que les dates supérieurs ou égal  à la colonne  date_debut_transaction . 
        -> La colonne date_transaction_fin accepte que les dates supérieurs  à la colonne date_debut_transaction .
        -> Accepte que 1 ou 0 pour la colonne est_conclu .

    - Pour la table negocier avant ajout :
    nom du trigger :  before_insert_negocier .
        -> La colonne date_dernier_contact accepte que les dates supérieurs ou égal  à la colonne  date_debut_transaction . 
        -> La colonne date_transaction_fin accepte que les dates supérieurs  à la colonne date_debut_transaction .
        -> Accepte que 1 ou 0 pour la colonne est_conclu .

    - pour la table annonces :
    nom du trigger : before_update_annonces .
        -> Accepte que 1 ou 0 pour la colonne est_active .






