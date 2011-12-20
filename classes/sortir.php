<?php
/**
 * 
 * creation de l'objet sortir avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class sortir {
	private $id_films;
	private $type_sortie_films;
	private $date_sortie;
	
	public function __construct($id_films= "", $type_sortie_films= "", $date_sortie= ""){
		
		$this->id_films = $id_films;
		$this->type_sortie_films = $type_sortie_films;
		$this->date_sortie = $date_sortie;
	}
	// fonction d'ajout d'un nouveau sortir
	public function sortir_new(){
		global $conn;
		$query =$conn->prepare("INSERT INTO sortir(id_films, type_sortie_films, date_sortie) VALUES (:id_films,:type_sortie_films,:date_sortie)");
		$query->execute(array("id_films" =>$this->id_films, "type_sortie_films" =>$this->type_sortie_films, "date_sortie" =>$this->date_sortie));
	}
	
	// fonction de supression d'un sortir
	public function sortir_drop(){
		global $conn;
		$query =$conn->prepare( "DELETE QUICK FROM sortir WHERE :id_films = id_films;");
		$query->execute(array("id_films" =>$this->id_films));
	}
	
	// fonction de modification d'un champ dans la table sortir
	public function sortir_update() {
		global $conn;
		if (!empty($this->type_sortie_films)) {
			$query =$conn->prepare("UPDATE sortir SET type_sortie_films = :type_sortie_films WHERE id_films = :id_films;");
			$query->execute(array("id_films" =>$this->id_films, "type_sortie_films" =>$this->type_sortie_films));
		}
		if (!empty($this->date_sortie)) {
			$query =$conn->prepare("UPDATE sortir SET date_sortie = :date_sortie WHERE id_films = :id_films;");
			$query->execute(array("id_films" =>$this->id_films,"date_sortie" =>$this->date_sortie));
		}
	}
}