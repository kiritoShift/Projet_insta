<?php
/**
 * 
 * creation de l'objet avoir_films_favoris avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class avoir_films_favoris {
	private $id_users;
	private $id_films;
	
	public function __construct($id_users = "", $id_films = ""){
		
		$this->id_films = $id_films;
		$this->id_users = $id_users;
	}
	
	// fonction d'ajout d'un nouveau avoir_films_favoris
	public function avoir_films_favoris_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO avoir_films_favoris(id_users, id_films) VALUES (:id_users, :id_films)");
		$query->execute(array("id_users" => $this->id_users, "id_films" => $this->id_films));
	}
	
	// fonction de supression d'un avoir_films_favoris
	public function avoir_films_favoris_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM avoir_films_favoris WHERE :id_films = id_films AND :id_users = id_users;");
		$query->execute(array("id_films" => $this->id_films,"id_users" => $this->id_users ));
	}
	
	// fonction de modification d'un champ dans la table avoir_films_favoris
	public function avoir_films_favoris_update() {
		global $conn;
		if (!empty($this->id_films)) {
			$query = $conn->prepare("UPDATE avoir_films_favoris SET id_films = :id_films WHERE id_films = :id_films AND :id_users = id_users;");
			$query->execute(array("titre_films" => $this->titre_films, "id_films" => $this->id_films));
		}
		if (!empty($this->id_users)) {
			$query = $conn->prepare("UPDATE avoir_films_favoris SET nom_films = :nom_films WHERE id_films = :id_films AND :id_users = id_users;");
			$query->execute(array("id_films" => $this->id_films, "nom_films" => $this->nom_films));
		}
	}
}