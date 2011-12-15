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
$tab_liste_prochaine_sortie_dvd=array($titre,$description,$jaquette);
// recuperation du titre des films dans le tableau xml
foreach($xml->channel->item as $item){
	$sinopsys=$item->description;
	$tabsinopsys= explode("</p>",$sinopsys);
	$sinopsys=$tabsinopsys[0];
	$tab_liste_prochaine_sortie_dvd[$i]=array((string)$item->title,$sinopsys,(string)$item->enclosure->attributes());
	echo $tab_liste_prochaine_sortie_dvd[$i][0]."<br />".$tab_liste_prochaine_sortie_dvd[$i][1]."<br />".$tab_liste_prochaine_sortie_dvd[$i][2]."<br /><br />";
	$i++;
}

	//var_dump ($tab_liste_prochaine_sortie_dvd);

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

// recuperation des jaquettes des films dans le tableau xml
/*foreach($xml->channel->item->enclosure as $b) {
	$tab_jaquette[$i]= $b->attributes();
	$i++;
}*/

?>

</body>
</html>
