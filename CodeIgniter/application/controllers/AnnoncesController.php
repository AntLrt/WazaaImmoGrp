<?php //page location et pages ventes + details des annonces ?>

<?php

//page NOUS employés(poste + nom) + admin infos perso

defined('BASEPATH') OR exit('No direct script access allowed');


class AnnoncesController extends CI_Controller 

{

public function Loca()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Chargement de la librairie 'database'
$this->load->database(); 

// Exécute la requête 
$results = $this->db->query("SELECT * FROM waz_annonces,waz_biens WHERE an_offre = 'L' AND waz_annonces.an_id=waz_biens.bi_id");  

// Récupération des résultats    
$aListe = $results->result();   

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["locations"] = $aListe;

$this->load->view('LocaView', $aView);

}


public function Ventes()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Chargement de la librairie 'database'
$this->load->database(); 

// Exécute la requête 
$results = $this->db->query("SELECT * FROM waz_annonces,waz_biens WHERE an_offre = 'V' AND waz_annonces.an_id=waz_biens.bi_id");  

// Récupération des résultats    
$aListe = $results->result();   

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["ventes"] = $aListe;

$this->load->view('VentesView', $aView);

}


public function Details($an_id)
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Chargement de la librairie 'database'
$this->load->database(); 

// Exécute la requête 
$results = $this->db->query("SELECT * FROM waz_annonces,waz_biens WHERE an_id = '$an_id' AND waz_annonces.an_id=waz_biens.bi_id");  

// Récupération des résultats    
$aListe = $results->result();   

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["details"] = $aListe;

$this->load->view('DetailsView', $aView);

}
}
?>