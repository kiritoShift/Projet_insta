<?php include "connexion_bdd.php"?>
<?php include "entete.php"?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>
<div id="main">
 	<div id="moncadre">
  
  
    

 		 <p style="text-align:center"><img src="images/Sans titre.jpg" border="0" width="640" height="100"></p> 

	<?php
  
  if (empty($_POST['nom_users']) || empty($_POST['prenom_users']) || empty($_POST['civilite']) || empty($_POST['email_users']) || empty($_POST['pseudo_users']) || empty($_POST['cmdp']) || empty($_POST['mdp']) ||  empty($_POST['condition'])) {
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
  								<br />
  								<label for="civilite">Civiliter<FONT color="red">*</FONT> :</label>
  							
								<select id="civilite" name="civilite">
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
								<input type="text" id="nom_users" name="nom_users" required />
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--*************** prenom *************-->
  									<!--************************************-->
						
								<label for="prenom_users">Prenom<FONT color="red">*</FONT> :</label>
								<input type="text" id="prenom_users" name="prenom_users" required />
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--********** adresse email ***********-->
  									<!--************************************-->
								
								<label for="email_users">Adresse Email<FONT color="red">*</FONT> :</label>
								<input type="text" id="email_users" name="email_users" required />
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--************** Ville ***************-->
  									<!--************************************-->
						
								<label for="ville_users">Ville :</label>
								<input type="text" id="ville_users" name="ville_users" />
								<br />
								<br />
								
								
									<!--************************************-->
  									<!--******** Date de naissance *********-->
  									<!--************************************-->
				 
				 
								<label for="date_naissance">Date de naissance :</label>
								<input type="text" id="date_naissance" name="date_naissance" maxlength="10" size="10" />
								<br />
								<div id="ex">jj/mm/aaaa</div>
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
								<label for="pseudo_user">Pseudo<FONT color="red">*</FONT> :</label>
								<input type="text" id="pseudo_users" name="pseudo_users" required />
								<br />
								<br />
								
								
									<!--************************************-->
	  								<!--********** Mot de passe ************-->
	  								<!--************************************-->
						
								<label for="Mdp">Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="Mdp" name="mdp" required />
								<br />
								<br />
								
								
								
									<!--************************************-->
	  								<!--**** confirmation Mot de passe *****-->
	  								<!--************************************-->
						
								<label for="Cmdp">confirmation du Mot de passe<FONT color="red">*</FONT> :</label>
								<input type="password" id="Cmdp" name="cmdp" required />
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
								<br />
	  							<input type="checkbox" id="newsletter" name="newsletter" tabindex="14" />	
							    <FONT size="2"><span for="newsletter">Je veut etre informer des prochaine sortie de film</span>
							    </FONT>
							    
							    
							    <br />
							    <input type="checkbox" id="condition" name="condition" tabindex="14" required />
							    <FONT size="2"><span for="condition">J&acute;accepte les conditions g&eacute;n&eacute;rale d&acute;utilisation<FONT color="red">*</FONT></span>
							    </FONT>
							    <br />
							    <br />
						
							    
								
							  
							    
							    </fieldset>
								<br />
								 <div id="test"><input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" /></div>
								<br />
								<br />
								
								
								
						
						</form>
						
						';
				  	}
  	elseif (($_POST['mdp']) == ($_POST['cmdp'])){
  										$envoie_utilisateurs = new utilisateurs('', $_POST['pseudo_users'], $_POST['email_users'], $_POST['civilite'], $_POST['nom_users'], $_POST['prenom_users'], $_POST['date_naissance'], $_POST['ville_users'], (isset($_POST['newsletter']) && $_POST['newsletter'] ? "1" : "0"), '');	
								  		$envoie_utilisateurs->users_new();
								  		
										$pseudo_users=$_POST['pseudo_users'];
										global $conn;
										$user = new utilisateurs("",$pseudo_users,"","","","","","","","");
										$id_user = $user->users_get_id();
										$mot_de_passe = new mot_de_passe("", md5($_POST['mdp']),$id_user);
										$mot_de_passe->mot_de_passe_new();
										
								  		
								  		
								  	
										echo "<div id='ok'>Bonjour " .$_POST['civilite']." ".$_POST['nom_users']." ".$_POST['prenom_users'];
										echo "<br />";
										echo "bienvenue sur notre site unfauxcine";
										echo "<p><a href='acceuil.php'>retourné a l'acceuil</a></div></p>";
												 
  			
									}
  								else{
  									echo "<div id='ok'>error</div>";
  								}	
  		
  		
  		
?>
 	

		</div>
		
		
			<div id="left">
				<?php include "menu_connection.php"; ?>
			</div>
	


			<div id="footer">
			</div>


  </div>
  
  
