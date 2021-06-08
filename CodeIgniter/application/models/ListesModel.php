<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListesModel extends CI_Model
{
    public function ListeBiens0 ()
    {
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $results0 = $this->db->query("SELECT waz_biens.bi_id, bi_type, bi_pieces,
        bi_ref,bi_description, bi_local,
        bi_surf_habitable, bi_surf_totale,
        bi_estimation_vente,
        bi_estimation_location,
        bi_diagnostic
        FROM waz_biens,waz_annonces
        WHERE waz_biens.bi_id=waz_annonces.bi_id");

        $results0 = $results0->result();
        return $results0;
    }

    public function ListeBiens1 ()
    {
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $results1 = $this->db->query("SELECT *
                                        FROM waz_biens
                                        WHERE waz_biens.bi_id NOT IN (SELECT waz_biens.bi_id
                                                                    FROM waz_biens,waz_annonces
                                                                    WHERE waz_annonces.bi_id=waz_biens.bi_id)");

        $results1 = $results1->result();
        return $results1;
    }

    public function ListeBiensID ($biid)
    {
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $results1 = $this->db->query("SELECT bi_id, bi_type, bi_pieces,
                                    bi_ref,bi_description, bi_local,
                                    bi_surf_habitable, bi_surf_totale,
                                    bi_estimation_vente,
                                    bi_estimation_location,
                                    bi_diagnostic
                                    FROM waz_biens
                                    WHERE waz_biens.bi_id='$biid'");

        $results1 = $results1->result();
        return $results1;
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


    function ModifBiens ()
    {    
        $biid = $this->input->post("biid");
        $type = $this->input->post("type");
        $pieces = $this->input->post("pieces");
        $ref = $this->input->post("ref");
        $description = $this->input->post("description");
        $ville = $this->input->post("ville");
        $surfacehabitable = $this->input->post("surfacehabitable");
        $surfacetotale = $this->input->post("surfacetotale");
        $estimvente = $this->input->post("estimvente");
        $estimloca = $this->input->post("estimloca");
        $diagnostic = $this->input->post("diagnostic");

        // Chargement de la librairie 'database'
        $this->load->database();

        $data2 = array($type,$pieces,$ref,$description,$ville,$surfacehabitable,$surfacetotale,$estimvente,$estimloca,$diagnostic,$biid);

        $this->db->query('update waz_biens set bi_type=?, 
        bi_pieces=?, 
        bi_ref=?,
        bi_description=?, 
        bi_local=?, 
        bi_surf_habitable=?,
        bi_surf_totale=?,
        bi_estimation_vente=?,
        bi_estimation_location=?,
        bi_diagnostic=?
        where bi_id=?', $data2);

    }

    function SupressionBien ($biid)
    {
        // Chargement de la librairie 'database'
        $this->load->database();

        //Supression du bien et de toutes les données associés
        $this->db->query('delete from waz_biens where bi_id=?', $biid);

        $this->db->query('delete from waz_annonces where bi_id=?', $biid);

        $this->db->query('delete from waz_composer where bi_id=?', $biid);

        $this->db->query('delete from waz_photos where bi_id=?', $biid);




    }
}