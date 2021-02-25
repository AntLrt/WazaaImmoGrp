<?php

    $serveur = "localhost";
    $dbname = "waz_immo";
    $user = "root";
    $pass = "";
    
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $bdate = $_POST["bdate"];
    $sexe = $_POST["sexe"];
    $mail = $_POST["mail"];
    $mp = $_POST["mp"];

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //INSERTION DES DONNEES SAISIES DANS LA TABLE

            //On connecte le formulaire a la table avec INSERT INTO suivi du nom de la table, on defini quelle valeur sera envoyée dans quelle collonne ex: prenom sera envoyé dans test_prenom
            if (!empty($prenom) && !empty($nom) && !empty($sexe) && !empty($bdate) && !empty($mail) && !empty($mp))
            {
            $sth = $dbco->prepare("INSERT INTO inscription( inscr_prenom, inscr_nom, inscr_civilite, inscr_date, inscr_mail, inscr_mp)
            VALUES(:prenom, :nom, :sexe, :bdate, :mail, :mp)");
                
                //Requetes pour lier les colonnes aux valeurs
                $sth->bindParam(':prenom',$prenom);
                $sth->bindParam(':nom',$nom);
                $sth->bindParam(':sexe',$sexe);
                $sth->bindParam(':bdate' ,$bdate);
                $sth->bindParam(':mail' ,$mail);
                $sth->bindParam(':mp' ,$mp);
                        $sth->execute();
            }
                        //on renvoie l'utilisateur a une page voulue
                        header("location:wazacceuil.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }