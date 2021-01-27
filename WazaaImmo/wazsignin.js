var b_civilite=false; var b_nom=false; var b_prenom=false; var b_date=false; var b_mail=false; var b_mp=false;

function envoyer()
{
if(b_civilite==true && b_nom==true && b_prenom ==true && b_date ==true && b_mail ==true && b_mp==true)
{
document.getElementById('message').innerText = 'Envoi serveur'
//document.getElementById('inscription').submit();
}
else
{
document.getElementById('message').innerText = "Le formulaire n'est pas complet";
}
}