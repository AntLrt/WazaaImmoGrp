<div class="container">
    <h1 id='form_head'>Liste des ventes</h1>

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
        <div>Aucune ventes trouvé</div>
    <?php } ?>

            <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>
        </div>


</body>
</html>