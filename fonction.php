<?php include 'connexion_bdd.php'; ?>
<?php 

function autoClass($name) {
	include("../classes/$name.php");
}

function autoClass_racine($name) {
	include("classes/$name.php");
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
