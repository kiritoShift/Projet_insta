<!DOCTYPE html>
<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page d'administration</title>
  </head>
 
	<body>
	<h2> Page d'Admin </h2>
	
	
	<?php include '/fonction.php'; ?>
	<?php include 'classes/utilisateurs.php';?>
	
<form method="post" action="traitement.php">
   <p>
       Action à effectuer :<br />
       <input type="checkbox" name="supprimer" id="supprimer" /> <label for="supprimer">Supprimer utilisateur</label><br />
       <input type="checkbox" name="modifer_user" id="modifier_user" /> <label for="modifier_user">Modifier utilisateur</label><br />       
       <input type="checkbox" name="reinitmdp" id="reinit_mdp" /> <label for="reinit_mdp">Réinitialiser MDP</label><br />
   </p>
</form>
	
	<?php
	
	


	?>
	
 	</body>
</html>