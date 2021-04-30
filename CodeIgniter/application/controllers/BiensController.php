<?php
//liste biens partie admin

defined('BASEPATH') OR exit('No direct script access allowed');


class BiensController extends CI_Controller 

{

public function ListeBiens()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Prépare le tableau
$this->load->library('table');

// Charge la librairie 'database'
$this->load->database();

// Exécute la requête 
$results = $this->db->query("SELECT bi_id AS 'ID', bi_type AS 'Type', bi_pieces AS 'Nb pieces', bi_ref AS 'Réference', bi_description AS 'Description', bi_local AS 'Localisation', bi_surf_habitable AS 'Surface habitable', bi_surf_totale AS 'Surface totale', bi_estimation_vente AS 'Estimation vente', bi_estimation_location AS 'Estimation location', bi_diagnostic AS 'Diagnostic énergetique'
FROM waz_biens");  

// Forme du tableau
$template = array(
'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">'
);

$this->table->set_template($template);
$tab = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["liste_biens"] = $tab;

// Appel de la vue avec transmission du tableau  
$this->load->view('ListeBiensView', $aView);

}



}


?>