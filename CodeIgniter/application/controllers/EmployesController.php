<?php

//page NOUS employés(poste + nom) + admin infos perso

defined('BASEPATH') OR exit('No direct script access allowed');


class EmployesController extends CI_Controller 

{

public function PageNous()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Prépare le tableau
$this->load->library('table');

// Charge la librairie 'database'
$this->load->database();

// Exécute la requête 
$results = $this->db->query("SELECT emp_nom AS 'Nom', emp_prenom AS 'Prénom', emp_mail AS 'Email'
FROM waz_employes WHERE emp_poste = 'directeur'");  

// Forme du tableau
$template = array(
'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">'
);

$this->table->set_template($template);
$dir = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["Directeur"] = $dir;
//////
//////
// Exécute la requête 
$results = $this->db->query("SELECT emp_nom AS 'Nom', emp_prenom AS 'Prénom', emp_mail AS 'Email'
FROM waz_employes WHERE emp_poste = 'secretaire'");  


$sec = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["Secretaire"] = $sec;
//////
//////
// Exécute la requête 
$results = $this->db->query("SELECT emp_nom AS 'Nom', emp_prenom AS 'Prénom', emp_mail AS 'Email'
FROM waz_employes WHERE emp_poste = 'negociateur_immobilier'");  


$neg = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["Negociateur"] = $neg;

// Appel de la vue avec transmission du tableau  
$this->load->view('PageNousView', $aView);

}

public function ListeEmployes()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Prépare le tableau
$this->load->library('table');

// Charge la librairie 'database'
$this->load->database();

// Exécute la requête 
$results = $this->db->query("SELECT emp_id AS 'ID', emp_poste AS 'Poste', emp_nom AS 'Nom', emp_prenom AS 'Prénom', emp_adresse AS 'Adresse', emp_tel AS 'Téléphone', emp_mail AS 'Email', emp_mdp AS 'Mot de passe'
FROM waz_employes");  

// Forme du tableau
$template = array(
'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">'
);

$this->table->set_template($template);
$tab = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["liste_employes"] = $tab;

// Appel de la vue avec transmission du tableau  
$this->load->view('ListeEmployesView', $aView);

}










}


?>