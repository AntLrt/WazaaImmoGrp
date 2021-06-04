
<h1>Liste des membres</h1>


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
            <th>Détails/Supression</th>
        </tr>
    </thead>
    <tbody>
    <?php $url = site_url("MembresController/Supression"); foreach ($liste_membres as $row): $id=$row->in_id?>
        <tr>
            <td><?php echo $row->in_id ?></td>
            <td><?php echo $row->in_nom ?></td>
            <td><?php echo $row->in_prenom ?></td>
            <td><?php echo $row->in_adresse ?></td>
            <td><?php echo $row->in_telephone ?></td>
            <td><?php echo $row->in_email ?></td>
            <td><?php echo $row->in_pays ?></td>
            <td><button class='btn btn-outline-danger' value="Submit" onclick="window.location.href = '<?php echo $url.'/'.$id ?>';">Détails/Supression</button></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
