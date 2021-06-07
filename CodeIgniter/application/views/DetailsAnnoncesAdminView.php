<style type="text/css">
table,
td {
    border: 1px solid #333;
}

thead,
tfoot {
    background-color: #333;
    color: #fff;
}
table {background-color: white;}
</style>


<table>
    <thead>
        <tr>
        <th>ID Annonce </th>
        <th>ID Bien</th>
            <th>Prix</th>
            <th>Active ? 1=oui 0=non</th>
            <th>Réference</th>
            <th>Date disponibilité</th>
            <th>Nombre vues</th>
            <th>Date d'ajout</th>



        </tr>
    </thead>
    <tbody>
    <?php  foreach ($Details as $row):
        
            
        if($row->an_id == $id): 

            $id=$row->an_id;
            if($provenance == 'Supression'){
            $url = site_url("AnnoncesController/Supression/$id");
            echo "<form action='$url' method='post'>";}
            
            else if($provenance == 'Modification'){
                $url = site_url("AnnoncesController/Modification/$id");
                echo "<form action='$url' method='post'>";}?>

<?php if($provenance == 'Supression'){ ?>
        <tr>
        <td><input name='anid' value='<?php echo $row->an_id  ?>'readonly='false'></a></td>
            <td><input name='biid' value='<?php echo $row->bi_id ?>' readonly='false'></a></td>
            <td><input name='prix' value='<?php echo $row->an_prix ?>' readonly='false'></a></td>
            <td><input name='estactive' value='<?php echo $row->an_est_active ?>' readonly='false'></a></td>
            <td><input name='anref' value='<?php echo $row->an_ref ?>' readonly='false'></a></td>
            <td><input name='datedispo' value='<?php echo $row->an_date_disponibilite ?>' readonly='false'></a></td>
            <td><input name='nbrevues' value='<?php echo $row->an_nbre_vues ?>' readonly='false'></a></td>   
            <td><input name='dateajout' value='<?php echo $row->an_date_ajout ?>' readonly='false'></a></td>          
        </tr>

        </tbody>
</table>

<br>

<table>
    <thead>
    <tr>
<th>Date dernière modification</th>
            <th>Titre</th>
            <th>Type de bien</th>
            <th>Type d'offre (A,L ou V)</th>
            <th>Nombre de pièces</th>
            <th>Description</th>
            <th>Ville</th>
            <th>Diagnostic energétique</th>

            </tr>
    </thead>
    <tbody>
        <tr>
    <td><input name='datemodif' value='<?php echo $row->an_date_modif ?>' readonly='false'></a></td>          
            <td><input name='titre' value='<?php echo $row->an_titre ?>' readonly='false'></a></td>          
            <td><input name='typebien' value='<?php echo $row->bi_type ?>' readonly='false'></a></td>   
            <td><input name='typeoffre' value='<?php echo $row->an_offre ?>' readonly='false'></a></td>  
            <td><input name='nbrepieces' value='<?php echo $row->bi_pieces ?>' readonly='false'></a></td>                 
            <td><input name='description' value='<?php echo $row->bi_description ?>' readonly='false'></a></td>                 
            <td><input name='ville' value='<?php echo $row->bi_local ?>' readonly='false'></a></td>                 
            <td><input name='diagnostic' value='<?php echo $row->bi_diagnostic ?>' readonly='false'></a></td>                 

            

    </tr>
    </tbody>
</table>

    <?php } else if($provenance == 'Modification'){ ?>
        <tr>
            <td><input name='anid' value='<?php echo $row->an_id  ?>'readonly='false'></a></td>
            <td><input name='biid' value='<?php echo $row->bi_id ?>' readonly='false'></a></td>
            <td><input name='prix' value='<?php echo $row->an_prix ?>' ></a></td>
            <td><input name='estactive' value='<?php echo $row->an_est_active ?>' ></a></td>
            <td><input name='anref' value='<?php echo $row->an_ref ?>' ></a></td>
            <td><input name='datedispo' value='<?php echo $row->an_date_disponibilite ?>' ></a></td>
            <td><input name='nbrevues' value='<?php echo $row->an_nbre_vues ?>' readonly='false'></a></td>   
            <td><input name='dateajout' value='<?php echo $row->an_date_ajout ?>' readonly='false'></a></td>          
        </tr>
        </tbody>
</table>

<br>

<table>
    <thead>
    <tr>
<th>Date dernière modification</th>
            <th>Titre</th>
            <th>Type de bien</th>
            <th>Type d'offre (A,L ou V)</th>
            <th>Nombre de pièces</th>
            <th>Description</th>
            <th>Ville</th>
            <th>Diagnostic energétique</th>

            </tr>
    </thead>
    <tbody>
        <tr>
    <td><input name='datemodif' value='<?php echo $row->an_date_modif ?>' readonly='false'></a></td>          
            <td><input name='titre' value='<?php echo $row->an_titre ?>' ></a></td>          
            <td><input name='typebien' value='<?php echo $row->bi_type ?>' ></a></td>   
            <td><input name='typeoffre' value='<?php echo $row->an_offre ?>' ></a></td>  
            <td><input name='nbrepieces' value='<?php echo $row->bi_pieces ?>' ></a></td>                 
            <td><input name='description' value='<?php echo $row->bi_description ?>' ></a></td>                 
            <td><input name='ville' value='<?php echo $row->bi_local ?>' ></a></td>                 
            <td><input name='diagnostic' value='<?php echo $row->bi_diagnostic ?>' ></a></td>                 

            

    </tr>
    </tbody>
</table>

    <?php } ?>
    





<?php if($provenance == 'Supression'): ?>

<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette annonce ?'));">Supprimer cette annonce</button>


<?php elseif($provenance == 'Modification'): ?>
<br>
<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir modifier les données de cette annonce ?'));">Modifier cette annonce</button>

<?php endif; 
endif; endforeach;?>

