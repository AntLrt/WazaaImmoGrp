<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Votre compte</title>
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


<div class="row">
<div class="col-12">    
<?php 
if($this->session->role == "Employe"){
foreach ($Details as $row) 
{
    echo "<p> ".$row->emp_nom;
    echo $row->emp_prenom;
    echo $row->emp_tel;
    echo $row->emp_mail;
    echo $row->emp_mdp;
    echo $row->emp_poste;
    echo $row->emp_adresse." </p>";     
}}

else if($this->session->role == "Internaute"){
    foreach ($Details as $row) 
    {
        echo "<p>".$row->in_prenom;
        echo $row->in_nom;
        echo $row->in_telephone;
        echo $row->in_email;
        echo $row->in_mdp;
        echo $row->in_pays;
        echo $row->in_adresse." </p>";     
    }}
?>
</div>
</div>


</body>
</html>