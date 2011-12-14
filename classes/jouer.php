<?php include '../connexion_bdd.php'; ?>
<?php
/**
 * 
 * creation de l'objet jouer avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class jouer {
	private $id_acteur;
	private $id_films;
	
	public function __construct($id_acteur = "", $id_films = ""){
		
		$this->id_films = $id_films;
		$this->id_acteur = $id_acteur;
	}
	
	// fonction d'ajout d'un nouveau jouer
	public function jouer_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO jouer(id_acteur, id_films) VALUES (:id_acteur, :id_films)");
		$query->execute(array("id_acteur" => $this->id_acteur, "id_films" => $this->id_films));
	}
	
	// fonction de supression d'un jouer
	public function jouer_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM jouer WHERE :id_films = id_films AND :id_acteur = id_acteur;");
		$query->execute(array("id_films" => $this->id_films,"id_acteur" => $this->id_acteur ));
	}
	
	// fonction de modification d'un champ dans la table jouer
	public function jouer_update() {
		global $conn;
		if (!empty($this->id_films)) {
			$query = $conn->prepare("UPDATE jouer SET id_films = :id_films WHERE id_films = :id_films AND :id_acteur = id_acteur;");
			$query->execute(array("titre_films" => $this->titre_films, "id_films" => $this->id_films));
		}
		if (!empty($this->id_acteur)) {
			$query = $conn->prepare("UPDATE jouer SET id_acteur = :id_acteur WHERE id_films = :id_films AND :id_acteur = id_acteur;");
			$query->execute(array("id_films" => $this->id_films, "id_acteur" => $this->id_acteur));
		}
	}
}