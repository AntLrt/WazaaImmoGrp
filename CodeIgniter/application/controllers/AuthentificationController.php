<?php

//connexion et inscription + mdp oublié

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthentificationController extends CI_Controller {

    public function login()
    {
    //afficher aide au debug
    $this->output->enable_profiler(TRUE);
    
    // Chargement des assistants 'form' et 'url'
    $this->load->helper('form', 'url'); 

    // Chargement de la librairie 'database'
    $this->load->database(); 



    if ($this->input->post()) 
    { // 2ème appel de la page: traitement du formulaire

    $data = $this->input->post();

    $LoginEmp = $_POST['login_name'];
    $MdpEmp = $_POST['password_name'];

    $LoginInt = $_POST['login_name'];
    $MdpInt = $_POST['password_name'];

    // Exécute la requête 
    $resultsemp = $this->db->query("SELECT emp_nom,emp_prenom,emp_id
    FROM waz_employes 
    WHERE emp_mail = '$LoginEmp' AND emp_mdp= '$MdpEmp'");

    // Récupération des résultats
    $RequeteEmploye = $resultsemp->result();

    foreach ($RequeteEmploye as $row) { $EmpPrenom = $row->emp_prenom; $EmpNom = $row->emp_nom; $EmpID = $row->emp_id; }

    // Exécute la requête 
    $resultsint = $this->db->query("SELECT in_nom,in_prenom,in_id 
    FROM waz_internautes 
    WHERE in_email = '$LoginInt' AND in_mdp= '$MdpInt'");

    // Récupération des résultats
    $RequeteInternaute = $resultsint->result();

    foreach ($RequeteInternaute as $row) { $IntPrenom = $row->in_prenom; $IntNom = $row->in_nom; $IntID = $row->in_id; }


    $EstUnEmploye = false;
    $EstUninternaute = false;

    if(!empty($RequeteEmploye)){$EstUnEmploye = true;}
    if(!empty($RequeteInternaute)){$EstUninternaute = true;}


    if (empty($RequeteEmploye) && empty($RequeteInternaute)) {

    echo"<script type='text/javascript'>
    window.alert('Connexion refusé')
    </script>";
    
    $this->load->view('ConnexionView');
    } 

    else {
    //$this-> load->library('session');

    if($EstUnEmploye == true){
    $this->session->set_userdata('role', "Employe");
    $this->session->set_userdata('login', "$LoginEmp");
    $this->session->set_userdata('nom', "$EmpPrenom");
    $this->session->set_userdata('prenom', "$EmpNom");
    $this->session->set_userdata('ID', "$EmpID");
    }
    
    if($EstUninternaute == true){
    $this->session->set_userdata('role', "Internaute");
    $this->session->set_userdata('login', "$LoginInt");
    $this->session->set_userdata('nom', "$IntPrenom");
    $this->session->set_userdata('prenom', "$IntNom");
    $this->session->set_userdata('ID', "$IntID");
    }

    echo $this->session->login;
    echo $this->session->role;

    $this->load->view('ConnexionReussi');
    }




} 

    else 
    { // 1er appel de la page: affichage du formulaire
    $this->load->view('ConnexionView');
}
}


public function Deconnexion()
{
session_destroy();
header('Location: http://localhost/ci/index.php/AccueilController/Accueil');      
exit(); 
}


public function DetailsCompte()
{
// $IDcompte = L'itrnasmis par la connexion



//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Charge la librairie 'database'
$this->load->database();

if($this->session->role == "Internaute"){
    $Login = $this->session->login;
    // Exécute la requête 
    $DetailsInternaute = $this->db->query("SELECT * 
    FROM waz_internautes
    WHERE in_email='$Login'");  

    $Details = $DetailsInternaute->result();   

    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
    $aView["Details"] = $Details;

    // Appel de la vue avec transmission du tableau  
    $this->load->view('DetailsCompteView', $aView);
    }

else if($this->session->role == "Employe")
        {
        $Login = $this->session->login;
        // Exécute la requête 
        $DetailsEmploye = $this->db->query("SELECT * 
        FROM waz_employes
        WHERE emp_mail='$Login'");  
    
        $Details = $DetailsEmploye->result();   
    
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
        $aView["Details"] = $Details;
    
        // Appel de la vue avec transmission du tableau  
        $this->load->view('DetailsCompteView', $aView);
        }
else{
        header('Location: http://localhost/ci/index.php/AuthentificationController/login');
        exit(); 
    }
}
}
