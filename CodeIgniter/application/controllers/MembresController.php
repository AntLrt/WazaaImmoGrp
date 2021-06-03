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
                { 
                    // 2ème appel de la page: traitement du formulaire

                    // Définition des filtres
                    $this->form_validation->set_rules("Commentaire", "Commentaire", "required");

                    if ($this->form_validation->run() == false)
                    { 
                        // Echec de la validation, on réaffiche la vue formulaire
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
                        //Date avec bon fuseau horaire          
                        $defaultTimeZone = 'UTC';
                        if (date_default_timezone_get() != $defaultTimeZone)
                        {
                            date_default_timezone_set($defaultTimeZone);
                        }

                        function _date($format = "r", $timestamp = false, $timezone = false)
                        {
                            $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
                            $gmtTimezone = new DateTimeZone('GMT');
                            $myDateTime = new DateTime(($timestamp != false ? date("r", (int) $timestamp) : date("r")), $gmtTimezone);
                            $offset = $userTimezone->getOffset($myDateTime);
                            return date($format, ($timestamp != false ? (int) $timestamp : $myDateTime->format('U')) + $offset);
                        }

                        
                        $Date = _date("Y-m-d H:i:s", false, 'Europe/Belgrade');

                        $data["com_date_ajout"] = $Date;
                        $data["in_id"] = $this->session->ID;

                        $Commentaire = $_POST['Commentaire'];
                        $Note = $_POST['Note'];

                        $data["com_avis"] = $Commentaire;
                        $data["com_notes"] = $Note;

                        // Chargement de la librairie 'database'
                        $this->load->database();

                        //Insertion des données en bdd
                        $this->db->insert('waz_commentaire', $data);


                        $this->load->view('Headerview');
                        $this->load->view('CommentaireEnvoyeView');
                        $this->load->view('FooterView');
                    }

                }

                else
                { 
                    $this->load->helper('url');
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
            //$TypeTrie = $this->input->get("Trie");
            

            // load db and model
            $this->load->database();
            $this->load->library('pagination');
            $this->load->model('CommentaireModel');

            // init params
            $params = array();
            $limit_per_page = 5;
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = $this->CommentaireModel->get_total_comms();

            if ($total_records > 0) 
            {
                // get current page records
                $params["ResDateDecroissante"] = $this->CommentaireModel->get_comms_records($limit_per_page, $start_index);
                $params["ResNoteCroissante"] = $this->CommentaireModel->get_comms_records_NoteC($limit_per_page, $start_index);
                $params["ResDateCroissante"] = $this->CommentaireModel->get_comms_records_DateC($limit_per_page, $start_index);
                $params["ResNoteDecroissante"] = $this->CommentaireModel->get_comms_records_NoteD($limit_per_page, $start_index);


                $config['base_url'] = site_url("MembresController/Commentaires");
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;

                $this->pagination->initialize($config);

                // build paging links
                $params["links"] = $this->pagination->create_links();
            }

            $this->load->view('HeaderView');
            $this->load->view('CommentairesView', $params);
            $this->load->view('Footerview');
        }




        public function CustomComms()
        {
            // load db and model
            $this->load->database();
            $this->load->library('pagination');
            $this->load->model('CommentaireModel');

            // init params
            $params = array();
            $limit_per_page = 5;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
            $total_records = $this->AnnonceModel->get_total_comms();

            if ($total_records > 0)
            {
                // get current page records
                $params["ResDateDecroissante"] = $this->CommentaireModel->get_comms_records($limit_per_page, $start_index);
                $params["ResNoteCroissante"] = $this->CommentaireModel->get_comms_records_NoteC($limit_per_page, $start_index);
                $params["ResDateCroissante"] = $this->CommentaireModel->get_comms_records_DateC($limit_per_page, $start_index);
                $params["ResNoteDecroissante"] = $this->CommentaireModel->get_comms_records_NoteD($limit_per_page, $start_index);



                $config['base_url'] = base_url() . 'MembresController/CustomComms';
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
            $this->load->view('CommentairesView', $params);
            $this->load->view('Footerview');
        }
}

