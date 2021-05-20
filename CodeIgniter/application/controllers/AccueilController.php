<?php

//meilleurs annonces en slider + Commentaire sur l'entreprise

defined('BASEPATH') or exit('No direct script access allowed');

class AccueilController extends CI_Controller
{
    public function Accueil()
    {
        $pageretour = "";
        //afficher aide au debug
        $this->output->enable_profiler(true);

        // Chargement des assistants 'form' et 'url'
        $this->load->helper('form', 'url');

        // Chargement de la librairie 'database'
        $this->load->database();

        // Chargement de la librairie form_validation
        $this->load->library('form_validation');

        if ($this->input->post()) { // 2ème appel de la page: traitement du formulaire

            $data = $this->input->post();

            // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
            $this->form_validation->set_rules("Type", "Type", "required");

            if ($this->form_validation->run() == false) { // Echec de la validation, on réaffiche la vue formulaire
                echo "<script type='text/javascript'>
                    window.alert('Merci de préciser le type de bien recherché')
                    </script>";
                //afficher aide au debug
                $this->output->enable_profiler(true);

                // nouveau code

                //chargement du modèle 'CommentaireModel' pour le top commentaire
                $this->load->model('CommentaireModel');
                $Comm1 = $this->CommentaireModel->TopCommentaire();
                $aView["TopCom"] = $Comm1;

                //chargement du modèle 'CommentaireModel' pour le pire commentaire
                $this->load->model('CommentaireModel');
                $Comm2 = $this->CommentaireModel->PireCommentaire();
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                $aView["PirCom"] = $Comm2;

                ////Partie pour les images////

                $this->load->model('AnnonceModel');
                $vues = $this->AnnonceModel->Vues();
                $aView['anid'] = $vues;


                ////Moyenne note des clients

                $this->load->model('NotesModel');
                $MoyenneNotes = $this->NotesModel->Notes();
                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                $aView["MoyenneNotes"] = $MoyenneNotes;

                //  charger la view
                $pageretour = 'PageAccueilView';

            } else {

                if (isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation'])) && (is_null($_POST['Ville']) || empty($_POST['Ville']))) {

                    //recherche par type
                    $this->load->model('BarreRechercheModel');
                    $aListe = $this->BarreRechercheModel->BarreRecherche1();
                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                    $aView["liste_produits"] = $aListe;

                    //var_dump($aView);
                    echo "1er cas : type renseigné, type operation et ville vide";

//                    $this->load->view('HeaderView');
//                    $this->load->view('PageResultatRechercheView', $aView);
                    $pageretour = 'PageResultatRechercheView';

                } else if (isset($_POST['Ville']) && isset($_POST['Type']) && (is_null($_POST['Operation']) || empty($_POST['Operation']))) {
                    //recherche par type et ville
                    $this->load->model('BarreRechercheModel');
                    $aListe = $this->BarreRechercheModel->BarreRecherche2();

                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                    $aView["liste_produits"] = $aListe;

                    //var_dump($aView);
                    echo "2eme cas : type et ville renseigné, type operation vide";

//                    $this->load->view('HeaderView');
//                    $this->load->view('PageResultatRechercheView', $aView);
                    $pageretour = 'PageResultatRechercheView';

                } else if (isset($_POST['Operation']) && isset($_POST['Type']) && (is_null($_POST['Ville']) || empty($_POST['Ville']))) {
                    //recherche par type et operation

                    $this->load->model('BarreRechercheModel');
                    $aListe = $this->BarreRechercheModel->BarreRecherche3();
                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                    $aView["liste_produits"] = $aListe;

                    //var_dump($aView);

                    echo "3eme cas : Operation et type renseigné, ville vide";

                    //    $this->load->view('HeaderView');
                    //   $this->load->view('PageResultatRechercheView', $aView);
                    $pageretour = 'PageResultatRechercheView';

                } else if (isset($_POST['Operation']) && isset($_POST['Type']) && isset($_POST['Ville'])) {
                    //recherche par type ,ville, operation
                    $this->load->model('BarreRechercheModel');
                    $aListe = $this->BarreRechercheModel->BarreRecherche4();
                    // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                    $aView["liste_produits"] = $aListe;

                    //var_dump($aView);
                    echo "4eme cas : tout est renseigné";

                    //   $this->load->view('HeaderView');
                    //  $this->load->view('PageResultatRechercheView', $aView);
                    $pageretour = 'PageResultatRechercheView';

                }

            }
        } else { // 1er appel de la page: affichage du formulaire

            //afficher aide au debug
            $this->output->enable_profiler(true);

            ////Partie pour voir les commentaires////

            $this->load->model('CommentaireModel');

            $Comm1 = $this->CommentaireModel->TopCommentaire();
            $aView["TopCom"] = $Comm1;

            //chargement du modèle 'CommentaireModel' pour le pire commentaire
            $this->load->model('CommentaireModel');
            $Comm2 = $this->CommentaireModel->PireCommentaire();
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["PirCom"] = $Comm2;

            ////Partie pour les images////


             $this->load->model('AnnonceModel');
             $vues = $this->AnnonceModel->Vues();
             $aView['anid'] = $vues;



            ////Moyenne note des clients

            $this->load->model('NotesModel');
            $MoyenneNotes = $this->NotesModel->Notes();
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
            $aView["MoyenneNotes"] = $MoyenneNotes;

            // $this->load->view('HeaderView');
            //  $this->load->view('PageAccueilView', $aView);
            $pageretour = 'PageAccueilView';
        }
         $this->load->view('HeaderView');
          $this->load->view($pageretour, $aView);

    }

}
