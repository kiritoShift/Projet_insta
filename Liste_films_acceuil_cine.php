
<?php

$query = $conn->prepare("
						SELECT films.id_films, sortir.date_sortie, films.titre_films, films.sinopsys_films, films.jaquette_films
						FROM sortir, films
						WHERE sortir.id_films=films.id_films
						AND type_sortie_films='cine';
						");
$query->execute(array());
$tab_sortir= $query->fetchAll(PDO::FETCH_OBJ);

foreach ($tab_sortir as $tab){
	
	$body=" 
<p align='center'>_________________________________________________________</p><br />
<p align='center'> ".$tab->titre_films."</p><br />
<P align='center'><img height='400' width='300' src='".$tab->jaquette_films."' alt='Pas d'image disponible'></p><br />
<p align='center'> Date de sortie : ".$tab->date_sortie."</p><br />
	";
	
	$date_limite=date( "Y-m-d");
	$date_limite=date( "Y-m-d", time() + 7 * 24 * 60 * 60 );
	if ($tab->date_sortie == $date_limite){
		echo $body;
	}
}

?>