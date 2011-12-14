<?php
/**
 * 
 * creation de l'objet mot_de_passe avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class mot_de_passe {
	private $id_mdp;
	private $mdp;
	
	public function __construct($id_mdp = "", $mdp = ""){
		
		$this->mdp = $mdp;
		$this->id_mdp = $id_mdp;
	}
	
	// fonction d'ajout d'un nouveau mot_de_passe
	public function mot_de_passe_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO mot_de_passe(id_mdp, mdp) VALUES (:id_mdp, :mdp)");
		$query->execute(array("id_mdp" => $this->id_mdp, "mdp" => $this->mdp));
	}
	
	// fonction de supression d'un mot_de_passe
	public function mot_de_passe_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM mot_de_passe WHERE :mdp = mdp AND :id_mdp = id_mdp;");
		$query->execute(array("mdp" => $this->mdp,"id_mdp" => $this->id_mdp ));
	}
	
	// fonction de modification d'un champ dans la table mot_de_passe
	public function mot_de_passe_update() {
		global $conn;
		if (!empty($this->mdp)) {
			$query = $conn->prepare("UPDATE mot_de_passe SET mdp = :mdp WHERE mdp = :mdp AND :id_mdp = id_mdp;");
			$query->execute(array("titre_films" => $this->titre_films, "mdp" => $this->mdp));
		}
		if (!empty($this->id_mdp)) {
			$query = $conn->prepare("UPDATE mot_de_passe SET id_mdp = :id_mdp WHERE mdp = :mdp AND :id_mdp = id_mdp;");
			$query->execute(array("mdp" => $this->mdp, "id_mdp" => $this->id_mdp));
		}
	}
}