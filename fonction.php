<?php 

function autoClass($name) {
	include("../classes/$name.php");
}

function autoClass_racine($name) {
	include("classes/$name.php");
}

function verification_compte($pseudo){
	global $conn;
	$query = $conn->prepare("SELECT type_compte FROM utilisateurs WHERE pseudo_users = :pseudo_users;");
	$query->execute(array("pseudo_users" => $pseudo));
	$type_compte = $query->fetchAll(PDO::FETCH_ASSOC);
	return $type_compte[0]['type_compte'];
}

function formatage_date($date) {
	$tab_date=explode(" ", $date);
	$jour=$tab_date[1];
	$mois=$tab_date[2];
	$ans=$tab_date[3];
	
	switch ($mois){
		case "janvier":
			$mois=01;
			break;
		case "fevrier":
			$mois=02;
			break;
		case "mars":
			$mois=03;
			break;
		case "avril":
			$mois=04;
			break;
		case "mai":
			$mois=05;
			break;
		case "juin":
			$mois=06;
			break;
		case "juillet":
			$mois=07;
			break;
		case "aout":
			$mois=08;
			break;
		case "septembre":
			$mois=09;
			break;
		case "octobre":
			$mois=10;
			break;
		case "novembre":
			$mois=11;
			break;
		case "decembre":
			$mois=12;
			break;
	}
	$tab_date=array($ans,$mois,$jour);
	$tab_date[0]=str_ireplace("\n", "", $tab_date[0]);
	$date=implode("-",$tab_date);
	return $date;
}
function liste_films() {
  global $conn;
	$query = $conn->prepare("SELECT * FROM films ORDER BY titre_films ASC;");
	$query->execute();
	$liste_films = $query->fetchAll(PDO::FETCH_ASSOC);
	return $liste_films;
}

function liste_users() {
	global $conn;
	$query = $conn->prepare("SELECT id_users,pseudo_users,nom_users,prenom_users FROM utilisateurs ORDER BY nom_users ASC;");
	$query->execute();
	$liste_users = $query->fetchAll(PDO::FETCH_ASSOC);
	return $liste_users;
}

function prenom_nom($prenom_nom) {
		$tab_prenom_nom= explode(" ",$prenom_nom);
		if (!isset($tab_prenom_nom[1])){
			$tab_prenom_nom[1]=" ";
		}
		if (!isset($tab_prenom_nom[0])){
			$tab_prenom_nom[0]=" ";
		}
		return $tab_prenom_nom;
}

//$tab2=liste_users();
//var_dump($tab2);
//test
?>
