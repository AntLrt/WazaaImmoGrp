<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Wazaa - Ventes</title>
</head>
<body>

<a href="http://localhost/ci/index.php/AccueilController/Accueil">Accueil</a><br>
<a href="http://localhost/ci/index.php/AnnoncesController/Loca">Locations</a><br>
<a href="http://localhost/ci/index.php/AnnoncesController/Ventes">Ventes</a><br>
<a href="http://localhost/ci/index.php/EmployesController/PageNous">Nous</a><br>
<a href="http://localhost/ci/index.php/MembresController/DetailsCompte">Votre compte</a><br>
<a href="http://localhost/ci/index.php/ContactController/Formulaire">Contact</a><br>
<a href="http://localhost/ci/index.php/BiensController/ListeBiens">ListeBiens(admin)</a><br>
<a href="http://localhost/ci/index.php/MembresController/ListeMembres">ListeMembres(admin)</a><br>
<a href="http://localhost/ci/index.php/ContactController/ListeContact">ListeContact(admin)</a><br>
<a href="http://localhost/ci/index.php/EmployesController/ListeEmployes">ListeEmployes(admin)</a><br><br>

<h1>Liste des ventes</h1>

<div class="row">
<div class="col-12">    
<?php 
foreach ($ventes as $row) 
{

$NomPhoto = $row->pho_nom;
echo "<img src=http://localhost/ci//assets/images/".$NomPhoto.".jpg width='150' height='100'>";

echo "<p>".$row->an_id; 
echo $row->an_prix;
echo $row->an_ref;
echo $row->an_offre;
echo $row->an_titre." </p>";  
echo "<a href=http://localhost/ci/index.php/AnnoncesController/Details/$row->an_id>Détails</a><br><br><br>";

}
?>
</div>
</div>

</body>
</html>