<?php include "connexion_bdd.php" ?>
<?php include "classes/utilisateurs.php"?>
<?php include "classes/mot_de_passe.php"?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<body>

<head>
       <link rel="stylesheet" media="screen" type="text/css" title="" href="css/menu_connection.css" />
</head>

<form method="POST">
<fieldset class="formulaire" style="width:200px;">
<legend> Connection </legend>

<?php 
 if (empty($_POST['pseudo_users']) || empty($_POST['mdp'])) {
			  		if (!empty($_POST['btnEnvoyer'])) {
			  						echo '<div id="messageerror">Merci de remplir les champ oblgatoire </div>';
		  							}
  				
  		echo'
  		
	
	
	<label for="nom_users">pseudo :</label>
								<input type="text" id="pseudo_users" name="pseudo_users"/>
								<br />
								
	<label for="Mdp">Mot de passe :</label>
								<input type="password" id="mdp" name="mdp"/>
								<br />
								<br />
	

	 <input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" />
								<br />
								<br />
					
	<input type="submit" name="btninscription" value="Inscription" href="formulaire_inscription.php" onclick="window.open(\'formulaire_inscription.php\', \'exemple\', \'height=800%, width=800, top=90, left=350, toolbar=no, menubar=no, location=yes, resizable=yes, scrollbars=yes, status=no\'); return false;"/> 

	
	
	
	
	

		';
				  	}
		
	else {
	

 $pass = md5($_POST['mdp']); // On rÈcupËre le password du formulaire connexion.

 
 
 $sql=$conn->prepare("SELECT utilisateurs.id_users AS utilisateurs_id_users, utilisateurs.pseudo_users AS utilisateurs_pseudo_users FROM utilisateurs, mot_de_passe
 					 WHERE utilisateurs.id_users = mot_de_passe.id_users
 					 AND utilisateurs.pseudo_users=:pseudo_users
 					 AND  mot_de_passe.mdp=:mdp");
 
 
 
 $sql->execute(array("pseudo_users" => $_POST['pseudo_users'], "mdp" => $pass));

 if ($sql->rowCount()) {
 	$row=$sql->fetch(PDO::FETCH_ASSOC);
 	$_SESSION['pseudo_users'] = $row['utilisateurs_pseudo_users'];

 	echo "Vous  etes connecté.<br />";
    echo "<a href='deconnection.php'>Ce Deconnection </a>";
 }
 else {
 	echo 'Tes identifiants sont erronés.<br/>
 	<label for="nom_users">pseudo :</label>
								<input type="text" id="pseudo_users" name="pseudo_users"/>
								<br />
								
	<label for="Mdp">Mot de passe :</label>
								<input type="password" id="mdp" name="mdp"/>
								<br />
								<br />
	

	 <input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" />
								<br />
								<br />
					
	<input type="submit" name="btninscription" value="Inscription" href="formulaire_inscription.php" onclick="window.open(\'formulaire_inscription.php\', \'exemple\', \'height=800%, width=800, top=90, left=350, toolbar=no, menubar=no, location=yes, resizable=yes, scrollbars=yes, status=no\'); return false;"/> 

	
	
	
	
	

		';
				  	
 	
 	
 }
 


 
 

	}
	


?>
</form>
</fieldset>






















</body>
</html>