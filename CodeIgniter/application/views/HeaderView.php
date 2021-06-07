<head>
<meta charset="utf-8">
<link rel="stylesheet" href="<?= base_url("assets/CSS/HeaderStyle.css") ?>">
<link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/logo_small_icon_only_inverted.png" type='images/png'>
</head>

<body>

            <div id="topnav">

                <div class="logo" id="logo"></div>

                <style type="text/css">
                    .logo {
                        background-image:url("<?php echo base_url();?>/assets/images/logo_navbar.png");
                        background-repeat: no-repeat;
                        height: 66;
                        width: 500;
                        position: sticky;
                        padding-bottom: 20px;
                        opacity: 100%;
                    }
                </style>

                <a href="<?= site_url("AccueilController/Accueil")?>">Accueil</a>
                <a href="<?= site_url("AnnoncesController/Loca")?>">Locations</a>
                <a href="<?= site_url("AnnoncesController/Ventes")?>">Ventes</a>
                <a href="<?= site_url("EmployesController/PageNous")?>">Nous</a>


                <?php if($this->session->role == "Internaute")
                {
                    $url=site_url("MembresController/DetailsCompte");
                    echo "<a href='$url'>Votre compte</a>";
                }
                else if($this->session->role == "Employe")
                {
                    $url=site_url("EmployesController/DetailsCompte");
                    echo "<a href='$url'>Votre compte</a>";
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
                    $url5=site_url("AnnoncesController/ListeAnnonces");

                    echo "<a href='$url1'>ListeBiens</a>
                    <a href='$url2'>ListeMembres</a>
                    <a href='$url3'>ListeContact</a>
                    <a href='$url4'>ListeEmployes</a>
                    <a href='$url5'>ListeAnnonces</a>";
                }?>

                <?php if(isset($this->session->login))
                {
                    $url=site_url("AuthentificationController/Deconnexion");
                    echo "<form action='$url' method='post' id='unlog'>";

                    echo "<button type='submit' class='btn btn-outline-danger' id='unlog'>Deconnexion</button>";

                    echo "</form>";
                }
                else
                {
                    $url=site_url("AuthentificationController/login");
                    echo "<a href='$url'>Connexion</a>";
                }?>

            </div>

            <?php if(!empty($RefusAcces)){echo $RefusAcces;}?>

            <style type="text/css">
                body {
                    background-image:url("<?php echo base_url();?>/assets/images/Wazbg.jpg");
                    background-attachment:fixed;
                }
            </style>

</body>