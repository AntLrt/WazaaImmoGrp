<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Wazaa Immo - Accueil</title>
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

<form action="http://localhost/ci/index.php/AccueilController/Accueil" method="post"> 

<div class="form-group">
<label for="Operation">Type d'opération </label>

<select name="Operation" id="Operation">
<option value="">Type d'Operation'</option>
<option value="A">Achat</option>
<option value="L">Location</option>
<option value="V">Viager</option>
</select>
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

<br>

<?php foreach ($photo1 as $row) {$anid1 = $row->an_id;}?>
<a href="<?php echo base_url();?>index.php/AnnoncesController/Details/<?php echo $anid1?>">
<?php foreach ($photo1 as $row) {$PhotoUne = $row->pho_nom;}?>
<img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoUne;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
</a>

<?php foreach ($photo2 as $row) {$anid2 = $row->an_id;}?>
<a href="<?php echo base_url();?>index.php/AnnoncesController/Details/<?php echo $anid2?>">
<?php foreach ($photo2 as $row) {$PhotoDeux = $row->pho_nom;}?>
<img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoDeux;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
</a>

<?php foreach ($photo3 as $row) {$anid3 = $row->an_id;}?>
<a href="<?php echo base_url();?>index.php/AnnoncesController/Details/<?php echo $anid3?>">
<?php foreach ($photo3 as $row) {$PhotoTrois = $row->pho_nom;}?>
<img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoTrois;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
</a>

<form action="http://localhost/ci/index.php/MembresController/Commentaire" method="post"> 

<br>

<a>La note moyenne laissé par nos clients : <a><?php foreach ($MoyenneNotes as $row) {echo $row->Moyenne;}?><a>/10</a>


<div class="form-group">
<br>
<label for="Demande">Laissez un commentaire sur notre entreprise !</label>
<br>
<textarea rows="3" class="form-control" placeholder="Entrez votre commentaire ici" 
name="Commentaire" id="Commentaire"></textarea> 
</div>

<div class="form-group">
<label for="Note">Notez la qualité de nos services sur 10 !</label>

<br>

<select name="Note" id="Note">
<option value="10">10</option>
<option value="9">9</option>
<option value="8">8</option>
<option value="7">7</option>
<option value="6">6</option>
<option value="5">5</option>
<option value="4">4</option>
<option value="3">3</option>
<option value="2">2</option>
<option value="1">1</option>

</select>
</div> 
<br>

<button type="submit" class="btn btn-dark">Envoyer</button>    
</form>

<div class="row">
<div class="col-12">    
<?php 
//Affichage de tous les commentaires de l'annonce
foreach ($commentaires as $row) 
{
//Prenom de la personne mettant le commentaire
echo "<p>".$row->in_prenom;

//Commentaire de la personne
echo $row->com_avis;

//Note de la personne
echo $row->com_notes;

//Date et heure du commentaire
echo $row->com_date_ajout." </p>";    

}
?>
</div>
</div>






</body>
</html>