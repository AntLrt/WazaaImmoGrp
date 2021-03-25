<?php
// // application/controllers/Produits.php

// defined('BASEPATH') OR exit('No direct script access allowed');

// class Produits extends CI_Controller 
// {

//     public function liste()
//     {
//         $this->load->view('liste');
//         echo 'Produit test';
//     }
// }
?>


<?php
// // application/controllers/Produits.php

// defined('BASEPATH') OR exit('No direct script access allowed');

// class Produits extends CI_Controller 
// {
// public function liste()
    //{
        // Déclaration du tableau associatif à tranmettre à la vue
        //$aView = array();

        // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave'    
       // $aView["prenom"] = "Dave";
        
        // Dans le tableau, on créé une donnée 'nom' qui a pour valeur 'Loper'    

       // $aView["nom"] = "Loper";
        
       // $this->load->view('liste', $aView);
        // On passe le tableau en second argument de la méthode 

        //"Athos", "Clatronic", "Camping", "Green"]
        // Déclaration du tableau associatif à tranmettre à la vue
        //$aProduits = array();

        // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave' 
//         $aProduits["nomp"] = ["Aramis", "Athos", "Clatronic", "Camping", "Green"]; 

//         $this->load->view('liste',$aProduits);
//     }
// }
// ?>


<?php
// // application/controllers/Produits.php

// defined('BASEPATH') OR exit('No direct script access allowed');


// class Produits extends CI_Controller 
// {
// public function liste()
//     {
//         // Déclaration du tableau associatif à tranmettre à la vue

//         $aProduits = array();
//         $aProduits["nomp"] = ["Aramis", "Athos", "Clatronic", "Camping", "Green"];
//         // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave' 
//         //$aProduits["nomp"] = ["Aramis", "Athos", "Clatronic", "Camping", "Green"]; 

//         $this->load->view('liste',$aProduits);
//     }
// }
    
?>


<?php

// // application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

//$this->load->database();

class Produits extends CI_Controller 

{

public function liste()

{
    $this->load->library('table');
    // Charge la librairie 'database'
    $this->load->database();

    // Exécute la requête 
    $results = $this->db->query("SELECT * FROM waz_biens");  

    echo $this->table->generate($results);

    // Récupération des résultats    
    $aListe = $results->result();   

    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
    $aView["liste_biens"] = $aListe;

    // Appel de la vue avec transmission du tableau  
    $this->load->view('liste', $aView);

}

}


?>