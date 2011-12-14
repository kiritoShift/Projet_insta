<?php include "connection_bdd.php"?>
<?php include "classes/utilisateurs.php"?>
<!DOCTYPE html>
<html lang="fr">
 
  <head>
 
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 		<title>Formulaire d'inscription</title>
 		<link rel="stylesheet" href="css/formulaire_inscription.css" />
  </head>
  
  
    
  <body>
 		 <!-- <FONT size="7pt" face="movie times"> Formulaire d/inscription<br /></FONT>    -->
 		 <P style="text-align:center"><img src="images/Sans titre.jpg" border="0" width="700" height="100"></P> 
 		 
   

<?php
  $utilisateurs = new utilisateurs($_POST['civiliter'], $_POST['nom_users'], $_POST['prenom_users'], $_POST['email_users'], $_POST['pseudo_users'], $_POST['date_naissance'], $_POST['newsletter'] );
  
  if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['civiliter']) || empty($_POST['email']) || empty($_POST['pseudo']) || empty($_POST['confirmation_Mot_de_passe']) || empty($_POST['Mot_de_passe']) || empty($_POST['condition'])) {
			  		if (!empty($_POST['btnEnvoyer'])) {
			  						echo '<div id="messageerror">Merci de remplir les champ oblgatoire </div>';
			  							}
  				
  		echo'
  				
    			
				<form method="POST">
				
<!--*******************************************************************************************************************************************-->				
<!--***********************premier encadr� information personnelle (non, prenom, date de naissance, civiliter)*********************************-->
<!--*******************************************************************************************************************************************-->						
				
				
							<fieldset class="formulaire" style="width:350px;">
							<legend> Information personnelle </legend>
				
				
									<!--************************************-->
  									<!--************* civiliter ************-->
  									<!--************************************-->
  								<br>
  								<label for="civilite">Civiliter<FONT color="red">*</FONT> :</label>
  							
								<select id="civilite" name="civiliter">
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
  									
								<label for="nom_users">Nom<FONT color="red">*</FONT> :</label>
								<input type="text" id="nom_users" name="nom"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--*************** prenom *************-->
  									<!--************************************-->
						
								<label for="prenom_users">Prenom<FONT color="red">*</FONT> :</label>
								<input type="text" id="prenom_users" name="prenom"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--********** adresse email ***********-->
  									<!--************************************-->
								
								<label for="email_users">Adresse Email<FONT color="red">*</FONT> :</label>
								<input type="text" id="email_users" name="email"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--************** Ville ***************-->
  									<!--************************************-->
						
								<label for="ville_users">Ville :</label>
								<input type="text" id="ville_users" name="ville"/>
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--******** Date de naissance *********-->
  									<!--************************************-->
				 
				 
								<label for="date_naissance">Date de naissance :</label>
								<input type="text" id="date_naissance" name="date_naissance" maxlength="10" size="10"/>
								<br />
								<div id=ex>jj/mm/aaaa</div>
								<br />
								<br />
									
								
							</fieldset>
							
							
							
<!--*******************************************************************************************************************************************-->				
<!--***********************deuxieme encadr� information de connection (pseudo, mdp, cmdp)*********************************-->
<!--*******************************************************************************************************************************************-->	
								
						<fieldset class="formulaire" style="width:350px;">
						<legend> Information de connection </legend>
								
								
									<!--************************************-->
	  								<!--************** Pseudo **************-->
	  								<!--************************************-->
								<br>
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
<!--********************************************Troisieme encadré newsletter & conditions générales********************************************-->
<!--*******************************************************************************************************************************************-->								
																
								
								<fieldset class="formulaire" style="width:350px;">
								<legend> Newsletter & conditions g&eacute;n&eacute;rales </legend>
								
									<!--*************************************-->
	  								<!--* Newsletter & conditions g�n�rales *-->
	  								<!--*************************************-->
								<br>
	  							<input type="checkbox" id="email_rep" name="email_rep" tabindex="14" />	
							    <FONT size="2"><span for="email_rep">Je veut etre informer des prochaine sortie de film</span>
							    </FONT>
							    
							    
							    <br />
							    <input type="checkbox" id="condition" name="condition" tabindex="14" />
							    <FONT size="2"><span for="condition">J&acute;accepte les conditions g&eacute;n&eacute;rale d&acute;utilisation<FONT color="red">*</FONT></span>
							    </FONT>
							    <br />
							    <br />
						
							    
								
							  
							    
							    </fieldset>
								<br />
								 <div id="test"><input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" /><div>
								<br />
								<br />
								
								
								
						
						</form>
						
						';
				  	}
  	else {
  			
  			if (isset($_POST)){
  				$utilisateurs->
  			}
			echo "Bonjour" .$_POST['civiliter']." ".$_POST['nom']." ".$_POST['prenom'];
			echo "<br />";
			echo "bienvenue sur notre site unfauxcine";
			echo "<br />";
			
				//connection_bdd.php();
				//$sql = "INSERT INTO utilisateurs(id,nom,prenom,ville) ";
				//$sql = "VALUES ('','$_POST['nom']','$_POST['prenom']','$_POST['ville']')";

				
				
				/*if($_POST['sexe'] == "H") {
						echo " Vous êtes un homme";
						}
					else {
						echo "Vous êtes une femme";
						}*/
				
  		}
 /*
 		 
		
  */	
  		
  		
  		
?>


  <!--  if (isset($_POST["btnEnvoyer"])) { -->
  
  	


  </body>
</html>