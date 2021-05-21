<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class BarreRechercheModel extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }


    public function get_recherche_records($limit, $start) 
    {
        if (isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation'])) && (is_null($_POST['Ville']) || empty($_POST['Ville']))) 
        {
            $Type = $this->input->post("Type");
            $this->db->limit($limit, $start);
            $this->db->where('bi_type', $Type);
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
        
        else if (isset($_POST['Ville']) && isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation']))) 
        {
            $Type = $this->input->post("Type");
            $Ville = $this->input->post("Ville");
            $this->db->limit($limit, $start);
            $this->db->where('bi_type', $Type);
            $this->db->where('bi_local', $Ville);
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
    
        else if ( isset($_POST['Ville']) && isset($_POST['Type']) && isset($_POST['Operation']) ) 
        {
            $Type = $this->input->post("Type");
            $Ville = $this->input->post("Ville");
            $Operation = $this->input->post("Operation");
    
            $this->db->where('bi_type', $Type);
            $this->db->where('bi_local', $Ville);
            $this->db->where('an_offre', $Operation);
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
        
    }
    
    
    
    
    public function get_total_recherche() 
    {      
        if (isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation'])) && (is_null($_POST['Ville']) || empty($_POST['Ville']))) 
        {
    
            $Type = $this->input->post("Type");
    
            $this->db->where('bi_type', $Type);
            $this->db->from('waz_annonces','waz_biens','waz_photos');
            $this->db->join('waz_biens', 'waz_annonces.bi_id = waz_biens.bi_id');
            $this->db->join('waz_photos', 'waz_photos.bi_id = waz_biens.bi_id');
            $query = $this->db->get();
    
            return $query->num_rows();
        }
    
        else if (isset($_POST['Ville']) && isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation']))) 
        {
            $Type = $this->input->post("Type");
            $Ville = $this->input->post("Ville");
    
            $this->db->where('bi_type', $Type);
            $this->db->where('bi_local', $Ville);
            $this->db->from('waz_annonces','waz_biens','waz_photos');
            $this->db->join('waz_biens', 'waz_annonces.bi_id = waz_biens.bi_id');
            $this->db->join('waz_photos', 'waz_photos.bi_id = waz_biens.bi_id');
            $query = $this->db->get();
    
            return $query->num_rows();
    
        }
    
        else if ( isset($_POST['Ville']) && isset($_POST['Type']) && isset($_POST['Operation']) ) 
        {
            $Type = $this->input->post("Type");
            $Ville = $this->input->post("Ville");
            $Operation = $this->input->post("Operation");
    
            $this->db->where('bi_type', $Type);
            $this->db->where('bi_local', $Ville);
            $this->db->where('an_offre', $Operation);
            $this->db->from('waz_annonces','waz_biens','waz_photos');
            $this->db->join('waz_biens', 'waz_annonces.bi_id = waz_biens.bi_id');
            $this->db->join('waz_photos', 'waz_photos.bi_id = waz_biens.bi_id');
            $query = $this->db->get();
    
            return $query->num_rows();
    
        }
    }
    
    
    
    
    
    public function Situation() 
    {      
        if (isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation'])) && (is_null($_POST['Ville']) || empty($_POST['Ville']))) 
        {
            $Situation = "Type renseigné. Ville et opération non.";
            return $Situation;
        }
    
        else if (isset($_POST['Ville']) && isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation']))) 
        {
            $Situation = "Type et Ville renseigné. Opération non.";
            return $Situation;
        }
    
        else if ( isset($_POST['Ville']) && isset($_POST['Type']) && isset($_POST['Operation']) ) 
        {
            $Situation = "Type, Ville et Opération renseigné.";
            return $Situation;
        }
    }
}


