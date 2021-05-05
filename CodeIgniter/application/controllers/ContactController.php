
<?php
//formulaire de contact + contact recu


defined('BASEPATH') OR exit('No direct script access allowed');


class ContactController extends CI_Controller 

{

public function ListeContact()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Prépare le tableau
$this->load->library('table');

// Charge la librairie 'database'
$this->load->database();

// Exécute la requête 
$results = $this->db->query("SELECT waz_contacter.in_id AS 'ID internaute', in_email AS 'Email internaute', co_sujet AS 'Sujet', co_question AS 'Question'
FROM waz_contacter,waz_internautes
WHERE waz_contacter.in_id=waz_internautes.in_id
ORDER BY waz_contacter.in_id
");  

// Forme du tableau
$template = array(
'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">'
);

$this->table->set_template($template);
$tab = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["liste_contact"] = $tab;

// Appel de la vue avec transmission du tableau  
$this->load->view('ListeContactView', $aView);

}

public function Formulaire()
{if($this->session->role == "Internaute"){
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Chargement des assistants 'form' et 'url'
$this->load->helper('form', 'url'); 

// Chargement de la librairie 'database'
$this->load->database(); 

// Chargement de la librairie form_validation
$this->load->library('form_validation'); 

if ($this->input->post()) 
{ // 2ème appel de la page: traitement du formulaire


    // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
    $this->form_validation->set_rules("Demande", "Demande", "required");

    if ($this->form_validation->run() == FALSE)
    { // Echec de la validation, on réaffiche la vue formulaire 
        echo"<script type='text/javascript'>
        window.alert('Merci de préciser la demande')
        </script>";
        $this->load->view('FormulaireContactView');
    }

    else
    { 
        $Sujet = $_POST['Sujet'];
        $Demande= $_POST['Demande'];

        $this->load->database();
        $data["emp_id"] = 10;
        //A changer selon id connexion
        $data["in_id"] = $this->session->ID;;
        $data["co_sujet"] = $Sujet;
        $data["co_question"] = $Demande;
        $this->db->insert('waz_contacter', $data);

        $this->load->view('FormulaireContactEnvoyeView');
    } 

    
}
else{$this->load->view('FormulaireContactView');}
}
else {header('Location: http://localhost/ci/index.php/AuthentificationController/login');
    exit();}
}

}

?>