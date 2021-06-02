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
        $this->output->enable_profiler(true);

            // Prépare le tableau
        $this->load->library('table');

            //chargement du model
            $this->load->model('ListesModel');
            $results = $this->ListesModel->ListeEmployes();

            // Forme du tableau
            $template = array(
                'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">',
            );

        $this->table->set_template($template);
        $tab = $this->table->generate($results);

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["liste_employes"] = $tab;

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
            redirect(site_url("AuthentificationController/DetailsCompte"));
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
