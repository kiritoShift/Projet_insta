<?php include 'connection_bdd.php'; ?>
<?php

class utilisateurs {
	private $id_users;
	private $pseudo_users;
	private $email_users;
	private $civilite;
	private $nom_users;
	private $prenom_users;
	private $date_naissance;
	private $ville_users;
	private $newsletter;
	public function __construct($id_users, $pseudo_users, $email_users, $civilite, $nom_users, $prenom_users, $date_naissance, $ville_users, $newsletter){
		
		$this->id_users = $id_users;
		$this->pseudo_users = $pseudo_users;
		$this->email_users = $email_users;
		$this->civilite = $civilite;
		$this->nom_users = $nom_users;
		$this->prenom_users = $prenom_users;
		$this->date_naissance = $date_naissance;
		$this->ville_users = $ville_users;
		$this->newsletter = $newsletter;
	}
	
	// Ajouter un nouveau utilisateur
	public function users_new(){
		global $conn;
		$query = $conn->prepare("");
		$query->execute();
	}
	
	// 	Supprimer un utilisateur
	public function users_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM utilisateurs WHERE :id_users = id_users;");
		$query->execute(array("id_users" => $this->id_users));
	}
	
	// Modifier un utilisateur
	public function users_update() {
		global $conn;
		if (!empty($this->id_users)) {
			$query = $conn->prepare("UPDATE utilisateurs SET id_users = :id_users WHERE id_users = :id_users ;");
			$query->execute(array("id_users" => $this->id_users, "id_users" => $this->id_users));
		}
		if (!empty($this->pseudo_users)) {
			$query = $conn->prepare("UPDATE utilisateurs SET pseudo_users = :pseudo_users WHERE id_users = :id_users ;");
			$query->execute(array("pseudo_users" => $this->pseudo_users, "id_users" => $this->id_users));
		}
			if (!empty($this->email_users)) {
			$query = $conn->prepare("UPDATE utilisateurs SET email_users = :email_users WHERE id_users = :id_users ;");
			$query->execute(array("email_users" => $this->email_users, "id_users" => $this->id_users));
		}
			if (!empty($this->civilite)) {
			$query = $conn->prepare("UPDATE utilisateurs SET civilite = :civilite WHERE id_users = :id_users ;");
			$query->execute(array("civilite" => $this->civilite, "id_users" => $this->id_users));
		}
			if (!empty($this->nom_users)) {
			$query = $conn->prepare("UPDATE utilisateurs SET nom_users = :nom_users WHERE id_users = :id_users ;");
			$query->execute(array("nom_users" => $this->nom_users, "id_users" => $this->id_users));
		}
			if (!empty($this->prenom_users)) {
			$query = $conn->prepare("UPDATE utilisateurs SET prenom_users = :prenom_users WHERE id_users = :id_users ;");
			$query->execute(array("prenom_users" => $this->prenom_users, "id_users" => $this->id_users));
		}
			if (!empty($this->date_naissance)) {
			$query = $conn->prepare("UPDATE utilisateurs SET date_naissance = :date_naissance WHERE id_users = :id_users ;");
			$query->execute(array("date_naissance" => $this->date_naissance, "id_users" => $this->id_users));
		}
			if (!empty($this->ville_users)) {
			$query = $conn->prepare("UPDATE utilisateurs SET ville_users = :ville_users WHERE id_users = :id_users ;");
			$query->execute(array("ville_users" => $this->ville_users, "id_users" => $this->id_users));
		}
			if (!empty($this->newsletter)) {
			$query = $conn->prepare("UPDATE utilisateurs SET newsletter = :newsletter WHERE id_users = :id_users ;");
			$query->execute(array("newsletter" => $this->newsletter, "id_users" => $this->id_users));
		}
			if (!empty($this->nom_films)) {
			$query = $conn->prepare("UPDATE utilisateurs SET nom_films = :nom_films WHERE id_users = :id_users ;");
			$query->execute(array("nom_films" => $this->nom_films, "id_users" => $this->id_users));
		}
	}
}

/*	public function suprimer_user($id_users, $pseudo_users, $email_users, $nom_users, $prenom_users, $date_naissance){
		$query = "INSERT INTO `projet_insta`.`utilisateurs` (`id_users` ,`pseudo_users` ,`email_users` ,`nom_users` ,`prenom_users` ,`date_naissance`) 
VALUES ('"$id_users" = id_users', '"$pseudo_users" = pseudo_users', '"$email_users" = email_users', '"$nom_users" = nom_users', '"$prenom_users" = prenom_users', '"$date_naissance" = date_naissance"');";
		$conn->query($this->nom_acteur, $this->prenom_acteur);
	}
	
	public function modifier_user($id_acteur){
		$query = "DELETE QUICK FROM acteurs WHERE ".$id_acteur." = id_acteur;";
		$conn->query($this->acteur);
	}
	
	public function reinit_mdp($id_acteur, $nom_acteur, $prenom_acteur) {
		if (!empty($nom_acteur)) {
			$query = "UPDATE acteur SET nom_acteur = ".$nom_acteur." WHERE id_acteur = ".$id_acteur.";";
			$conn->query($this->acteur, $this->nom_acteur);
		}
		if (!empty($nom_acteur)) {
			$query = "UPDATE acteur SET prenom_acteur = ".$prenom_acteur." WHERE id_acteur = ".$id_acteur.";";
			$conn->query($this->acteur, $this->prenom_acteur);
		}
	}
} */
	
?>