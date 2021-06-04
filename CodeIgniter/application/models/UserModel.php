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

    public function DetailInternauteID ($id)
    {
        //Charge la librairie 'database'
        $this->load->database();
        $DetailsInternaute = $this->db->query("SELECT *
                                                FROM waz_internautes
                                                WHERE in_id='$id'");
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
    
    function ModifiDetailsEmployes ($id,$adresse,$telephone,$email,$mdp)
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        $data = array($adresse,$telephone,$email,$mdp,$id);
        $this->db->query('update waz_employes set emp_adresse=?, emp_tel=?, emp_mail=?, emp_mdp=? where emp_id=?', $data);
        $this->session->set_userdata('login', "$email");
    }

    function ModifiDetailsInternautes ($id,$adresse,$telephone,$email,$mdp,$pays)
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        $data = array($adresse,$telephone,$email,$mdp,$pays,$id);
        $this->db->query('update waz_internautes set in_adresse=?, in_telephone=?, in_email=?, in_mdp=?, in_pays=? where in_id=?', $data);
        $this->session->set_userdata('login', "$email");
    }

    function SupressionInternaute ($id)
    {
        // Chargement de la librairie 'database'
        $this->load->database();

        //Supression du compte membre et de toutes les données associés
        $this->db->query('delete from waz_internautes where in_id=?', $id);
        $this->db->query('delete from histo_negocier where in_id=?', $id);
        $this->db->query('delete from waz_commentaire where in_id=?', $id);
        $this->db->query('delete from waz_contacter where in_id=?', $id);
        $this->db->query('delete from waz_enregistrer where in_id=?', $id);
        $this->db->query('delete from waz_negocier where in_id=?', $id);





    }
}