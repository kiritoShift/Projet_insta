<?php include '../connection_bdd.php'; ?>
<?php

class films {
	private $id_films;
	private $titre_films;
	private $sinopsys_films;
	public function __construct($id_films = "", $titre_films = "", $sinopsys_films = ""){
		
		$this->id_film = $id_films;
		$this->titre_films = $titre_films;
		$this->sinopsys_films = $sinopsys_films;
	}
	
	public function films_new(){
		global $conn;
		$query = $conn->prepare("INSERT INTO films(titre_films, sinopsys_films) VALUES (:titre_films, :sinopsys_films)");
		$query->execute(array("titre_films" => $this->titre_films, "sinopsys_films" => $this->sinopsys_films));
	}
	
	/*public function films_delete($id_films){
		global $conn;
		$query = $conn->prepare("DELETE QUICK FROM films WHERE :id_films = id_films;");
		$conn->execute(array("id_films" => $id_films));
	}
	
	public function films_update($id_films, $nom_films ="", $sinopsys_films ="") {
		global $conn;
		if (!empty($nom_films)) {
			$query = $conn->prepare("UPDATE films SET nom_films = :nom_films WHERE id_films = :id_films ;");
			$conn->execute(array("nom_films" => $this->id_films, "id_films" => $this->titre_films));
		}
		if (!empty($nom_films)) {
			$query = $conn->prepare("UPDATE films SET sinopsys_films = :sinopsys_films WHERE id_films = :id_films ;");
			$conn->execute(array("sinopsys" => $this->id_films, "id_films" => $this->sinopsys_films));
		}
	}*/
}