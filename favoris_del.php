<?php
include_once ("connexion_bdd.php");
include("fonction.php");
spl_autoload_register('autoClass_racine');


$new=new avoir_films_favoris("id_users", $_GET['id']);
$new->avoir_films_favoris_delete();


?>

<html>
   <META http-equiv="Refresh" content = "10;URL=page_user.php">

</html>