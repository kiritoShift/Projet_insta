
<?php include "admin.php"?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>




 <div id="moncadre1">

 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page modification MDP</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Page de modification des mots de passe utilisateurs</h2>
	
	
	<?php 
	//include 'classes/mot_de_passe.php';

				if (empty($_POST['pseudo']) || empty($_POST['mdp']) || empty($_POST['mdp_conf'])) {
					if (!empty($_POST['btnEnvoyer'])) {
				  			echo '<div id="messageerror">Merci de remplir les champs oblgatoire </div>';
				  					}

	echo '
  				
    			
				<form method="POST">
				
	
				
							<fieldset class="formulaire" style="width:350px;">
							<legend> Informations utilisateur </legend>
				
				

  									<!--** pseudo **-->

  									
								<label for="pseudo">Pseudo utilisateur<FONT color="red">*</FONT> :</label>
								<input type="text" id="pseudo" name="pseudo"/>
								<br />
								<br />					

																

	  								<!--********** Mot de passe ************-->

						
								<label for="mdp">Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="mdp" name="mdp"/>
								<br />
								<br />
																
								

	  								<!--**** confirmation Mot de passe *****-->

						
								<label for="mdp_conf">confirmation du Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="mdp_conf" name="mdp_conf"/>
								<br />
								<br />
							
								
								
								</fieldset>				
						


								<!--** Bouton Envoyer **-->
								
							    </fieldset>
								<br />
								 <div id="test"><input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" /><div>
								<br />
								<br />
						
						';
				  	}

		  	
	elseif (($_POST['mdp']) == ($_POST['mdp_conf'])) { 
		$pseudo=$_POST['pseudo'];
		global $conn;
		$user = new utilisateurs("",$pseudo,"","","","","","");
		$id_user = $user->users_get_id();
		//$query = $conn->prepare("SELECT id_mdp FROM utilisateurs,mot_de_passe WHERE :id_users = id_users;");
		//$query->execute(array("id_users" => $this->id_users));
		$mot_de_passe = new mot_de_passe("", md5($_POST['mdp']),$id_user);
		$mot_de_passe->mot_de_passe_update();

		echo "Le mot de passe a bien été modifier sur la base de données";
				  			
				}
	
	else {

		echo '<div id="messageerror">Le mot de passe n\'est pas identique</div>';
	 		
	}
  			
	
  		
?>
	
 	</div>
</html>