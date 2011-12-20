<?php
include_once ("connexion_bdd.php");
include("fonction.php");
spl_autoload_register('autoClass_racine');

$_POST['favoris'];
$new=new avoir_films_favoris("id_users","id_films");
$new->avoir_films_favoris_delete();
var_dump ($new);
?>

<html>
   <!--  <META http-equiv="Refresh" content = "0;URL=page_user.php">  -->

</html>