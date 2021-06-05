<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListesModel extends CI_Model
{
    public function ListeBiens ()
    {
        // Prépare le tableau
        $this->load->library('table');

        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $results = $this->db->query("SELECT bi_id AS 'ID', bi_type AS 'Type', bi_pieces AS 'Nb pieces',
                                    bi_ref AS 'Réference',bi_description AS 'Description', bi_local AS 'Localisation',
                                    bi_surf_habitable AS 'Surface habitable', bi_surf_totale AS 'Surface totale',
                                    bi_estimation_vente AS 'Estimation vente',
                                    bi_estimation_location AS 'Estimation location',
                                    bi_diagnostic AS 'Diagnostic énergetique' FROM waz_biens");
        return $results;
    }

    public function ListeContacts0 ()
    {
        // Charge la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results0 = $this->db->query("SELECT waz_contacter.in_id,
                                    co_date_ajout,
                                    in_email, co_sujet, 
                                    co_question, co_est_traite,emp_id
                                    FROM waz_contacter,waz_internautes
                                    WHERE waz_contacter.in_id=waz_internautes.in_id AND co_est_traite = '0'
                                    ORDER BY co_date_ajout
                                    ");
        $results0 = $results0->result();
        return $results0;
    }

    public function ListeContacts1 ()
    {
        // Charge la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results1 = $this->db->query("SELECT waz_contacter.in_id,
                                    co_date_ajout,
                                    in_email, co_sujet, 
                                    co_question, co_est_traite,emp_id
                                    FROM waz_contacter,waz_internautes
                                    WHERE waz_contacter.in_id=waz_internautes.in_id AND co_est_traite = '1'
                                    ORDER BY co_date_ajout
                                    ");
        $results1 = $results1->result();
        return $results1;
    }

    public function PosteDirecteur ()
    {
        // Prépare le tableau
        $this->load->library('table');
        // Charge la librairie 'database'
        $this->load->database();
        $results = $this->db->query("SELECT emp_nom AS 'Nom', emp_prenom AS 'Prénom', emp_mail AS 'Email'
                                    FROM waz_employes WHERE emp_poste = 'directeur'");
        return $results;

    }

    public function PosteSecretaire ()
    {
        // Prépare le tableau
        $this->load->library('table');
        // Charge la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results = $this->db->query("SELECT emp_nom AS 'Nom', emp_prenom AS 'Prénom', emp_mail AS 'Email'
                                    FROM waz_employes WHERE emp_poste = 'secretaire'");
        return $results;
    }

    public function NegociateurImmobilier ()
    {
        // Prépare le tableau
        $this->load->library('table');
        // Charge la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results = $this->db->query("SELECT emp_nom AS 'Nom', emp_prenom AS 'Prénom', emp_mail AS 'Email'
                                    FROM waz_employes WHERE emp_poste = 'negociateur immobilier'");
        return $results;
    }

    public function ListeEmployes ()
    {

        // Charge la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results = $this->db->query("SELECT emp_id, emp_poste, emp_nom,
                                    emp_prenom, emp_adresse, emp_tel,
                                    emp_mail
                                    FROM waz_employes");
                                    $results = $results->result();
        return $results;
    }

    public function ListeMembres ()
    {
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $results = $this->db->query("SELECT in_id, in_nom, in_prenom, in_adresse, in_telephone, in_email, in_pays
                                    FROM waz_internautes");
        $results = $results->result();
        return $results;
    }
}