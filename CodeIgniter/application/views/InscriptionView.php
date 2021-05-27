<?php echo form_open(); ?>

<div class="form-group">
   <label for="pro_libelle">Nom :</label>
   <input type="text" name="in_nom" id="lastname_id" class="form-control" value="<?php echo set_value('in_nom'); ?>">
   <?php echo form_error('in_nom'); ?>
</div> 

<div class="form-group">
   <label for="pro_ref">Prénom :</label>
   <input type="text" name="in_prenom" id="name_id" class="form-control" value="<?php echo set_value('in_prenom'); ?>">
   <?php echo form_error('in_prenom'); ?>
</div> 

<div class="form-group">
   <label for="pro_ref">Adresse :</label>
   <input type="text" name="in_adresse" id="city_id" class="form-control" value="<?php echo set_value('in_adresse'); ?>">
   <?php echo form_error('in_adresse'); ?>
</div> 

<div class="form-group">
   <label for="pro_ref">Téléphone :</label>
   <input type="number" name="in_telephone" id="bday_id" class="form-control" value="<?php echo set_value('in_telephone'); ?>">
   <?php echo form_error('in_tel'); ?>
   
</div> 

<div class="form-group">
   <label for="pro_ref">E-mail :</label>
   <input type="email" name="in_email" id="mail_id" class="form-control" value="<?php echo set_value('in_email'); ?>">
   <?php echo form_error('in_email'); ?>
</div> 

<div class="form-group">
   <label for="pro_ref">Pays :</label>
   <input type="text" id="country_id" name="in_pays"class="form-control" value="<?php echo set_value('in_pays'); ?>">
   <?php echo form_error('in_pays'); ?>
</div>

<div class="form-group">
   <label for="pro_ref">Mot de passe :</label>
   <input type="password" id="password_id" name="in_mdp"class="form-control" value="<?php echo set_value('in_mdp'); ?>">
   <input type="checkbox" onclick="ShowPassword()">Afficher mot de passe 
   <?php echo form_error('in_mdp'); ?>
</div>

<div class="form-group">
   <label for="pro_ref">Confirmation mot de passe :</label>
   <input type="text" id="password_id2" name="mdp_confirm"class="form-control" value="" >
   <?php echo form_error('mdp_confirm'); ?>
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



<button type="submit" class="btn btn-dark" value="Submit">Créer un compte !</button> 
</form>

