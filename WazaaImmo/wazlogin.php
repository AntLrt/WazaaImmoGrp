<?php

include("wazheader.php");

?>
<br>
<form>
    <div class="container">
        <div class="form-group">
            <label for="inputEmail1">Votre email</label>
                <input type="email" class="form-control" id="inputEmail1" placeholder="azerty@wxc.fr">
        </div>

        <div class="form-group">
            <label for="inputmp1">Mot de passe</label>
                <input type="password" id="inputmp1" class="form-control" aria-describedby="passwordHelpBlock" placeholder="*******">
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label text-muted" for="gridCheck">
                    Rester connecté.
                    </label>
            </div>
        </div>

        <button type="button" class="btn btn-dark border-danger">Connexion</button>
    </div>
</form>
<br>