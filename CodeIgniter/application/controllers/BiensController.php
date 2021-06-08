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

            //chargement de ListesModel
            $this->load->model('ListesModel');
            $results0 = $this->ListesModel->ListeBiens0 ();

            //chargement de ListesModel
            $this->load->model('ListesModel');
            $results1 = $this->ListesModel->ListeBiens1 ();


            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["liste_biens0"] = $results0;
            $aView["liste_biens1"] = $results1;


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

    public function AjouterCommeAnnonce($id)
    {
        $this->output->enable_profiler(false);

        if ($this->session->role == 'Employe') 
        {
            
            if ($this->input->post()) 
            {
                

            $this->load->model('AnnonceModel');
                $this->AnnonceModel->ModifAnnonce ($id);

                $this->load->helper('url');
                $url = site_url("AnnoncesController/ListeAnnonces");
                redirect($url);
            } 

            else 
            {
                $this->load->model('ListesModel');
                $Details = $this->ListesModel->ListeBiens0 ($id);

                $aView["provenance"] = 'AjouterCommeAnnonce';
                $aView["id"] = $id;
                $aView["Details"] = $Details;

                $this->load->view('Headerview');
                $this->load->view('DetailsBiensView',$aView);
                $this->load->view('FooterView');

            }
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



    
    public function Modification($id)
    {
        $this->output->enable_profiler(false);

        if ($this->session->role == 'Employe') 
        {
            $biid=$id;
            if ($this->input->post()) 
            {
                

            $this->load->model('ListesModel');
                $this->ListesModel->ModifBiens ();

                $this->load->helper('url');
                $url = site_url("BiensController/ListeBiens");
                redirect($url);
            } 

            else 
            {
                $this->load->model('ListesModel');
                $Details = $this->ListesModel->ListeBiensID ($biid);

                $aView["provenance"] = 'Modification';
                $aView["id"] = $id;
                $aView["Details"] = $Details;

                $this->load->view('Headerview');
                $this->load->view('DetailsBiensView',$aView);
                $this->load->view('FooterView');

            }
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


    public function Supression($biid)
    {
        $this->output->enable_profiler(false);

        if ($this->session->role == 'Employe') 
        {
            
            if ($this->input->post()) 
            {
                $biid = $this->input->post('biid');

                //envois du model pour supression
                $this->load->model('ListesModel');
                $this->ListesModel->SupressionBien ($biid);

                $this->load->helper('url');
                $url = site_url("BiensController/ListeBiens");
                redirect($url);
            } 

            else 
            {
                $this->load->model('ListesModel');
                $Details = $this->ListesModel->ListeBiensID ($biid);

                $aView["provenance"] = 'Supression';
                $aView["id"] = $biid;
                $aView["Details"] = $Details;

                $this->load->view('Headerview');
                $this->load->view('DetailsBiensView',$aView);
                $this->load->view('FooterView');

            }
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


    public function AjoutBien()
    {
        $this->output->enable_profiler(false);

        if ($this->session->role == 'Employe') 
        {
            
            if ($this->input->post()) 
            {
                //envois du model pour supression
                $this->load->model('UserModel');
                $this->UserModel->AjoutBien();

                $this->load->helper('url');
                $url = site_url("BiensController/ListeBiens");
                redirect($url);
            } 

            else 
            {

                $aView["provenance"] = 'Ajout';

                $this->load->view('Headerview');
                $this->load->view('DetailsBiensView',$aView);
                $this->load->view('FooterView');

            }
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
