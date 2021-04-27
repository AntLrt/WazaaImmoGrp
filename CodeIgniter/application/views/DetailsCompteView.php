<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Votre compte</title>
</head>
<body>

<a href="http://localhost/ci/index.php/RechercheController/BarreRecherche">Accueil</a><br>
<a href="http://localhost/ci/index.php/AnnoncesController/Loca">Locations</a><br>
<a href="http://localhost/ci/index.php/AnnoncesController/Ventes">Ventes</a><br>
<a href="http://localhost/ci/index.php/EmployesController/PageNous">Nous</a><br>
<a href="http://localhost/ci/index.php/MembresController/DetailsCompte">Votre compte</a><br>
<a href="http://localhost/ci/index.php/ContactController/Formulaire">Contact</a><br>
<a href="http://localhost/ci/index.php/BiensController/ListeBiens">ListeBiens(admin)</a><br>
<a href="http://localhost/ci/index.php/MembresController/ListeMembres">ListeMembres(admin)</a><br>
<a href="http://localhost/ci/index.php/ContactController/ListeContact">ListeContact(admin)</a><br>
<a href="http://localhost/ci/index.php/EmployesController/ListeEmployes">ListeEmployes(admin)</a><br><br>


<div class="row">
<div class="col-12">    
<?php 
foreach ($detailscompte as $row) 
{
    echo "<p>".$row->in_id; 
    echo $row->in_nom;
    echo $row->in_prenom;
    echo $row->in_telephone;
    echo $row->in_email;
    echo $row->in_pays;
    echo $row->in_adresse." </p>";     
}
?>
</div>
</div>


</body>
</html>