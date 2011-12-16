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
$jaquette="";
$description="";
$type="";
$acteur="";
$realisateur_acteur="";
$tab_liste_prochaine_sortie_dvd=array($titre,$description,$jaquette, $type);
$j=-1;
$y=0;
// recuperation du titre des films dans le tableau xml
foreach($xml->channel->item as $item){
	
	//recupération de la balise description du xml
	$sinopsys=$item->description;
	
	//séparation du contenu dans un tableau
	$tabdescription= explode("</p>",$sinopsys);
	
	//recupération du sinopsys et suppression des balise html a l'aide de la fonction strip_tags
	$sinopsys=strip_tags($tabdescription[0]);
	$realisateur_acteur=strip_tags($tabdescription[1]);
	
	//sépparation des acteurs et realisateur en liste
	$tab_realisateur_acteur= explode("Avec", $realisateur_acteur);
	$tab_realisateur_liste= explode("Un film de",$tab_realisateur_acteur[0]);
	if (isset($tab_realisateur_liste[1])){
		$tab_realisateur= explode(",",$tab_realisateur_liste[1]);
	}
	else {
		$tab_realisateur = array();
	}
	if (isset($tab_realisateur_acteur[1])) {
		$tab_acteur=explode(",",$tab_realisateur_acteur[1]);
	}
	else {
		$tab_acteur = array();
	}
	//supression des espace au debut et en fin de chaine(trim) de chaque valeur du tableau(a l'aide de array_map)
	$tab_realisateur=array_map('trim',$tab_realisateur);
	$tab_acteur=array_map('trim',$tab_acteur);
	
	//à décommenter pour voir le contenu des tableaux:
	/*echo "<br /> realisateur :";
	var_dump ($tab_realisateur);
	echo "<br /> acteur : <br />";
	var_dump ($tab_acteur);*/
	
	//récupération du genre de film en début de description
	$tabtype=explode("(",$sinopsys);
	$type=trim($tabtype[0]);
	
	// tableau avec (dans l'ordre) : titre du fulm, sinopsys du film, jaquette du film, type du film
	$tab_liste_prochaine_sortie_dvd[$i]=array((string)$item->title,$sinopsys,(string)$item->enclosure->attributes(),$type);
	
	//echo $tab_liste_prochaine_sortie_dvd[$i][0]."<br />".$tab_liste_prochaine_sortie_dvd[$i][1]."<br />".$tab_liste_prochaine_sortie_dvd[$i][2]."<br />".$type."<br /><br />";
	$i++;
}

// enrégistrement sur la base de données
foreach ($tab_liste_prochaine_sortie_dvd as $tab) {	
	
	//vérification d'existance (rowCount()) pour eviter les doublons en regardant si oui ou non la variable existe déja dans la base
	$sth = $conn->prepare("SELECT * FROM films WHERE UPPER(titre_films) = UPPER(:titre)");
	$sth->execute(array("titre" => $tab[0]));
	if (!$sth->rowCount()) {
		
		//ajout à la base de données d'un nouveau film
		$film = new films("", $tab[0], $tab[1], $tab[2], $tab[3]);
		$film->films_new();
	}
}
?>
</body>
</html>
