<div class="row">
<div class="col-12">    
<?php 
if($this->session->role == "Employe"){
foreach ($Details as $row) 
{
    echo "<p> ".$row->emp_nom;
    echo $row->emp_prenom;
    echo $row->emp_tel;
    echo $row->emp_mail;
    echo $row->emp_mdp;
    echo $row->emp_poste;
    echo $row->emp_adresse." </p>";     
}}

else if($this->session->role == "Internaute"){
    foreach ($Details as $row) 
    {
        echo "<p>".$row->in_prenom;
        echo $row->in_nom;
        echo $row->in_telephone;
        echo $row->in_email;
        echo $row->in_mdp;
        echo $row->in_pays;
        echo $row->in_adresse." </p>";     
    }}
?>
</div>
</div>


</body>
</html>