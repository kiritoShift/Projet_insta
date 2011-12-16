<?php include 'entete.php';?>
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
	// Afficher la liste de tous les utilisateurs
		$tab2=liste_users();
		var_dump($tab2);
	?>
	
	<br />
	
	<?php include 'classes/utilisateurs.php';
		
		//Supprimer un utilisateur via son 'id'
		//$id_users = 7;
		//$del_use = new utilisateurs("$id_users", "", "", "", "", "", "", "", "");
		//$del_use->users_delete();
		//echo "L'utilisateur avec l'id '$id_users' a été supprimer";
		echo "<br />";
		
		 
		
		//Modifier un utilisateur
		$pseudo_users = "drichard";
		$email_users = "richard@opmail.fr";
		$civilite = "Monsieur";
		$nom_users = "Dulac";
		$prenom_users = "richard";
		$date_naissance = "1958-10-06";
		$ville_users = "lille";
		$newsletter = 1;
		//$up_use = new utilisateurs($id_users, $pseudo_users, $email_users, $civilite, $nom_users, $prenom_users, $date_naissance, $ville_users, $newsletter);
		//$up_use->users_update();
		
		//Ajouter un nouveau utilisateur
		//$add_use = new utilisateurs($id_users, $pseudo_users, $email_users, $civilite, $nom_users, $prenom_users, $date_naissance, $ville_users, $newsletter);
		//$add_use->users_new();
		
		include 'classes/mot_de_passe.php';
		
		//Ajouter un mdp
		$mdp = "toto"
		$new_mdp=new mot_de_passe("", $mdp);
		
		
		
		
		
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