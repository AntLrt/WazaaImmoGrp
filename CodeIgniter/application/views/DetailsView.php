<h1>Détails de l'annonce</h1>

<div class="row">
<div class="col-12">
<?php
foreach ($details as $row) {
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



</body>
</html>