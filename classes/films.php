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
	private $select_id;
	private $id_allocine;
	public function __construct($id_films = "", $titre_films = "", $sinopsys_films = "", $jaquette_films = "", $type_films ="", $id_allocine =""){
		global $conn;
		$this->id_films = $id_films;
		$this->titre_films = $titre_films;
		$this->sinopsys_films = $sinopsys_films;
		$this->jaquette_films = $jaquette_films;
		$this->type_films = $type_films;
		$this->id_allocine = $id_allocine;
		
		$query = $conn->prepare("SELECT id_films FROM films WHERE :titre_films = titre_films");
		$query->execute(array("titre_films" => $titre_films));
		if ($query->rowcount()){
		$select_id = $query->fetch(PDO::FETCH_OBJ);
		$this->select_id = $select_id->id_films;
		}
	}
	
	// fonction de recupération d'un id
	
	public function films_get_id (){
		global $conn;
		return $this->select_id;
	}
	
	// fonction d'ajout d'un nouveau film
	public function films_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO films(titre_films, sinopsys_films, jaquette_films, type_films, id_allocine) VALUES (:titre_films, :sinopsys_films, :jaquette_films, :type_films, :id_allocine)");
		$query->execute(array("titre_films" => $this->titre_films, "sinopsys_films" => $this->sinopsys_films, "jaquette_films" => $this->jaquette_films, "type_films" => $this->type_films, "id_allocine" => $this->id_allocine));
	}
	
	// fonction de supression d'un film
	public function films_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM films WHERE :id_films = id_films;");
		$query->execute(array("id_films" => $this->id_films));
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