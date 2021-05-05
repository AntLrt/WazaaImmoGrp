<?php
//liste membre partie admin  + espace clients


defined('BASEPATH') OR exit('No direct script access allowed');


class MembresController extends CI_Controller 

{

public function ListeMembres()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Prépare le tableau
$this->load->library('table');

// Charge la librairie 'database'
$this->load->database();

// Exécute la requête 
$results = $this->db->query("SELECT in_id AS 'ID', in_nom AS 'Nom', in_prenom AS 'Prenom', in_adresse AS 'Adresse', in_telephone AS 'Téléphone', in_email AS 'Mail', in_pays AS 'Pays'
FROM waz_internautes");  

// Forme du tableau
$template = array(
'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">'
);

$this->table->set_template($template);
$tab = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["liste_membres"] = $tab;

// Appel de la vue avec transmission du tableau  
$this->load->view('ListeMembresView', $aView);

}








public function ListeContact()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Prépare le tableau
$this->load->library('table');

// Charge la librairie 'database'
$this->load->database();

// Exécute la requête 
$results = $this->db->query("SELECT in_id AS 'ID internaute', sujet AS 'Sujet', question AS 'Question'
FROM waz_contacter
ORDER BY in_id");  

// Forme du tableau
$template = array(
'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">'
);

$this->table->set_template($template);
$tab = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["liste_contact"] = $tab;

// Appel de la vue avec transmission du tableau  
$this->load->view('ListeContactView', $aView);

}

public function CommentairePubli()
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


    // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
    $this->form_validation->set_rules("Commentaire", "Commentaire", "required");

    if ($this->form_validation->run() == FALSE)
    { // Echec de la validation, on réaffiche la vue formulaire 
        echo"<script type='text/javascript'>
        window.alert('Merci de ne pas poster un commentaire vide')
        </script>";
       //afficher aide au debug
       $this->output->enable_profiler(TRUE);

       // Chargement de la librairie 'database'
       $this->load->database(); 
       
       ////Partie pour voir les commentaires////

       // Exécute la requête 
       $results = $this->db->query("SELECT *
       FROM waz_commentaire,waz_internautes
       WHERE com_notes=(SELECT MAX(com_notes)
                       FROM waz_commentaire) 
       AND com_date_ajout=(SELECT MAX(com_date_ajout)
                       FROM waz_commentaire
                       WHERE com_notes= (SELECT MAX(com_notes)
                       FROM waz_commentaire))
       AND waz_commentaire.in_id=waz_internautes.in_id        
       ");  

       // Récupération des résultats    
       $Comm1 = $results->result();   

       // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
       $aView["TopCom"] = $Comm1;

       // Exécute la requête 
       $results = $this->db->query("SELECT *
       FROM waz_commentaire,waz_internautes
       WHERE com_notes=(SELECT MIN(com_notes)
                       FROM waz_commentaire) 
       AND com_date_ajout=(SELECT MAX(com_date_ajout)
                       FROM waz_commentaire
                       WHERE com_notes= (SELECT MIN(com_notes)
                       FROM waz_commentaire))
       AND waz_commentaire.in_id=waz_internautes.in_id        
       ");  

       // Récupération des résultats    
       $Comm2 = $results->result();   

       // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
       $aView["PirCom"] = $Comm2;

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

   $MoyenneNotes = $this->db->query("SELECT ROUND(AVG(com_notes),1) AS 'Moyenne'
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
        $Commentaire = $_POST['Commentaire'];
        $Note = $_POST['Note'];

        $this->load->database();
        //A changer selon id connexion
        $data["com_avis"] = $Commentaire;
        $data["com_notes"] = $Note;

        //////Date avec bon fuseau horaire
        // first line of PHP
    $defaultTimeZone='UTC';
    if(date_default_timezone_get()!=$defaultTimeZone) date_default_timezone_set($defaultTimeZone);

    // somewhere in the code
    function _date($format="r", $timestamp=false, $timezone=false)
    {
        $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
        $gmtTimezone = new DateTimeZone('GMT');
        $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
        $offset = $userTimezone->getOffset($myDateTime);
        return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
    }
    /* Example */
    $Date=_date("Y-m-d H:i:s", false, 'Europe/Belgrade');
        $data["com_date_ajout"] = $Date;

        $data["in_id"] = $this->session->ID;


        $this->db->insert('waz_commentaire', $data);        

        $this->load->view('CommentaireEnvoyeView');
    } 

    
}
else{//afficher aide au debug
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

$this->load->view('PageAccueilView',$aView);}
}

public function Commentaires()
{
//afficher aide au debug
$this->output->enable_profiler(TRUE);

// Chargement de la librairie 'database'
$this->load->database(); 

////Partie pour voir les commentaires////

// Exécute la requête 
$results = $this->db->query("SELECT *
FROM waz_commentaire,waz_internautes
WHERE waz_commentaire.in_id=waz_internautes.in_id        
");  

// Récupération des résultats    
$Comms = $results->result();   

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
$aView["ToutCom"] = $Comms;

$this->load->view('CommentairesView',$aView);

}

}


?>