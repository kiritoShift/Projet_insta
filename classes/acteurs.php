<?php include '../connection_bdd.php'; ?>
<?php

class acteurs {
	private $acteur;
	private $nom_acteur;
	private $prenom_acteur;
	public function __construct($id_acteur, $nom_acteur, $prenom_acteur){
		
		$this->acteur = $id_acteur;
		$this->nom_acteur = $nom_acteur;
		$this->prenom_acteur = $prenom_acteur;
	}
	
}