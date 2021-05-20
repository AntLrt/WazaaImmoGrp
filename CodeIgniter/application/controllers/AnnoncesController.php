<?php

//page location et pages ventes + details des annonces

defined('BASEPATH') or exit('No direct script access allowed');



class AnnoncesController extends CI_Controller
{


    public function Loca()
    {
        //afficher aide au debug
        $this->output->enable_profiler(true);

        $this->load->model('AnnonceModel');
        $aListe = $this->AnnonceModel->Louer();
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["locations"] = $aListe;

        $this->load->view('Headerview');
        $this->load->view('LocaView', $aView);

    }


    public function Ventes()
    {
        //afficher aide au debug
        $this->output->enable_profiler(true);

        // Chargement de la librairie 'database'
        $this->load->database();
        $this->load->model('AnnonceModel');
        $aListe = $this->AnnonceModel->Ventes();
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["ventes"] = $aListe;

        $this->load->view('Headerview');
        $this->load->view('VentesView', $aView);


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
