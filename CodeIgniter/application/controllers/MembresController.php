<?php
//liste membre partie admin  + espace clients


defined('BASEPATH') OR exit('No direct script access allowed');


class MembresController extends CI_Controller 

{

public function ListeMembres()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Prépare le tableau
$this->load->library('table');

// Charge la librairie 'database'
$this->load->database();

// Exécute la requête 
$results = $this->db->query("SELECT in_id AS 'ID', in_nom AS 'Nom', in_prenom AS 'Prenom', in_adresse AS 'Adresse', in_telephone AS 'Téléphone', in_email AS 'Mail', in_pays AS 'Pays'
FROM waz_internautes");  

// Forme du tableau
$template = array(
'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">'
);

$this->table->set_template($template);
$tab = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["liste_membres"] = $tab;

// Appel de la vue avec transmission du tableau  
$this->load->view('ListeMembresView', $aView);

}






public function DetailsCompte()
{
// $IDcompte = L'itrnasmis par la connexion



//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Charge la librairie 'database'
$this->load->database();

if(isset($IDcompte)){
    // Exécute la requête 
    $results = $this->db->query("SELECT in_id , in_nom, in_prenom , in_adresse , in_telephone , in_email , in_pays 
    FROM waz_internautes
    WHERE in_id='$IDcompte'");  

    $aListe = $results->result();   

    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
    $aView["detailscompte"] = $aListe;

    // Appel de la vue avec transmission du tableau  
    $this->load->view('DetailsCompteView', $aView);
    }
else{
$this->load->view('ConnexionView');
}
}


}


?>