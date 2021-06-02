<?php

//meilleurs annonces en slider + Commentaire sur l'entreprise

defined('BASEPATH') or exit('No direct script access allowed');

class AccueilController extends CI_Controller
{
    public function Accueil()
    {
        //$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // if($actual_link == site_url('AccueilController/Accueil') || $actual_link == 'http://wazaagroupe/')

        $this->load->model('BarreRechercheModel');
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

            // Définition des filtres
            $this->form_validation->set_rules("Type", "Type", "required");

            if ($this->form_validation->run() == false) 
            { 
                // Echec de la validation, on réaffiche la vue formulaire
                echo "<script type='text/javascript'>
                window.alert('Merci de préciser le type de bien recherché')
                </script>";

                //chargement du modèle 'CommentaireModel' pour le top commentaire
                $this->load->model('CommentaireModel');
                $Comm1 = $this->CommentaireModel->TopCommentaire();
                $aView["TopCom"] = $Comm1;

                //chargement du modèle 'CommentaireModel' pour le pire commentaire
                $this->load->model('CommentaireModel');
                $Comm2 = $this->CommentaireModel->PireCommentaire();

                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                $aView["PirCom"] = $Comm2;

                //Partie pour les images
                $this->load->model('AnnonceModel');
                $vues = $this->AnnonceModel->Vues();
                $aView['anid'] = $vues;

                //Moyenne note des clients
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

                if (isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation'])) && (is_null($_POST['Ville']) || empty($_POST['Ville']))) 
                {
                    //recherche par type
                    $this->load->model('BarreRechercheModel');
                    $aListe = $this->BarreRechercheModel->BarreRecherche1();

                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                    $aView["results"] = $aListe;

                    //$Situation = "Type renseigné. Ville et opération non.";
                    //echo $Situation;

                    $pageretour = 'PageResultatRechercheView';
                    
                    $this->load->view('HeaderView');
                    $this->load->view($pageretour, $aView);
                    $this->load->view('FooterView');

                } 
                
                else if (isset($_POST['Ville']) && isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation']))) 
                {
                    //recherche par type et ville
                    $this->load->model('BarreRechercheModel');
                    $aListe = $this->BarreRechercheModel->BarreRecherche2();

                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                    $aView["results"] = $aListe;

                    //$Situation = "Type et Ville renseigné. Opération non.";
                    //echo $Situation;

                    $pageretour = 'PageResultatRechercheView';
                    $this->load->view('HeaderView');
                    $this->load->view($pageretour, $aView);
                    $this->load->view('FooterView');
                } 
                
                else if (isset($_POST['Operation']) && isset($_POST['Type']) && (is_null($_POST['Ville']) || empty($_POST['Ville']))) 
                {
                //recherche par type et operation

                $this->load->model('BarreRechercheModel');
                $aListe = $this->BarreRechercheModel->BarreRecherche3();

                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                $aView["results"] = $aListe;

                //$Situation = "Type et Opération renseigné. Ville non.";
                //echo $Situation;

                $pageretour = 'PageResultatRechercheView';
                $this->load->view('HeaderView');
                $this->load->view($pageretour, $aView);
                $this->load->view('FooterView');

                } 
                
                else if (isset($_POST['Operation']) && isset($_POST['Type']) && isset($_POST['Ville'])) 
                {
                    //recherche par type ,ville et opération
                    $this->load->model('BarreRechercheModel');
                    $aListe = $this->BarreRechercheModel->BarreRecherche4();

                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                    $aView["results"] = $aListe;

                    //$Situation = "Tout est renseigné";
                    //echo $Situation;

                    $pageretour = 'PageResultatRechercheView';
                    $this->load->view('HeaderView');
                    $this->load->view($pageretour, $aView);
                    $this->load->view('FooterView');
                }

            }
        } 

        else 
        { 
            // 1er appel de la page: affichage du formulaire

            //afficher aide au debug
            $this->output->enable_profiler(false);

            //Partie pour voir les commentaires
            $this->load->model('CommentaireModel');
            $Comm1 = $this->CommentaireModel->TopCommentaire();
            $aView["TopCom"] = $Comm1;

            //chargement du modèle 'CommentaireModel' pour le pire commentaire
            $this->load->model('CommentaireModel');
            $Comm2 = $this->CommentaireModel->PireCommentaire();

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["PirCom"] = $Comm2;

            //Partie pour les images
            $this->load->model('AnnonceModel');
            $vues = $this->AnnonceModel->Vues();
            $aView['anid'] = $vues;

            //Moyenne note des clients
            $this->load->model('NotesModel');
            $MoyenneNotes = $this->NotesModel->Notes();

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["MoyenneNotes"] = $MoyenneNotes;

            $pageretour = 'PageAccueilView';
            $this->load->view('HeaderView');
            $this->load->view($pageretour, $aView);
            $this->load->view('FooterView');

        }

    }

}
