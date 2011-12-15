<!DOCTYPE html>
<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page d'administration</title>
  </head>
 
	<body>
	<h2 align=center> Bienvenue sur la page d'administration</h2>
	<br />

	<h3>Liste des utilisateurs :</h3>	
	
	<?php include '/fonction.php'; 
		$tab2=liste_users();
		var_dump($tab2);
	?>
	
	<br />
	
	<?php include 'classes/utilisateurs.php';
		
		$id_users = 5;
		//$del_use = new utilisateurs("$id_users", "", "", "", "", "", "", "", "");
		//$del_use->users_delete();
		//echo "L'utilisateur avec l'id '$id_users' a été supprimer";
		echo "<br />";
		
		$pseudo_users = "frank";
		$email_users = "frank@opmail.fr";
		$civilite = "Monsieur";
		$nom_users = "dupond";
		$prenom_users = "frank";
		$date_naissance = "1990-12-16";
		$ville_users = "bobigny";
		// problème lors du changement pour le champ newsletter (boolen)
		$newsletter = 1;
		$up_use = new utilisateurs($id_users, $pseudo_users, $email_users, $civilite, $nom_users, $prenom_users, $date_naissance, $ville_users, $newsletter);
		$up_use->users_update();
		
		
		
	?>
	

<br>
<br>
	
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