<?php include 'connexion_bdd.php'; ?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>
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
	
 	</body>
</html>