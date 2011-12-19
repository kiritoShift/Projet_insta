<?php include 'connexion_bdd.php'; ?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>
<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page supression MDP</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Page de supression des mots de passe utilisateurs</h2>
	
	
	<?php 
	//include 'classes/mot_de_passe.php';

				if (empty($_POST['pseudo']) {
				if (!empty($_POST['btnEnvoyer'])) {
				  			echo '<div id="messageerror">Merci de fournir l\'id a supprimer </div>';
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
		
	else {

	 		$envoie_form = new mot_de_passe($_POST['id_mdp'], "");	
	 		$envoie_form->mot_de_passe_delete();
	 		
	 		echo "Le mot de passe a bien été supprimer de la base de données";
	 		
  		
	}
  			
	
  		
?>
	
 	</body>
</html>