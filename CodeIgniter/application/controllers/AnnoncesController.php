<?php

//page location et pages ventes + details des annonces

defined('BASEPATH') or exit('No direct script access allowed');

class AnnoncesController extends CI_Controller
{

        
public function Loca()
{
//afficher aide au debug
        $this->output->enable_profiler(true);

// Chargement de la librairie 'database'
        $this->load->database();

// Exécute la requête
        $results = $this->db->query("SELECT *
FROM waz_annonces,waz_biens,waz_photos
WHERE an_offre = 'L'
AND waz_annonces.an_id=waz_biens.bi_id
AND waz_photos.bi_id=waz_biens.bi_id");

// Récupération des résultats
        $aListe = $results->result();

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["locations"] = $aListe;

        $this->load->view('Headerview');
        $this->load->view('LocaView', $aView);

}




public function Ventes()
{
//afficher aide au debug
        $this->output->enable_profiler(true);

// Chargement de la librairie 'database'
        $this->load->database();

// Exécute la requête
        $results = $this->db->query("SELECT *
FROM waz_annonces,waz_biens,waz_photos
WHERE an_offre = 'A'
AND waz_annonces.an_id=waz_biens.bi_id
AND waz_photos.bi_id=waz_biens.bi_id");

// Récupération des résultats
        $aListe = $results->result();

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["ventes"] = $aListe;

        $this->load->view('Headerview');
        $this->load->view('VentesView', $aView);

}




public function Details($an_id)
{
//afficher aide au debug
        $this->output->enable_profiler(true);

// Chargement de la librairie 'database'
        $this->load->database();

// Exécute la requête
        $Resultat1 = $this->db->query("SELECT *
FROM waz_annonces,waz_biens,waz_photos
WHERE an_id = '$an_id' AND waz_annonces.an_id=waz_biens.bi_id AND waz_photos.bi_id=waz_biens.bi_id");

// Récupération des résultats
        $DetailsAnnonce = $Resultat1->result();

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["details"] = $DetailsAnnonce;

///Requete pour connaitre les options de l'annonce
        // Exécute la requête
        $Resultat2 = $this->db->query("SELECT waz_biens.bi_id,opt_libelle
FROM waz_biens,waz_options, waz_composer,waz_annonces
WHERE waz_annonces.an_id='$an_id' AND waz_biens.bi_id=waz_annonces.bi_id
AND waz_biens.bi_id=waz_composer.bi_id AND waz_composer.opt_id=waz_options.opt_id
");

// Récupération des résultats
        $OptionsAnnonces = $Resultat2->result();

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["Options"] = $OptionsAnnonces;

        if (empty($OptionsAnnonces)) {$AucuneOptions = true;} else { $AucuneOptions = false;}

        $aView["AucuneOptions"] = $AucuneOptions;

        ////Ajout d'une vue à l'annonce visitée
        $AjoutVue = $this->db->query("SELECT an_nbre_vues
        FROM waz_annonces
        WHERE waz_annonces.an_id='$an_id' 
        ");

        // Récupération des résultats
        $AjoutVue = $AjoutVue->result();
        foreach ($AjoutVue as $row) {$NombVues = $row->an_nbre_vues;}
        $NombVues = $NombVues + 1;
        $data["an_nbre_vues"] = $NombVues;
        $this->db->update("waz_annonces", $data, "an_id = $an_id");

        $this->load->view('Headerview');
        $this->load->view('DetailsView', $aView);

}
}
