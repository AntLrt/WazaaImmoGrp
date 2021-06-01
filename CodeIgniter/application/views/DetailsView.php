<h1>Détails de l'annonce</h1>

<div class="row">
<div class="col-12">
<?php
foreach ($Details as $row) {
    $NomPhoto = $row->pho_nom;
    echo "<img src= " . base_url() . "assets/images/" . $NomPhoto . ".jpg width='150' height='100'>";

    echo "<p>" . $row->an_id;
    echo $row->an_prix;
    echo $row->an_ref;
    echo $row->an_offre;
    echo $row->bi_type;
    echo $row->bi_local;
    echo $row->an_titre . " </p><br>";

}
?>
</div>
</div>


<div class="row">
<div class="col-12">
<?php
if ($AucuneOptions == false) {echo "Option(s) disponible pour cette annonce :";} else {echo "Pas d'options disponbile pour cette annonce";}
foreach ($Options as $row) {

    echo "<p>" . $row->opt_libelle . ", </p>";

}
?>
</div>
</div>
<br>

<?php if($this->session->role == 'Internaute'): ?>
    <?php echo form_open(); ?>

<div class="container col-4">


    <form class="form-horizontal" role="form">
        <div class='container'>

            <div class='row'>
                <div class="col-12">
                    <div class="form-heading">
                        <span class="prg">Intéressé par cette annonce ? Contactez-nous avec le formulaire ci-dessous !</span>
                    </div>
                </div>
            </div>
<br>
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
    
<?php endif; ?>
</body>
</html>