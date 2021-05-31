<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function DetailInt ($Login)
    {
        //Charge la librairie 'database'
        $this->load->database();
        $DetailsInternaute = $this->db->query("SELECT *
                                                FROM waz_internautes
                                                WHERE in_email='$Login'");
        $Details = $DetailsInternaute->result();
        return $Details;
    }

    public function DetailEmp ($Login)
    {
        //Charge la librairie 'database'
        $this->load->database();
        $DetailsEmploye = $this->db->query("SELECT *
                                            FROM waz_employes
                                            WHERE emp_mail='$Login'");
        $Details = $DetailsEmploye->result();
        return $Details;
    }
}