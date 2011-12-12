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
$tab_liste_sortie_semaine=array();
foreach($xml->channel->item as $item){
	$tab_liste_sortie_semaine[]=(string)$item->title;
}
?>

</body>
</html>
