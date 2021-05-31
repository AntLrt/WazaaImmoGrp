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

    public function ListeContacts ()
    {
        // Prépare le tableau
        $this->load->library('table');

        // Charge la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results = $this->db->query("SELECT waz_contacter.in_id AS 'ID internaute',
                                     co_date_ajout AS 'Date envoi du formulaire contact',
                                     in_email AS 'Email internaute', co_sujet AS 'Sujet', 
                                     co_question AS 'Question'
                                     FROM waz_contacter,waz_internautes
                                     WHERE waz_contacter.in_id=waz_internautes.in_id
                                     ORDER BY co_date_ajout
                                     ");
        return $results;

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
        // Prépare le tableau
        $this->load->library('table');
        // Charge la librairie 'database'
        $this->load->database();
        // Exécute la requête
        $results = $this->db->query("SELECT emp_id AS 'ID', emp_poste AS 'Poste', emp_nom AS 'Nom',
                                     emp_prenom AS 'Prénom', emp_adresse AS 'Adresse', emp_tel AS 'Téléphone',
                                     emp_mail AS 'Email'
                                     FROM waz_employes");
        return $results;
    }

    public function DetailCompte ()
    {
        // Prépare le tableau
//        $this->load->library('table');
//        // Charge la librairie 'database'
//        $this->load->database();
//        $DetailsEmploye = $this->db->query("SELECT *
//                                            FROM waz_employes
//                                            WHERE emp_mail='$Login'");
//        $Details = $DetailsEmploye->result();
//        return $Details;
    }
}