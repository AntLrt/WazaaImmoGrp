<h1>Liste des locations</h1>

<div class="row">
<div class="col-12">    
<?php 
foreach ($locations as $row) 
{

$NomPhoto = $row->pho_nom;
echo "<img src= ".base_url()."assets/images/".$NomPhoto.".jpg width='150' height='100'>";

echo "<p>".$row->an_id; 
echo $row->an_prix;
echo $row->an_ref;
echo $row->an_offre;
echo $row->an_titre." </p>";  

$url=site_url("AnnoncesController/Details");
echo "<a href=$url/$row->an_id>Détails</a><br><br><br>";

}
?>
</div>
</div>


</body>
</html>