<h1>Liste des annonces active</h1>


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
            <th>Nombre de vues</th>
            <th>Ville</th>
            <th>Type d'offre</th>
            <th>Date d'ajout</th>
            <th>Titre</th>
            <th>Date dernière modification</th>
            <th>Détails/Modifier</th>
            <th>Détails/Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php $url1 = site_url("AnnoncesController/Modification");$url2 = site_url("AnnoncesController/Supression");
    foreach ($liste_annonces1 as $row):?>
        <tr>
        <td><?php echo $row->an_id ?></td>
            <td><?php echo $row->an_ref ?></td>
            <td><?php echo $row->an_nbre_vues ?></td>
            <td><?php echo $row->bi_local ?></td>
            <td><?php echo $row->an_offre ?></td>
            <td><?php echo $row->an_date_ajout ?></td>
            <td><?php echo $row->an_titre ?></td>
            <td><?php echo $row->an_date_modif ?></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url1.'/'.$row->an_id ?>';">Details/Modifier</button></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url2.'/'.$row->an_id ?>';">Details/Supprimer</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Liste des annonces non active</h1>


<table>
    <thead>
        <tr>
        <th>ID</th>
            <th>Réference</th>
            <th>Nombre de vues</th>
            <th>Ville</th>
            <th>Type d'offre</th>
            <th>Date d'ajout</th>
            <th>Titre</th>
            <th>Date dernière modification</th>
            <th>Détails/Modifier</th>
            <th>Détails/Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($liste_annonces0 as $row):?>
        <?php $url=site_url("ContactController/Traitement");
        echo "<form action='$url' method='post'>"; ?>

        <tr>
        <td><?php echo $row->an_id ?></td>
            <td><?php echo $row->an_ref ?></td>
            <td><?php echo $row->an_nbre_vues ?></td>
            <td><?php echo $row->bi_local ?></td>
            <td><?php echo $row->an_offre ?></td>
            <td><?php echo $row->an_date_ajout ?></td>
            <td><?php echo $row->an_titre ?></td>
            <td><?php echo $row->an_date_modif ?></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url1.'/'.$row->an_id ?>';">Details/Modifier</button></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url2.'/'.$row->an_id ?>';">Details/Supprimer</button></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>