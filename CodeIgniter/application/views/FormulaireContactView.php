<?php echo form_open(); ?>


<head>
    <meta charset="utf-8">
    <title>Wazaa Immo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("assets/CSS/formsstyle.css") ?>">
</head>

<body>


<div class="container col-4">


    <form class="form-horizontal" role="form">
        <div class='container'>

            <div class='row'>
                <div class="col-12">
                    <div class="form-heading">
                        <span class="prg">Nous contacter</span>
                    </div>
                </div>
            </div>

                <div class="col-12">

                    <div class="form-group">
                        <label for="prenom" class="col-8 control-label mx-auto d-block">Objet</label>
                        <div class="col-8 mx-auto">
                            <input type="text" class="form-control" name="prenom" id="prenom" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment" class="col-8 control-label mx-auto d-block">Message</label>
                        <div class="col-8 mx-auto">
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 d-flex justify-content-center form-group">
                        <button type="submit" class="btn">ENVOYER</button>
                    </div>

                </div>

        </div>
    </form>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>