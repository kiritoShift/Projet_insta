<?php include '../connection_bdd.php'; ?>
<?php

class acteurs {
	private $acteur;
	private $nom_acteur;
	private $prenom_acteur;
	public function __construct($id_acteur, $nom_acteur, $prenom_acteur){
		
		$this->acteur = $id_acteur;
		$this->nom_acteur = $nom_acteur;
		$this->prenom_acteur = $prenom_acteur;
	}
	
	public function acteurs_new($nom_acteur, $prenom_acteur){
		$query = "INSERT INTO acteurs(nom_acteur, prenom_acteur) VALUES ('".$nom_acteur."','".$prenom_acteur."'))";
		$conn->query($this->nom_acteur, $this->prenom_acteur);
	}
	
	public function acteurs_drop($id_acteur){
		$query = "DELETE QUICK FROM acteurs WHERE ".$id_acteur." = id_acteur;";
		$conn->query($this->acteur);
	}
	
	public function acteur_update($id_acteur, $nom_acteur, $prenom_acteur) {
		if (!empty($nom_acteur)) {
			$query = "UPDATE acteur SET nom_acteur = ".$nom_acteur." WHERE id_acteur = ".$id_acteur.";";
			$conn->query($this->acteur, $this->nom_acteur);
		}
		if (!empty($nom_acteur)) {
			$query = "UPDATE acteur SET prenom_acteur = ".$prenom_acteur." WHERE id_acteur = ".$id_acteur.";";
			$conn->query($this->acteur, $this->prenom_acteur);
		}
	}
}