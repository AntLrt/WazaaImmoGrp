<?php

//page NOUS employés(poste + nom) + admin infos perso

defined('BASEPATH') or exit('No direct script access allowed');

class EmployesController extends CI_Controller
{

    public function PageNous()
    {
        //afficher aide au debug
        $this->output->enable_profiler(false);

        // Prépare le tableau
        $this->load->library('table');

        //Chargement ListesModel
        $this->load->model('ListesModel');
        $results = $this->ListesModel->PosteDirecteur();

        // Forme du tableau
        $template = array(
            'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">',
        );

        $this->table->set_template($template);
        $dir = $this->table->generate($results);

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["Directeur"] = $dir;

        $results = $this->ListesModel->PosteSecretaire();
        $sec = $this->table->generate($results);
      

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["Secretaire"] = $sec;
    
        $results = $this->ListesModel->NegociateurImmobilier();
        $neg = $this->table->generate($results);

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["Negociateur"] = $neg;

        // Appel de la vue avec transmission du tableau
        $this->load->view('Headerview');
        $this->load->view('PageNousView', $aView);
        $this->load->view('FooterView');

    }

    public function ListeEmployes()
    {
        if ($this->session->role == "Employe") 
        {
            //afficher aide au debug
            $this->output->enable_profiler(false);      

            //chargement du model
            $this->load->model('ListesModel');
            $results = $this->ListesModel->ListeEmployes();

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["liste_employes"] = $results;

            // Appel de la vue avec transmission du tableau
            $this->load->view('Headerview');
            $this->load->view('ListeEmployesView', $aView);
            $this->load->view('FooterView');
        } 

        else 
        {
            $Erreur = "Vous n'avez pas accés à cette page !";

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }
    }

    public function DetailsCompte()
    {
        //afficher aide au debug
        $this->output->enable_profiler(false);

        if ($this->session->role == "Employe") 
        {
            // Charge la librairie 'database'
            $this->load->database();

            $Login = $this->session->login;

            $this->load->model('UserModel');
            $Details = $this->UserModel->detailEmp($Login);

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["Details"] = $Details;

            // Appel de la vue avec transmission du tableau
            $this->load->view('Headerview');
            $this->load->view('DetailsCompteView', $aView);
            $this->load->view('FooterView');
        } 
        else if ($this->session->role == 'Internaute') 
        {
            $this->load->helper('url');
            redirect(site_url("MembresController/DetailsCompte"));
        } 
        else 
        {
            $Erreur = "Vous n'avez pas accés à cette page !";
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }
    }




    public function Modification($id)
    {
        $this->output->enable_profiler(false);

        if ($this->session->role == 'Employe') 
        {
            
            if ($this->input->post()) 
            {
                
                $id = $this->input->post("empid");
                $nom = $this->input->post("nom");
                $prenom = $this->input->post("prenom");
                $adresse = $this->input->post("adresse");
                $telephone = $this->input->post("tel");
                $email = $this->input->post("mail");
                $poste = $this->input->post("poste");
                
               
             

                //envois du model pour l'insertion du traitement
                $this->load->model('UserModel');
                $this->UserModel->ModifiDetailsEmployes($id,$nom,$prenom,$adresse,$telephone,$email,$poste);

                $this->load->helper('url');
                $url = site_url("EmployesController/ListeEmployes");
                redirect($url);

            } 

            else 
            {
                $this->load->model('UserModel');
                $Login = $this->session->login;
                $Details = $this->UserModel->DetailEmployeID ($id);
                $provenance = 'modification';

                $aView["id"] = $id;
                $aView["liste_employes"] = $Details;
                $aView["provenance"] = $provenance;

                $this->load->view('Headerview');
                $this->load->view('DetailsEmployesView',$aView);
                $this->load->view('FooterView');

            }
        }

        else 
        {
            $Erreur = "Vous n'avez pas accés à cette page !";
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }


    }


    public function Supression($id)
    {
        $this->output->enable_profiler(false);

        if ($this->session->role == 'Employe') 
        {
            
            if ($this->input->post()) 
            {
                //envois du model pour supression
                $this->load->model('UserModel');
                $this->UserModel->SupressionEmploye ($id);

                $this->load->helper('url');
                $url = site_url("EmployesController/ListeEmployes");
                redirect($url);
            } 

            else 
            {
                $this->load->model('UserModel');
                $Details = $this->UserModel->DetailEmployeID ($id);
                $provenance = 'suppression';

                $aView["id"] = $id;
                $aView["liste_employes"] = $Details;
                $aView["provenance"] = $provenance;

                $this->load->view('Headerview');
                $this->load->view('DetailsEmployesView',$aView);
                $this->load->view('FooterView');

            }
        }

        else 
        {
            $Erreur = "Vous n'avez pas accés à cette page !";
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }

    }
    


    public function Ajout()
    {
        $this->output->enable_profiler(false);

        if ($this->session->role == 'Employe') 
        {
            
            if ($this->input->post()) 
            {
                //envois du model pour supression
                $this->load->model('UserModel');
                $this->UserModel->AjoutEmploye();

                $this->load->helper('url');
                $url = site_url("EmployesController/ListeEmployes");
                redirect($url);
            } 

            else 
            {;


                $this->load->view('Headerview');
                $this->load->view('AjoutEmployesView');
                $this->load->view('FooterView');

            }
        }

        else 
        {
            $Erreur = "Vous n'avez pas accés à cette page !";
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }

    }
    





}
