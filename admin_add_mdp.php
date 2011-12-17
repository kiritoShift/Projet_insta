<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page modification MDP</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Page de modification des mots de passe utilisateurs</h2>
	
	
	<?php include 'classes/mot_de_passe.php';

		if (empty($_POST['id_users']) || empty($_POST['confirmation_Mot_de_passe']) || empty($_POST['Mot_de_passe'])) {
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

  									
								<label for="id_users">ID<FONT color="red">*</FONT> :</label>
								<input type="text" id="id_users" name="id_users"/>
								<br />
								<br />					

																

	  								<!--********** Mot de passe ************-->

						
								<label for="IDMdp">Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="IDMdp" name="mdp"/>
								<br />
								<br />
																
								

	  								<!--**** confirmation Mot de passe *****-->

						
								<label for="IDCmdp">confirmation du Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="IDCmdp" name="confirmation_Mot_de_passe"/>
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
	 		$envoie_form = new utilisateurs($_POST['id_users'], $_POST['mdp']);	
	 		$envoie_form->users_new();
	 		
	 		echo "L'utilisateur " .$_POST['nom_users']." ".$_POST['prenom_users']. " a bien été ajouter à la base de données";
	 		
  		
	}
  			
	
  		
?>
	
 	</body>
</html>