<h1>Liste des produits</h1>

<div class="row">
<div class="col-12">    
<?php 
if(empty($liste_produits))
{echo form_open(); 

    echo "<div class='form-group'>
    <label for='Operation'>Type d'opération </label>
    
    <select name='Operation' id='Operation'>
    <option value=''>Type d'Operation</option>
    <option value='A'>Achat</option>
    <option value='L'>Location</option>
    <option value='V'>Viager</option>
    </select>
    </div> 
    
    <div class='form-group'>
    <label for='Type'>Type</label>
    
    <select name='Type' id='Type'>
    <option value=''>Type de bien</option>
    <option value='maison'>maison</option>
    <option value='appartement'>appartement</option>
    <option value='immeuble'>immeuble</option>
    <option value='terrain'>terrain</option>
    <option value='bureaux'>bureaux</option>
    <option value='locaux professionnels'>locaux professionnels</option>
    <option value='garage'>garage</option>
    </select>
    </div> 
    
    <div class='form-group'>
    <label for='Ville'>Ville</label>
    <input type='text' name='Ville' id='Ville' class='form-control'>
    </div>
    
    <button type='submit' class='btn btn-dark'>Rechercher</button>    
    </form>";

echo "Aucune annonce correspondant à vos critères trouvé.";
}

else{
foreach ($liste_produits as $row) 
{
$NomPhoto = $row->pho_nom;
echo "<img src=".base_url()."/assets/images/".$NomPhoto.".jpg width='150' height='100'>";
echo "<p>".$row->an_id; 
echo $row->an_prix;
echo $row->an_ref;
echo $row->an_offre;
echo $row->an_titre." </p>"; 

$url=site_url("AnnoncesController/Details");
echo "<a href=$url/$row->an_id>Détails</a><br>";    
}
}
?>
</div>
</div>


</body>
</html>