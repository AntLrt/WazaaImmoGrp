<!-- application/views/liste.php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
</body>
</html> -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    
    
    <ul>
    <?php //$a= 0; while($a<5){echo "<li> ".$nomp[$a]." </li>";$a=$a+1;} ?>
    </ul>

<tr>
<?php 

foreach ($liste_biens as $row) 
{

echo" <td>".$row->bi_id."</td>";
echo"<td>".$row->bi_type."</td>";
echo"<td>".$row->bi_ref."</td>";
echo"<td>".$row->bi_local."</td>";
echo"<td>".$row->bi_estimations_vente."</td> ";    

}

?>
</tr>


<table>
   <tr>
      <td>ligne1 colonne1</td>
      <td>ligne1 colonne2</td>
      <td>ligne1 colonne3</td>
      <td>ligne1 colonne4</td>
   </tr>
   <tr>
      <td>ligne2 colonne1</td>
      <td>ligne2 colonne2</td>
      <td>ligne2 colonne3</td>
      <td>ligne2 colonne4</td>
   </tr>
...
</table>
</body>
</html>