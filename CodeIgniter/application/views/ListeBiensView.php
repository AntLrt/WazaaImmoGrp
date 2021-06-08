<br>
<?php $url0 = site_url("BiensController/AjoutBien"); ?>

<td><button class='btn btn-outline-danger'  onclick="window.location.href = '<?php echo $url0 ?>';">Ajouter un bien</button></td>

<br>

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
            <th>Réference</th>
            <th>Type</th>
            <th>Ville</th>
            <th>Détails/Modifier</th>
            <th>Détails/Supprimer</th>
        </tr>
    </thead>
    <tbody>

<h1>Liste biens avec annonce déjà crée</h1>

    <?php $url1 = site_url("BiensController/Modification");$url2 = site_url("BiensController/Supression");
    foreach ($liste_biens0 as $row):?>

        <tr>
        <td><?php echo $row->bi_id ?></td>
            <td><?php echo $row->bi_ref ?></td>
            <td><?php echo $row->bi_type ?></td>
            <td><?php echo $row->bi_local ?></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url1.'/'.$row->bi_id ?>';">Details/Modifier</button></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url2.'/'.$row->bi_id ?>';">Details/Supprimer</button></td>
        </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

    
<h1>Liste biens avec annonce pas encore crée</h1>

<table>
    <thead>
        <tr>

            <th>ID</th>
            <th>Réference</th>
            <th>Type</th>
            <th>Ville</th>
            <th>Détails/Modifier</th>
            <th>Détails/Supprimer</th>
            <th>Ajouter en annonce</th>
        </tr>
    </thead>
    <tbody>

        <?php $url1 = site_url("BiensController/Modification");$url2 = site_url("BiensController/Supression");$url3 = site_url("AnnoncesController/Ajout");
    foreach ($liste_biens1 as $row):?>


        
        <tr>
        <td><?php echo $row->bi_id ?></td>
            <td><?php echo $row->bi_ref ?></td>
            <td><?php echo $row->bi_type ?></td>
            <td><?php echo $row->bi_local ?></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url1.'/'.$row->bi_id ?>';">Details/Modifier</button></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url2.'/'.$row->bi_id ?>';">Details/Supprimer</button></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url3.'/'.$row->bi_id ?>';">Ajouter comme annonce</button></td>
        </tr>

        <?php endforeach; ?>



        </tbody>
</table>
<br>

</body>
</html>