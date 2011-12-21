<?php
include_once ("connexion_bdd.php");
include("fonction.php");
spl_autoload_register('autoClass_racine');

$id_users= new utilisateurs("",$_SESSION['pseudo_users'],"","","","","","","","");
$id_users=$id_users->users_get_id();

$new=new avoir_films_favoris($id_users, $_GET['id']);
$new->avoir_films_favoris_delete();


?>

<META http-equiv="Refresh" content = "0;URL=page_user.php">