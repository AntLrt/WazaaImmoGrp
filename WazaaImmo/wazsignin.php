<!DOCTYPE html>
<html>
<head>

<?php
include("wazheader.php");
include("connexion.php");
?>

</head>

<div class="container">

<body>
<br>
<H1>Inscription</H1>

<form action="http://bienvu.net/script.php" method="GET">

    <div class="form-group">
        <label for="inputsexe">Civilité</label>
            <select class="form-control" id="inputsexe">
                <option>Madame</option>
                <option>Monsieur</option>
            </select>
    </div>

<div class="row">
    <div class="form-group col-6">
        <label for="inputnom">Nom</label>
            <input type="text" class="form-control" id="inputnom" placeholder="Votre nom">
    </div>

    <div class="form-group col-6">
        <label for="inputprenom">Prénom</label>
            <input type="text" class="form-control" id="inputprenom" placeholder="Votre prénom">
    </div>
</div>

<div class="form-group">
    <label for="inputdate">Date de naissance</label>
        <input class="form-control" type="date" value="2011-08-19" id="inputdate">
</div>

<div class="row">
    <div class="form-group col-6">
        <label for="inputmail">Adresse email</label>
        <input type="email" class="form-control" id="inputmail" placeholder="name@example.com">
    </div>

    <div class="form-group col-6">
        <label for="inputmailverif">Confirmer l'adresse email</label>
        <input type="email" class="form-control" id="inputmailverif" placeholder="name@example.com">
    </div>
</div>

<div class="row">
    <div class="form-group col-6">
        <label for="inputmp">Mot de passe</label>
            <input type="password" id="inputmp" class="form-control" aria-describedby="passwordHelpBlock">
        <small id="passwordHelpBlock" class="form-text text-muted">
            Votre mot de passe doit contenir au moins 5 caractéres, dont au moins 1 chiffre.
        </small>
    </div>

    <div class="form-group col-6">
        <label for="inputmdconf">Confirmer le mot de passe</label>
            <input type="text" class="form-control" id="inputmpconf">
    </div>
</div>

<button type="button" class="btn btn-dark border-danger" for="forminput" type="submit" value="Envoyer">Valider</button>

</form>
<br>
</div>

</body>

<?php

include("wazfooter.php");

?>

</html>