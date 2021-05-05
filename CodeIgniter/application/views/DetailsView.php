<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Wazaa - Détails</title>
</head>
<body>

<a href="http://localhost/ci/index.php/AccueilController/Accueil">Accueil</a><br>
<a href="http://localhost/ci/index.php/AnnoncesController/Loca">Locations</a><br>
<a href="http://localhost/ci/index.php/AnnoncesController/Ventes">Ventes</a><br>
<a href="http://localhost/ci/index.php/EmployesController/PageNous">Nous</a><br>
<a href="http://localhost/ci/index.php/AuthentificationController/DetailsCompte">Votre compte</a><br>

<?php if($this->session->role != "Employe"){
    echo "<a href='http://localhost/ci/index.php/ContactController/Formulaire'>Contact</a><br>";}?>

<?php if($this->session->role == "Employe"){
echo "<a href='http://localhost/ci/index.php/BiensController/ListeBiens'>ListeBiens(admin)</a><br>
<a href='http://localhost/ci/index.php/MembresController/ListeMembres'>ListeMembres(admin)</a><br>
<a href='http://localhost/ci/index.php/ContactController/ListeContact'>ListeContact(admin)</a><br>
<a href='http://localhost/ci/index.php/EmployesController/ListeEmployes'>ListeEmployes(admin)</a><br><br>";}?>

<?php if(isset($this->session->login)){
echo "Bonjour, ".$this->session->role.", ".$this->session->nom.", ".$this->session->prenom;

echo "<form action='http://localhost/ci/index.php/AuthentificationController/Deconnexion' method='post'>";

echo "<button type='submit' class='btn btn-dark'>Deconnexion</button>";
}
else{
echo "<a href='http://localhost/ci/index.php/AuthentificationController/login'>Connexion</a><br>";
}?>

<h1>Détails de l'annonce</h1>

<div class="row">
<div class="col-12">    
<?php 
foreach ($details as $row) 
{
$NomPhoto = $row->pho_nom;
echo "<img src=http://localhost/ci//assets/images/".$NomPhoto.".jpg width='150' height='100'>";

echo "<p>".$row->an_id; 
echo $row->an_prix;
echo $row->an_ref;
echo $row->an_offre;
echo $row->bi_type;
echo $row->bi_local;
echo $row->an_titre." </p><br>";    

}
?>
</div>
</div>




</body>
</html>