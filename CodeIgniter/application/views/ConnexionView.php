<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("assets/CSS/formsstyle.css") ?>">
</head>

<body>

<div class="container col-5" id="connexion">

  <form action="<?=site_url("AuthentificationController/Login")?>" method="post">

        <div class='row'>
            <div class="col-12">
                <div class="form-heading">
                    <span class="prg">Connexion</span>
                </div>
            </div>
        </div>


        <div class="row mb-3 justify-content-center" id="logmail">
          <!-- <label for="login" class="col-sm-2 col-form-label">Mail</label> -->
              <div class="col-sm-6">
                  <input type="email" class="form-control" id="login" name="login_name" placeholder="Votre mail">
              </div>
        </div>

        <div class="row mb-3 justify-content-center" id="logmp">
          <!-- <label for="password" class="col-sm-2 col-form-label">Mot de passe</label> -->
            <div class="col-sm-6">
                <input type="password" class="form-control" id="password" name="password_name" placeholder="Votre mot de passe">
                <input type="checkbox" onclick="myFunction()"> Afficher mot de passe
            </div>
        </div>


              <script>
              function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
              </script>

          <button type="submit" class="btn" id="but">Connexion</button>
  </form>

</div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>