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
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

    <div class="container">
        <div class="col-12">
            <br>   
            <?php 
            if($this->session->role == "Employe"){
            foreach ($Details as $row) 
            {
                echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->emp_nom. "</p>";
                echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->emp_prenom. "</p>";
                echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->emp_tel. "</p>";
                echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->emp_mail. "</p>";
                echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->emp_mdp. "</p>";
                echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->emp_poste. "</p>";
                echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->emp_adresse."</p>";     
            }}

            else if($this->session->role == "Internaute"){
                foreach ($Details as $row) 
                {
                    echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->in_prenom. "</p>";
                    echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->in_nom. "</p>";
                    echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->in_telephone. "</p>";
                    echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->in_email. "</p>";
                    echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->in_mdp. "</p>";
                    echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->in_pays. "</p>";
                    echo "<p class='list-group-item list-group-item-action list-group-item-danger'>".$row->in_adresse."</p>";     
                }}
            ?>
            <br>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>