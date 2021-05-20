<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AnnonceModel extends CI_Model
{
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

}

