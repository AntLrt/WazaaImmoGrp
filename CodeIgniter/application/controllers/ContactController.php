<?php
//formulaire de contact + contact recu

defined('BASEPATH') or exit('No direct script access allowed');

class ContactController extends CI_Controller
{

    public function ListeContact()
    {
        if ($this->session->role == "Employe") {

            //afficher aide au debug
            $this->output->enable_profiler(false);

            // Prépare le tableau
            $this->load->library('table');

            // Charge la librairie 'database'
            //            $this->load->database();
            //
            //// Exécute la requête
            //            $results = $this->db->query("SELECT waz_contacter.in_id AS 'ID internaute',co_date_ajout AS 'Date envoi du formulaire contact', in_email AS 'Email internaute', co_sujet AS 'Sujet', co_question AS 'Question'
            //FROM waz_contacter,waz_internautes
            //WHERE waz_contacter.in_id=waz_internautes.in_id
            //ORDER BY co_date_ajout
            //");

            //chargement du model
            $this->load->model('ListesModel');
            $results = $this->ListesModel->ListeContacts ();
            // Changement test commit
            // Forme du tableau
            $template = array(
                'table_open' => '<table border="2" cellpadding="5" cellspacing="2" class="mytable">',
            );

            $this->table->set_template($template);
            $tab = $this->table->generate($results);

// Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["liste_contact"] = $tab;

// Appel de la vue avec transmission du tableau
            $this->load->view('HeaderView');
            $this->load->view('ListeContactView', $aView);
            $this->load->view('FooterView');

        } else {
            $Erreur = "Vous n'avez pas accés à cette page !";
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["RefusAcces"] = $Erreur;

            $this->load->view('Headerview', $aView);
            $this->load->view('FooterView');
        }
    }

    public function Formulaire()
    {if ($this->session->role == "Internaute") {
        //afficher aide au debug
        $this->output->enable_profiler(false);

        // Chargement des assistants 'form' et 'url'
        $this->load->helper('form', 'url');

        // Chargement de la librairie 'database'
        $this->load->database();

        // Chargement de la librairie form_validation
        $this->load->library('form_validation');

        if ($this->input->post()) { // 2ème appel de la page: traitement du formulaire

            // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
            $this->form_validation->set_rules("Demande", "Demande", "required");

            if ($this->form_validation->run() == false) { // Echec de la validation, on réaffiche la vue formulaire
                echo "<script type='text/javascript'>
                window.alert('Merci de préciser la demande')
                </script>";
                $this->load->view('HeaderView');
                $this->load->view('FormulaireContactView');
                $this->load->view('FooterView');
            } else {
                $Sujet = $_POST['Sujet'];
                $Demande = $_POST['Demande'];

                $this->load->database();
                $data["emp_id"] = 10;
                $data["in_id"] = $this->session->ID;
                $data["co_sujet"] = $Sujet;
                $data["co_question"] = $Demande;
                //////Date avec bon fuseau horaire
                // first line of PHP
                $defaultTimeZone = 'UTC';
                if (date_default_timezone_get() != $defaultTimeZone) {
                    date_default_timezone_set($defaultTimeZone);
                }

                // somewhere in the code
                function _date($format = "r", $timestamp = false, $timezone = false)
                    {
                    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
                    $gmtTimezone = new DateTimeZone('GMT');
                    $myDateTime = new DateTime(($timestamp != false ? date("r", (int) $timestamp) : date("r")), $gmtTimezone);
                    $offset = $userTimezone->getOffset($myDateTime);
                    return date($format, ($timestamp != false ? (int) $timestamp : $myDateTime->format('U')) + $offset);
                }
                /* Example */
                $Date = _date("Y-m-d H:i:s", false, 'Europe/Belgrade');
                $data["co_date_ajout"] = $Date;
                $this->db->insert('waz_contacter', $data);
                $this->load->view('HeaderView');
                $this->load->view('FormulaireContactEnvoyeView');
                $this->load->view('FooterView');
            }

        } else { $this->load->view('HeaderView');
            $this->load->view('FormulaireContactView');
            $this->load->view('FooterView');};
    } else {
        $Erreur = "Vous devez être connecté pour avoir accés à cette page !";
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["RefusAcces"] = $Erreur;

        $this->load->view('Headerview', $aView);
        $this->load->view('FooterView');
    }

    }
}
