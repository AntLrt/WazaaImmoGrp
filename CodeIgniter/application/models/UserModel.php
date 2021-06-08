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

    public function Favoris ($id)
    {
        //Charge la librairie 'database'
        $this->load->database();
        $FavInt = $this->db->query("SELECT *
                                    FROM waz_internautes,waz_annonces,waz_photos,waz_biens,waz_favoriser
                                    WHERE waz_internautes.in_id='$id'
                                    AND an_est_active = 1
                                    AND waz_annonces.an_id=waz_favoriser.an_id
                                    AND waz_internautes.in_id=waz_favoriser.in_id
                                    AND waz_annonces.bi_id=waz_biens.bi_id
                                    AND waz_photos.bi_id=waz_biens.bi_id"
                                    );
        $FavInt = $FavInt->result();
        return $FavInt;
    }

    public function EstCeFav ($intid,$anid)
    {
        //Charge la librairie 'database'
        $this->load->database();


        $estellefav = $this->db->query("SELECT *
                                        FROM waz_internautes,waz_favoriser,waz_annonces
                                        WHERE waz_internautes.in_id='$intid'
                                        AND waz_annonces.an_id='$anid'
                                        AND an_est_active = 1
                                        AND waz_annonces.an_id=waz_favoriser.an_id
                                        AND waz_internautes.in_id=waz_favoriser.in_id"
                                        );
        $estellefav = $estellefav->result();
        return $estellefav;
    }

    function EnleverFavoris ($inid,$anid)
    {
        // Chargement de la librairie 'database'
        $this->load->database();

        //Supression du favoris
        $this->db->where('an_id', $anid);
        $this->db->where('in_id', $inid);
        $this->db->delete("waz_favoriser");
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

    public function DetailEmployeID ($id)
    {
        //Charge la librairie 'database'
        $this->load->database();
        $DetailsEmployes = $this->db->query("SELECT *
                                                FROM waz_employes
                                                WHERE emp_id='$id'");
        $Details = $DetailsEmployes->result();
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
    
    function ModifiDetailsEmployes ($id,$nom,$prenom,$adresse,$telephone,$email,$poste)
    {
        // Chargement de la librairie 'database'
        $this->load->database();
        $data = array($nom,$prenom,$adresse,$telephone,$email,$poste,$id);
        $this->db->query('update waz_employes set emp_nom=?, emp_prenom=?, emp_adresse=?, emp_tel=?, emp_mail=?, emp_poste=? where emp_id=?', $data);
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
    function SupressionEmploye ($id)
    {
        // Chargement de la librairie 'database'
        $this->load->database();

        //Supression du compte membre et de toutes les données associés
        $this->db->query('delete from waz_employes where emp_id=?', $id);
        
        





    }
    public function AjoutEmploye ()
    {
        

                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $tel = $_POST['tel'];
                $mail = $_POST['mail'];
                $poste = $_POST['poste'];
                $mdp = $_POST['mdp'];

                $mdpcrypt = password_hash("$mdp", PASSWORD_DEFAULT);

        $tableau = array('emp_nom'=>$nom,
            'emp_prenom'=>$prenom,
            'emp_adresse'=>$adresse,
            'emp_tel'=>$tel,
            'emp_mail'=>$mail,
            'emp_mdp'=>$mdpcrypt,
            'emp_poste'=>$poste);
        
            $this->db->insert('waz_employes', $tableau);
    
        


    }

    public function AjoutFavoris ($anid,$inid)
    {
        $tableau1 = array('in_id'=>$inid,
        'an_id'=>$anid);
        
        $this->db->insert('waz_favoriser', $tableau1);

    }


    public function AjoutBien ()
    {
        

                $type = $_POST['type'];
                $pieces = $_POST['pieces'];
                $ref = $_POST['ref'];
                $description = $_POST['description'];
                $ville = $_POST['ville'];
                $surfacehabitable = $_POST['surfacehabitable'];
                $surfacetotale = $_POST['surfacetotale'];
                $estimvente = $_POST['estimvente'];
                $estimloca = $_POST['estimloca'];
                $diagnostic = $_POST['diagnostic'];


        $tableau = array('bi_type'=>$type,
            'bi_pieces'=>$pieces,
            'bi_ref'=>$ref,
            'bi_description'=>$description,
            'bi_local'=>$ville,
            'bi_surf_habitable'=>$surfacehabitable,
            'bi_surf_totale'=>$surfacetotale,
            'bi_estimation_vente'=>$estimvente,
            'bi_estimation_location'=>$estimloca,
            'bi_diagnostic'=>$diagnostic);
        
            $this->db->insert('waz_biens', $tableau);
    
        


    }
}