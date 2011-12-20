<?php include 'connexion_bdd.php'; ?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>
<?php include "connexion_bdd.php"?>
<?php include "classes/mot_de_passe.php"?>
<?php include "classes/utilisateurs.php"?>
<?php include "entete.php" ?>



 <div id="moncadre">
<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page liste utilisateurs</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Liste de tous les utilisateurs</h2>
	
	
	<?php 
	
	$tab2=liste_users();
	var_dump($tab2);
	
	?>
	
 	</div>
</html>