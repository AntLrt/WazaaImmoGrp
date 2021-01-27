
<?php
$liaison = mysqli_connect('127.0.0.1', 'root', '') or die ('Accès à la base de donnée impossible !!!');
mysqli_select_db($liaison, 'waz_immo') or die ('Accès à la base de donnée impossible !!!');
?>