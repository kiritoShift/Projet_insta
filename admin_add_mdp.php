<?php include "entete.php"?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>

 <title>Page ajout MDP</title>
    <link rel="stylesheet" href="css/admin.css" />
<div id="main">
 	<div id="moncadre">

 
  
  
   

 
	
	<h2 align=center> Page d'ajout des mots de passe utilisateurs</h2>
	
	
	<?php 
	//include 'classes/mot_de_passe.php';

		if (empty($_POST['pseudo']) || empty($_POST['mdp']) || empty($_POST['mdp_conf'])) {
			  		if (!empty($_POST['btnEnvoyer'])) {
			  			echo '<div id="messageerror">Merci de remplir les champs oblgatoire </div>';
			  					}
	
	echo '
  				
    			
				<form method="POST">
				
<!--*******************************************************************************************************************************************-->				
<!--***********************premier encadr� information personnelle (non, prenom, date de naissance, civiliter)*********************************-->
<!--*******************************************************************************************************************************************-->						
				
				
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
								 <div id="test"><input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" /></div>
								<br />
								<br />
						
						';
				  	}
				  	
	elseif (($_POST['mdp']) == ($_POST['mdp_conf'])){
		$pseudo=$_POST['pseudo'];
		global $conn;
		$user = new utilisateurs("",$pseudo,"","","","","","");
		$id_user = $user->users_get_id();
		var_dump ($id_user);
		$mot_de_passe = new mot_de_passe("", md5($_POST['mdp']),$id_user);
		$mot_de_passe->mot_de_passe_new();
		
		echo "Le MDP a bien été ajouter";
				  			
				}

	else {
		
		echo '<div id="messageerror">Le mot de passe n\'est pas identique</div>';	
  		
	}
  			
	
  		
?>
		</div>
				<div id="left">
					<?php include "menu_connection.php"; ?>
					<?php include "menu_gauche_admin.php"; ?>
			
				</div>
		
</div>
		<div id="footer">
		</div>
	
