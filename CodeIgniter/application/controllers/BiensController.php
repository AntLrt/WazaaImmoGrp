<?php
//liste biens partie admin

defined('BASEPATH') or exit('No direct script access allowed');

class BiensController extends CI_Controller
{

    public function ListeBiens()
    {
        if ($this->session->role == "Employe") 
        {
            //afficher aide au debug
            $this->output->enable_profiler(false);

            // Prépare le tableau
            $this->load->library('table');

            //chargement de ListesModel
            $this->load->model('ListesModel');
            $results = $this->ListesModel->ListeBiens ();

            // Forme du tableau
            $template = array(
            'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">',
            );

            $this->table->set_template($template);
            $tab = $this->table->generate($results);

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["liste_biens"] = $tab;

            // Appel de la vue avec transmission du tableau
            $this->load->view('HeaderView');
            $this->load->view('ListeBiensView', $aView);
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

}
