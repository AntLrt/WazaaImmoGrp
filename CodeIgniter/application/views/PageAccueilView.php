
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

<div class="container col-12">
    <form class="form-horizontal" id="formstyle">
                    <div class='row'>
                        <div class="col-12">
                            <div class="form-heading">
                                <span class="prg">Votre recherche</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-inline">
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
                            <option value="maison">maison</option>
                            <option value="appartement">appartement</option>
                            <option value="immeuble">immeuble</option>
                            <option value="terrain">terrain</option>
                            <option value="bureaux">bureaux</option>
                            <option value="locaux professionnels">locaux professionnels</option>
                            <option value="garage">garage</option>
                        </select>

                        <!-- <label for="Ville">Ville</label> -->
                        <input type="text" name="Ville" id="Ville" class="form-control col-3" placeholder="Ville">
                    <!-- </div> -->

                    <!-- <div class="col-xs-12 d-flex justify-content-center form-group"> -->
                        <button type="submit" class="btn" value="Submit">RECHERCHER</button>
                    </div>
    


                    
                <div>
                    <?php  foreach ($anid['photo1'] as $row) {$anid1 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid1?>">
                        <?php foreach ($anid['photo1'] as $row) {$PhotoUne = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoUne;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
                    </a>

                    <?php foreach ($anid['photo2'] as $row) {$anid2 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid2?>">
                        <?php foreach ($anid['photo2'] as $row) {$PhotoDeux = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoDeux;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
                    </a>

                    <?php foreach ($anid['photo3'] as $row) {$anid3 = $row->an_id;}?>
                    <a href="<?=site_url("AnnoncesController/Details")?>/<?php echo $anid3?>">
                        <?php foreach ($anid['photo3'] as $row) {$PhotoTrois = $row->pho_nom;}?>
                        <img src="<?php echo base_url();?>/assets/images/<?php echo $PhotoTrois;?>.jpg" width="200" height="100" title="Cliquez pour voir cette annonce !">
                    </a>
                </div>

    </form>
</div>

            <br>

            <a>La note moyenne laissé par nos clients : <a><?php foreach ($MoyenneNotes as $row) {echo $row->Moyenne;}?><a>/5</a>




            <?php 
            //On donne la possibilité de laisser un commentaire si la personne est connecté sinon on dit qu'il faut être connecté pour laisser un commentaire
            if($this->session->role == "Internaute"):
            $url = site_url("MembresController/CommentairePubli");
            echo "<form action='$url' method='post'>"; 
            ?>

            <div class='form-group'>
            <br>
            <label for='Commentaire'>Laissez un commentaire sur notre entreprise !</label>
            <br>
            <textarea rows='3' class='form-control' placeholder='Entrez votre commentaire ici'
            name='Commentaire' id='Commentaire'></textarea>

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

            <button type='submit' class='btn btn-dark'>Envoyer</button>    
            </form>

            
            <?php else: ?>

            <br><p>Connectez-vous ou créer un compte pour pouvoir laisser un commentaire !</p>
            
            <?php
            endif;
            ?>



            <div class="row">
            <div class="col-12">    
            <h1>Top commentaire</h1> 

            <?php 
            //Affichage de tous les commentaires de l'annonce
            foreach ($TopCom as $row) 
            {
            //Prenom de la personne mettant le commentaire
            echo "<p>".$row->in_prenom;

            //Commentaire de la personne
            echo $row->com_avis;

            //Note de la personne
            echo $row->com_notes;

            //Date et heure du commentaire
            echo $row->com_date_ajout." </p>";    

            }
            ?>
            </div>
            </div>
            <div class="row">
            <div class="col-12">
            <h1>Pire commentaire</h1> 
            <div class="comment"><?php 
            //Affichage de tous les commentaires de l'annonce
            foreach ($PirCom as $row) 
            {
            //Prenom de la personne mettant le commentaire
            echo "<p>".$row->in_prenom;

            //Commentaire de la personne
            echo $row->com_avis;

            //Note de la personne
            echo $row->com_notes;

            //Date et heure du commentaire
            echo $row->com_date_ajout." </p>";    

            }
            ?>
            </div>
            </div>
            </div>

            <a href="<?= site_url("MembresController/Commentaires")?>">Voir tout les commentaires</a><br><br>





        <style type="text/css">
            body {
                background-image:url("<?php echo base_url();?>/assets/images/Wazbg.jpg");
            }
        </style>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>