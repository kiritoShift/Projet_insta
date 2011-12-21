<?php include "connexion_bdd.php"?>
<?php include "entete.php"; ?>


<div id="main">
 		<div id="moncadre">
 		 <h1 align=center>Bienvenue sur la page d'administration</h1>
		 <h1>Page d'administration</h1>
   		 	
		
		</div>
		
		<div id="left">
			<?php include "menu_connection.php"; ?>
			<?php include "classes/mot_de_passe.php"?>
			<?php include "classes/utilisateurs.php"?>
			
				<div id="moncadregauche">
							
							
						
								<h3>Afficher tous les utilisateurs :</h3>
									<p> 
									<a href="admin_liste_users.php">Liste utilisateurs</a>
									</p>
						
						
								<h3>Ajouter, Modifier, Supprimer un utilisateur :</h3>
									<p> 
									<a href="admin_add_users.php">Ajouter un administrateur</a>
									</p> 
									<p> 
									<a href="admin_update_users.php">Modification un utilisateur</a> 
									</p> 
									<form action="admin_delete_users"> 
									<p> 
									<a href="admin_del_users.php">Supprimer un utilisateur</a>
									</p> 
									<br />
									
									
								<h3>Ajouter, Modifier, Supprimer un mot de passe :</h3>
									<p> 
									<a href="admin_add_mdp.php">Créer le MDP d'un utilisateur</a> 
									</p> 
									<p> 
									<a href="admin_update_mdp.php">Modifier le MDP d'un utilisateur</a>
									</p> 
									<p> 
									<a href="admin_del_mdp.php">Supprimer le MDP d'un utilisateur</a>
									</p> 
									
						</div>
	
		
			
		</div>
</div>

		<div id="footer">
		</div>

