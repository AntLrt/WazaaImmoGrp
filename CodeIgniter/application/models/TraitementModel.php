<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class TraitementModel extends CI_Model
{
    function TraitementMessage ($empid, $intid)
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        $data = array(1, "$intid", "$empid");
        $this->db->query('update waz_contacter set co_est_traite=? where in_id=? and emp_id=?', $data);
    }

}