<?php 
include '../connection_bdd.php'; 
include '../classes/films.php';
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
global $conn;
$i=0;
$titre="";
$tab_liste_prochaine_sortie_dvd=array($titre);
foreach($xml->channel->item as $item){
	$tab_liste_prochaine_sortie_dvd[$i]=(string)$item->title;
	$i++;
}
var_dump($tab_liste_prochaine_sortie_dvd);
$i=0;
foreach ($tab_liste_prochaine_sortie_dvd as $tab) {
	$titre_films= $tab_liste_prochaine_sortie_dvd[$i];
	echo $titre_films."<br/>";
	$film = new films("", $titre_films, "");
	$film->films_new();
	$i++;
}

?>

</body>
</html>
