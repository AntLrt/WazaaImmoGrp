<?php if($this->session->role != 'Internaute'){echo form_open();}
else {
$url=site_url("AccueilController/Accueil");
echo "<form action='$url' method='post'>";
}?>

<head>
        <meta charset="utf-8">
        <title>Wazaa Immo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("assets/CSS/formsstyle.css") ?>">
</head>

<body>

<div class="container col-10" id="search">
    <form class="form-horizontal" id="formstyle">
                    <div class='row'>
                        <div class="col">
                            <div class="form-heading">
                                <span class="prg">Votre recherche</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-inline col-10 mx-auto" id="searchbar">
                        <!-- <label for="Operation">Type d'opération </label> -->

                        <select name="Operation" id="Operation" class="form-control col-3">
                            <option value="">Type d'Operation </option>
                            <option value="A">Achat</option>
                            <option value="L">Location</option>
                            <option value="V">Viager</option>
                        </select>

                        <!-- <label for="Type">Type</label> -->

                        <select name="Type" id="Type" class="form-control col-3">
                            <option value="">Type de bien</option>
                            <option value="maison">Maison</option>
                            <option value="appartement">Appartement</option>
                            <option value="immeuble">Immeuble</option>
                            <option value="terrain">Terrain</option>
                            <option value="bureaux">Bureaux</option>
                            <option value="locaux professionnels">Locaux professionnels</option>
                            <option value="garage">Garage</option>
                        </select>

                        <!-- <label for="Ville">Ville</label> -->
                        <input type="text" name="Ville" id="Ville" class="form-control col-3" placeholder="Ville">
                    <!-- </div> -->

                    <!-- <div class="col-xs-12 d-flex justify-content-center form-group"> -->
                        <button type="submit" class="btn" value="Submit">RECHERCHER</button>
                    </div>
    


                    
                <div class="pics">
                    <?php  foreach ($anid['photo1'] as $row) {$anid1 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid1?>">
                        <?php foreach ($anid['photo1'] as $row) {$PhotoUne = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoUne;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
                    </a>

                    <?php foreach ($anid['photo2'] as $row) {$anid2 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid2?>">
                        <?php foreach ($anid['photo2'] as $row) {$PhotoDeux = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoDeux;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
                    </a>

                    <?php foreach ($anid['photo3'] as $row) {$anid3 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid3?>">
                        <?php foreach ($anid['photo3'] as $row) {$PhotoTrois = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoTrois;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
                    </a>
                </div>

    </form>
</div>

<button type="submit" class="btn btn-dark">Rechercher</button>    
</form>

<br>

<?php foreach ($photo1 as $row) {$anid1 = $row->an_id;}?>
<a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid1?>">
<?php foreach ($photo1 as $row) {$PhotoUne = $row->pho_nom;}?>
<img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoUne;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
</a>

<?php foreach ($photo2 as $row) {$anid2 = $row->an_id;}?>
<a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid2?>">
<?php foreach ($photo2 as $row) {$PhotoDeux = $row->pho_nom;}?>
<img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoDeux;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
</a>

<?php foreach ($photo3 as $row) {$anid3 = $row->an_id;}?>
<a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid3?>">
<?php foreach ($photo3 as $row) {$PhotoTrois = $row->pho_nom;}?>
<img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoTrois;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
</a>


<br>

<a>La note moyenne laissé par nos clients : <a><?php foreach ($MoyenneNotes as $row) {echo $row->Moyenne;}?><a>/5</a>




<?php //On donne la possibilité de laisser un commentaire si la personne est connecté sinon on dit qu'il faut être connecté pour laisser un commentaire
if($this->session->role == "Internaute"){
$url = site_url("MembresController/CommentairePubli");
echo "<form action='$url' method='post'> 
<div class='form-group'>
<br>
<label for='Commentaire'>Laissez un commentaire sur notre entreprise !</label>
<br>
<textarea rows='3' class='form-control' placeholder='Entrez votre commentaire ici'
name='Commentaire' id='Commentaire'></textarea>

</div>

<div class='form-group'>
<label for='Note'>Notez la qualité de nos services sur 5 !</label>

<br>

<select name='Note' id='Note'>
<option value='5'>5</option>
<option value='4'>4</option>
<option value='3'>3</option>
<option value='2'>2</option>
<option value='1'>1</option>
<option value='0'>0</option>

</select>
</div> 
<br>

<button type='submit' class='btn btn-dark'>Envoyer</button>    
</form>";

}
else{echo "<br><br>Connectez-vous ou créer un compte pour pouvoir laisser un commentaire !";}?>



<div class="row">
<div class="col-12">    
<h1>Top commentaire</h1> 

<?php 
//Affichage de tous les commentaires de l'annonce
foreach ($TopCom as $row) 
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
<div class="row">
<div class="col-12">
<h1>Pire commentaire</h1> 
<?php 
//Affichage de tous les commentaires de l'annonce
foreach ($PirCom as $row) 
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

<a href="<?= site_url("MembresController/Commentaires")?>">Voir tout les commentaires</a><br><br>








</body>
</html>