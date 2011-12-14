<?php
/**
 * 
 * creation de l'objet realiser avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class realiser {
	private $id_realisateur;
	private $id_films;
	
	public function __construct($id_realisateur = "", $id_films = ""){
		
		$this->id_films = $id_films;
		$this->id_realisateur = $id_realisateur;
	}
	
	// fonction d'ajout d'un nouveau realiser
	public function realiser_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO realiser(id_realisateur, id_films) VALUES (:id_realisateur, :id_films)");
		$query->execute(array("id_realisateur" => $this->id_realisateur, "id_films" => $this->id_films));
	}
	
	// fonction de supression d'un realiser
	public function realiser_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM realiser WHERE :id_films = id_films AND :id_realisateur = id_realisateur;");
		$query->execute(array("id_films" => $this->id_films,"id_realisateur" => $this->id_realisateur ));
	}
	
	// fonction de modification d'un champ dans la table realiser
	public function realiser_update() {
		global $conn;
		if (!empty($this->id_films)) {
			$query = $conn->prepare("UPDATE realiser SET id_films = :id_films WHERE id_films = :id_films AND :id_realisateur = id_realisateur;");
			$query->execute(array("titre_acteurs" => $this->titre_acteurs, "id_films" => $this->id_films));
		}
		if (!empty($this->id_realisateur)) {
			$query = $conn->prepare("UPDATE realiser SET nom_acteurs = :nom_acteurs WHERE id_films = :id_films AND :id_realisateur = id_realisateur;");
			$query->execute(array("id_films" => $this->id_films, "nom_acteurs" => $this->nom_acteurs));
		}
	}
}