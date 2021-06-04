<?php

//connexion,inscription,deconnexion

defined('BASEPATH') or exit('No direct script access allowed');

class AuthentificationController extends CI_Controller
{

    public function login()
    {
        if (!isset($this->session->login))
        {
            //afficher aide au debug
            $this->output->enable_profiler(false);

            // Chargement des assistants 'form' et 'url'
            $this->load->helper('form', 'url');

            if ($this->input->post())
            { // 2ème appel de la page: traitement du formulaire
                $data = $this->input->post();

                $LoginEmp = $_POST['login_name'];
                $MdpEmp = $_POST['password_name'];

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
                    $this->load->view('FooterView');
                }
                else
                {

                    $LoginInt = $_POST['login_name'];
                    $MdpInt = $_POST['password_name'];

                    //chargement du model
                    $this->load->model('AuthentificationModel');
                    $RequeteInternaute = $this->AuthentificationModel->AuthenINT($LoginInt,$MdpInt);

                    foreach ($RequeteInternaute as $row)
                    {
                        $IntPrenom = $row->in_prenom;
                        $IntNom = $row->in_nom;
                        $IntID = $row->in_id;
                    }

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
                        $this->load->view('FooterView');
                    }
                    else
                    {
                        echo "<script type='text/javascript'>
                                window.alert('Connexion refusé')
                                </script>";

                        $this->load->view('Headerview');
                        $this->load->view('ConnexionView');
                        $this->load->view('FooterView');
                    }
                }
            }
            else
            { // 1er appel de la page: affichage du formulaire
                    $this->load->view('Headerview');
                    $this->load->view('ConnexionView');
                    $this->load->view('FooterView');
            }
        }
        else
        {
            $Erreur = "Vous êtes déjà connecté(e) !";

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
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
            $this->load->view('FooterView');
        }
    }

    public function Inscription()
    {
        if (!isset($this->session->login))
        {
            // Chargement des assistants 'form' et 'url'
            $this->load->helper('form', 'url');

            // Chargement de la librairie form_validation
            $this->load->library('form_validation');

            if ($this->input->post())
            { // 2ème appel de la page: traitement du formulaire

                $data = $this->input->post();

                // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'

                $this->form_validation->set_rules('in_adresse', 'Adresse', 'required');
                $this->form_validation->set_rules('in_nom', 'Nom', 'required');
                $this->form_validation->set_rules("in_prenom", "prénom", "required|max_length[15]", array("required" => "Le %s doit être obligatoire.", "max_length" => "Le %s doit avoir une longueur maximum de 15 caractères !"));
                $this->form_validation->set_rules("in_telephone", "Téléphone", array('required', 'min_length[10]', 'max_length[10]'));
                $this->form_validation->set_rules('in_email', 'Email', 'trim|required|valid_email', );
                $this->form_validation->set_rules('in_mdp', 'test', 'required');
                $this->form_validation->set_rules('mdp_confirm', 'mot de passe', 'required|matches[in_mdp]');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('HeaderView');
                    $this->load->view('InscriptionView');
                    $this->load->view('FooterView');

                }
                else
                {                     
                        $this->load->model('AuthentificationModel');
                        $this->AuthentificationModel->Inscription ();

                        redirect(site_url("AccueilController/Accueil"));
                }




            }
            else
            { // 1er appel de la page: affichage du formulaire
                $this->load->view('Headerview');
                $this->load->view('Inscriptionview');
                $this->load->view('FooterView');

            }

        }
        else
        {
            $Erreur = "Vous êtes déjà connecté !";
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }
    }

}
