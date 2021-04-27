<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Waz - Contact</title>
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

<form action="http://localhost/ci/index.php/ContactController/Formulaire" method="post"> 



<div class="form-group">
<label for="Sujet">Sujet</label>

<select name="Sujet" id="Sujet">
<option value="Autres">Sujet de la question</option>
<option value="Acheter">Acheter</option>
<option value="Louer">Louer</option>
<option value="Vendre">Vendre</option>
<option value="Autres">Autres</option>
</select>
</div> 
<br>
<div class="form-group">
<label for="Demande">Votre demande :</label>
<textarea rows="3" class="form-control" placeholder="Veuillez entrer votre demande" name="Demande" id="Demande"></textarea> 
</div>

<br>

<button type="submit" class="btn btn-dark">Envoyer</button>    
</form>



</body>
</html>