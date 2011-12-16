<?php include 'connexion_bdd.php'; ?>
<?php include 'classes/films.php'; ?>
<?php include 'classes/realisateurs.php'; ?>
<?php include 'classes/mot_de_passe.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php 
/*
$test = "toto";
echo $test;

$query = $conn->prepare("SELECT * FROM films ORDER BY titre_films ASC;");
$query->execute();
$row = $query->fetchAll(PDO::FETCH_ASSOC);


while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	print_r($row);print "<br />";
}

$result = mysql_query("select * from films order by titre_films ASC;");
echo $result;
*/
$var1="toto";
$var2="";
$var3="";
$var4="";
$id="3";
$film = new mot_de_passe($id, "");
//echo $film->films_get_id();
$film->mot_de_passe_delete();

?>
