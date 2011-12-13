<?php include 'connection_bdd.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php 
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

?>
