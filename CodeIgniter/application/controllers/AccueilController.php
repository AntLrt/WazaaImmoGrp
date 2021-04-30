<?php

//meilleurs annonces en slider + Commentaire sur l'entreprise

defined('BASEPATH') OR exit('No direct script access allowed');


class AccueilController extends CI_Controller 

{
    public function Accueil()
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
            //afficher aide au debug
            $this->output->enable_profiler(TRUE);

            // Chargement de la librairie 'database'
            $this->load->database(); 

            // Exécute la requête 
            $results = $this->db->query("SELECT * FROM waz_commentaire, waz_internautes 
            WHERE  waz_internautes.in_id=waz_commentaire.in_id ORDER BY com_date_ajout DESC");  

            // Récupération des résultats    
            $Comms = $results->result();   

            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
            $aView["commentaires"] = $Comms;

            ////Partie pour les images////

        // Exécute la requête 
        $results2 = $this->db->query("SELECT waz_biens.bi_id 
        FROM waz_biens, waz_annonces
        WHERE waz_annonces.bi_id=waz_biens.bi_id
        ORDER BY an_nbre_vues DESC
        LIMIT 3");  

        // Récupération des résultats    
        $res1 = $results2->result();   

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
        $aView["anid"] = $res1;
        

        $i=0;
        foreach ($res1 as $row) 
    {

    if ($i==0){$NbVues1=$row->bi_id;}    
    else if($i==1){$NbVues2=$row->bi_id;}
    else if($i==2){$NbVues3=$row->bi_id;}
    $i=$i+1;
    }

    // Exécute la requête 
    $photo1 = $this->db->query("SELECT pho_id,pho_nom,waz_photos.bi_id,an_id
    FROM waz_photos,waz_annonces,waz_biens
    WHERE waz_photos.bi_id= '$NbVues1' AND waz_photos.bi_id=waz_biens.bi_id AND waz_biens.bi_id=waz_annonces.bi_id
    LIMIT 1;");

    $photo2 = $this->db->query("SELECT pho_id,pho_nom,waz_photos.bi_id,an_id
    FROM waz_photos,waz_annonces,waz_biens
    WHERE waz_photos.bi_id= '$NbVues2' AND waz_photos.bi_id=waz_biens.bi_id AND waz_biens.bi_id=waz_annonces.bi_id
    LIMIT 1;");

    $photo3 = $this->db->query("SELECT pho_id,pho_nom,waz_photos.bi_id,an_id
    FROM waz_photos,waz_annonces,waz_biens
    WHERE waz_photos.bi_id= '$NbVues3' AND waz_photos.bi_id=waz_biens.bi_id AND waz_biens.bi_id=waz_annonces.bi_id
    LIMIT 1;"); 

    // Récupération des résultats    
    $photo1 = $photo1->result(); 
    $photo2 = $photo2->result();   
    $photo3 = $photo3->result(); 

    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
    $aView["photo1"] = $photo1;
    $aView["photo2"] = $photo2;
    $aView["photo3"] = $photo3;

      ////Moyenne note des clients

      $MoyenneNotes = $this->db->query("SELECT AVG(com_notes) AS 'Moyenne'
      FROM waz_commentaire
      ;"); 
  
      // Récupération des résultats    
      $MoyenneNotes = $MoyenneNotes->result(); 
  
      // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
      $aView["MoyenneNotes"] = $MoyenneNotes;

$this->load->view('PageAccueilView',$aView);
            }
    
            else
            { 
            
                $Operation = $_POST['Operation'];
                $type=$_POST['Type'];
                $ville=$_POST['Ville'];
                
                if (isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation'])) && (is_null($_POST['Ville']) || empty($_POST['Ville']))){
                    // Exécute la requête 
                    $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_type = '$type' AND waz_annonces.an_id=waz_biens.bi_id");  
                    
                    // Récupération des résultats    
                    $aListe = $results->result();   
                    
                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
                    $aView["liste_produits"] = $aListe;
                    
                    //var_dump($aView);
                    echo "1er cas : type renseigné, type operation et ville vide";
                    
                    $this->load->view('PageResultatRechercheView', $aView);
                    
                    
                    }
                else if (isset($_POST['Ville']) && isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation']))){
                // Exécute la requête 
                $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_type = '$type' AND bi_local = '$ville' AND waz_annonces.an_id=waz_biens.bi_id");  
                
                // Récupération des résultats    
                $aListe = $results->result();   
                
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
                $aView["liste_produits"] = $aListe;
                
                //var_dump($aView);
                echo "2eme cas : type et ville renseigné, type operation vide";
                
                $this->load->view('PageResultatRechercheView', $aView);
                
                }
                else if (isset($_POST['Operation']) && isset($_POST['Type']) && (is_null($_POST['Ville']) || empty($_POST['Ville']))){
                    $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_type = '$type' AND an_offre = '$Operation' AND waz_annonces.an_id=waz_biens.bi_id");  
                
                    // Récupération des résultats    
                    $aListe = $results->result();   
                    
                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
                    $aView["liste_produits"] = $aListe;
                    
                    //var_dump($aView);
    
                    echo "3eme cas : Operation et type renseigné, ville vide";
                
                    $this->load->view('PageResultatRechercheView', $aView);
                
                }
                else if (isset($_POST['Operation']) && isset($_POST['Type']) && isset($_POST['Ville'])){
                    $results = $this->db->query("SELECT an_prix,an_id,an_ref,an_offre,an_titre FROM waz_annonces,waz_biens WHERE bi_local = '$ville' AND bi_type = '$type' AND an_offre < '$Operation' AND waz_annonces.an_id=waz_biens.bi_id");  
                
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
        
        //afficher aide au debug
        $this->output->enable_profiler(TRUE);

        // Chargement de la librairie 'database'
        $this->load->database(); 
        
        ////Partie pour voir les commentaires////

        // Exécute la requête 
        $results = $this->db->query("SELECT * FROM waz_commentaire, waz_internautes 
        WHERE  waz_internautes.in_id=waz_commentaire.in_id ORDER BY com_date_ajout DESC");  

        // Récupération des résultats    
        $Comms = $results->result();   

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
        $aView["commentaires"] = $Comms;

        ////Partie pour les images////

        // Exécute la requête 
        $results2 = $this->db->query("SELECT waz_biens.bi_id 
        FROM waz_biens, waz_annonces
        WHERE waz_annonces.bi_id=waz_biens.bi_id
        ORDER BY an_nbre_vues DESC
        LIMIT 3");  

        // Récupération des résultats    
        $res1 = $results2->result();   

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
        $aView["anid"] = $res1;
        

        $i=0;
        foreach ($res1 as $row) 
    {

    if ($i==0){$NbVues1=$row->bi_id;}    
    else if($i==1){$NbVues2=$row->bi_id;}
    else if($i==2){$NbVues3=$row->bi_id;}
    $i=$i+1;
    }

    // Exécute la requête 
    $photo1 = $this->db->query("SELECT pho_id,pho_nom,waz_photos.bi_id,an_id
    FROM waz_photos,waz_annonces,waz_biens
    WHERE waz_photos.bi_id= '$NbVues1' AND waz_photos.bi_id=waz_biens.bi_id AND waz_biens.bi_id=waz_annonces.bi_id
    LIMIT 1;");

    $photo2 = $this->db->query("SELECT pho_id,pho_nom,waz_photos.bi_id,an_id
    FROM waz_photos,waz_annonces,waz_biens
    WHERE waz_photos.bi_id= '$NbVues2' AND waz_photos.bi_id=waz_biens.bi_id AND waz_biens.bi_id=waz_annonces.bi_id
    LIMIT 1;");

    $photo3 = $this->db->query("SELECT pho_id,pho_nom,waz_photos.bi_id,an_id
    FROM waz_photos,waz_annonces,waz_biens
    WHERE waz_photos.bi_id= '$NbVues3' AND waz_photos.bi_id=waz_biens.bi_id AND waz_biens.bi_id=waz_annonces.bi_id
    LIMIT 1;"); 

    // Récupération des résultats    
    $photo1 = $photo1->result(); 
    $photo2 = $photo2->result();   
    $photo3 = $photo3->result(); 

    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
    $aView["photo1"] = $photo1;
    $aView["photo2"] = $photo2;
    $aView["photo3"] = $photo3;

    ////Moyenne note des clients

    $MoyenneNotes = $this->db->query("SELECT AVG(com_notes) AS 'Moyenne'
    FROM waz_commentaire
    ;"); 

    // Récupération des résultats    
    $MoyenneNotes = $MoyenneNotes->result(); 

    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
    $aView["MoyenneNotes"] = $MoyenneNotes;
    

$this->load->view('PageAccueilView',$aView);
}
} 

}
?>