<?php
mysql_connect("localhost", "root");
mysql_select_db("waz_immo");

$_POST = array_map('mysql_real_escape_string', $_POST);
$nom = $_POST['nom'];
$mot_de_passe = $_POST['mot_de_passe'];
$email = $_POST['email'];
// On récupère les $_POST et on en fait des variables


$requete = "INSERT INTO formulaire VALUES('', '". $nom ."', '". $mot_de_passe ."', 0, ". $date_actuelle .", '". $email ."')";
$resultat = mysql_query($requete) or die('ERREUR SQL : '. $requete . mysql_error()); // On exécute la requête
echo 'Requête exécutée.';