<?php include "connexion_bdd.php" ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<body>

<head>
       <link rel="stylesheet" media="screen" type="text/css" title="" href="css/menu_connection.css" />
</head>


<fieldset class="formulaire" style="width:200px;">

<?php 
 if (empty($_POST['pseudo_users']) || empty($_POST['mdp'])) {
			  		if (!empty($_POST['btnEnvoyer'])) {
			  						echo '<div id="messageerror">Merci de remplir les champ oblgatoire </div>';
		  							}
  				
  		echo'
  		<form method="POST">

	
	
	<legend> Connection </legend>
	
	
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

	
	
	
	
	</form>

		';
				  	}
		
	else {
	

 $pass =$_POST['mdp']; // On rÈcupËre le password du formulaire connexion.

 
 
 $sql=$conn->prepare("SELECT id_users, pseudo_users FROM utilisateurs, mot_de_passe
 					 WHERE id_users = id_mdp
 					 AND pseudo_users=:pseudo_users
 					 AND mdp=:mdp");
 
 
 $sql->execute(array("pseudo_users" => $_POST['pseudo_users'], "mdp" => $pass));
 if ($sql->rowCount()) {
 	$row=$sql->fetch(PDO::FETCH_ASSOC);
 	$_SESSION['pseudo_users'] = $row['pseudo_users'];

 	echo "Vous  etes connecté.<br />";
    echo "<a href='http://www.siteduzero.com'>Deconnection </a>";
 }
 else {
 	echo 'Tes identifiants sont erronés.';
 }
 


 
 
/*if (empty($row)){
	echo 'Identification erronee'; // Sinon, mauvais pseudo ou password.
    echo 
	'<html>
	<body>
	<p><a href = "connexion.php">Cliquez ici pour vous revenir a la page precedente</a></p>
	</body>
	</html>';
}
else {
	$_SESSION['typecompte'] = $row['typecompte'];
	$_SESSION['id']=$row['ID'];
	header('location: index.php');
}
*/
	}
	


?>

</fieldset>






















</body>
</html>
