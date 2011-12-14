<?php include '../connexion_bdd.php'; ?>
<?php
/**
 * 
 * creation de l'objet films avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class avoir_acteurs_favoris {
	private $id_users;
	private $id_films;
	
	public function __construct($id_users = "", $id_films = ""){
		
		$this->id_film = $id_films;
		$this->id_users = $id_users;
	}
	
	// fonction d'ajout d'un nouveau 
	public function avoir_acteurs_favoris_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO avoir_acteurs_favoris(id_users, id_films) VALUES (:id_users, :id_films)");
		$query->execute(array("id_users" => $this->id_users, "id_films" => $this->id_films));
	}
	
	// fonction de supression d'un film
	public function avoir_acteurs_favoris_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM avoir_acteurs_favoris WHERE :id_films = id_films AND :id_users = id_users;");
		$query->execute(array("id_films" => $this->id_films,"id_users" => $this->id_users ));
	}
	
	// fonction de modification d'un champ dans la table films
	public function avoir_acteurs_favoris_update() {
		global $conn;
		if (!empty($nom_films)) {
			$query = $conn->prepare("UPDATE films SET titre_films = :titre_films WHERE id_films = :id_films ;");
			$query->execute(array("titre_films" => $this->titre_films, "id_films" => $this->id_films));
		}
		if (!empty($nom_films)) {
			$query = $conn->prepare("UPDATE films SET sinopsys_films = :sinopsys_films WHERE id_films = :id_films ;");
			$query->execute(array("id" => $this->id_films, "sinopsys_films" => $this->sinopsys_films));
		}
	}
}