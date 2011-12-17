<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page ajout MDP</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body: BGCOLOR="#4682B4">
	<h2 align=center> Page d'ajout des mots de passe utilisateurs</h2>
	
	
	<?php include 'classes/mot_de_passe.php';

		if (empty($_POST['id_mdp']) || empty($_POST['mdp']) || empty($_POST['mdp_conf'])) {
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
				
				

  									<!--** id **-->

  									
								<label for="id_mdp">ID<FONT color="red">*</FONT> :</label>
								<input type="text" id="id_mdp" name="id_mdp"/>
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

	else {
	 		$envoie_form = new mot_de_passe($_POST['id_mdp'], $_POST['mdp']);	
	 		$envoie_form->mot_de_passe_new();
	 		
	 		echo "Le mot de passe de l'utilisateur a bien été ajouter à la base de données";
	 		
  		
	}
  			
	
  		
?>
	
 	</body>
</html>