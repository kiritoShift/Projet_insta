
<form method="POST" id="carreconnection" class="formulaire">
	<fieldset>
		<legend> Connection </legend>
		<?php if(!isset($_SESSION['pseudo_users']) || !$_SESSION['pseudo_users']): ?>
			<?php if (empty($_POST['pseudo_users']) || empty($_POST['mdp'])): ?>
			  	<?php if (!empty($_POST['btnEnvoyer1'])): ?>
			  		<div id="messageerror">Merci de remplir les champ oblgatoire </div>
				<?php endif; ?>
				<p>
					<label for="nom_users">pseudo :</label>
					<input type="text" id="pseudo_users" name="pseudo_users"/>
				</p>
				
				<p>
					<label for="Mdp">Mot de passe :</label>
					<input type="password" id="mdp" name="mdp"/>
				</p>			

	
				<p>
	 				<input class="condition" type="submit" name="btnEnvoyer1" value="Envoyer" />
				</p>
								
				<a href="formulaire_inscription.php">Inscription</a>
				<a href="admin.php">admin</a>
				<a href="page_user.php">user</a>
			<?php else: ?>
				<?php
				$pass = md5($_POST['mdp']); // On rÈcupËre le password du formulaire connexion.
				
				$sql=$conn->prepare("SELECT utilisateurs.id_users AS utilisateurs_id_users, utilisateurs.pseudo_users AS utilisateurs_pseudo_users FROM utilisateurs, mot_de_passe
			 					 WHERE utilisateurs.id_users = mot_de_passe.id_users
			 					 AND utilisateurs.pseudo_users=:pseudo_users
			 					 AND  mot_de_passe.mdp=:mdp");
				 
				$sql->execute(array("pseudo_users" => $_POST['pseudo_users'], "mdp" => $pass));
				?>
				<?php if ($sql->rowCount()): ?>
				<?php
					$row=$sql->fetch(PDO::FETCH_ASSOC);
					$_SESSION['pseudo_users'] = $row['utilisateurs_pseudo_users'];
				?>
					<p>Vous  etes connecté.</p>
					<p><a href='deconnection.php'>Ce Deconnecter </a></p>
				<?php else: ?>
					Tes identifiants sont erronés.<br/>
				 	<label for="nom_users">pseudo :</label>
					<input type="text" id="pseudo_users" name="pseudo_users"/>
					
					<p>							
						<label for="Mdp">Mot de passe :</label>
						<input type="password" id="mdp" name="mdp" />
					</p>
				
					<p>`
						<input class="condition" type="submit" name="btnEnvoyer" value="Envoyer" />
					</p>
					<a href="formulaire_inscription.php">inscription</a>
					<a href="admin.php">admin</a>
					<a href="page_user.php">user</a>
				<?php endif; ?>
			<?php endif; ?>
		<?php else: ?>
		<p>Vous  êtes connectés.</p>
		<a href="deconnection.php">Ce Deconnecter </a>
		<a href="formulaire_inscription.php">inscription</a>
	    <a href="admin.php">admin</a>
		<a href="page_user.php">user</a>
		<?php endif; ?>
	</fieldset>
</form>
