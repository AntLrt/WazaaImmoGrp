<?php

//meilleurs annonces en slider + Commentaire sur l'entreprise

defined('BASEPATH') or exit('No direct script access allowed');

class AccueilController extends CI_Controller
{
public function Accueil()
{
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$this->load->library('pagination');
//afficher aide au debug

$this->load->model('BarreRechercheModel');
// Changement test commit 

// if($actual_link == site_url('AccueilController/Accueil') || $actual_link == 'http://wazaagroupe/')
// {
    $pageretour = "";
    //afficher aide au debug
    $this->output->enable_profiler(false);

    // Chargement des assistants 'form' et 'url'
    $this->load->helper('form', 'url');

    // Chargement de la librairie 'database'
    $this->load->database();

    // Chargement de la librairie form_validation
    $this->load->library('form_validation');

    if ($this->input->post()) 
    { 
        // 2ème appel de la page: traitement du formulaire
        $data = $this->input->post();

        // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
        $this->form_validation->set_rules("Type", "Type", "required");

        if ($this->form_validation->run() == false) 
        { 
            // Echec de la validation, on réaffiche la vue formulaire
            echo "<script type='text/javascript'>
            window.alert('Merci de préciser le type de bien recherché')
            </script>";
            //afficher aide au debug
            // $this->output->enable_profiler(false);

            // nouveau code

            //chargement du modèle 'CommentaireModel' pour le top commentaire
            $this->load->model('CommentaireModel');
            $Comm1 = $this->CommentaireModel->TopCommentaire();
            $aView["TopCom"] = $Comm1;

            //chargement du modèle 'CommentaireModel' pour le pire commentaire
            $this->load->model('CommentaireModel');
            $Comm2 = $this->CommentaireModel->PireCommentaire();
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["PirCom"] = $Comm2;

            ////Partie pour les images////

            $this->load->model('AnnonceModel');
            $vues = $this->AnnonceModel->Vues();
            $aView['anid'] = $vues;


            ////Moyenne note des clients

            $this->load->model('NotesModel');
            $MoyenneNotes = $this->NotesModel->Notes();
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["MoyenneNotes"] = $MoyenneNotes;

            $this->load->view('HeaderView');
            $this->load->view('PageAccueilView',$aView);
            $this->load->view('FooterView');

        } 
        
        else 
        {
            // init params
            $params = array();
            $limit_per_page = 5;
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = $this->BarreRechercheModel->get_total_recherche();

            if ($total_records > 0) 
            {
                // get current page records
                $params["results"] = $this->BarreRechercheModel->get_recherche_records($limit_per_page, $start_index);

                $config['base_url'] = site_url("AccueilController/Accueil");
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;

                $this->pagination->initialize($config);

                // build paging links
                $params["links"] = $this->pagination->create_links();
            }

            //var_dump($aView);
            $Situation = $this->BarreRechercheModel->Situation();
            echo $Situation;

            $this->load->view('HeaderView');
            $this->load->view('PageResultatRechercheView', $params);
            $this->load->view('FooterView');


        }

    
    } 
    
    else 
    { 
        // 1er appel de la page: affichage du formulaire

        //afficher aide au debug
        $this->output->enable_profiler(false);

        ////Partie pour voir les commentaires////

        $this->load->model('CommentaireModel');

        $Comm1 = $this->CommentaireModel->TopCommentaire();
        $aView["TopCom"] = $Comm1;

        //chargement du modèle 'CommentaireModel' pour le pire commentaire
        $this->load->model('CommentaireModel');
        $Comm2 = $this->CommentaireModel->PireCommentaire();
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["PirCom"] = $Comm2;

        ////Partie pour les images////


        $this->load->model('AnnonceModel');
        $vues = $this->AnnonceModel->Vues();
        $aView['anid'] = $vues;



        ////Moyenne note des clients

        $this->load->model('NotesModel');
        $MoyenneNotes = $this->NotesModel->Notes();
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["MoyenneNotes"] = $MoyenneNotes;

        $this->load->view('HeaderView');
        $this->load->view('PageAccueilView', $aView);
        $this->load->view('FooterView');
    }
// }

// else
// {
// echo "lien différent/pagination a faire";
// }
}







public function CustomRecherche()
{
        // load db and model
        $this->load->database();
        $this->load->model('BarreRechercheModel');

        // init params
        $params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->BarreRechercheModel->get_total_recherche();

        if ($total_records > 0)
        {
        // get current page records
        $params["results"] = $this->BarreRechercheModel->get_recherche_records($limit_per_page, $page*$limit_per_page);
        
        $config['base_url'] = base_url() . 'AccueilController/CustomRecherche';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 3;
        
        // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $this->pagination->initialize($config);
        
        // build paging links
        $params["links"] = $this->pagination->create_links();
        }
        
        $this->load->view('HeaderView');
        $this->load->view('PageResultatRechercheView', $params);
        $this->load->view('FooterView');
}





}
