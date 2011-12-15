<?php
/**
 * 
 * creation de l'objet films avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class films {
	private $id_films;
	private $titre_films;
	private $sinopsys_films;
	private $type_films;
	private $jaquette_films;
	
	public function __construct($id_films = "", $titre_films = "", $sinopsys_films = "", $jaquette_films = "", $type_films =""){
		
		$this->id_films = $id_films;
		$this->titre_films = $titre_films;
		$this->sinopsys_films = $sinopsys_films;
		$this->jaquette_films = $jaquette_films;
		$this->type_films = $type_films;
	}
	
	// fonction d'ajout d'un nouveau film
	public function films_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO films(titre_films, sinopsys_films, jaquette_films, type_films) VALUES (:titre_films, :sinopsys_films, :jaquette_films, :type_films)");
		$query->execute(array("titre_films" => $this->titre_films, "sinopsys_films" => $this->sinopsys_films, "jaquette_films" => $this->jaquette_films, "type_films" => $this->type_films));
	}
	
	// fonction de supression d'un film
	public function films_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM films WHERE :id_films = id_films;");
		$query->execute(array("id_films" => $id_films));
	}
	
	// fonction de modification d'un champ dans la table films
	public function films_update() {
		global $conn;
		if (!empty($this->titre_films)) {
			$query = $conn->prepare("UPDATE films SET titre_films = :titre_films WHERE id_films = :id_films ;");
			$query->execute(array("titre_films" => $this->titre_films, "id_films" => $this->id_films));
		}
		if (!empty($this->sinopsys_films)) {
			$query = $conn->prepare("UPDATE films SET sinopsys_films = :sinopsys_films WHERE id_films = :id_films ;");
			$query->execute(array("id_films" => $this->id_films, "sinopsys_films" => $this->sinopsys_films));
		}
			if (!empty($this->jaquette_films)) {
			$query = $conn->prepare("UPDATE films SET jaquette_films = :jaquette_films WHERE id_films = :id_films ;");
			$query->execute(array("id_films" => $this->id_films, "jaquette_films" => $this->jaquette_films));
		}
			if (!empty($this->type_films)) {
			$query = $conn->prepare("UPDATE films SET type_films = :type_films WHERE id_films = :id_films ;");
			$query->execute(array("id_films" => $this->id_films, "type_films" => $this->type_films));
		}
		
	}
}