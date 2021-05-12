<?php echo form_open(); ?>


<div class="form-group">
<label for="Sujet">Sujet</label>

<select name="Sujet" id="Sujet">
<option value="Autres">Sujet de la question</option>
<option value="Acheter">Acheter</option>
<option value="Louer">Louer</option>
<option value="Vendre">Vendre</option>
<option value="Autres">Autres</option>
</select>
</div> 
<br>
<div class="form-group">
<label for="Demande">Votre demande :</label>
<textarea rows="3" class="form-control" placeholder="Veuillez entrer votre demande" name="Demande" id="Demande"></textarea> 
</div>

<br>

<button type="submit" class="btn btn-dark">Envoyer</button>    
</form>



</body>
</html>