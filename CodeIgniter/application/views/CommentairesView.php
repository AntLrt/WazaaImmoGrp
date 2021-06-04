<head>
        <meta charset="utf-8">
        <title>Wazaa Immo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("assets/CSS/formsstyle.css") ?>">
</head>
<br>
<div class='row'>

<form action="" method="GET">
    <button type="submit" class='btn btn-outline-danger' name="Trie" value="NoteCroissante"> Note Croissante</button>
    <button type="submit" class='btn btn-outline-danger' name="Trie" value="NoteDecroissante"> Note Decroissante</button>
</form> 

<?php 
    $url=site_url("MembresController/Commentaires"); 
    echo "<form action='$url' method='post'>";
?>
    <button type="submit" class='btn btn-outline-danger' value="Date croissante"> Date croissante</button>
</form> 

<form action="" method="GET">
    <button type="submit" name="Trie" class='btn btn-outline-danger' value="DateDecroissante"> Date Decroissante</button>
</form> 

</div>


<div class="container col-12" id="topworst">    
            <div class='row'>
                <div class="col">
                    <div class="form-heading" id="top">
                        <span class="prg alert alert-dark font-weight-bold">Tout les commentaires</span>
                    </div>
                </div>
            </div>
            </div>



        <?php if(isset($_GET['Trie'])){$TypeDeTrie = $_GET['Trie'];}

        if(!isset($_GET['Trie']) ):        
        //Affichage de tous les commentaires de l'annonce trié par date décroissante
        foreach ($ResDateDecroissante as $data): 
        ?>
            <?php
            //Prenom et note de la personne mettant le commentaire
            echo "<ul class='list-group list-group-flush' id='tw'><li class='list-group-item list-group-item-action'> Prénom : ".$data->in_prenom."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Note : ".$data->com_notes."/5</li>";

            //Commentaire de la personne
            echo "<li class='list-group-item list-group-item-action'>".$data->com_avis."</li>";

            //Date et heure du commentaire
            $Date = $data->com_date_ajout;
            $Date = date("d-m-Y h:i", strtotime($Date));
            echo "<li class='list-group-item list-group-item-action'>".$Date."</li></ul>";  
            ?>
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
            
            <?php
            //Prenom et note de la personne mettant le commentaire
            echo "<ul class='list-group list-group-flush' id='tw'><li class='list-group-item list-group-item-action'> Prénom : ".$data->in_prenom."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Note : ".$data->com_notes."/5</li>";

            //Commentaire de la personne
            echo "<li class='list-group-item list-group-item-action'>".$data->com_avis."</li>";

            //Date et heure du commentaire
            $Date = $data->com_date_ajout;
            $Date = date("d-m-Y h:i", strtotime($Date));
            echo "<li class='list-group-item list-group-item-action'>".$Date."</li></ul>";  
            ?>
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
            
            <?php
            //Prenom et note de la personne mettant le commentaire
            echo "<ul class='list-group list-group-flush' id='tw'><li class='list-group-item list-group-item-action'> Prénom : ".$data->in_prenom."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Note : ".$data->com_notes."/5</li>";

            //Commentaire de la personne
            echo "<li class='list-group-item list-group-item-action'>".$data->com_avis."</li>";

            //Date et heure du commentaire
            $Date = $data->com_date_ajout;
            $Date = date("d-m-Y h:i", strtotime($Date));
            echo "<li class='list-group-item list-group-item-action'>".$Date."</li></ul>";  
            ?>
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
            
            <?php
            //Prenom et note de la personne mettant le commentaire
            echo "<ul class='list-group list-group-flush' id='tw'><li class='list-group-item list-group-item-action'> Prénom : ".$data->in_prenom."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Note : ".$data->com_notes."/5</li>";

            //Commentaire de la personne
            echo "<li class='list-group-item list-group-item-action'>".$data->com_avis."</li>";

            //Date et heure du commentaire
            $Date = $data->com_date_ajout;
            $Date = date("d-m-Y h:i", strtotime($Date));
            echo "<li class='list-group-item list-group-item-action'>".$Date."</li></ul>";  
            ?>
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