<!DOCTYPE html>
<html lang="fr">
 
  <head>
 
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 		<title>Formulaire d'inscription</title>
 		<link rel="stylesheet" href="css/formulaire_inscription.css" />
  </head>
  
  
  
  
 <center><table>
  <body>
  
  	<u>
 		 <!-- <FONT size="7pt" face="movie times"> Formulaire d/inscription<br /></FONT>    -->
 		 <img src="images/Sans titre.jpg" border="0" width="700" height="100"> 
 		 <br/>
  	</u>
   

<?php
  
  if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['civiliter']) || empty($_POST['email']) || empty($_POST['pseudo']) || empty($_POST['confirmation_Mot_de_passe']) || empty($_POST['Mot_de_passe']) || empty($_POST['condition'])) {
			  		if (!empty($_POST['btnEnvoyer'])) {
			  						echo '<FONT color="" class="messageerror">Merci de remplir les champ oblgatoire </FONT>';
			  							}
  				
  		echo'
  				
    			
				<form action="" method="POST">
				
<!--*******************************************************************************************************************************************-->				
<!--***********************premier encadr� information personnelle (non, prenom, date de naissance, civiliter)*********************************-->
<!--*******************************************************************************************************************************************-->						
				
				
							<fieldset style="width:350px;">
							<legend> Information personnelle </legend>
				
				
									<!--************************************-->
  									<!--************* civiliter ************-->
  									<!--************************************-->
  									
  								<label for="IDciviliter">Civiliter<FONT color="red">*</FONT> :</label>
  							
								<select id="IDciviliter" name="civiliter">
									<option value="" selected="selected">M, Mr, Melle</option>
									<option value="Mr">Messieur</option>
									<option value="M">Madame</option>
									<option value="Melle">Mademoiselle</option>	
								</select>
								<br />
								<br />
								
						  			<!--************************************-->
  									<!--*************** nom ****************-->
  									<!--************************************-->
  									
								<label for="IDNom">Nom<FONT color="red">*</FONT> :</label>
								<input type="text" id="IDNom" name="nom"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--*************** prenom *************-->
  									<!--************************************-->
						
								<label for="IDPrenom">Prenom<FONT color="red">*</FONT> :</label>
								<input type="text" id="IDPrenom" name="prenom"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--********** adresse email ***********-->
  									<!--************************************-->
								
								<label for="IDEmail">Adresse Email<FONT color="red">*</FONT> :</label>
								<input type="text" id="IDEmail" name="email"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--************** Ville ***************-->
  									<!--************************************-->
						
								<label for="IDVille">Ville :</label>
								<input type="text" id="IDVille" name="ville"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--******** Date de naissance *********-->
  									<!--************************************-->
				 
				 
								<label for="IDDatenaissance">Date de naissance :</label>
								<input type="text" id="IDDatenaissance" name="Datenaissancejour" maxlength="2" size="2"/>
								<input type="text" id="IDDatenaissance" name="Datenaissancemois" maxlength="2" size="2"/>
								<input type="text" id="IDDatenaissance" name="Datenaissanceannee" maxlength="4" size="4"/>
								<br />
								<FONT size="2" class="marge">jj/mm/aaaa</FONT>
								<br />
								
								
							</fieldset>
							
							
							
<!--*******************************************************************************************************************************************-->				
<!--***********************deuxieme encadr� information de connection (pseudo, mdp, cmdp)*********************************-->
<!--*******************************************************************************************************************************************-->	
								
						<fieldset style="width:350px;">
						<legend> Information de connection </legend>
								
								
									<!--************************************-->
	  								<!--************** Pseudo **************-->
	  								<!--************************************-->
						
								<label for="IDPseudo">Pseudo<FONT color="red">*</FONT> :</label>
								<input type="text" id="IDPseudo" name="pseudo"/>
								<br />
								<br />
								
								
									<!--************************************-->
	  								<!--********** Mot de passe ************-->
	  								<!--************************************-->
						
								<label for="IDMdp">Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="IDMdp" name="Mot_de_passe"/>
								<br />
								<br />
								
								
								
									<!--************************************-->
	  								<!--**** confirmation Mot de passe *****-->
	  								<!--************************************-->
						
								<label for="IDCmdp">confirmation du Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="IDCmdp" name="confirmation_Mot_de_passe"/>
								<br />
								<br />
								
								
								</fieldset>				
						
<!--*******************************************************************************************************************************************-->				
<!--***********************premier encadr� information personnelle (non, prenom, date de naissance, civiliter)*********************************-->
<!--*******************************************************************************************************************************************-->								
																
								
								<fieldset style="width:350px;">
								<legend> Newsletter & conditions g&eacute;n&eacute;rales </legend>
								
									<!--*************************************-->
	  								<!--* Newsletter & conditions g�n�rales *-->
	  								<!--*************************************-->
							
	  							<input class="condition" type="checkbox" id="email_rep" name="email_rep" tabindex="14" />	
							    <FONT size="2"><span for="email_rep">Je veut etre informer des prochaine sortie de film</span>
							    </FONT>
							    
							    
							    <br />
							    <input class="condition" type="checkbox" id="condition" name="condition" tabindex="14" />
							    <FONT size="2"><span for="condition">J&acute;accepte les conditions g&eacute;n&eacute;rale d&acute;utilisation<FONT color="red">*</FONT></span>
							    </FONT>
								 
							  
							    
							    </fieldset>
								
							
								
								
								<input type="submit" name="btnEnvoyer" value="Envoyer"/>
								<br />
								<br />
						
						</form>
						
						';
				  	}
  	else {
			echo "Bonjour" .$_POST['civiliter']." ".$_POST['nom']." ".$_POST['prenom'];
			echo "<br />";
			echo "bienvenue sur notre site unfauxcine";
			echo "<br />";
					/*if($_POST['sexe'] == "H") {
						echo " Vous êtes un homme";
						}
					else {
						echo "Vous êtes une femme";
						}*/
				
  		}
 
?>


  <!--  if (isset($_POST["btnEnvoyer"])) { -->
  
  	


	</table></center>
  </body>
</html>