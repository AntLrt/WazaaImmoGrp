<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class connexion extends CI_Controller {

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

         $login = $_POST['login_name'];
         $password = $_POST['password_name'];

        // Exécute la requête 
        $results = $this->db->query("SELECT emp_id 
        FROM waz_employes 
        WHERE emp_mail = '$login' AND emp_mdp= '$password'");
          
        // Récupération des résultats
        $Comm1 = $results->result();
         if (empty($Comm1)) {
            
            
            echo"<script type='text/javascript'>
            window.alert('Connexion refusé')
            </script>";
            
            $this->load->view('connect');
         } else {
            

            
            $aView["TopCom"] = $Comm1;
            foreach ($Comm1 as $row) {

                $IDutiilisateur = $row->emp_id ;
                echo "L'id de l'utilisateur est :". $IDutiilisateur;
               
               
               }
            $this->session->set_userdata('id', "$IDutiilisateur");
            echo "L'id de la session est :". $this->session->id;
            







        //    $aView["TopCom"] = $Comm1;
            $this->load->view('connect', $aView);  // Fais le lien entre vue/controller
           

            
            // $this->load->view('connexionreussi');
        }
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
       
        

         
    } 
    else 
    { // 1er appel de la page: affichage du formulaire
        $this->load->view('connect');
        
    }
 }
}