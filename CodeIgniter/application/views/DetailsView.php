<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("assets/CSS/formsstyle.css") ?>">
</head>

<div class="container" id="adticket">
    <div class='row'>
        <div class="col-12">
            <div class="form-heading" id="bdr">
                <span class="prg" id="det">Details</span>
            </div>
        </div>
    </div>

<div class="container" id="adbloc">
    <div class="row">
        <div class="col-12">
            <?php
            foreach ($Details as $row) {
                $anid = $row->an_id;
                $NomPhoto = $row->pho_nom;
                echo "<img src= " . base_url() . "assets/images/" . $NomPhoto . ".jpg width='700' height='400'>";

                echo "<ul class='list-group list-group-flush col-7' id='adlist'>";
                echo   "<li class='list-group-item list-group-item-action'> Réference de l'annonce : ".$row->an_ref."</li>";

                if($row->an_offre == 'A'){$type = '';}else if($row->an_offre == 'L') {$type = ' par mois';}else if($row->an_offre == 'V'){$type = '';};
                echo   "<li class='list-group-item list-group-item-action'> Prix : ".$row->an_prix."€".$type."</li>";

                if($row->an_offre == 'A'){$typeo = 'Viager';}else if($row->an_offre == 'L') {$typeo = 'Location';}else if($row->an_offre == 'V'){$typeo = 'Vente';};
                echo   "<li class='list-group-item list-group-item-action'> Type d'offre : ".$typeo."</li>";

                echo   "<li class='list-group-item list-group-item-action'> Type de bien : ".$row->bi_type."</li>";
                echo   "<li class='list-group-item list-group-item-action'> Ville : ".$row->bi_local."</li>";
                echo   "<li class='list-group-item list-group-item-action'> Diagnostic énergetique : ".$row->bi_diagnostic."</li>";
                echo   "<li class='list-group-item list-group-item-action'> Surface totale : ".$row->bi_surf_totale."m² </li>";
                echo   "<li class='list-group-item list-group-item-action'> Surface habitable : ".$row->bi_surf_habitable."m² </li>";
                echo   "<li class='list-group-item list-group-item-action'> Nombre de pièces : ".$row->bi_pieces."</li>";
                echo   "<li class='list-group-item list-group-item-action'> Description du bien : <br>".$row->bi_description."</li>
                    </ul>";

            }
            ?>
        </div>
    </div>


    <div class="row" id="adoption">
        <div class="list-group-item list-group-item-dark col-12">
            <?php
            if ($AucuneOptions == false) {echo "<li class='list-group-item'>Option(s) disponible pour cette annonce :</li>";} 
            else {echo "Pas d'options disponbile pour cette annonce";}
            foreach ($Options as $row) {

                echo "<br><p>" . $row->opt_libelle . " </p>";

            }
            ?>
        </div>
    </div>
</div>

<?php if($this->session->role == 'Internaute'){if(empty($estcefav)){?>  
<?php 
$url1=site_url("MembresController/Favoriser");
    echo "<form action='$url1' method='post'>";
    ?><br>
    <input type='hidden' name='anid' value='<?php echo $anid; ?>'>
    <div class="col-xs-12 d-flex justify-content-center form-group">
    <button type='submit' id='coeur' style="border:0px"><img src="<?php echo base_url();?>/assets/images/logo_fav_blanc1.jpg" width="" height="100"></button><br>
</div></form>
<?php }
    else {$url1=site_url("MembresController/EnleverFavoris");
    echo "<form action='$url1' method='post'>";
    ?><br>
    <input type='hidden' name='anid' value='<?php echo $anid; ?>'>
    <div class="col-xs-12 d-flex justify-content-center form-group">
    <button type='submit' id='coeur' style="border:0px"><img src="<?php echo base_url();?>/assets/images/logo_fav_rouge1.jpg" width="" height="100"></button><br>
</div></form><?php } }?>


<?php if($this->session->role == 'Internaute'): ?>
    <?php $url2=site_url("ContactController/FormulaireAnnonce");
echo "<form action='$url2' method='post'>"; ?>

</div>

<div class="container col-6" id="contactannonce">

    <form class="form-horizontal" role="form">
        <div class='container'>

            <div class='row'>
                <div class="col-12">
                    <div class="form-heading">
                        <span class="prg">Intéressé par cette annonce ? Contactez-nous!</span>
                    </div>
                </div>
            </div>
            <input type='hidden' name='anid' value='<?php echo $anid; ?>'>

                <div class="col-12"> 

                    <div class="form-group">
                        <label for="Sujet" class="col-8 control-label mx-auto d-block">Sujet</label>
                        <div class="col-8 mx-auto">
                        <select name="Sujet" id="Sujet">
                            <option value="Autres">Sujet de la question</option>
                            <option value="Acheter">Acheter</option>
                            <option value="Louer">Louer</option>
                            <option value="Vendre">Vendre</option>
                            <option value="Autres">Autres</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment" class="col-8 control-label mx-auto d-block">Message</label>
                        <div class="col-8 mx-auto">
                            <textarea class="form-control" rows="5" id="Demande" name="Demande" placeholder="Veuillez entrer votre demande"></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 d-flex justify-content-center form-group">
                        <button type="submit" class="btn">ENVOYER</button>
                    </div>

                </div>

        </div>
    </form>
</div>

<?php else: ?>  
<div class="row" id="adoption">
        <div class="list-group-item list-group-item-dark col-12">
            <?php
            echo "Connectez-vous pour pouvoir nous contacter à propos de cette annonce !";
            ?>
        </div>
    </div> 

    
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
