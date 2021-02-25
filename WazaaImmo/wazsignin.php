<!DOCTYPE html>
<html>
<head>

<?php
include("wazheader.php");
?>

</head>

<div class="container">

<body>
<br>
<H1>Inscription</H1>

<form action="connexion.php" method="post">

    <div class="form-group">
        <label for="sexe">Civilité</label>
            <select class="form-control" name="sexe">
                <option>Madame</option>
                <option>Monsieur</option>
            </select>
    </div>

<div class="row">
    <div class="form-group col-6">
        <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" placeholder="Votre nom" required pattern="^[A-Za-z '-]+$" maxlength="20">
    </div>

    <div class="form-group col-6">
        <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" required pattern="^[A-Za-z '-]+$" maxlength="30">
    </div>
</div>

<div class="form-group">
    <label for="date">Date de naissance</label>
        <input class="form-control" type="date" value="2011-08-19" name="bdate">
</div>

<div class="row">
    <div class="form-group col-6">
        <label for="mail">Adresse email</label>
        <input type="email" class="form-control" name="mail" placeholder="name@example.com" required pattern="^[A-Za-z0-9.-]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$">
    </div>

    <!-- <div class="form-group col-6">
        <label for="mailverif">Confirmer l'adresse email</label>
        <input type="email" class="form-control" name="mailverif" placeholder="name@example.com">
    </div> -->
<!-- </div>

<div class="row"> -->
    <div class="form-group col-6">
        <label for="mp">Mot de passe</label>
            <input type="password" name="mp" class="form-control" aria-describedby="passwordHelpBlock" required pattern="^[A-Za-z0-9]+$" minlength="5">
        <small id="passwordHelpBlock" class="form-text text-muted">
            Votre mot de passe doit contenir au moins 5 caractéres, dont au moins 1 chiffre.
        </small>
    </div>

    <!-- <div class="form-group col-6">
        <label for="mpconf">Confirmer le mot de passe</label>
            <input type="text" class="form-control" name="mpconf">
    </div> -->
</div>

<button type="submit" class="btn btn-dark border-danger" for="forminput" type="submit" value="Envoyer">Valider</button>

</form>
<br>
</div>

</body>

<?php

include("wazfooter.php");

?>

</html>