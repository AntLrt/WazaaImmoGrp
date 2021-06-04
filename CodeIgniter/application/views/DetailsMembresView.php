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
            <th>Pays</th>
        </tr>
    </thead>
    <tbody>
    <?php  foreach ($liste_membres as $row):
        
            
        if($row->in_id == $id): 

            $id=$row->in_id;
            $url = site_url("MembresController/Supression/$id");
            echo "<form action='$url' method='post'>"; ?>
        <tr>
            <td><input name='inid' value='<?php echo $row->in_id ?>' readonly='false'></a></td>

            <td><input name='dateajout' value='<?php echo $row->in_nom ?>' readonly='false'></a></td>
            <td><input name='email' value='<?php echo $row->in_prenom ?>' readonly='false'></a></td>
            <td><input name='sujet' value='<?php echo $row->in_adresse ?>' readonly='false'></a></td>
            <td><input name='question' value='<?php echo $row->in_telephone ?>' readonly='false'></a></td>
            <td><input name='question' value='<?php echo $row->in_telephone ?>' readonly='false'></a></td>
            <td><input name='question' value='<?php echo $row->in_telephone ?>' readonly='false'></a></td>
        </tr>

        <?php endif; endforeach; ?>
    </tbody>
</table>
<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer le compte de ce membre et toutes les données associés ?'));">Supprimer ce compte membre</button>

