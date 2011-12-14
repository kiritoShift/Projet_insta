<?php include '../connexion_bdd.php'; ?>
<?php
/**
 * 
 * creation de l'objet avoir_realisateur_favoris avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class avoir_realisateur_favoris {
	private $id_realisateur;
	private $id_films;
	
	public function __construct($id_realisateur = "", $id_films = ""){
		
		$this->id_films = $id_films;
		$this->id_realisateur = $id_realisateur;
	}
	
	// fonction d'ajout d'un nouveau avoir_realisateur_favoris
	public function avoir_realisateur_favoris_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO avoir_realisateur_favoris(id_realisateur, id_films) VALUES (:id_realisateur, :id_films)");
		$query->execute(array("id_realisateur" => $this->id_realisateur, "id_films" => $this->id_films));
	}
	
	// fonction de supression d'un avoir_realisateur_favoris
	public function avoir_realisateur_favoris_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM avoir_realisateur_favoris WHERE :id_films = id_films AND :id_realisateur = id_realisateur;");
		$query->execute(array("id_films" => $this->id_films,"id_realisateur" => $this->id_realisateur ));
	}
	
	// fonction de modification d'un champ dans la table avoir_realisateur_favoris
	public function avoir_realisateur_favoris_update() {
		global $conn;
		if (!empty($this->id_films)) {
			$query = $conn->prepare("UPDATE avoir_realisateur_favoris SET id_films = :id_films WHERE id_films = :id_films AND :id_realisateur = id_realisateur;");
			$query->execute(array("id_films" => $this->id_films, "id_films" => $this->id_films));
		}
		if (!empty($this->id_realisateur)) {
			$query = $conn->prepare("UPDATE avoir_realisateur_favoris SET id_realisateur = :id_realisateur WHERE id_films = :id_films AND :id_realisateur = id_realisateur;");
			$query->execute(array("id_films" => $this->id_films, "id_realisateur" => $this->id_realisateur));
		}
	}
}