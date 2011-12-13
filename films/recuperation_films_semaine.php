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
$i=0;
$tab_liste_prochaine_sortie_dvd=array("titre" =>"");
foreach($xml->channel->item as $item){
	$tab_liste_prochaine_sortie_dvd["titre"]=(string)$item->title;
	var_dump($tab_liste_prochaine_sortie_dvd);
}
foreach ($tab_liste_prochaine_sortie_dvd as $tab) {
	$nom_films= $tab_liste_prochaine_sortie_dvd[$i];
	$film = new films($nom_films);
	$film->films_new();
}

?>

</body>
</html>
