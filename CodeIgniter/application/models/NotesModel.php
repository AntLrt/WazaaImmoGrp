<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class NotesModel extends CI_Model
{
    public function Notes()
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        $MoyenneNotes = $this->db->query("SELECT ROUND(AVG(com_notes),1) AS 'Moyenne'
                                                FROM waz_commentaire
                                                ;");

        // Récupération des résultats
        $MoyenneNotes = $MoyenneNotes->result();
        return $MoyenneNotes;
    }
}