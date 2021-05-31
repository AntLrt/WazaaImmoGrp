<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


class CommentaireModel extends CI_Model
{
    public function TopCommentaire ()
    {
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
       //$aView["TopCom"] = $Comm1;
       return $Comm1;

    }
    public function PireCommentaire ()
    {
        // Chargement de la librairie 'database'
        $this->load->database();
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
        return $Comm2;

    }

    public function CommentairesAll ()
    {
        // Chargement de la librairie 'database'
        $this->load->database();

        //Partie pour voir les commentaires////

         //Exécute la requête
        $results = $this->db->query("SELECT *
                                     FROM waz_commentaire,waz_internautes
                                     WHERE waz_commentaire.in_id=waz_internautes.in_id
                                     ");
        // Récupération des résultats
        $Comms = $results->result();
        return $Comms;
    }

    public function CommentaireInserer ()
    {
        $Commentaire = $_POST['Commentaire'];
        $Note = $_POST['Note'];

        //$this->load->database();
        //A changer selon id connexion
        $data["com_avis"] = $Commentaire;
        $data["com_notes"] = $Note;
        // Chargement de la librairie 'database'
        $this->load->database();
        $this->db->insert('waz_commentaire', $data);

    }



}