<?php

//page location et pages ventes + details des annonces

defined('BASEPATH') or exit('No direct script access allowed');



class AnnoncesController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        // load Pagination library
        $this->load->library('pagination');

        // load URL helper
        $this->load->helper('url');
    }


    public function Loca()
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

            // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
            $this->form_validation->set_rules("Type", "Type", "required");

            if ($this->form_validation->run() == false) 
            { 
                // Echec de la validation, on réaffiche la vue formulaire
                echo "<script type='text/javascript'>
                window.alert('Merci de préciser le type de bien recherché')
                </script>";

                // load db and model
                $this->load->database();
                $this->load->library('pagination');
                $this->load->model('AnnonceModel');

                // init params
                $params = array();
                $limit_per_page = 5;
                $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $total_records = $this->AnnonceModel->get_total_loca();

                if ($total_records > 0) 
                {
                    // get current page records
                    $params["results"] = $this->AnnonceModel->get_loca_records($limit_per_page, $start_index);

                    $config['base_url'] = site_url("AnnoncesController/Loca");
                    $config['total_rows'] = $total_records;
                    $config['per_page'] = $limit_per_page;
                    $config["uri_segment"] = 3;

                    $this->pagination->initialize($config);

                    // build paging links
                    $params["links"] = $this->pagination->create_links();
                }

                $this->load->view('HeaderView');
                $this->load->view('LocaView', $params);
                $this->load->view('Footerview');

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
                    //recherche par type ,ville, operation
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

            // load db and model
            $this->load->database();
            $this->load->library('pagination');
            $this->load->model('AnnonceModel');

            // init params
            $params = array();
            $limit_per_page = 5;
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = $this->AnnonceModel->get_total_loca();

            if ($total_records > 0) 
            {
                // get current page records
                $params["results"] = $this->AnnonceModel->get_loca_records($limit_per_page, $start_index);

                $config['base_url'] = site_url("AnnoncesController/Loca");
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;

                $this->pagination->initialize($config);

                // build paging links
                $params["links"] = $this->pagination->create_links();
            }

            $this->load->view('HeaderView');
            $this->load->view('LocaView', $params);
            $this->load->view('Footerview');
        }
    }



    public function CustomLoca()
    {
    // load db and model
    $this->load->database();
    $this->load->library('pagination');
    $this->load->model('AnnonceModel');

    // init params
    $params = array();
    $limit_per_page = 2;
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
    $total_records = $this->AnnonceModel->get_total_loca();

    if ($total_records > 0)
    {
        // get current page records
        $params["results"] = $this->AnnonceModel->get_loca_records($limit_per_page, $page*$limit_per_page);

        $config['base_url'] = base_url() . 'Pagination/CustomLoca';
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
    $this->load->view('LocaView', $params);
    $this->load->view('Footerview');
    }



    public function Ventes()
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

            // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
            $this->form_validation->set_rules("Type", "Type", "required");

            if ($this->form_validation->run() == false) 
            { 
                // Echec de la validation, on réaffiche la vue formulaire
                echo "<script type='text/javascript'>
                window.alert('Merci de préciser le type de bien recherché')
                </script>";

                // load db and model
                $this->load->database();
                $this->load->library('pagination');
                $this->load->model('AnnonceModel');

                // init params
                $params = array();
                $limit_per_page = 5;
                $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $total_records = $this->AnnonceModel->get_total_ventes();

                if ($total_records > 0) 
                {
                    // get current page records
                    $params["results"] = $this->AnnonceModel->get_ventes_records($limit_per_page, $start_index);

                    $config['base_url'] = site_url("AnnoncesController/Ventes");
                    $config['total_rows'] = $total_records;
                    $config['per_page'] = $limit_per_page;
                    $config["uri_segment"] = 3;

                    $this->pagination->initialize($config);

                    // build paging links
                    $params["links"] = $this->pagination->create_links();
                }

                $this->load->view('HeaderView');
                $this->load->view('VentesView', $params);
                $this->load->view('Footerview');
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
                    //recherche par type ,ville, operation
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

            // load db and model
            $this->load->database();
            $this->load->library('pagination');
            $this->load->model('AnnonceModel');

            // init params
            $params = array();
            $limit_per_page = 5;
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = $this->AnnonceModel->get_total_ventes();

            if ($total_records > 0) 
            {
                // get current page records
                $params["results"] = $this->AnnonceModel->get_ventes_records($limit_per_page, $start_index);

                $config['base_url'] = site_url("AnnoncesController/Ventes");
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;

                $this->pagination->initialize($config);

                // build paging links
                $params["links"] = $this->pagination->create_links();
            }

            $this->load->view('HeaderView');
            $this->load->view('VentesView', $params);
            $this->load->view('Footerview');
        }
    }


    public function CustomVentes()
    {
        // load db and model
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('AnnonceModel');

        // init params
        $params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->AnnonceModel->get_total_ventes();

        if ($total_records > 0)
        {
            // get current page records
            $params["results"] = $this->AnnonceModel->get_loca_records($limit_per_page, $page*$limit_per_page);

            $config['base_url'] = base_url() . 'Pagination/CustomVentes';
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
        $this->load->view('VentesView', $params);
        $this->load->view('Footerview');
    }


    public function Details($an_id)
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
                $this->form_validation->set_rules("Demande", "Demande", "required");

                if ($this->form_validation->run() == false) 
                {  
                    $this->output->enable_profiler(false);


                    $this->load->model('AnnonceModel');

                    $resultatDetail = $this->AnnonceModel->Detail($an_id);

                    $aView["Details"] = $resultatDetail["DetailsAnnonce"];
                    $aView["Options"] = $resultatDetail["OptionsAnnonces"];

                    if (empty($resultatDetail["OptionsAnnonces"])) {$AucuneOptions = true;} else { $AucuneOptions = false;}

                    $aView["AucuneOptions"] = $AucuneOptions;
                    // Echec de la validation, on réaffiche la vue formulaire
                    echo "<script type='text/javascript'>
                    window.alert('Merci de préciser la demande')
                    </script>";

                    $this->load->view('HeaderView');
                    $this->load->view('DetailsView',$aView);
                    $this->load->view('Footerview');
                } 

                else 
                {
                    $Sujet = $_POST['Sujet'];
                    $Demande = $_POST['Demande'];

                    $Provenance = "Ce formulaire est envoyé via la page détail de l'annonce numéro ".$an_id;

                    $this->load->database();
                    $data["emp_id"] = rand(1,999999);
                    $data["in_id"] = $this->session->ID;
                    $data["co_sujet"] = $Sujet;
                    $data["co_question"] = $Provenance.". ".$Demande;
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
                    $data["co_date_ajout"] = $Date;
                    $this->db->insert('waz_contacter', $data);
                    $this->load->view('HeaderView');
                    $this->load->view('FormulaireContactEnvoyeView');
                    $this->load->view('Footerview');
                }
            } 

            else 
            { 
                $this->output->enable_profiler(false);


                $this->load->model('AnnonceModel');

                $resultatDetail = $this->AnnonceModel->Detail($an_id);

                $aView["Details"] = $resultatDetail["DetailsAnnonce"];
                $aView["Options"] = $resultatDetail["OptionsAnnonces"];

                if (empty($resultatDetail["OptionsAnnonces"])) {$AucuneOptions = true;} else { $AucuneOptions = false;}

                $aView["AucuneOptions"] = $AucuneOptions;

                $this->load->view('Headerview');
                $this->load->view('DetailsView', $aView);
                $this->load->view('Footerview');
            } 
        }

        else 
        {
            $this->output->enable_profiler(false);


            $this->load->model('AnnonceModel');

            $resultatDetail = $this->AnnonceModel->Detail($an_id);

            $aView["Details"] = $resultatDetail["DetailsAnnonce"];
            $aView["Options"] = $resultatDetail["OptionsAnnonces"];

            if (empty($resultatDetail["OptionsAnnonces"])) {$AucuneOptions = true;} else { $AucuneOptions = false;}

            $aView["AucuneOptions"] = $AucuneOptions;


            $this->load->view('HeaderView');
            $this->load->view('DetailsView',$aView);
            $this->load->view('Footerview');
        }


    }
    

}