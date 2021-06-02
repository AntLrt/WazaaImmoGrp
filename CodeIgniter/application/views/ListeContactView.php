<h1>Liste des formulaires de contact reçu à traiter</h1>


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
            <th>ID Internaute</th>
            <th>Date d'envoi</th>
            <th>Email</th>
            <th>Sujet</th>
            <th>Question</th>
            <th>Traitement</th>
        </tr>
    </thead>
    <tbody>
    <?php $url = site_url("ContactController/Traitement"); foreach ($liste_contact0 as $row):?>
        <tr>
            <td><?php echo $row->in_id ?></td>
            <td><?php echo $row->co_date_ajout ?></td>
            <td><?php echo $row->in_email ?></td>
            <td><?php echo $row->co_sujet ?></td>
            <td><?php echo $row->co_question ?></td>
            <td><button class="btn" value="Submit" onclick="window.location.href = '<?php echo $url.'/'.$row->emp_id.'/'.$row->in_id.'/'.$row->co_sujet.'/' ?>';">Details/Traiter</button></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Liste des formulaires de contact traité</h1>


<table>
    <thead>
        <tr>
            <th>ID Internaute</th>
            <th>Date d'envoi</th>
            <th>Email</th>
            <th>Sujet</th>
            <th>Question</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($liste_contact1 as $row):?>
        <?php $url=site_url("ContactController/Traitement");
        echo "<form action='$url' method='post'>"; ?>

        <tr>
            <td><?php echo $row->in_id ?></td>
            <td><?php echo $row->co_date_ajout ?></td>
            <td><?php echo $row->in_email ?></td>
            <td><?php echo $row->co_sujet ?></td>
            <td><?php echo $row->co_question ?></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>