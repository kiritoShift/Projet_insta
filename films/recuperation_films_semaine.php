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
var_dump ($xml->channel->item->description);
$i=0;
$titre="";
$jaquette="";
$description="";
$type="";
$tab_liste_prochaine_sortie_dvd=array($titre,$description,$jaquette, $type);
// recuperation du titre des films dans le tableau xml
foreach($xml->channel->item as $item){
	$sinopsys=$item->description;
	$tabsinopsys= explode("</p>",$sinopsys);
	$sinopsys=strip_tags($tabsinopsys[0]);
	
	$tabtype=explode("(",$sinopsys);
	$type=$tabtype[0];
	// tableau avec (dans l'ordre) : titre du fulm, sinopsys du film, jaquette du film, type du film
	$tab_liste_prochaine_sortie_dvd[$i]=array((string)$item->title,$sinopsys,(string)$item->enclosure->attributes(),$type);
	//echo $tab_liste_prochaine_sortie_dvd[$i][0]."<br />".$tab_liste_prochaine_sortie_dvd[$i][1]."<br />".$tab_liste_prochaine_sortie_dvd[$i][2]."<br />".$type."<br /><br />";
	$i++;
}

	//var_dump ($tab_liste_prochaine_sortie_dvd);
	//die;
$i=0;
	echo $tab_liste_prochaine_sortie_dvd[0][0]."laa<br />";
// enrégistrement sur la base de données
foreach ($tab_liste_prochaine_sortie_dvd as $tab) {
	//echo $tab[0]." ici";
	var_dump ($tab);
	
	$sth = $conn->prepare("SELECT * FROM films WHERE UPPER(titre_films) = UPPER(:titre)");
	$sth->execute(array("titre" => $tab[0]));
	//vérification d'existance (rowCount()) pour eviter les doublons en regardant si oui ou non la variable existe déja dans la base
	if (!$sth->rowCount()) {
	$film = new films("", $tab[0], $tab[1], $tab[2], $tab[3]);
	$film->films_new();
	$i++;
	}
}

?>

</body>
</html>
