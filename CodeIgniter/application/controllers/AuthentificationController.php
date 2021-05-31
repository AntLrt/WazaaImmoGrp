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
            //$this->load->database();

            if ($this->input->post())
            { // 2ème appel de la page: traitement du formulaire
                $data = $this->input->post();

                $LoginEmp = $_POST['login_name'];
                $MdpEmp = $_POST['password_name'];
                // Exécute la requête
        //        $resultsemp = $this->db->query("SELECT emp_nom,emp_prenom,emp_id
        //                FROM waz_employes
        //                WHERE emp_mail = '$LoginEmp' AND emp_mdp= '$MdpEmp'");
        //
        //        // Récupération des résultats
        //        $RequeteEmploye = $resultsemp->result();

                //chargement du model
                $this->load->model('AuthentificationModel');
                $RequeteEmploye = $this->AuthentificationModel->AuthenEmp($LoginEmp,$MdpEmp);

                foreach ($RequeteEmploye as $row)
                {
                    $EmpPrenom = $row->emp_prenom;
                    $EmpNom = $row->emp_nom;
                    $EmpID = $row->emp_id;
                }

                $EstUnEmploye = false;
                if (!empty($RequeteEmploye)) {$EstUnEmploye = true;}

                if ($EstUnEmploye == true)
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
                    //        $resultsint = $this->db->query("SELECT in_nom,in_prenom,in_id
                    //                FROM waz_internautes
                    //                WHERE in_email = '$LoginInt' AND in_mdp= '$MdpInt'");

                    // Récupération des résultats
            //      $RequeteInternaute = $resultsint->result();
                    //chargement du model
                    $this->load->model('AuthentificationModel');
                    $RequeteInternaute = $this->AuthentificationModel->AuthenINT($LoginInt,$MdpInt);

                    foreach ($RequeteInternaute as $row) {$IntPrenom = $row->in_prenom;
                            $IntNom = $row->in_nom;
                            $IntID = $row->in_id;}

                    $EstUninternaute = false;

                    if (!empty($RequeteInternaute)) {$EstUninternaute = true;}
                    if ($EstUninternaute)
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
            redirect(site_url("AccueilController/Accueil"));
        }
        else
        {
            $Erreur = "Vous n'êtes pas connecté(e) !";
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;
            $this->load->view('Headerview', $aView);
        }
    }

    public function DetailsCompte()
    {
        //afficher aide au debug
        $this->output->enable_profiler(true);

        // Charge la librairie 'database'
        $this->load->database();

        if ($this->session->role == "Internaute")
        {
            $Login = $this->session->login;
            // Exécute la requête
//            $DetailsInternaute = $this->db->query("SELECT *
//            FROM waz_internautes
//            WHERE in_email='$Login'");
//
//            $Details = $DetailsInternaute->result();

            // chargement du model
            $this->load->model('UserModel');
            $Details = $this->UserModel->DetailInt($Login);

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["Details"] = $Details;

            // Appel de la vue avec transmission du tableau
            $this->load->view('Headerview');
            $this->load->view('DetailsCompteView', $aView);
        }
        else if ($this->session->role == 'Employe')
        {
            $this->load->helper('url');
            redirect(site_url("EmployesController/DetailsCompte"));
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

                // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'

                $config = array(
                array(
                        'field' => 'in_nom',
                        'label' => 'Nom',
                        'rules' => 'required',
                ),
                );

                $this->form_validation->set_rules($config);
                $this->form_validation->set_rules("in_prenom", "prénom", "required|max_length[15]", array("required" => "Le %s doit être obligatoire.", "max_length" => "Le %s doit avoir une longueur maximum de 15 caractères !"));
                $this->form_validation->set_rules("in_telephone", "Téléphone", array('required', 'min_length[10]', 'max_length[10]', 'callback_tel_check'));
                $this->form_validation->set_rules('in_email', 'Email', 'trim|required|valid_email', );

                $config = array(
                array(
                        'field' => 'in_adresse',
                        'label' => 'Adresse',
                        'rules' => 'required',
                ),
                );

                $mail = $_POST['in_email'];
                $city = $_POST['in_pays'];

                $results = $this->db->query("SELECT in_id
                                             FROM waz_internautes
                                             WHERE in_email = '$mail'");

                $test = $results->result();

                if (empty($test))
                {
                    $this->db->insert('waz_internautes', $data);
                    $this->load->view('congratz');
                }
                else
                {

                    echo "<script type='text/javascript'>
                    window.alert('Le mail que vous avez choisi est déjà utilisé')
                    </script>";

                }

                if ($this->form_validation->run() == false)
                { // Echec de la validation, on réaffiche la vue formulaire

                    $this->load->view('Inscriptionview');
                }
                else
                { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base

                    $this->db->insert('waz_internautes', $data);

                    echo "<script type='text/javascript'>
                    window.alert('Votre compte a été crée !')
                    </script>";
                    $this->load->helper('url');
                    redirect(site_url("AccueilController/Accueil"));

                }
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
