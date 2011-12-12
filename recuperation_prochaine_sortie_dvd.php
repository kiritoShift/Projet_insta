<!DOCTYPE html>
<html lang="fr">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>recuperation rss</title>
</head>

<body>
<?php
/**
 * oioipp commentaire de test
 * transformer le fichier XML en objet $xml
 * 
 */
$xml=simplexml_load_file('http://www.premiere.fr/var/premiere/storage/rss/sorties_semaine_dvd.xml');

/**
 * 
 * Mettre la liste des titres des films dans un tableau
 * 
 */
$i=0;
$tab_liste_prochaine_sortie_dvd=array("titre" =>"", "date"=>"");
foreach($xml->channel->item as $item){
	$tab_liste_prochaine_sortie_dvd["titre"]=(string)$item->title;
	$tab_liste_prochaine_sortie_dvd["date"]=(string)$item->pubDate;
}
?>

</body>
</html>
