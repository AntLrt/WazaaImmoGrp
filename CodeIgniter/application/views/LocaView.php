
<?php $url=site_url("AnnoncesController/Loca");
echo "<form action='$url' method='post'>";
?>

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


<div class="container">
    <h1 id='form_head'>Liste des locations</h1>
<br>
    <?php if (isset($results)) { ?>


            <?php foreach ($results as $data) { 
                
                    $NomPhoto = $data->pho_nom;
                    echo "<img src= ".base_url()."assets/images/".$NomPhoto.".jpg width='150' height='100'>";                    
                    echo "<p>".$data->an_id;
                    echo $data->an_prix; 
                    echo $data->an_ref; 
                    echo $data->an_titre." </p>";  
                    $url=site_url("AnnoncesController/Details");
                    echo "<a href=$url/$data->an_id>Détails</a><br><br><br>";             
                } ?>
        
    <?php } else { ?>
        <div>Aucune location trouvé</div>
    <?php } ?>

            <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>
        </div>


</body>
</html>