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
        <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Mail</th>
            <th>Poste</th>
            <th>mot de passe</th>

        </tr>
    </thead>
    <tbody>
        
            

            <?php $url = site_url("EmployesController/Ajout");
            echo "<form action='$url' method='post'>"; ?>
            
<tr>

            <td><input name='nom'  ></a></td>
            <td><input name='prenom' ></a></td>
            <td><input name='adresse'  ></a></td>
            <td><input name='tel'  ></a></td>
            <td><input name='mail'  ></a></td>
            <td><input name='poste'  ></a></td> 
            <td><input name='mdp'  ></a></td>          
        </tr>


        
    </tbody>
</table>


<button class='btn btn-outline-danger' value="Submit" onclick="return(confirm('Etes-vous sûr de vouloir ajouter cet employé ?'));">Ajouter cet employé</button>




