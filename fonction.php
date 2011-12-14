<?php include 'connection_bdd.php'; ?>
<?php 

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

//$tab2=liste_users();
//var_dump($tab2);



?>