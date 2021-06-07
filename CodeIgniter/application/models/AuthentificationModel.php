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
        // requete pour authentification des internautes
        $resultsint = $this->db->query("SELECT in_nom,in_prenom,in_id
                        FROM waz_internautes
                        WHERE in_email = '$LoginInt' AND in_mdp= '$MdpInt'");
        // Récupération des résultats
        $RequeteInternaute = $resultsint->result();
        return $RequeteInternaute;
    }

    public function Inscription ()
    {
        $mail = $_POST['in_email'];

                $prenom = $_POST['in_prenom'];
                $nom = $_POST['in_nom'];
                $adresse = $_POST['in_adresse'];
                $telephone = $_POST['in_telephone'];
                $pays = $_POST['in_pays'];
                $password = $_POST['in_mdp'];

                $passwordcrypt = password_hash("$password", PASSWORD_DEFAULT);

        $tableau = array('in_nom'=>$nom,
            'in_prenom'=>$prenom,
            'in_adresse'=>$adresse,
            'in_telephone'=>$telephone,
            'in_email'=>$mail,
            'in_pays'=>$pays,
            'in_mdp'=>$passwordcrypt);

        // // $db      = \Config\Database::connect();
        // $query_builder = $this->db->table('waz_internautes');
        // $query_builder->insert($data);
        $this->db->insert('waz_internautes', $tableau);


    }

}