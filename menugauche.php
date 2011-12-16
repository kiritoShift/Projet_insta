<?php include "connexion_bdd.php" ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<body>

<head>
       <link rel="stylesheet" media="screen" type="text/css" title="" href="css/menugauche.css" />
</head>


	<fieldset class="formulaire" style="width:200px;">
	
	
	<legend> Connection</legend>
	
	
	<label for="nom_users">pseudo :</label>
								<input type="text" id="pseudo_users" name="pseudo_users"/>
								<br />
								
	<label for="IDMdp">Mot de passe :</label>
								<input type="password" id="IDMdp" name="Mot_de_passe"/>
								<br />
								<br />
	

	 <input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" />
								<br />
								<br />
						
<input type="submit" name="btninscription" value="Inscription" href="formulaire_inscription.php" onclick="window.open('formulaire_inscription.php', 'exemple', 'height=800%, width=800, top=90, left=350, toolbar=no, menubar=no, location=yes, resizable=yes, scrollbars=yes, status=no'); return false;"/> 

	
	
	</fieldset>

























</body>
</html>
