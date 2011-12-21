<?php include 'connexion_bdd.php'; ?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>
<?php

/*
$sth = $conn->prepare("SELECT * FROM films WHERE UPPER(titre_films) = UPPER(:titre)");
$sth->execute(array("titre" => $tab[0]));
if (!$sth->rowCount()) {

	//ajout à la base de données d'un nouveau film
	$film = new films("", $tab[0], $tab[1], $tab[2], $tab[3], $tab[5]);
	$film->films_new();


}*/

$query = $conn->prepare("
						SELECT sortir.date_sortie, films.titre_films, films.jaquette_films, type_sortie_films
						FROM sortir, avoir_films_favoris, films
						WHERE avoir_films_favoris.id_films = sortir.id_films
						AND sortir.id_films=films.id_films
						");
$query->execute(array());
$tab_sortir= $query->fetchAll(PDO::FETCH_OBJ);

var_dump($tab_sortir);
/*
foreach ($tab_sortir as $tab){
	
	$body=" <html> 
			<body align='center'>
				Votre film va sortir en dvd <br />
				".$tab->jaquette_films."<br />
				Date de sortie : ".$tab->date_sortie."
			</body>
		</html>  ";
	
	var_dump($tab->date_sortie);
	//$date_limite="2011-12-27";
	$date_limite=date( "Y-m-d");
	$date_limite=date( "Y-m-d", time() + 7 * 24 * 60 * 60 );
*/









?>