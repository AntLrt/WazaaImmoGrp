<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("assets/CSS/Nous-Comptestyle.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/CSS/formsstyle.css") ?>">

</head>

<div class="container col-6" id="details">

            <div class='row'>
                <div class="col-12">
                    <div class="form-heading">
                        <span class="prg">Details du compte</span>
                    </div>
                </div>
            </div>

            <div class="row" id="deets">
                <div class="col-12">
                
                    <?php 
                    
                    if($this->session->role == "Employe"):
                        foreach ($Details as $row):
                            $url = site_url("EmployesController/Modification");?>
                        
                            <p> Nom : <?php echo $row->emp_nom; ?> </p>
                            <p> Prénom : <?php echo $row->emp_prenom; ?> </p>
                            <p> Téléphone : <?php echo $row->emp_tel; ?> </p>
                            <p> Email : <?php echo $row->emp_mail; ?> </p>
                            <p> Mot de passe : <?php echo $row->emp_mdp; ?> </p>
                            <p> Poste : <?php echo $row->emp_poste; ?> </p>
                            <p> Adresse : <?php echo $row->emp_adresse; ?> </p>
                            <button class='btn btn-outline-danger' value="Submit" onclick="window.location.href = '<?php echo $url.'/'.$this->session->ID ?>';">Modifier</button>
                    <?php endforeach;?>
                
                </div>
            </div>

            <div class="row" id="deets">
                <div class="col-12">

                    <?php 
                    elseif($this->session->role == "Internaute"):
                        foreach ($Details as $row): 
                            $url = site_url("MembresController/Modification");?>

                            <p>Prénom :  <?php echo $row->in_prenom; ?> </p>
                            <p>Nom : <?php echo $row->in_nom; ?> </p>
                            <p>Téléphone : <?php echo $row->in_telephone; ?> </p>
                            <p> Email : <?php echo $row->in_email; ?> </p>
                            <p>Mot de passe : <?php echo $row->in_mdp; ?> </p>
                            <p> Pays : <?php echo $row->in_pays; ?> </p>
                            <p> Adresse : <?php echo $row->in_adresse; ?> </p>
                            <button class='btn btn-outline-danger' value="Submit" onclick="window.location.href = '<?php echo $url.'/'.$this->session->ID ?>';">Modifier informations</button>

                        <?php endforeach;?>

                        <div class='row'>
                <div class="col-12">
                    <div class="form-heading">
                        <span class="prg">Vos favoris</span>
                    </div>
                </div>
            </div>
                        <?php foreach ($Favoris as $row){if(!empty($row->an_id)){$a=1;}$url=site_url('AnnoncesController/Details');
                            if($a== 1){ ?>
                            <div class="container col-12">
                                <div class="row" id="ad">
                                    <div class="row">
                                                
                                                    <?php $NomPhoto = $row->pho_nom;
                                                    echo "<img src= ".base_url()."assets/images/".$NomPhoto.".jpg width='215' height='200' id='ticket'>";                    
                                                    echo "<ul class='list-group list-group-flush col-7' id='list'>";
                                                    echo "<li class='list-group-item list-group-item-action list-group-item-danger'>".$row->an_ref."</li>"; 
                                                    echo "<li class='list-group-item list-group-item-action list-group-item-danger'>".$row->an_titre."</li>";
                                                    echo "<li class='list-group-item list-group-item-action list-group-item-danger'>".$row->bi_local."</li>";
                                                    if($row->an_offre == 'A'){$type = '';}else if($row->an_offre == 'L') {$type = ' par mois';}else if($row->an_offre == 'V'){$type = '';};
                                                    echo "<li class='list-group-item list-group-item-action list-group-item-danger'>".$row->an_prix."€".$type."</li></ul>";  
                                                    $url=site_url("AnnoncesController/Details");
                                                    echo "</div>
                                                    </div><a href=$url/$row->an_id class='btn btn-outline-danger pull-right' id='one'>Détails</a><br><br>";             
                                                }
                                                }?>
                                                
                                    <?php if(empty($Favoris)){echo "<a>Aucune annonce en favoris !</a>";} ?>
                                    </div>
                                    

                    <?php endif; ?>

                </div>
            </div>

</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>