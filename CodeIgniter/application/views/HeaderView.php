<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Wazaa Immo</title>
</head>
<body>

<a href="<?= site_url("AccueilController/Accueil")?>">Accueil</a><br>
<a href="<?= site_url("AnnoncesController/Loca")?>">Locations</a><br>
<a href="<?= site_url("AnnoncesController/Ventes")?>">Ventes</a><br>
<a href="<?= site_url("EmployesController/PageNous")?>">Nous</a><br>

<?php if($this->session->role == "Employe" || $this->session->role == "Internaute"){
$url=site_url("AuthentificationController/DetailsCompte");
echo "<a href='$url'>Détails du compte</a><br>";
}?>


<?php if($this->session->role != "Employe"){
$url=site_url("ContactController/Formulaire");
echo "<a href='$url'>Contact</a><br>";}?>

<?php if($this->session->role != "Employe" && $this->session->role != "Internaute"){
$url=site_url("AuthentificationController/Inscription");
echo "<a href='$url'>Inscription</a><br>";}?>

<?php if($this->session->role == "Employe"){
$url1=site_url("BiensController/ListeBiens");
$url2=site_url("MembresController/ListeMembres");
$url3=site_url("ContactController/ListeContact");
$url4=site_url("EmployesController/ListeEmployes");

echo "<a href='$url1'>ListeBiens(admin)</a><br>
<a href='$url2'>ListeMembres(admin)</a><br>
<a href='$url3'>ListeContact(admin)</a><br>
<a href='$url4'>ListeEmployes(admin)</a><br><br>";}?>

<?php if(isset($this->session->login)){
echo "Bonjour, ".$this->session->role.", ".$this->session->nom.", ".$this->session->prenom;

$url=site_url("AuthentificationController/Deconnexion");
echo "<form action='$url' method='post'>";

echo "<button type='submit' class='btn btn-dark'>Deconnexion</button>";

echo "</form>";
}
else{
$url=site_url("AuthentificationController/login");
echo "<a href='$url'>Connexion</a><br>";
}?>

<br>

<?php if(!empty($RefusAcces)){echo $RefusAcces;}?>