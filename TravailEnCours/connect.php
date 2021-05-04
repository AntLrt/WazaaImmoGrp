


<form action="http://localhost/ci/index.php/connexion/login" method="post"> 



<div class="form-group">
<div>
        <label for="login">login</label>
        <input type="text" id="login_id" name="login_name" placeholder="">
    </div>  <br>
    <div>
        <label for="mdp">mot de passe</label>
        <input type="password" id="password_id" name="password_name" placeholder="">
    </div>

<br>


<button type="submit" class="btn btn-dark">Envoyer</button>
<button type="button" onclick="<?php $this->session->sess_destroy();?>" class="btn btn-dark">disconnect </button>
</form>

<a href ="http://localhost/ci/index.php/inscription/ajouter"> lien </a>

