<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AnnonceModel extends CI_Model
{
    function __construct() 
{
    parent::__construct();
}

    public Function Vues ()
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        ////Partie pour les images////

        // Exécute la requête
        $results2 = $this->db->query("SELECT waz_biens.bi_id
                                            FROM waz_biens, waz_annonces
                                            WHERE waz_annonces.bi_id=waz_biens.bi_id
                                            ORDER BY an_nbre_vues DESC
                                            LIMIT 3");

        // Récupération des résultats
        $res1= $results2->result();


        $i = 0;
        foreach ($res1 as $row) {

            if ($i == 0) {
                $NbVues1 = $row->bi_id;
            } else if ($i == 1) {
                $NbVues2 = $row->bi_id;
            } else if ($i == 2) {
                $NbVues3 = $row->bi_id;
            }
            $i = $i + 1;
        }
        // Chargement de la librairie 'database'
//        $this->load->database();
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
        $tof['photo1']= $photo1->result();
        $tof['photo2']= $photo2->result();
        $tof['photo3']= $photo3->result();

        return $tof;

    }

    public function get_loca_records($limit, $start) 
{
    $this->db->limit($limit, $start);  
    $this->db->where('an_offre', 'L');
    $this->db->where('an_est_active', '1');
    $this->db->from('waz_annonces','waz_biens','waz_photos');
    $this->db->join('waz_biens', 'waz_annonces.bi_id = waz_biens.bi_id');
    $this->db->join('waz_photos', 'waz_photos.bi_id = waz_biens.bi_id');
    $query = $this->db->get();

    if ($query->num_rows() > 0) 
    {
        foreach ($query->result() as $row) 
        {
            $data[] = $row;
        }
            
        return $data;
    }

    return false;
}
    
public function get_total_loca() 
{       
$this->db->where('an_offre', 'L');
$this->db->where('an_est_active', '1');
$this->db->from('waz_annonces','waz_biens','waz_photos');
$this->db->join('waz_biens', 'waz_annonces.bi_id = waz_biens.bi_id');
$this->db->join('waz_photos', 'waz_photos.bi_id = waz_biens.bi_id');
$query = $this->db->get();
return $query->num_rows();
}



public function get_ventes_records($limit, $start) 
{
$this->db->limit($limit, $start);  
$this->db->where('an_offre', 'V');
$this->db->where('an_est_active', '1');
$this->db->from('waz_annonces','waz_biens','waz_photos');
$this->db->join('waz_biens', 'waz_annonces.bi_id = waz_biens.bi_id');
$this->db->join('waz_photos', 'waz_photos.bi_id = waz_biens.bi_id');
$query = $this->db->get();

if ($query->num_rows() > 0) 
{
    foreach ($query->result() as $row) 
    {
        $data[] = $row;
    }
        
    return $data;
}

return false;
}


public function get_total_ventes() 
{       
    $this->db->where('an_offre', 'V');
    $this->db->where('an_est_active', '1');
    $this->db->from('waz_annonces','waz_biens','waz_photos');
    $this->db->join('waz_biens', 'waz_annonces.bi_id = waz_biens.bi_id');
    $this->db->join('waz_photos', 'waz_photos.bi_id = waz_biens.bi_id');
    $query = $this->db->get();
    return $query->num_rows();
}

    public function Detail($an_id)
    {
        // Chargement de la librairie 'database'
        $this->load->database();

        // Exécute la requête
        //1 annonce
        $Resultat1 = $this->db->query("SELECT *
        FROM waz_annonces,waz_biens,waz_photos
        WHERE an_id = '$an_id' AND an_est_active='1' AND  waz_annonces.an_id=waz_biens.bi_id AND waz_photos.bi_id=waz_biens.bi_id");
        // Récupération des résultats
        $DetailsAnnonce = $Resultat1->result();

        //option de l'annonce
        $Resultat2 = $this->db->query("SELECT waz_biens.bi_id,opt_libelle
        FROM waz_biens,waz_options, waz_composer,waz_annonces
        WHERE waz_annonces.an_id='$an_id' AND an_est_active='1' AND waz_biens.bi_id=waz_annonces.bi_id
        AND waz_biens.bi_id=waz_composer.bi_id AND waz_composer.opt_id=waz_options.opt_id
        ");

        // Récupération des résultats
        $OptionsAnnonces = $Resultat2->result();

        //nbre de vue d'une annonce
        $AjoutVue = $this->db->query("SELECT an_nbre_vues
                FROM waz_annonces
                WHERE waz_annonces.an_id='$an_id' 
                ");

        // Récupération des résultats
        $AjoutVue = $AjoutVue->result();
        //compter le nombre de vue d'une annonce
        foreach ($AjoutVue as $row) {$NombVues = $row->an_nbre_vues;}
        $NombVues = $NombVues + 1;
        $data["an_nbre_vues"] = $NombVues;
        $this->db->update("waz_annonces", $data, "an_id = $an_id");


        $return['DetailsAnnonce'] = $DetailsAnnonce;
        $return['OptionsAnnonces'] = $OptionsAnnonces;
        $return['AjoutVue'] = $AjoutVue;
        return $return;

    }

}
