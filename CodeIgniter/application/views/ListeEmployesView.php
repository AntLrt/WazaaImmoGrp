<h1>Liste des employes</h1>


<?php $url0 = site_url("EmployesController/Ajout"); ?>

<td><button class='btn btn-outline-danger'  onclick="window.location.href = '<?php echo $url0 ?>';">Ajouter un employé</button></td>

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
        <br>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Mail</th>
           <th>Détails/Supression</th>
           <th>Détails/Modification</th>
            
        </tr>
    </thead>
    <tbody>
    <?php $url1 = site_url("EmployesController/Supression");$url2 = site_url("EmployesController/Modification"); foreach ($liste_employes as $row): $id=$row->emp_id?>
        <tr>
            <td><?php echo $row->emp_id ?></td>
            <td><?php echo $row->emp_nom ?></td>
            <td><?php echo $row->emp_prenom ?></td>
            <td><?php echo $row->emp_adresse ?></td>
            <td><?php echo $row->emp_tel ?></td>
            <td><?php echo $row->emp_mail ?></td>
          
            <td><button class='btn btn-outline-danger' value="Submit" onclick="window.location.href = '<?php echo $url1.'/'.$id ?>';">Détails/Supression</button></td>
            <td><button class='btn btn-outline-danger' value="Submit" onclick="window.location.href = '<?php echo $url2.'/'.$id ?>';">Détails/Modification</button></td>


        </tr>
        <?php endforeach; ?>
    </tbody>
</table>









</body>
</html>