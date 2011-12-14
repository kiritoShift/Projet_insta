<?php include '../connexion_bdd.php'; ?>
<?php
/**
 * 
 * creation de l'objet avoir_acteurs_favoris avec des fonctions pour la modification SQL
 * @author bobo
 *
 */
class avoir_acteurs_favoris {
	private $id_users;
	private $id_acteurs;
	
	public function __construct($id_users = "", $id_acteurs = ""){
		
		$this->id_acteurs = $id_acteurs;
		$this->id_users = $id_users;
	}
	
	// fonction d'ajout d'un nouveau avoir_acteurs_favoris
	public function avoir_acteurs_favoris_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO avoir_acteurs_favoris(id_users, id_acteurs) VALUES (:id_users, :id_acteurs)");
		$query->execute(array("id_users" => $this->id_users, "id_acteurs" => $this->id_acteurs));
	}
	
	// fonction de supression d'un avoir_acteurs_favoris
	public function avoir_acteurs_favoris_delete(){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM avoir_acteurs_favoris WHERE :id_acteurs = id_acteurs AND :id_users = id_users;");
		$query->execute(array("id_acteurs" => $this->id_acteurs,"id_users" => $this->id_users ));
	}
	
	// fonction de modification d'un champ dans la table avoir_acteurs_favoris
	public function avoir_acteurs_favoris_update() {
		global $conn;
		if (!empty($this->id_acteurs)) {
			$query = $conn->prepare("UPDATE avoir_acteurs_favoris SET id_acteurs = :id_acteurs WHERE id_acteurs = :id_acteurs AND :id_users = id_users;");
			$query->execute(array("titre_acteurs" => $this->titre_acteurs, "id_acteurs" => $this->id_acteurs));
		}
		if (!empty($this->id_users)) {
			$query = $conn->prepare("UPDATE avoir_acteurs_favoris SET nom_acteurs = :nom_acteurs WHERE id_acteurs = :id_acteurs AND :id_users = id_users;");
			$query->execute(array("id_acteurs" => $this->id_acteurs, "nom_acteurs" => $this->nom_acteurs));
		}
	}
}