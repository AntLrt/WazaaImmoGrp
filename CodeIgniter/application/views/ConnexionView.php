<form action="<?=site_url("AuthentificationController/Login")?>" method="post"> 



<div class="form-group">
<div>
        <label for="login">Mail</label>
        <input type="text" id="login_id" name="login_name" placeholder="">
    </div>  <br>
    <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" id="password_id" name="password_name" placeholder="">
        <input type="checkbox" onclick="myFunction()">Afficher mot de passe 
    </div>

<br>
<script>
function myFunction() {
  var x = document.getElementById("password_id");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<button type="submit" class="btn btn-dark">Connexion</button>
</form>



</body>
</html>