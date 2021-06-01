<div class="row">
<div class="col-12">    
<?php 
if($this->session->role == "Employe"):
    foreach ($Details as $row):?>

        <p> <?php echo $row->emp_nom; ?> </p>
        <p> <?php echo $row->emp_prenom; ?> </p>
        <p> <?php echo $row->emp_tel; ?> </p>
        <p> <?php echo $row->emp_mail; ?> </p>
        <p> <?php echo $row->emp_mdp; ?> </p>
        <p> <?php echo $row->emp_poste; ?> </p>
        <p> <?php echo $row->emp_adresse; ?> </p>

    <?php endforeach;?>

<?php 
elseif($this->session->role == "Internaute"):
    foreach ($Details as $row): ?>
        <p> <?php echo $row->in_prenom; ?> </p>
        <p> <?php echo $row->in_nom; ?> </p>
        <p> <?php echo $row->in_telephone; ?> </p>
        <p> <?php echo $row->in_email; ?> </p>
        <p> <?php echo $row->in_mdp; ?> </p>
        <p> <?php echo $row->in_pays; ?> </p>
        <p> <?php echo $row->in_adresse; ?> </p>

    <?php endforeach;?>
<?php endif; ?>

</div>
</div>


</body>
</html>