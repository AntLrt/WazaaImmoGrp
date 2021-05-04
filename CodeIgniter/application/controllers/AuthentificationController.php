<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthentificationController extends CI_Controller {

        public function ajouter()
        {
           // Chargement des assistants 'form' et 'url'
           $this->load->helper('form', 'url'); 
    
           // Chargement de la librairie 'database'
           $this->load->database(); 
    
           // Chargement de la librairie form_validation
           $this->load->library('form_validation'); 
    
            

           if ($this->input->post()) 
           { // 2ème appel de la page: traitement du formulaire
    
                $data = $this->input->post();

                
                 // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
                
                
                 $config = array(
                        array(
                                'field' => 'in_nom',
                                'label' => 'Nom',
                                'rules' => 'required'
                        )
                        );
                
                
                
                $this->form_validation->set_rules($config);
                $this->form_validation->set_rules("in_prenom", "prénom", "required|max_length[15]", array("required" => "Le %s doit être obligatoire.","max_length" => "Le %s doit avoir une longueur maximum de 15 caractères !"));
                $this->form_validation->set_rules("in_telephone", "Téléphone", array('required', 'min_length[10]', 'max_length[10]', 'callback_tel_check')); 
                $this->form_validation->set_rules('in_email', 'Email', 'trim|required|valid_email',); 
                
                $config = array(
                        array(
                                'field' => 'in_adresse',
                                'label' => 'Adresse',
                                'rules' => 'required'
                        )
                        );
               
                

                
                
                if ($this->form_validation->run() == FALSE)
                { // Echec de la validation, on réaffiche la vue formulaire 
        
                      $this->load->view('ajouter');
                }
                else
                { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
               
               
               
               
               
                $this->db->insert('waz_internautes', $data);
    
                $this->load->view('congratz');
           } 
        }
           else 
           { // 1er appel de la page: affichage du formulaire
               $this->load->view('ajouter');
           }
        } // -- ajouter()

public function tel_check($str)
{
        if ($str == '0610531272')
        {
                $this->form_validation->set_message('tel_check', 'Le {field} est déjà enregistrée ! :( ');
                return FALSE;
        }
        else
        {
                return TRUE;
        }
}
}