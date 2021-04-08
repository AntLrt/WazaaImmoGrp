<?php

//A rajouter filtre et tri

defined('BASEPATH') OR exit('No direct script access allowed');


class RechercheController extends CI_Controller 

{

public function BarreRecherche()
{
    //afficher aide au debug
    $this->output->enable_profiler(TRUE);

   // Chargement des assistants 'form' et 'url'
$this->load->helper('form', 'url'); 

   // Chargement de la librairie 'database'
$this->load->database(); 

   // Chargement de la librairie form_validation
$this->load->library('form_validation'); 

if ($this->input->post()) 
   { // 2ème appel de la page: traitement du formulaire

        $data = $this->input->post();

        // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
        $this->form_validation->set_rules("Type", "Type", "required");

        if ($this->form_validation->run() == FALSE)
        { // Echec de la validation, on réaffiche la vue formulaire 
            echo"<script type='text/javascript'>
                window.alert('Merci de préciser le type de bien recherché')
                </script>";
            $this->load->view('PageAccueilBarreRechercheView');
        }

        else
        { 
        
            $budgetmax = $_POST['Prix'];
            $type=$_POST['Type'];
            $ville=$_POST['Ville'];
            
            if (isset($_POST['Type']) && (is_null($_POST['Prix']) || empty($_POST['Prix'])) && (is_null($_POST['Ville']) || empty($_POST['Ville']))){
                // Exécute la requête 
                $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_type = '$type' AND waz_annonces.an_id=waz_biens.bi_id");  
                
                // Récupération des résultats    
                $aListe = $results->result();   
                
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
                $aView["liste_produits"] = $aListe;
                
                //var_dump($aView);
                echo "1er cas : type renseigné, prix et ville vide";
                
                $this->load->view('PageResultatRechercheView', $aView);
                
                
                }
            else if (isset($_POST['Ville']) && isset($_POST['Type']) && (is_null($_POST['Prix']) || empty($_POST['Prix']))){
            // Exécute la requête 
            $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_type = '$type' AND bi_local = '$ville' AND waz_annonces.an_id=waz_biens.bi_id");  
            
            // Récupération des résultats    
            $aListe = $results->result();   
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
            $aView["liste_produits"] = $aListe;
            
            //var_dump($aView);
            echo "2eme cas : type et ville renseigné, prix vide";
            
            $this->load->view('PageResultatRechercheView', $aView);
            
            }
            else if (isset($_POST['Prix']) && isset($_POST['Type']) && (is_null($_POST['Ville']) || empty($_POST['Ville']))){
                $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_type = '$type' AND an_prix < '$budgetmax' AND waz_annonces.an_id=waz_biens.bi_id");  
            
                // Récupération des résultats    
                $aListe = $results->result();   
                
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
                $aView["liste_produits"] = $aListe;
                
                //var_dump($aView);

                echo "3eme cas : prix et type renseigné, ville vide";
            
                $this->load->view('PageResultatRechercheView', $aView);
            
            }
            else if (isset($_POST['Prix']) && isset($_POST['Type']) && isset($_POST['Ville'])){
                $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_local = '$ville' AND bi_type = '$type' AND an_prix < '$budgetmax' AND waz_annonces.an_id=waz_biens.bi_id");  
            
                // Récupération des résultats    
                $aListe = $results->result();   
                
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
                $aView["liste_produits"] = $aListe;
                
                //var_dump($aView);
                echo "4eme cas : tout est renseigné";
            
                $this->load->view('PageResultatRechercheView', $aView);
            
            
            }
        
        }       
    } 
    else 
    { // 1er appel de la page: affichage du formulaire
    $this->load->view('PageAccueilBarreRechercheView');
    }
} 
}


?>