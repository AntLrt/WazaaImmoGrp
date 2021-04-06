                                                liste
- - - 
- pour les vues : 
    v_nbre_vue_annonce -> les 5 annonces les plus vues toute catégorie .
    v_nbre_vue_an_achat -> les 5 annonces les plus vues par rapport aux biens à acheter .
    v_nbre_vue_an_ach_act -> les 5 annonces les plus vues par rapport aux biens à acheter et active .
    v_nbre_vue_an_louer -> les 5 annonces les plus vues par rapport aux biens à louer .
    v_nbre_vue_an_lou_act -> les 5 annonces les plus vues par rapport aux biens à louer et active .
    v_an_act -> Toutes les annonces  actives .
    v_an_nonact -> Toutes les annonce non  active .
    v_annonces -> Afficher tout les annonces toute catégorie confondu .
    v_annonces_recente -> Les annonces ajouter les plus recentes .
    v_annonces_ancienne -> Les annonces ajouter les plus anciennes .

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






