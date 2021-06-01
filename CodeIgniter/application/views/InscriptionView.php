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

      <form>

         <div class='container'>

            <div class='row'>
               <div class="col-12">
                  <div class="form-heading">
                     <span class="prg">INSCRIPTION</span>
                  </div>
               </div>
            </div>

            <div class="form-group">
               <label for="pro_libelle">Nom</label>
                  <div class="col-8 mx-auto">
                     <input type="text" name="in_nom" id="lastname_id" class="form-control" value="<?php echo set_value('in_nom'); ?>">
                     <?php echo form_error('in_nom'); ?>
                  </div>
            </div> 

            <div class="form-group">
               <label for="pro_ref">Prénom</label>
                  <div class="col-8 mx-auto">
                     <input type="text" name="in_prenom" id="name_id" class="form-control" value="<?php echo set_value('in_prenom'); ?>">
                     <?php echo form_error('in_prenom'); ?>
                  </div>
            </div> 

            <div class="form-group">
               <label for="pro_ref">Adresse</label>
                  <div class="col-8 mx-auto">
                     <input type="text" name="in_adresse" id="city_id" class="form-control" value="<?php echo set_value('in_adresse'); ?>">
                     <?php echo form_error('in_adresse'); ?>
                  </div>
            </div> 

            <div class="form-group">
               <label for="pro_ref">Téléphone</label>
                  <div class="col-8 mx-auto">
                     <input type="number" name="in_telephone" id="bday_id" class="form-control" value="<?php echo set_value('in_telephone'); ?>">
                     <?php echo form_error('in_tel'); ?>
                  </div>
            </div> 

            <div class="form-group">
               <label for="pro_ref">E-mail</label>
                  <div class="col-8 mx-auto">
                     <input type="email" name="in_email" id="mail_id" class="form-control" value="<?php echo set_value('in_email'); ?>">
                     <?php echo form_error('in_email'); ?>
                  </div>
            </div> 

            <div class="form-group">
               <label for="pro_ref">Pays</label>
                  <div class="col-8 mx-auto">
                     <input type="text" id="country_id" name="in_pays"class="form-control" value="<?php echo set_value('in_pays'); ?>">
                     <?php echo form_error('in_pays'); ?>
                  </div>
            </div>

            <div class="form-group">
               <label for="pro_ref">Mot de passe</label>
                  <div class="col-8 mx-auto">
                     <input type="password" id="password_id" name="in_mdp"class="form-control" value="<?php echo set_value('in_mdp'); ?>">
                     <input type="checkbox" onclick="ShowPassword()"><small>Afficher mot de passe</small>
                     <?php echo form_error('in_mdp'); ?>
                  </div>
            </div>

            <div class="form-group">
               <label for="pro_ref">Confirmation mot de passe</label>
                  <div class="col-8 mx-auto">
                     <input type="text" id="password_id2" name="mdp_confirm"class="form-control" value="" >
                     <?php echo form_error('mdp_confirm'); ?>
                  </div>
            </div>


            <script>
            function ShowPassword() {
               var x = document.getElementById("password_id");
               if (x.type === "password") {
                  x.type = "text";
               } else {
                  x.type = "password";
               }
            }
            </script>


            <div class="col-xs-12 d-flex justify-content-center form-group">
               <button type="submit" class="btn" value="Submit">ENVOYER</button>
            </div>

         </div>

      </form>

   </div>

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </body>

