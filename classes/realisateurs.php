<?php
/**
 * 
 * creation de l'objet realisateurs avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class realisateurs {
	private $id_realisateur;
	private $nom_realisateur;
	private $prenom_realisateur;
	
	public function __construct($id_realisateur= "", $nom_realisateur= "", $prenom_realisateur= ""){
		
		$this->id_realisateur = $id_realisateur;
		$this->nom_realisateur = $nom_realisateur;
		$this->prenom_realisateur = $prenom_realisateur;
	}
	// fonction d'ajout d'un nouveau realisateurs
	public function realisateurs_new(){
		global $conn;
		$query =$conn->prepare("INSERT INTO realisateurs(nom_realisateur, prenom_realisateur) VALUES (:nom_realisateur,:prenom_realisateur)");
		$query->execute(array("nom_realisateur" =>$this->nom_realisateur, "prenom_realisateur" =>$this->prenom_realisateur));
	}
	
	// fonction de supression d'un realisateurs
	public function realisateurs_drop(){
		global $conn;
		$query =$conn->prepare( "DELETE QUICK FROM realisateurs WHERE :id_realisateur = id_realisateur;");
		$query->execute(array("id_realisateur" =>$this->id_realisateur));
	}
	
	// fonction de modification d'un champ dans la table realisateurs
	public function realisateur_update() {
		global $conn;
		if (!empty($this->nom_realisateur)) {
			$query =$conn->prepare("UPDATE realisateurs SET nom_realisateur = :nom_realisateur WHERE id_realisateur = :id_realisateur;");
			$query->execute(array("id_realisateur" =>$this->id_realisateur, "nom_realisateur" =>$this->nom_realisateur));
		}
		if (!empty($this->prenom_realisateur)) {
			$query =$conn->prepare("UPDATE realisateurs SET prenom_realisateur = :prenom_realisateur WHERE id_realisateur = :id_realisateur;");
			$query->execute(array("id_realisateur" =>$this->id_realisateur,"prenom_realisateur" =>$this->prenom_realisateur));
		}
	}
}