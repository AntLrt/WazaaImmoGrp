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

<<<<<<< Updated upstream
            // Charge la librairie 'database'
//            $this->load->database();
//
//            // Exécute la requête
//            $results = $this->db->query("SELECT bi_id AS 'ID', bi_type AS 'Type', bi_pieces AS 'Nb pieces', bi_ref AS 'Réference', bi_description AS 'Description', bi_local AS 'Localisation', bi_surf_habitable AS 'Surface habitable', bi_surf_totale AS 'Surface totale', bi_estimation_vente AS 'Estimation vente', bi_estimation_location AS 'Estimation location', bi_diagnostic AS 'Diagnostic énergetique'
//    FROM waz_biens");

<<<<<<< HEAD
            //chargement de ListesModel
            $this->load->model('ListesModel');
            $results = $this->ListesModel->ListeBiens ();
=======
            // Exécute la requête
            $results = $this->db->query("SELECT bi_id AS 'ID', bi_type AS 'Type', bi_pieces AS 'Nb pieces', bi_ref AS 'Réference', bi_description AS 'Description', bi_local AS 'Localisation', bi_surf_habitable AS 'Surface habitable', bi_surf_totale AS 'Surface totale', bi_estimation_vente AS 'Estimation vente', bi_estimation_location AS 'Estimation location', bi_diagnostic AS 'Diagnostic énergetique'
    FROM waz_biens");
=======
            //chargement de ListesModel
            $this->load->model('ListesModel');
            $results = $this->ListesModel->ListeBiens ();
>>>>>>> Stashed changes
>>>>>>> Vincent.D

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
<<<<<<< HEAD
            $this->load->view('FooterView');
=======
<<<<<<< Updated upstream
>>>>>>> Vincent.D

        } else {
=======
            $this->load->view('FooterView');
        } 
        
        else 
        {
>>>>>>> Stashed changes
            $Erreur = "Vous n'avez pas accés à cette page !";

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }
    }

}
