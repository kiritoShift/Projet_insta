<?php include '../connexion_bdd.php'; ?>
<?php 
 
//inclusion de l'objet films
include '../classes/films.php';

//inclusion des fonctions
include '../fonction.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>recuperation rss</title>
</head>

<body>
<?php
/**
 * 
 * transformer le fichier XML en objet $xml
 * 
 */
$xml=simplexml_load_file('http://rss.allocine.fr/ac/cine/cettesemaine.rss');

/**
 * 
 * Mettre la liste des titres des films dans un tableau
 * 
 */

// initialisation des variables
$i=0;
$titre="";
$tab_liste_prochaine_sortie_dvd=array($titre);

// recuperation du titre des films dans le tableau xml
foreach($xml->channel->item as $item){
	$tab_liste_prochaine_sortie_dvd[$i]=(string)$item->title;
	$i++;
}

// enrégistrement sur la base de données
foreach ($tab_liste_prochaine_sortie_dvd as $tab) {
	//recupération de la ligne du tableau
	$titre_films= $tab;
	//préparation de la requete SQL
	$sth = $conn->prepare("SELECT * FROM films WHERE UPPER(titre_films) = UPPER(:titre)");
	//exécution de la requete SQL
	$sth->execute(array("titre" => $titre_films));
	//vérification d'existance (rowCount()) pour eviter les doublons en regardant si oui ou non la variable existe déja dans la base
	if (!$sth->rowCount()) {
	$film = new films("", $titre_films, "");
	$film->films_new();
	}
}

?>

</body>
</html>
