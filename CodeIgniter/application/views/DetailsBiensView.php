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

<?php if($provenance == 'Ajout'){ 
    $url = site_url("BiensController/AjoutBien");
    echo "<form action='$url' method='post'>";?>
<br>
    <table>
    <thead>
        <tr>
            <th>Type de bien</th>
            <th>nb de pièces</th>
            <th>Réference</th>
            <th>Description</th>
            <th>Ville</th>
            <th>Surface habitable</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td><input name='type'></a></td>
            <td><input name='pieces'></a></td>
            <td><input name='ref'></a></td>
            <td><input name='description'></a></td>
            <td><input name='ville'></a></td>   
            <td><input name='surfacehabitable'></a></td>          
        </tr>
        </tbody>
</table>

<br>

<table>
    <thead>
    <tr>
<th>Surface totale</th>
            <th>Estimation vente</th>
            <th>Estimation location</th>
            <th>Diagnostic energétique</th>

            </tr>
    </thead>
    <tbody>
        <tr>
    <td><input name='surfacetotale'></a></td>          
            <td><input name='estimvente'></a></td>          
            <td><input name='estimloca'></a></td>   
            <td><input name='diagnostic'></a></td>  

            

    </tr>
    </tbody>
</table>



<br>
<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir ajouter ce bien ?'));">Ajouter ce bien</button>

<?php } ?>

    <?php if(isset($Details)){ foreach ($Details as $row):
        
            
        if($row->bi_id == $id): 

            $id=$row->bi_id;
            if($provenance == 'Supression'){
            $url = site_url("BiensController/Supression/$id");
            echo "<form action='$url' method='post'>";}
            
            else if($provenance == 'Modification'){
                $url = site_url("BiensController/Modification/$id");
                echo "<form action='$url' method='post'>";}?>

<?php if($provenance == 'Supression'){ ?>

    <table>
    <thead>
        <tr>
        <th>ID Bien</th>
            <th>Type de bien</th>
            <th>nb de pièces</th>
            <th>Réference</th>
            <th>Description</th>
            <th>Ville</th>
            <th>Surface habitable</th>
        </tr>
    </thead>
    <tbody>

        <tr>
        <td><input name='biid' value='<?php echo $row->bi_id  ?>'readonly='false'></a></td>
            <td><input name='an' value='<?php echo $row->bi_type ?>' readonly='false'></a></td>
            <td><input name='prix' value='<?php echo $row->bi_pieces ?>' readonly='false'></a></td>
            <td><input name='estactive' value='<?php echo $row->bi_ref ?>' readonly='false'></a></td>
            <td><input name='anref' value='<?php echo $row->bi_description ?>' readonly='false'></a></td>
            <td><input name='datedispo' value='<?php echo $row->bi_local ?>' readonly='false'></a></td>
            <td><input name='nbrevues' value='<?php echo $row->bi_surf_habitable ?>' readonly='false'></a></td>   
        </tr>

        </tbody>
</table>

<br>

<table>
    <thead>
    <tr>
    <th>Surface totale</th>
            <th>Estimation vente</th>
            <th>Estimation location</th>
            <th>Diagnostic energétique</th>
            </tr>
    </thead>
    <tbody>
        <tr>
        <td><input name='typebien' value='<?php echo $row->bi_surf_totale ?>' readonly='false'></a></td>   
    <td><input name='datemodif' value='<?php echo $row->bi_estimation_vente ?>' readonly='false'></a></td>          
            <td><input name='titre' value='<?php echo $row->bi_estimation_location ?>' readonly='false'></a></td>          
            <td><input name='typebien' value='<?php echo $row->bi_diagnostic ?>' readonly='false'></a></td>   
    </tr>
    </tbody>
</table>

    <?php } else if($provenance == 'Modification'){ ?>
        <table>
    <thead>
        <tr>
        <th>ID Bien</th>
            <th>Type de bien</th>
            <th>nb de pièces</th>
            <th>Réference</th>
            <th>Description</th>
            <th>Ville</th>
            <th>Surface habitable</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td><input name='biid' value='<?php echo $row->bi_id ?>' readonly='false'></a></td>
            <td><input name='type' value='<?php echo $row->bi_type ?>' ></a></td>
            <td><input name='pieces' value='<?php echo $row->bi_pieces ?>' ></a></td>
            <td><input name='ref' value='<?php echo $row->bi_ref ?>' ></a></td>
            <td><input name='description' value='<?php echo $row->bi_description ?>' ></a></td>
            <td><input name='ville' value='<?php echo $row->bi_local ?>'></a></td>   
            <td><input name='surfacehabitable' value='<?php echo $row->bi_surf_habitable ?>'></a></td>          
        </tr>
        </tbody>
</table>

<br>

<table>
    <thead>
    <tr>
<th>Surface totale</th>
            <th>Estimation vente</th>
            <th>Estimation location</th>
            <th>Diagnostic energétique</th>

            </tr>
    </thead>
    <tbody>
        <tr>
    <td><input name='surfacetotale' value='<?php echo $row->bi_surf_totale ?>'></a></td>          
            <td><input name='estimvente' value='<?php echo $row->bi_estimation_vente ?>' ></a></td>          
            <td><input name='estimloca' value='<?php echo $row->bi_estimation_location ?>' ></a></td>   
            <td><input name='diagnostic' value='<?php echo $row->bi_diagnostic ?>' ></a></td>  

            

    </tr>
    </tbody>
</table>

    <?php } ?>
    





<?php if($provenance == 'Supression'): ?>
<br>
<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce bien ?'));">Supprimer ce bien</button>


<?php elseif($provenance == 'Modification'): ?>
<br>
<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir modifier les données de ce bien ?'));">Modifier ce bien</button>

<?php endif; 
endif; endforeach;}?>

