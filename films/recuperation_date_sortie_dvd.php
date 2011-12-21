<?php include '../connexion_bdd.php'; ?>
<?php
include '../fonction.php';
spl_autoload_register('autoClass');
?>
<?php
global $conn;
set_time_limit(300);
	
//récupération de la date de sortie du DVD
$query = $conn->prepare("SELECT * FROM films");
$query->execute(array());
$tab_film= $query->fetchAll(PDO::FETCH_OBJ);
$date_sortie_dvd="";
$existance=true;
foreach ($tab_film as $tab){
	$id=$tab->id_allocine;
	$id_films=$tab->id_films;
	$url_dvd="http://www.allocine.fr/film/fichefilm-".$id."/vod-dvd/";
	$code_html_url_dvd=file_get_contents($url_dvd);
	$dvd_existe=explode('Le saviez-vous ?' ,$code_html_url_dvd);
	$dvd_existe=explode('Photos', $dvd_existe[0]);
	$dvd_existe=strpos($dvd_existe[1], 'inactive');
	if ($dvd_existe!=false){
		$dvd=explode('<div class="content">',$code_html_url_dvd);
		$dvd2=strpos($dvd[1],"(DVD)");
		if ($dvd2!=false){
			$date_sortie_dvd=explode("(DVD)",(string)$dvd[1]);
			$date_sortie_dvd=explode("sortie : ",$date_sortie_dvd[1]);
			$date_sortie_dvd=explode('</p>', $date_sortie_dvd[1]);
			$date_sortie_dvd=formatage_date($date_sortie_dvd[0]);
			$sth = $conn->prepare("SELECT * FROM sortir
								WHERE id_films = :id_films 
								AND type_sortie_films = 'dvd'");
			$sth->execute(array("id_films" => $id_films));
			if (!$sth->rowCount()) {
			$date_sortie_cine = new sortir($id_films,"dvd",$date_sortie_dvd);
			$date_sortie_cine->sortir_new();
			}	
		}
	}
}