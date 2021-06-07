
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

                        <select name="Operation" id="Operation" class="form-control col-3">
                            <option value="">Type d'Operation </option>
                            <option value="A">Achat</option>
                            <option value="L">Location</option>
                            <option value="V">Viager</option>
                        </select>

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

                        <input type="text" name="Ville" id="Ville" class="form-control col-3" placeholder="Ville">

                        <button type="submit" class="btn" value="Submit">RECHERCHER</button>
                    </div>
    
                    </form>

                    
                <div class="pics">
                    <?php  foreach ($anid['photo1'] as $row) {$anid1 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid1?>" id="showoff">
                        <?php foreach ($anid['photo1'] as $row) {$PhotoUne = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoUne;?>.jpg" width="425" height="200" title="Cliquez pour voir cette annonce !">
                    </a>

                    <?php foreach ($anid['photo2'] as $row) {$anid2 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid2?>" id="showoff">
                        <?php foreach ($anid['photo2'] as $row) {$PhotoDeux = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoDeux;?>.jpg" width="425" height="200" title="Cliquez pour voir cette annonce !">
                    </a>

                    <?php foreach ($anid['photo3'] as $row) {$anid3 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid3?>" id="showoff">
                        <?php foreach ($anid['photo3'] as $row) {$PhotoTrois = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoTrois;?>.jpg" width="425" height="200" title="Cliquez pour voir cette annonce !">
                    </a>
                </div>

    
</div>

            <div class="container" id="noteclient">
                <a id="notetext">La note moyenne laissé par nos clients : <a class="badge bg-danger" id="badgenote"><?php foreach ($MoyenneNotes as $row) {echo $row->Moyenne;}?>/5</a>
            </div>
<br>
<div class="container">
        <?php 
        //On donne la possibilité de laisser un commentaire si la personne est connecté sinon on dit qu'il faut être connecté pour laisser un commentaire
        if($this->session->role == "Internaute"):
        $url = site_url("MembresController/CommentairePubli"); ?>
        <form action=<?php echo $url ?> method='post' id='commentaire' class='container'> 
                    <div class='form-group'>
                        <br>
                            <label for='Commentaire' class='font-weight-bold'>Laissez un commentaire sur notre entreprise !</label>
                        <br>
                            <textarea rows='3' class='form-control' placeholder='Entrez votre commentaire ici' name='Commentaire' id='area'></textarea>

                    </div>

                    <div class='form-group'>

                        <label for='Note'>Notez la qualité de nos services sur 5 !</label>

                        <br>

                            <select name='Note' id='Note'>
                                <option value='5'>5</option>
                                <option value='4'>4</option>
                                <option value='3'>3</option>
                                <option value='2'>2</option>
                                <option value='1'>1</option>
                                <option value='0'>0</option>
                            </select>

                    </div> 
                        
                        <br>

                    <button type='submit' class='btn' id='sendit'>Envoyer</button>    
            </form>

        
        <?php else: ?>

        <br><p class="alert alert-danger" id="needlog">Connectez-vous ou créer un compte pour pouvoir laisser un commentaire !</p>
        
        <?php
        endif;
        ?>
</div>


<div class="container col-12" id="topworst">    
            <div class='row'>
                <div class="col">
                    <div class="form-heading" id="top">
                        <span class="prg alert alert-dark font-weight-bold">Meilleur commentaire</span>
                    </div>
                </div>
            </div>

            <?php 
            foreach ($TopCom as $row) 
            {
            //Prenom et note de la personne mettant le commentaire
            echo "<ul class='list-group list-group-flush' id='tw'><li class='list-group-item list-group-item-action'> Prénom : ".$row->in_prenom."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Note : ".$row->com_notes."/5</li>";

            //Commentaire de la personne
            echo "<li class='list-group-item list-group-item-action'>".$row->com_avis."</li>";

            //Date et heure du commentaire
            $Date = $row->com_date_ajout;
            $Date = date("d-m-Y h:i", strtotime($Date));
            echo "<li class='list-group-item list-group-item-action'>".$Date."</li></ul>";  

            }
            ?>

            <div class='row'>
                <div class="col">
                    <div class="form-heading" id="top">
                        <span class="prg alert alert-dark font-weight-bold">Pire commentaire</span>
                    </div>
                </div>
            </div> 
        
            <?php 
            //Affichage de tous les commentaires de l'annonce
            foreach ($PirCom as $row) 
            {
            //Prenom et note de la personne mettant le commentaire
            echo "<ul class='list-group list-group-flush' id='tw'><li class='list-group-item list-group-item-action'> Prénom : ".$row->in_prenom."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Note : ".$row->com_notes."/5</li>";

            //Commentaire de la personne
            echo "<li class='list-group-item list-group-item-action'>".$row->com_avis."</li>";

            //Date et heure du commentaire
            $Date = $row->com_date_ajout;
            $Date = date("d-m-Y h:i", strtotime($Date));
            echo "<li class='list-group-item list-group-item-action'>".$Date."</li></ul>";  

            }
            ?>
<br>
        <a href="<?= site_url("MembresController/Commentaires")?>" class="btn btn-outline-danger" id="seethrough">Voir tout les commentaires</a>
</div>







    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>