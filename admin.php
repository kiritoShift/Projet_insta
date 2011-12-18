<!DOCTYPE html>
<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page d'administration</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h1 align=center>Bienvenue sur la page d'administration</h1>
	<br />

	<u><h3 align=center>Ajouter, Modifier, Supprimer un utilisateur :</h3></u>
			<B> 
			<form action="admin_add_users"> 
			<p> 
			<center><input type="button" name="lien" value="Ajouter un utilisateur" 
			onClick="self.location.href='admin_add_users.php'"></center>
			</p> 
			</form></B>
			
			
			
			<B> 
			<form action="admin_update_users"> 
			<p> 
			<center><input type="button" name="lien" value="Modification un utilisateur" 
			onClick="self.location.href='admin_update_users.php'"></center> 
			</p> 
			</form></B>
			
			
			
			<B> 
			<form action="admin_delete_users"> 
			<p> 
			<center><input type="button" name="lien" value="Supprimer un utilisateur" 
			onClick="self.location.href='admin_del_users.php'"></center>
			</p> 
			</form></B>
			<br />
			
			
		<u><h3 align=center>Ajouter, Modifier, Supprimer un mot de passe :</h3></u>
			<B> 
			<form action="admin_add_mdp"> 
			<p> 
			<center><input type="button" name="lien" value="Créer le MDP d'un utilisateur" 
			onClick="self.location.href='admin_add_mdp.php'"></center>
			</p> 
			</form></B>
		
		
		
			<B> 
			<form action="admin_update_mdp"> 
			<p> 
			<center><input type="button" name="lien" value="Modifier le MDP d'un utilisateur" 
			onClick="self.location.href='admin_update_mdp.php'"></center>
			</p> 
			</form></B>
			
			
			
			<B> 
			<form action="admin_del_mdp"> 
			<p> 
			<center><input type="button" name="lien" value="Supprimer le MDP d'un utilisateur" 
			onClick="self.location.href='admin_del_mdp.php'"></center>
			</p> 
			</form></B>

	
 	</body>
</html>