<?php
//liste membre partie admin  + espace clients

defined('BASEPATH') or exit('No direct script access allowed');

class MembresController extends CI_Controller
{

    public function ListeMembres()
    {
        if ($this->session->role == "Employe")
        {

            //afficher aide au debug
            $this->output->enable_profiler(false);

            // Prépare le tableau
            $this->load->library('table');

            // Charge la librairie 'database'
//            $this->load->database();

            // Exécute la requête
//            $results = $this->db->query("SELECT in_id AS 'ID', in_nom AS 'Nom', in_prenom AS 'Prenom', in_adresse AS 'Adresse', in_telephone AS 'Téléphone', in_email AS 'Mail', in_pays AS 'Pays'
//                                         FROM waz_internautes");

            $this->load->model('ListesModel');
            $results = $this->ListesModel->ListeMembres ();

            // Forme du tableau
            $template = array(
            'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">',
            );

            $this->table->set_template($template);
            $tab = $this->table->generate($results);

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["liste_membres"] = $tab;

            // Appel de la vue avec transmission du tableau
            $this->load->view('HeaderView');
            $this->load->view('ListeMembresView', $aView);
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



    public function CommentairePubli()
    {
        if ($this->session->role == "Internaute")
        {
            //afficher aide au debug
            $this->output->enable_profiler(false);

            // Chargement des assistants 'form' et 'url'
            $this->load->helper('form', 'url');

            // Chargement de la librairie 'database'
            $this->load->database();

            // Chargement de la librairie form_validation
            $this->load->library('form_validation');

            if ($this->input->post())
            { // 2ème appel de la page: traitement du formulaire

                // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
                $this->form_validation->set_rules("Commentaire", "Commentaire", "required");

                if ($this->form_validation->run() == false)
                { // Echec de la validation, on réaffiche la vue formulaire
                    echo "<script type='text/javascript'>
                    window.alert('Merci de ne pas poster un commentaire vide')
                    </script>";
                    //afficher aide au debug
                    $this->output->enable_profiler(false);

                    // Chargement de la librairie 'database'
                    $this->load->database();

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
//                    $Commentaire = $_POST['Commentaire'];
//                    $Note = $_POST['Note'];
//
////                    $this->load->database();
//                    //A changer selon id connexion
//                    $data["com_avis"] = $Commentaire;
//                    $data["com_notes"] = $Note;

                    //////Date avec bon fuseau horaire
                    // first line of PHP
                    $defaultTimeZone = 'UTC';
                    if (date_default_timezone_get() != $defaultTimeZone)
                    {
                        date_default_timezone_set($defaultTimeZone);
                    }

                    // somewhere in the code
                    function _date($format = "r", $timestamp = false, $timezone = false)
                    {
                        $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
                        $gmtTimezone = new DateTimeZone('GMT');
                        $myDateTime = new DateTime(($timestamp != false ? date("r", (int) $timestamp) : date("r")), $gmtTimezone);
                        $offset = $userTimezone->getOffset($myDateTime);
                        return date($format, ($timestamp != false ? (int) $timestamp : $myDateTime->format('U')) + $offset);
                    }
                    /* Example */
                    $Date = _date("Y-m-d H:i:s", false, 'Europe/Belgrade');
                    $data["com_date_ajout"] = $Date;

                    $data["in_id"] = $this->session->ID;

//                  $this->db->insert('waz_commentaire', $data);
                    $this->load->model('CommentaireModel');
                    $this->CommentaireModel->CommentaireInserer ();


                    $this->load->view('Headerview');
                    $this->load->view('CommentaireEnvoyeView');
                    $this->load->view('FooterView');
                }

            }

            else
            { $this->load->helper('url');
                redirect(site_url("AccueilController/Accueil"));
            }
        }

        else
        {
            $Erreur = "Vous devez être connecté pour avoir accés à cette page !";
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;
            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }
    }



    public function Commentaires()
    {
        //afficher aide au debug
        $this->output->enable_profiler(false);

        // Chargement de la librairie 'database'
//        $this->load->database();

        ////Partie pour voir les commentaires////

        // Exécute la requête
        // $results = $this->db->query("SELECT *
        //FROM waz_commentaire,waz_internautes
        //WHERE waz_commentaire.in_id=waz_internautes.in_id
        //");
        $this->load->model('CommentaireModel');
        $Comms = $this->CommentaireModel->CommentairesAll ();

        // Récupération des résultats
        //$Comms = $results->result();

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["ToutCom"] = $Comms;

        $this->load->view('HeaderView');
        $this->load->view('CommentairesView', $aView);
        $this->load->view('FooterView');
    }

}
