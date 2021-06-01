<head>
<meta charset="utf-8">
<link rel="stylesheet" href="<?= base_url("assets/CSS/HeaderStyle.css") ?>">
</head>
<body>

        <div id="logo"></div>

            <div id="topnav">
                <a href="<?= site_url("AccueilController/Accueil")?>">Accueil</a>
                <a href="<?= site_url("AnnoncesController/Loca")?>">Locations</a>
                <a href="<?= site_url("AnnoncesController/Ventes")?>">Ventes</a>
                <a href="<?= site_url("EmployesController/PageNous")?>">Nous</a>


                <?php if($this->session->role == "Internaute")
                {
                    $url=site_url("AuthentificationController/DetailsCompte");
                    echo "<a href='$url'>Détails du compte</a>";
                }
                else if($this->session->role == "Employe")
                {
                    $url=site_url("EmployesController/DetailsCompte");
                    echo "<a href='$url'>Détails du compte</a>";
                }?>


                <?php if($this->session->role != "Employe")
                {
                    $url=site_url("ContactController/Formulaire");
                    echo "<a href='$url'>Contact</a>";
                }?>

                <?php if($this->session->role != "Employe" && $this->session->role != "Internaute")
                {
                    $url=site_url("AuthentificationController/Inscription");
                    echo "<a href='$url'>Inscription</a>";
                }?>


                <?php if($this->session->role == "Employe")
                {
                    $url1=site_url("BiensController/ListeBiens");
                    $url2=site_url("MembresController/ListeMembres");
                    $url3=site_url("ContactController/ListeContact");
                    $url4=site_url("EmployesController/ListeEmployes");

                    echo "<a href='$url1'>ListeBiens(admin)</a>
                    <a href='$url2'>ListeMembres(admin)</a>
                    <a href='$url3'>ListeContact(admin)</a>
                    <a href='$url4'>ListeEmployes(admin)</a>";
                }?>

                <?php if(isset($this->session->login))
                {
                    // echo "Bonjour, ".$this->session->role.", ".$this->session->nom.", ".$this->session->prenom;

                    $url=site_url("AuthentificationController/Deconnexion");
                    echo "<form action='$url' method='post'>";

                    echo "<button type='submit' class='btn btn-dark'>Deconnexion</button>";

                    echo "</form>";
                }
                else
                {
                    $url=site_url("AuthentificationController/login");
                    echo "<a href='$url'>Connexion</a>";
                }?>

            </div>

            <?php if(!empty($RefusAcces)){echo $RefusAcces;}?>

</body>