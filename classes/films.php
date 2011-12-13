<?php include '../connection_bdd.php'; ?>
<?php

class films {
	private $id_films;
	private $titre_films;
	private $sinopsys_films;
	public function __construct($id_films = "", $nom_films = "", $sinopsys_films = ""){
		
		$this->id_film = $id_films;
		$this->nom_films = $nom_films;
		$this->sinopsys_films = $sinopsys_films;
	}
	
	public function films_new($nom_films ="", $sinopsys_films =""){
		global $conn;
		$query = "INSERT INTO acteurs(nom_films, sinopsys_films) VALUES ('".$nom_films."','".$sinopsys_films."'))";
		$conn->query($this->nom_films, $this->sinopsys_films);
	}
	
	public function films_drop($id_films){
		$query = "DELETE QUICK FROM films WHERE ".$id_films." = id_films;";
		$conn->query($this->id_films);
	}
	
	public function films_update($id_films, $nom_films ="", $sinopsys_films ="") {
		if (!empty($nom_films)) {
			$query = "UPDATE films SET nom_films = ".$nom_films." WHERE id_films = ".$id_films.";";
			$conn->query($this->id_films, $this->nom_films);
		}
		if (!empty($nom_films)) {
			$query = "UPDATE films SET sinopsys_films = ".$sinopsys_films." WHERE id_films = ".$id_films.";";
			$conn->query($this->id_films, $this->sinopsys_films);
		}
	}
}