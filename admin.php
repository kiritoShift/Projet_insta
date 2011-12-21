<?php include "connexion_bdd.php"?>

<?php include "entete.php" ?>






 		 
    <title>Page d'administration</title>
		
    <div id="moncadre">
	<h1 align=center>Bienvenue sur la page d'administration</h1>
	<br />
	</div>
	 <div id="moncadregauche">

		<u><h3>Afficher tous les utilisateurs :</h3></u>
			<B> 
			<p> 
			<a href="admin_liste_users.php">Liste utilisateurs</a>
			</p> 
			</B>


		<u><h3>Ajouter, Modifier, Supprimer un utilisateur :</h3></u>
			<B> 
			<p> 
			<a href="admin_add_users.php">Ajouter un utilisateur</a>
			</p> 
			</B>
			
			
			
			<B> 
			<p> 
			<a href="admin_update_users.php">Modification un utilisateur</a> 
			</p> 
			</B>
			
			
			
			<B> 
			<form action="admin_delete_users"> 
			<p> 
			<a href="admin_del_users.php">Supprimer un utilisateur</a>
			</p> 
			</B>
			<br />
			
			
		<u><h3>Ajouter, Modifier, Supprimer un mot de passe :</h3></u>
			<B> 
			<p> 
			<a href="admin_add_mdp.php">Créer le MDP d'un utilisateur</a> 
			</p> 
			</B>
		
		
		
			<B> 
			<p> 
			<a href="admin_update_mdp.php">Modifier le MDP d'un utilisateur</a>
			</p> 
			</B>
			
			
			
			<B> 
			<p> 
			<a href="admin_del_mdp.php">Supprimer le MDP d'un utilisateur</a>
			</p> 
			</B>
			
			<!-- B --> 
			<!-- form action="admin_del_mdp" ---> 
			<!-- p --> 
			<!-- center><input type="button" name="lien" value="Supprimer le MDP d'un utilisateur" 
			onClick="self.location.href='admin_del_mdp.php'"></center -->
			<!-- /p --> 
			<!-- /form></B -->

	
 	
</div>