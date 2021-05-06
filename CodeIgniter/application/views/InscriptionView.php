
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
   <small>Format: 01-02-03-04-05</small>
   
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


    <button type="submit" class="btn btn-dark" value="Submit">Créer un compte !</button> 
    <button type="submit" onclick="<?php $this->session->sess_destroy();?>" class="btn btn-dark">disconnect </button>   
</form>

