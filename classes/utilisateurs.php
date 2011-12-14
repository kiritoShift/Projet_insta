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
	private $newsletter;
	public function __construct($id_users, $pseudo_users, $email_users, $civilite, $nom_users, $prenom_users, $date_naissance, $newsletter){
		
		$this->id_users = $id_users;
		$this->pseudo_users = $pseudo_users;
		$this->email_users = $email_users;
		$this->civilite = $civilite;
		$this->nom_users = $nom_users;
		$this->prenom_users = $prenom_users;
		$this->date_naissance = $date_naissance;
		$this->newsletter = $newsletter;
	}
	
	public function delete_users(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM utilisateurs WHERE :id_users = id_users;");
		$query->execute(array("id_users" => $this->id_users));
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