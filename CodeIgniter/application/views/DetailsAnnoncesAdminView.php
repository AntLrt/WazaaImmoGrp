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
        </tr>
    </thead>
    <tbody>
    <?php $url = site_url("ContactController/Traitement"); 
    foreach ($liste_contact0 as $row): 
        
        if($row->in_id == $intid && $row->emp_id == $empid && $row->co_sujet == $cosujet): ?>
            <?php $url=site_url("ContactController/Traitement/$empid/$intid/$cosujet");
            echo "<form action='$url' method='post'>"; ?>
        <tr>
            <td><input name='inid' value='<?php echo $row->in_id ?>' readonly='false'></a></td>
            <td><input name='dateajout' value='<?php echo $row->co_date_ajout ?>' readonly='false'></a></td>
            <td><input name='email' value='<?php echo $row->in_email ?>' readonly='false'></a></td>
            <td><input name='sujet' value='<?php echo $row->co_sujet ?>' readonly='false'></a></td>
            <td><input name='question' value='<?php echo $row->co_question ?>' readonly='false'></a></td>
        </tr>
        <td><button class="btn" value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir traiter ce formumaire ?'));">Déclarer ce formulaire comme traité</button></td>

        <?php endif; endforeach; ?>
    </tbody>
</table>

