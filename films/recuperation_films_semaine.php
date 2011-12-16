<?php include '../connexion_bdd.php'; ?>
<?php 
//inclusison de l'objet jouer
include '../classes/jouer.php';
//inclusison de l'objet realiser
include '../classes/realiser.php';
//inclusison de l'objet realisateurs
include '../classes/realisateurs.php';

//inclusion de l'Objet acteurs
include '../classes/acteurs.php';

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
$tab_liste_prochaine_sortie_cine=array($titre,$description,$jaquette, $type);

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
		$tab_realisateur[$i]= explode(",",$tab_realisateur_liste[1]);
	}
	else {
		$tab_realisateur[$i] = array();
	}
	if (isset($tab_realisateur_acteur[1])) {
		$tab_acteur[$i]=explode(",",$tab_realisateur_acteur[1]);
	}
	else {
		$tab_acteur[$i] = array();
	}
	//supression des espace au debut et en fin de chaine(trim) de chaque valeur du tableau(a l'aide de array_map)
	$tab_realisateur[$i]=array_map('trim',($tab_realisateur[$i]));
	$tab_acteur[$i]=array_map('trim',$tab_acteur[$i]);
	
	//à décommenter pour voir le contenu des tableaux:
	/*echo "<br /> realisateur :";
	var_dump ($tab_realisateur);
	echo "<br /> acteur : <br />";
	var_dump ($tab_acteur);*/
	
	//récupération du genre de film en début de description
	$tabtype=explode("(",$sinopsys);
	$type=trim($tabtype[0]);
	
	// tableau avec (dans l'ordre) : titre du fulm, sinopsys du film, jaquette du film, type du film
	$tab_liste_prochaine_sortie_cine[$i]=array((string)$item->title,$sinopsys,(string)$item->enclosure->attributes(),$type);
	//echo $tab_liste_prochaine_sortie_cine[$i][0]."<br />".$tab_liste_prochaine_sortie_cine[$i][1]."<br />".$tab_liste_prochaine_sortie_cine[$i][2]."<br />".$type."<br /><br />";
	
	$tab_film_acteur_realisateur[$i]=array($item->title,$tab_realisateur[$i],$tab_acteur[$i]);
	
	$i++;
}
// enrégistrement sur la base de données des films
foreach ($tab_liste_prochaine_sortie_cine as $tab) {	
	
	//vérification d'existance (rowCount()) pour eviter les doublons en regardant si oui ou non la variable existe déja dans la base
	$sth = $conn->prepare("SELECT * FROM films WHERE UPPER(titre_films) = UPPER(:titre)");
	$sth->execute(array("titre" => $tab[0]));
	if (!$sth->rowCount()) {
		
		//ajout à la base de données d'un nouveau film
		$film = new films("", $tab[0], $tab[1], $tab[2], $tab[3]);
		$film->films_new();
	}
}

//enregistrement sur la basee de données des realisateurs
foreach ($tab_realisateur as $realisateur_liste){
	foreach ($realisateur_liste as $realisateur)
	if (isset($realisateur)){
		$prenom_nom_realisateur = prenom_nom($realisateur);
		$sth = $conn->prepare("SELECT * FROM realisateurs WHERE UPPER(nom_realisateur) = UPPER(:nom_realisateur) AND UPPER(prenom_realisateur) = UPPER(:prenom_realisateur)");
		$sth->execute(array("nom_realisateur" => $prenom_nom_realisateur[1], "prenom_realisateur" => $prenom_nom_realisateur[0]));
		if (!$sth->rowCount()) {
			//ajout à la base de données d'un nouveau film
			$film = new realisateurs("", $prenom_nom_realisateur[1], $prenom_nom_realisateur[0]);
			$film->realisateurs_new();
		}
	}
}

//enregistrement sur la base de données des acteurs
foreach ($tab_acteur as $acteur_liste){
	foreach ($acteur_liste as $acteur)
	if (isset($acteur)){
		$prenom_nom_acteur= prenom_nom($acteur);
		$sth = $conn->prepare("SELECT * FROM acteurs WHERE UPPER(nom_acteur) = UPPER(:nom_acteur) AND UPPER(prenom_acteur) = UPPER(:prenom_acteur)");
		$sth->execute(array("nom_acteur" => $prenom_nom_acteur[1], "prenom_acteur" => $prenom_nom_acteur[0]));
		if (!$sth->rowCount()) {
			//ajout à la base de données d'un nouveau film
			$film = new acteurs("", $prenom_nom_acteur[1], $prenom_nom_acteur[0]);
			$film->acteurs_new();
		}
	}
}

//enregistrement sur la base de données jouer et realiser
foreach ($tab_film_acteur_realisateur as $tab){
	$film= new films("",$tab[0],"","","");
	$id_film= $film->films_get_id();
	foreach ($tab[1] as $realisateurs){
		$nom_prenom_realisateur= prenom_nom($realisateurs);
		$realiser= new realisateurs("",$nom_prenom_realisateur[1],"");
		$id_realisateur = $realiser->realisateurs_get_id();
		$sth = $conn->prepare("SELECT * FROM realiser WHERE UPPER(id_films) = UPPER(:id_films) AND UPPER(id_realisateur) = UPPER(:id_realisateur)");
		$sth->execute(array("id_films" => $id_film, "id_realisateur" => $id_realisateur));
		if (!$sth->rowCount()) {
			$realiser= new realiser($id_realisateur,$id_film);
			$realiser->realiser_new();
		}
	}
	foreach ($tab[2] as $acteurs){
		$nom_prenom_acteur= prenom_nom($acteurs);
		$jouer= new acteurs("",$nom_prenom_acteur[1],"");
		$id_acteur = $jouer->acteurs_get_id();
		$sth = $conn->prepare("SELECT * FROM jouer WHERE UPPER(id_films) = UPPER(:id_films) AND UPPER(id_acteur) = UPPER(:id_acteur)");
		$sth->execute(array("id_films" => $id_film, "id_acteur" => $id_acteur));
		if (!$sth->rowCount()) {
			$jouer= new jouer($id_acteur,$id_film);
			$jouer->jouer_new();
		}		
	}
}

?>
</body>
</html>
