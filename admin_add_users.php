<?php include 'connexion_bdd.php'; ?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>
<html lang="fr">
 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page d'ajout utilisateurs</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Page d'ajout de nouveaux administrateurs</h2>
	
	
	<?php 
	//include 'classes/utilisateurs.php';

		if (empty($_POST['nom_users']) || empty($_POST['prenom_users']) || empty($_POST['civilite']) || empty($_POST['email_users']) || empty($_POST['pseudo_users']) || empty($_POST['mdp_conf']) || empty($_POST['mdp'])) {
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
				
				
  									<!--************* civilite *************-->

  								<br>
  								<label for="civilite">Civilite<FONT color="red">*</FONT> :</label>
  							
								<select id="civilite" name="civilite">
									<option value="" selected="selected">Mr, Mme, Mlle</option>
									<option value="Mr">Monsieur</option>
									<option value="Mme">Madame</option>
									<option value="Mlle">Mademoiselle</option>	
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
									
								
							
							
							</fieldset>							
			
<!--***********************deuxieme encadr� information de connection (pseudo, mdp, cmdp)*********************************-->
	
								
						<fieldset class="formulaire" style="width:350px;">
						<legend> Pseudo et mot de passe utilisateur </legend>
																

	  								<!--************** Pseudo **************-->

								<br>
								<label for="pseudo_user">Pseudo<FONT color="red">*</FONT> :</label>
								<input type="text" id="pseudo_users" name="pseudo_users"/>
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
						
				
<!--********************************************Newsletter et compte Admin********************************************-->
							
																
								
								<fieldset class="formulaire" style="width:350px;">
								<legend> Newsletter et compte Admin </legend>
								
	  								<!--* Newsletter, Compte Admin *-->

								<br>
	  							<input type="checkbox" id="newsletter" name="newsletter" tabindex="14" />	
							    <FONT size="2"><span for="newsletter">L\'utilisateur recevra la newsletter</span>
							    </FONT>
							    
								<br />
	  							<input type="checkbox" id="type_compte" name="type_compte" tabindex="14" />	
							    <FONT size="2"><span for="type_compte">Compte Admin</span>
							    </FONT>

											    
							    </fieldset>
								<br />
								 <div id="test"><input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" /><div>
								<br />
								<br />
								
								
								
						
						</form>
						
						';
						  	}
  	else {
  			
  		$envoie_utilisateurs = new utilisateurs('', $_POST['pseudo_users'], $_POST['email_users'], $_POST['civilite'], $_POST['nom_users'], $_POST['prenom_users'], $_POST['date_naissance'], $_POST['ville_users'], (isset($_POST['newsletter']) && $_POST['newsletter'] ? "1" : "0"), (isset($_POST['type_compte']) && $_POST['type_compte'] ? "1" : "0") );		
  		$envoie_utilisateurs->users_admin();
  			
			echo "L'utilisateur " .$_POST['nom_users']." ".$_POST['prenom_users']. " a bien été créer";
			echo "<br />";
		
		if (($_POST['mdp']) == ($_POST['mdp_conf'])){
		$pseudo_users=$_POST['pseudo_users'];
		global $conn;
		$user = new utilisateurs("",$pseudo_users,"","","","","","","","");
		$id_user = $user->users_get_id();
		$mot_de_passe = new mot_de_passe("", md5($_POST['mdp']),$id_user);
		$mot_de_passe->mot_de_passe_new();
		
		echo "Le MDP a bien été ajouter";
			}
			
				
  		}
			
	
		 	
?>
	
 	</body>
</html>