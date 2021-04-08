<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Liste des produits</title>
</head>
<body>

<body>
<h1>Liste des produits</h1>

<div class="row">
<div class="col-12">    
<?php 
foreach ($liste_produits as $row) 
{
    echo "<p>".$row->an_id; 
    echo $row->an_prix;
    echo $row->an_ref;
    echo $row->an_offre;
    echo $row->an_titre." </p>";     
}
?>
</div>
</div>


</body>
</html>