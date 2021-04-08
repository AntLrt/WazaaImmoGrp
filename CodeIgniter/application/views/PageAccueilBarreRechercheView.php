<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
</head>
<body>

<form action="http://localhost/ci/index.php/RechercheController/BarreRecherche" method="post"> 

<div class="form-group">
<label for="Prix">Prix</label>
<input type="text" name="Prix" id="Prix" class="form-control">
</div>

<div class="form-group">
<label for="Type">Type</label>

<select name="Type" id="Type">
    <option value="">Type de bien</option>
    <option value="appartement">appartement</option>
    <option value="terrain">terrain</option>
    <option value="bureaux">bureaux</option>
    <option value="maison">maison</option>
</select>
</div> 

<div class="form-group">
<label for="Ville">Ville</label>
<input type="text" name="Ville" id="Ville" class="form-control">
</div>

<!-- <div class="form-group">
<label for="pro_ref">Référence</label>
<input type="text" name="pro_ref" id="pro_ref" class="form-control">
</div>  -->

<button type="submit" class="btn btn-dark">Rechercher</button>    
</form>



</body>
</html>