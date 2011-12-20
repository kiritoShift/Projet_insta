<?php include '../connexion_bdd.php'; ?>
<?php
include '../fonction.php';
spl_autoload_register('autoClass');
?>
<?php
global $conn;
set_time_limit(300);	
//récupération de la date de sortie du DVD
	
//
//
$query = $conn->prepare("SELECT * FROM films");
$query->execute(array());
$tab_film= $query->fetchAll(PDO::FETCH_OBJ);
$date_sortie_dvd="";
$existance=true;
foreach ($tab_film as $tab){
	$id=$tab->id_allocine;
	$url_dvd="http://www.allocine.fr/film/fichefilm-".$id."/vod-dvd/";
	$code_html_url_dvd=file_get_contents($url_dvd);
	$dvd_existe=explode('<div class="tabs_main">' ,$code_html_url_dvd);
	$dvd_existe=explode('Le saviez-vous ?</span>' ,$dvd_existe[1]);
	$dvd_existe=explode('Bandes-annonces',$dvd_existe[0]);
	$dvd_existe=explode('Photos</a></li><li><span class=', $dvd_existe[1]);
	echo $id."<br />";
	if (isset($dvd_existe[1])){
		echo "test1";
		$dvd_existe=explode('>DVD,', $dvd_existe[1]);
	}
	if (isset($dvd_existe[1]) && $dvd_existe[0]==='"inactive"'){
		echo "test2";
		$existance=false;
	}
	else {
		echo "test3";
		$dvd=explode('<div class="content">',$code_html_url_dvd);
		$dvd2=strpos($dvd[1],"(DVD)");
		if ($dvd2!=false){
			//var_dump($dvd);
			$date_sortie_dvd=explode("(DVD)",(string)$dvd[1]);
			$date_sortie_dvd=explode("sortie : ",$date_sortie_dvd[1]);
			$date_sortie_dvd=explode('</p>', $date_sortie_dvd[1]);
			var_dump($date_sortie_dvd);
		}
	}
	//$dvd_existe=explode('">DVD,',$dvd_existe[1]);
	//echo $dvd_existe."<br />";
	/*if (!isset($dvd_existe[1])){
		echo "IFF";
		echo "pas de dvd";
	}
	else {
		echo "ELSEEEE";
		$date_sortie_dvd = explode("(DVD)", $code_html_url_dvd);
	}
	echo "____________________";
	var_dump($date_sortie_dvd[0]);*/
}