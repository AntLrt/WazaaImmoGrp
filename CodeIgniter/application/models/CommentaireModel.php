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

    public function get_comms_records($limit, $start) 
{
    $this->db->limit($limit, $start);  
    $this->db->from('waz_commentaire','waz_internautes');
    $this->db->join('waz_internautes', 'waz_internautes.in_id = waz_commentaire.in_id');
    $this->db->order_by('com_date_ajout', 'DESC');
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

public function get_comms_records_NoteC($limit, $start) 
{
    $this->db->limit($limit, $start);  
    $this->db->from('waz_commentaire','waz_internautes');
    $this->db->join('waz_internautes', 'waz_internautes.in_id = waz_commentaire.in_id');
    $this->db->order_by('com_notes', 'ASC');
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

public function get_comms_records_NoteD($limit, $start) 
{
    $this->db->limit($limit, $start);  
    $this->db->from('waz_commentaire','waz_internautes');
    $this->db->join('waz_internautes', 'waz_internautes.in_id = waz_commentaire.in_id');
    $this->db->order_by('com_notes', 'DESC');
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

public function get_comms_records_DateC($limit, $start) 
{
    $this->db->limit($limit, $start);  
    $this->db->from('waz_commentaire','waz_internautes');
    $this->db->join('waz_internautes', 'waz_internautes.in_id = waz_commentaire.in_id');
    $this->db->order_by('com_notes', 'ASC');
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


public function get_total_comms() 
{       
$this->db->from('waz_commentaire','waz_internautes');
$this->db->join('waz_internautes', 'waz_internautes.in_id = waz_commentaire.in_id');
$this->db->order_by('com_date_ajout', 'DESC');
$query = $this->db->get();
return $query->num_rows();
}



}