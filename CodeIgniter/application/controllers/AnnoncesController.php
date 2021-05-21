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
}


    public function Details($an_id)
    {

        //afficher aide au debug
        $this->output->enable_profiler(true);


        $this->load->model('AnnonceModel');

        $resultatDetail = $this->AnnonceModel->Detail($an_id);
        //var_dump($resultatDetail);

        $aView["Details"] = $resultatDetail["DetailsAnnonce"];
        $aView["Options"] = $resultatDetail["OptionsAnnonces"];
        if (empty($resultatDetail["OptionsAnnonces"])) {$AucuneOptions = true;} else { $AucuneOptions = false;}
        /*
                $DetailsAnnonce = $this->AnnonceModel->Detail($an_id);


                $this->load->model('AnnonceModel');
                $OptionsAnnonces = $this->AnnonceModel->Detail($an_id);
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                $aView["Options"] = $OptionsAnnonces;
                if (empty($OptionsAnnonces)) {$AucuneOptions = true;} else { $AucuneOptions = false;}
                */

        $aView["AucuneOptions"] = $AucuneOptions;


        $this->load->view('Headerview');
        $this->load->view('DetailsView', $aView);


    }

}
