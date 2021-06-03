<form action="" method="GET">
    <input type="submit" name="Trie" value="NoteCroissante">
    <input type="submit" name="Trie" value="NoteDecroissante">
</form> 

<?php 
    $url=site_url("MembresController/Commentaires"); 
    echo "<form action='$url' method='post'>";
?>
    <input type="submit" value="Date croissante">
</form> 

<form action="" method="GET">
    <input type="submit" name="Trie" value="DateDecroissante">
</form> 

<div class="row">
    <div class="col-12">
        <h1>Tout les commentaires</h1>
        <?php if(isset($_GET['Trie'])){$TypeDeTrie = $_GET['Trie'];}

        if(!isset($_GET['Trie']) ):        
        //Affichage de tous les commentaires de l'annonce trié par date décroissante
        foreach ($ResDateDecroissante as $data): 
        ?>
            
        <!-- Prénom de la personne mettant le commentaire -->
        <p> <?php echo $data->in_prenom; ?> </p>
        
        <!-- Commentaire de la personne -->
        <p> <?php echo $data->com_avis; ?> </p>
        
        <!-- Note de la personne -->
        <p> <?php echo $data->com_notes; ?> </p>
        
        <!-- Date et heure du commentaire -->
        <p> <?php echo $data->com_date_ajout; ?> </p>
        <br>
        <br>
        
        <?php
        endforeach;
        ?>

        </div>
    
        
        <?php if (isset($links)) { ?>
                    <?php echo $links ?>
                <?php } ?>
            </div>
    </div>
        
        
        <?php elseif($TypeDeTrie == 'NoteCroissante'): 
        
        //Affichage de tous les commentaires de l'annonce trié par Note croissante
        foreach ($ResNoteCroissante as $data): 
        ?>
            
        <!-- Prénom de la personne mettant le commentaire -->
        <p> <?php echo $data->in_prenom; ?> </p>
        
        <!-- Commentaire de la personne -->
        <p> <?php echo $data->com_avis; ?> </p>
        
        <!-- Note de la personne -->
        <p> <?php echo $data->com_notes; ?> </p>
        
        <!-- Date et heure du commentaire -->
        <p> <?php echo $data->com_date_ajout; ?> </p>
        <br>
        <br>
        
        <?php
        endforeach;
        ?>

        </div>
    
        
        <?php if (isset($links)) { ?>
                    <?php echo $links ?>
                <?php } ?>
            </div>
    </div>

    <?php elseif($TypeDeTrie == 'NoteDecroissante'): 
        
        //Affichage de tous les commentaires de l'annonce trié par Note croissante
        foreach ($ResNoteDecroissante as $data): 
        ?>
            
        <!-- Prénom de la personne mettant le commentaire -->
        <p> <?php echo $data->in_prenom; ?> </p>
        
        <!-- Commentaire de la personne -->
        <p> <?php echo $data->com_avis; ?> </p>
        
        <!-- Note de la personne -->
        <p> <?php echo $data->com_notes; ?> </p>
        
        <!-- Date et heure du commentaire -->
        <p> <?php echo $data->com_date_ajout; ?> </p>
        <br>
        <br>
        
        <?php
        endforeach;
        ?>

        </div>
    
        
        <?php if (isset($links)) { ?>
                    <?php echo $links ?>
                <?php } ?>
            </div>
    </div>

    <?php elseif($TypeDeTrie == 'DateDecroissante'): 
        
        //Affichage de tous les commentaires de l'annonce trié par Note croissante
        foreach ($ResDateCroissante as $data): 
        ?>
            
        <!-- Prénom de la personne mettant le commentaire -->
        <p> <?php echo $data->in_prenom; ?> </p>
        
        <!-- Commentaire de la personne -->
        <p> <?php echo $data->com_avis; ?> </p>
        
        <!-- Note de la personne -->
        <p> <?php echo $data->com_notes; ?> </p>
        
        <!-- Date et heure du commentaire -->
        <p> <?php echo $data->com_date_ajout; ?> </p>
        <br>
        <br>
        
        <?php
        endforeach;
        ?>

        </div>
    
        
        <?php if (isset($links)) { ?>
                    <?php echo $links ?>
                <?php } ?>
            </div>
    </div>









        <?php endif; ?>

</body>
</html>