<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AuthentificationModel extends CI_Model
{
    public function AuthenEmp($LoginEmp,$MdpEmp)
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        // requete pour authentification des employes
        $resultsemp = $this->db->query("SELECT emp_nom,emp_prenom,emp_id
                                        FROM waz_employes
                                        WHERE emp_mail = '$LoginEmp' AND emp_mdp= '$MdpEmp'");
        // Récupération des résultats
        $RequeteEmploye = $resultsemp->result();
        return $RequeteEmploye;


    }
    public function AuthenINT($LoginInt,$MdpInt)
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $resultsint = $this->db->query("SELECT in_nom,in_prenom,in_id
                        FROM waz_internautes
                        WHERE in_email = '$LoginInt' AND in_mdp= '$MdpInt'");

        // Récupération des résultats
        $RequeteInternaute = $resultsint->result();
        return $RequeteInternaute;
    }

}