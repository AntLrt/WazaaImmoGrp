<div class="row">
    <div class="col-12">
        <h1>Tout les commentaires</h1>
        <?php 
        //Affichage de tous les commentaires de l'annonce
        foreach ($ToutCom as $row): 
        ?>
        
        <!-- Prénom de la personne mettant le commentaire -->
        <p> <?php echo $row->in_prenom; ?> </p>
        
        <!-- Commentaire de la personne -->
        <p> <?php echo $row->com_avis; ?> </p>
        
        <!-- Note de la personne -->
        <p> <?php echo $row->com_notes; ?> </p>
        
        <!-- Date et heure du commentaire -->
        <p> <?php echo $row->com_date_ajout; ?> </p>
        <br>
        <br>
        
        <?php
        endforeach;
        ?>
    </div>
</div>









</body>
</html>