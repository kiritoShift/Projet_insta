<?php include 'connection_bdd.php'; ?>
<?php 

function liste_films() {
  global $conn;
	$query = $conn->prepare("SELECT * FROM films ORDER BY titre_films ASC;");
	$query->execute();
	$liste_films = $query->fetchAll(PDO::FETCH_ASSOC);
	return $liste_films;
}
?>