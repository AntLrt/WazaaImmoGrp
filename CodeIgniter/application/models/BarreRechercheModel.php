<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class BarreRechercheModel extends CI_Model
{
    //recherche par type
    public function BarreRecherche1 ()
    {
        $type = $_POST['Type'];
        // Chargement de la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre,pho_nom
                                                FROM waz_annonces,waz_biens,waz_photos
                                                WHERE bi_type = '$type'
                                                AND an_est_active = 1
                                                AND waz_annonces.an_id=waz_biens.bi_id
                                                AND waz_photos.bi_id=waz_biens.bi_id");

        // Récupération des résultats
        $aListe= $results->result();
        return $aListe;


    }
    //recherche par type et ville
    public function BarreRecherche2 ()
    {
        $type = $_POST['Type'];
        $ville = $_POST['Ville'];
        // Chargement de la librairie 'database'
        $this->load->database();
        $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre,pho_nom
                                                FROM waz_annonces,waz_biens,waz_photos
                                                WHERE bi_type = '$type'
                                                AND bi_local = '$ville'
                                                AND an_est_active = 1
                                                AND waz_annonces.an_id=waz_biens.bi_id
                                                AND waz_photos.bi_id=waz_biens.bi_id");

        // Récupération des résultats
        $aListe = $results->result();
        return $aListe;
    }
    
    //recherche par type et operation
    public function BarreRecherche3 ()
    {
        $operation = $_POST['Operation'];
        $type = $_POST['Type'];
        // Chargement de la librairie 'database'
        $this->load->database();
        $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre,pho_nom
                                                FROM waz_annonces,waz_biens,waz_photos
                                                WHERE bi_type = '$type'
                                                AND an_offre = '$operation'
                                                AND an_est_active = 1
                                                AND waz_annonces.an_id=waz_biens.bi_id
                                                AND waz_photos.bi_id=waz_biens.bi_id");

        // Récupération des résultats
        $aListe = $results->result();
        return $aListe;
    }
    //recherche par type ,ville, operation
    public function BarreRecherche4 ()
    {
        $operation = $_POST['Operation'];
        $type = $_POST['Type'];
        $ville = $_POST['Ville'];
        // Chargement de la librairie 'database'
        $this->load->database();

        $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre,pho_nom
                                                        FROM waz_annonces,waz_biens,waz_photos
                                                        WHERE bi_type = '$type'
                                                        AND bi_local = '$ville'
                                                        AND an_offre = '$operation'
                                                        AND an_est_active = 1
                                                        AND waz_annonces.an_id=waz_biens.bi_id
                                                        AND waz_photos.bi_id=waz_biens.bi_id");

        // Récupération des résultats
        $aListe= $results->result();
        return $aListe;
    }
}


