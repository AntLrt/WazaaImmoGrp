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
        <th>ID</th>
        <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Mail</th>
            <th>Poste</th>
        </tr>
    </thead>
    <tbody>
    <?php  foreach ($liste_employes as $row):
        
            
        if($row->emp_id == $id): 

            $id=$row->emp_id;
            if($provenance == 'suppression'){
            $url = site_url("EmployesController/Supression/$id");
            echo "<form action='$url' method='post'>";}
            
            else if($provenance == 'modification'){
                $url = site_url("EmployesController/Modification/$id");
                echo "<form action='$url' method='post'>";}?>

<?php if($provenance == 'suppression'){ ?>
        <tr>
            <td><input name='empid' value='<?php echo $row->emp_id ?>' readonly='false'></a></td>

            <td><input name='nom' value='<?php echo $row->emp_nom ?>' readonly='false'></a></td>
            <td><input name='prenom' value='<?php echo $row->emp_prenom ?>' readonly='false'></a></td>
            <td><input name='adresse' value='<?php echo $row->emp_adresse ?>' readonly='false'></a></td>
            <td><input name='tel' value='<?php echo $row->emp_tel ?>' readonly='false'></a></td>
            <td><input name='mail' value='<?php echo $row->emp_mail ?>' readonly='false'></a></td>
            <td><input name='poste' value='<?php echo $row->emp_poste ?>' readonly='false'></a></td>          
        </tr>
       <?php } else if($provenance == 'modification'){ ?>
        <tr>
            <td><input name='empid' value='<?php echo $row->emp_id  ?>'readonly='false'></a></td>

            <td><input name='nom' value='<?php echo $row->emp_nom ?>' ></a></td>
            <td><input name='prenom' value='<?php echo $row->emp_prenom ?>' ></a></td>
            <td><input name='adresse' value='<?php echo $row->emp_adresse ?>' ></a></td>
            <td><input name='tel' value='<?php echo $row->emp_tel ?>' ></a></td>
            <td><input name='mail' value='<?php echo $row->emp_mail ?>' ></a></td>
            <td><input name='poste' value='<?php echo $row->emp_poste ?>' ></a></td>          
        </tr>

        <?php } ?>
        
    </tbody>
</table>

<?php if($provenance == 'suppression'): ?>

<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet employé ?'));">Supprimer cet employé</button>


<?php elseif($provenance == 'modification'): ?>

<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir modifier les données de cet employé ?'));">Modifier cet employé</button>

<?php endif; 
endif; endforeach;?>

