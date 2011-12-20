<?php include "connexion_bdd.php"?>
<?php include "classes/mot_de_passe.php"?>
<?php include "classes/utilisateurs.php"?>
<?php include "entete.php" ?>



 <div id="moncadre">
  
  
  
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page suppression utilisateurs</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Page de supression des utilisateurs</h2>
	
	
	<?php include 'classes/utilisateurs.php';

		if (empty($_POST['id_users'])) {
			  		if (!empty($_POST['btnEnvoyer'])) {
			  			echo '<div id="messageerror">Merci de fournir l\'id de l\'utilisateur </div>';
			  					}
	
	echo '
  				
    			
				<form method="POST">	
				
							<fieldset class="formulaire" style="width:350px;">
							<legend> ID de l\'utilisateur </legend>
								

  									<!--** id **-->

  									
								<label for="id_users">ID<FONT color="red">*</FONT> :</label>
								<input type="text" id="id_users" name="id_users"/>
								<br />	


								<!--** Bouton Envoyer **-->
								
							    </fieldset>
								<br />
								 <div id="test"><input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" /><div>
								<br />
								<br />
								
								
								
						
						</form>
						
						';
				  	}

	else {
	 		$envoie_form = new utilisateurs($_POST['id_users'], "", "", "", "", "", "", "", "");	
	 		$envoie_form->users_delete();
	 		
	 		echo "L'utilisateur avec l'ID " .$_POST['id_users']." a bien été supprimer de la base de données";
	 		
  		
	}
  			
	
  		
?>
	
 	</div>
</html>