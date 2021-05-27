<?php

//connexion et inscription + mdp oublié

defined('BASEPATH') or exit('No direct script access allowed');

class AuthentificationController extends CI_Controller
{

        public function login()
        {
                if (!isset($this->session->login)) 
                {
                        //afficher aide au debug
                        $this->output->enable_profiler(true);

                        // Chargement des assistants 'form' et 'url'
                        $this->load->helper('form', 'url');

                        // Chargement de la librairie 'database'
                        $this->load->database();

                        if ($this->input->post()) 
                        { // 2ème appel de la page: traitement du formulaire
                                $data = $this->input->post();

                                $LoginEmp = $_POST['login_name'];
                                $MdpEmp = $_POST['password_name'];
                                // Exécute la requête
                                $resultsemp = $this->db->query("SELECT emp_nom,emp_prenom,emp_id
                                FROM waz_employes
                                WHERE emp_mail = '$LoginEmp' AND emp_mdp= '$MdpEmp'");

                                // Récupération des résultats
                                $RequeteEmploye = $resultsemp->result();

                                foreach ($RequeteEmploye as $row) {$EmpPrenom = $row->emp_prenom;
                                        $EmpNom = $row->emp_nom;
                                        $EmpID = $row->emp_id;}

                                $EstUnEmploye = false;
                                if (!empty($RequeteEmploye)) {$EstUnEmploye = true;}
                                

                                if($EstUnEmploye == true)
                                {
                                        $this->session->set_userdata('role', "Employe");
                                        $this->session->set_userdata('login', "$LoginEmp");
                                        $this->session->set_userdata('nom', "$EmpPrenom");
                                        $this->session->set_userdata('prenom', "$EmpNom");
                                        $this->session->set_userdata('ID', "$EmpID");

                                        $this->load->view('Headerview');
                                        $this->load->view('ConnexionReussiView');
                                }

                                else
                                {
                                
                                        $LoginInt = $_POST['login_name'];
                                        $MdpInt = $_POST['password_name'];

                                        // Exécute la requête
                                        $resultsint = $this->db->query("SELECT in_nom,in_prenom,in_id
                                        FROM waz_internautes
                                        WHERE in_email = '$LoginInt' AND in_mdp= '$MdpInt'");

                                        // Récupération des résultats
                                        $RequeteInternaute = $resultsint->result();

                                        foreach ($RequeteInternaute as $row) {$IntPrenom = $row->in_prenom;
                                                $IntNom = $row->in_nom;
                                                $IntID = $row->in_id;}

                                        $EstUninternaute = false;
                                        
                                        if (!empty($RequeteInternaute)) {$EstUninternaute = true;}
                                                if($EstUninternaute)
                                                {
                                                        $this->session->set_userdata('role', "Internaute");
                                                        $this->session->set_userdata('login', "$LoginInt");
                                                        $this->session->set_userdata('nom', "$IntPrenom");
                                                        $this->session->set_userdata('prenom', "$IntNom");
                                                        $this->session->set_userdata('ID', "$IntID");
                                                        
                                                        $this->load->view('Headerview');
                                                        $this->load->view('ConnexionReussiView');
                                                }

                                                else
                                                {
                                                        echo "<script type='text/javascript'>
                                                        window.alert('Connexion refusé')
                                                        </script>";

                                                        $this->load->view('Headerview');
                                                        $this->load->view('ConnexionView');
                                                }
                                } 
                        } 
                        else 
                        { // 1er appel de la page: affichage du formulaire
                        $this->load->view('Headerview');
                        $this->load->view('ConnexionView');
                        }
                }        

                else 
                {
                        $Erreur = "Vous êtes déjà connecté(e) !";
                        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                        $aView["RefusAcces"] = $Erreur;
                        $this->load->view('Headerview', $aView);
                }
        }




        public function Deconnexion()
        {
        if (isset($this->session->login)) 
        {
                session_destroy();
                $this->load->helper('url');
                redirect(site_url("AccueilController/Accueil"));} else {
                $Erreur = "Vous n'êtes pas connecté(e) !";
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                $aView["RefusAcces"] = $Erreur;

                $this->load->view('Headerview', $aView);
        }
}




        public function DetailsCompte()
        {
                if (isset($this->session->login)) 
                {
                                // $IDcompte = L'itrnasmis par la connexion

                                //afficher aide au debug
                                        $this->output->enable_profiler(true);

                                // Charge la librairie 'database'
                                        $this->load->database();

                                if ($this->session->role == "Internaute") 
                                {
                                                $Login = $this->session->login;
                                        // Exécute la requête
                                                $DetailsInternaute = $this->db->query("SELECT *
                                        FROM waz_internautes
                                        WHERE in_email='$Login'");

                                                $Details = $DetailsInternaute->result();

                                        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                                                $aView["Details"] = $Details;

                                        // Appel de la vue avec transmission du tableau
                                                $this->load->view('Headerview');
                                                $this->load->view('DetailsCompteView', $aView);
                                } else if ($this->session->role == "Employe") {
                                $Login = $this->session->login;
                        // Exécute la requête
                                $DetailsEmploye = $this->db->query("SELECT *
                        FROM waz_employes
                        WHERE emp_mail='$Login'");

                                $Details = $DetailsEmploye->result();

                        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                                $aView["Details"] = $Details;

                        // Appel de la vue avec transmission du tableau
                                $this->load->view('Headerview');
                                $this->load->view('DetailsCompteView', $aView);
                                } else 
                                {
                                        $this->load->helper('url');
                                        redirect(site_url("AccueilController/Accueil"));
                                }
                } 
                else 
                {
                        $Erreur = "Vous devez être connecté(e) pour avoir accés à cette page !";
                        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                        $aView["RefusAcces"] = $Erreur;

                        $this->load->view('Headerview', $aView);
                }
        }




        public function Inscription()
        {
                if (!isset($this->session->login)) 
                {
                        // Chargement des assistants 'form' et 'url'
                                $this->load->helper('form', 'url');

                        // Chargement de la librairie 'database'
                                $this->load->database();

                        // Chargement de la librairie form_validation
                                $this->load->library('form_validation');

                        if ($this->input->post()) 
                        { // 2ème appel de la page: traitement du formulaire

                                $data = $this->input->post();

                             
                                

                             

                                
                                $this->form_validation->set_rules('in_adresse', 'Adresse', 'required');
                                $this->form_validation->set_rules('in_nom', 'Nom', 'required');
                                $this->form_validation->set_rules("in_prenom", "prénom", "required|max_length[15]", array("required" => "Le %s doit être obligatoire.", "max_length" => "Le %s doit avoir une longueur maximum de 15 caractères !"));
                                $this->form_validation->set_rules("in_telephone", "Téléphone", array('required', 'min_length[10]', 'max_length[10]'));
                                $this->form_validation->set_rules('in_email', 'Email', 'trim|required|valid_email', );
                                $this->form_validation->set_rules('in_mdp', 'test', 'required');
                                $this->form_validation->set_rules('mdp_confirm', 'mot de passe', 'required|matches[in_mdp]');

                                // echo '<pre>'; var_dump($this->input->post()); echo '</pre>'; 
                             
                                

                             

                                $mail = $_POST['in_email'];
                                
                                $prenom = $_POST['in_prenom'];
                                $nom = $_POST['in_nom'];
                                $adresse = $_POST['in_adresse'];
                                $telephone = $_POST['in_telephone'];
                                $pays = $_POST['in_pays'];
                                $password = $_POST['in_mdp'];

                                $passwordcrypt = password_hash("$password", PASSWORD_DEFAULT);

                                // $data = array('in_mdp'  => $passwordcrypt);
                                        
                                        
                                //     var_dump($password);
                                //     var_dump($passwordcrypt);

                                
                                
                                // if (password_verify($password, $passwordcrypt)) {
                                // echo 'Le mot de passe est valide !';
                                // } else {
                                // echo 'Le mot de passe est invalide.';
                                // }

                                // $results = $this->db->query("SELECT in_id
                                // FROM waz_internautes
                                // WHERE in_email = '$mail'");

                                // $test = $results->result();
                                // if (empty($test)) 
                                // {

                                //         $this->db->insert('waz_internautes', $data);

                                //         // $this->load->view('PageAccueillView');
                                //         redirect(site_url("AccueilController/Accueil"));
                                // } 
                                // else 
                                // {

                                //         echo "<script type='text/javascript'>
                                //         window.alert('Le mail que vous avez choisi est déjà utilisé')
                                //         </script>";
                                    
                                // }


                                if ($this->form_validation->run() == FALSE) 
                                {

                                        $this->load->view('InscriptionView');
                                        
                                } 
                                else 
                                {
                                        $this->db->insert('waz_internautes', $data);
                                        return true;

                                       
                                       
                                        // $data = array('in_nom'=>$nom,
                                        // 'in_prenom'=>$prenom,
                                        // 'in_adresse'=>$adresse,
                                        // 'in_telephone'=>$telephone,
                                        // 'in_email'=>$mail,
                                        // 'in_pays'=>$pays,
                                        // 'in_mdp'=>$password);
                                        
                                        // $db      = \Config\Database::connect();
                                        // $query_builder = $db->table('waz_internautes');
                                        // $query_builder->insert($data);
                                    
                                      
                                        redirect(site_url("AccueilController/Accueil"));  
                                }

                                        var_dump($this->form_validation->run());
                                
                         
                        } 
                        else 
                        { // 1er appel de la page: affichage du formulaire
                                $this->load->view('Headerview');
                                $this->load->view('Inscriptionview');

                        }

                } 
                else 
                {
                        $Erreur = "Vous êtes déjà connecté !";
                        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                        $aView["RefusAcces"] = $Erreur;

                        $this->load->view('Headerview', $aView);
                }

                
}

}
