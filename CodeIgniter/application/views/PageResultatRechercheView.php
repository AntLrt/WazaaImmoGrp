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

<h1>Annonces correspondant à votre recherche</h1>

<div class="row">
<div class="col-12">   

<?php 
if(empty($results)):

echo form_open(); 
?>

<div class='form-group'>
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
</form>

<p>Aucune annonce correspondant à vos critères trouvé.</p>


<?php 
else:
foreach ($results as $row) 
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
endif;
?>




</body>
</html>