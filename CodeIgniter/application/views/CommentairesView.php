<div class="row">
<div class="col-12">
<h1>Tout les commentaires</h1> 
<?php 
//Affichage de tous les commentaires de l'annonce
foreach ($ToutCom as $row) 
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