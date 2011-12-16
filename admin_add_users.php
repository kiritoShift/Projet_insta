<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page d'ajout utilisateurs</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Bienvenue sur la page d'ajout de nouveaux utilisateurs</h2>
	
	
	<?php include 'classes/utilisateurs.php';
echo'
  				
    			
				<form method="POST">
				
<!--*******************************************************************************************************************************************-->				
<!--***********************premier encadr� information personnelle (non, prenom, date de naissance, civiliter)*********************************-->
<!--*******************************************************************************************************************************************-->						
				
				
							<fieldset class="formulaire" style="width:350px;">
							<legend> Information personnelle </legend>
				
				
  									<!--************* civilite *************-->

  								<br>
  								<label for="civilite">Civiliter<FONT color="red">*</FONT> :</label>
  							
								<select id="civilite" name="civilite">
									<option value="" selected="selected">M, Mr, Melle</option>
									<option value="Mr">Messieur</option>
									<option value="M">Madame</option>
									<option value="Melle">Mademoiselle</option>	
								</select>
								<br />
								<br />
								

  									<!--*************** nom ****************-->

  									
								<label for="nom_users">Nom<FONT color="red">*</FONT> :</label>
								<input type="text" id="nom_users" name="nom_users"/>
								<br />
								<br />
								
								
  									<!--*************** prenom *************-->

						
								<label for="prenom_users">Prenom<FONT color="red">*</FONT> :</label>
								<input type="text" id="prenom_users" name="prenom_users"/>
								<br />
								<br />
								
								
  									<!--********** adresse email ***********-->

								
								<label for="email_users">Adresse Email<FONT color="red">*</FONT> :</label>
								<input type="text" id="email_users" name="email_users"/>
								<br />
								<br />
								
								
  									<!--************** Ville ***************-->

						
								<label for="ville_users">Ville :</label>
								<input type="text" id="ville_users" name="ville_users"/>
								<br />
								<br />
								
								
  									<!--******** Date de naissance *********-->
				 
				 
								<label for="date_naissance">Date de naissance :</label>
								<input type="text" id="date_naissance" name="date_naissance" maxlength="10" size="10"/>
								<br />
								<div id=ex>jj/mm/aaaa</div>
								<br />
								<br />
									
								
							</fieldset>
							
														
			
<!--***********************deuxieme encadr� information de connection (pseudo, mdp, cmdp)*********************************-->
	
								
						<fieldset class="formulaire" style="width:350px;">
						<legend> Information de connection </legend>
																

	  								<!--************** Pseudo **************-->

								<br>
								<label for="Pseudo_user">Pseudo<FONT color="red">*</FONT> :</label>
								<input type="text" id="Pseudo_users" name="pseudo_users"/>
								<br />
								<br />
																

	  								<!--********** Mot de passe ************-->

						
								<label for="IDMdp">Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="IDMdp" name="Mot_de_passe"/>
								<br />
								<br />
																
								

	  								<!--**** confirmation Mot de passe *****-->

						
								<label for="IDCmdp">confirmation du Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="IDCmdp" name="confirmation_Mot_de_passe"/>
								<br />
								<br />
							
								
								
								</fieldset>				
						
				
<!--********************************************newsletter********************************************-->
							
																
								
								<fieldset class="formulaire" style="width:350px;">
								<legend> Newsletter & conditions g&eacute;n&eacute;rales </legend>
								
									<!--*************************************-->
	  								<!--* Newsletter & conditions g�n�rales *-->
	  								<!--*************************************-->
								<br>
	  							<input type="checkbox" id="newsletter" name="newsletter" tabindex="14" />	
							    <FONT size="2"><span for="newsletter">Je veut etre informer des prochaine sortie de film</span>
							    </FONT>

											    
							    </fieldset>
								<br />
								 <div id="test"><input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" /><div>
								<br />
								<br />
								
								
								
						
						</form>
						
						';

  			
  		$envoie_utilisateurs = new utilisateurs('', $_POST['pseudo_users'], $_POST['email_users'], $_POST['civilite'], $_POST['nom_users'], $_POST['prenom_users'], $_POST['date_naissance'], $_POST['ville_users'], $_POST['newsletter'] );	
  		$envoie_utilisateurs->users_new();
  			

  		
  		
  		
?>
	
	
 	</body>
</html>