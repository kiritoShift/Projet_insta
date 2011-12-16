<?php
/**
 * 
 * creation de l'objet acteurs avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class acteurs {
	private $id_acteur;
	private $nom_acteur;
	private $prenom_acteur;
	private $select_id;
	
	public function __construct($id_acteur= "", $nom_acteur= "", $prenom_acteur= ""){
		global $conn;
		$this->id_acteur = $id_acteur;
		$this->nom_acteur = $nom_acteur;
		$this->prenom_acteur = $prenom_acteur;
		
		$query = $conn->prepare("SELECT id_acteur FROM acteurs WHERE :nom_acteur = nom_acteur");
		$query->execute(array("nom_acteur" => $nom_acteur));
		if ($query->rowcount()){
		$select_id = $query->fetch(PDO::FETCH_OBJ);
		$this->select_id = $select_id->id_acteur;
		}
	}
	
	// fonction de recupération d'un id
	
	public function acteurs_get_id (){
		global $conn;
		return $this->select_id;
	}
	
	// fonction d'ajout d'un nouveau acteur
	public function acteurs_new(){
		global $conn;
		$query =$conn->prepare("INSERT INTO acteurs(nom_acteur, prenom_acteur) VALUES (:nom_acteur,:prenom_acteur)");
		$query->execute(array("nom_acteur" =>$this->nom_acteur, "prenom_acteur" =>$this->prenom_acteur));
	}
	
	// fonction de supression d'un acteur
	public function acteurs_delete(){
		global $conn;
		$query =$conn->prepare( "DELETE QUICK FROM acteurs WHERE :id_acteur = id_acteur;");
		$query->execute(array("id_acteur" =>$this->id_acteur));
	}
	
	// fonction de modification d'un champ dans la table acteurs
	public function acteur_update() {
		global $conn;
		if (!empty($this->nom_acteur)) {
			$query =$conn->prepare("UPDATE acteur SET nom_acteur = :nom_acteur WHERE id_acteur = :id_acteur;");
			$query->execute(array("id_acteur" =>$this->id_acteur, "nom_acteur" =>$this->nom_acteur));
		}
		if (!empty($this->prenom_acteur)) {
			$query =$conn->prepare("UPDATE acteur SET prenom_acteur = :prenom_acteur WHERE id_acteur = :id_acteur;");
			$query->execute(array("id_acteur" =>$this->id_acteur,"prenom_acteur" =>$this->prenom_acteur));
		}
	}
}