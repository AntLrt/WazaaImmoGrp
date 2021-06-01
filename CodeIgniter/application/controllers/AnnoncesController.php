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
// Changement test commit 


public function Loca() 
{
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

                    $this->load->database();
                    $data["emp_id"] = rand(1,999999);
                    $data["in_id"] = $this->session->ID;
                    $data["co_sujet"] = $Sujet;
                    $data["co_question"] = $Demande;
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
            $Erreur = "Vous devez être connecté pour avoir accés à cette page !";
            $aView["RefusAcces"] = $Erreur;
            $this->load->view('Headerview', $aView);
            $this->load->view('Footerview');
        }

        
    }
}
