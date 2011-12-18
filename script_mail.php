<?php
include 'connexion_bdd.php';
$result=$conn->prepare("SELECT *
	  FROM avoir_films_favoris, films, users
      WHERE avoir_films_favoris.id_films = films.id_films
      AND avoir_films_favoris.id_users = users.id_users
      AND avoir_films_favoris.id_users = :userid");
$result->execute();
echo $result;

while ($val=$result->fetch(PDO::FETCH_ASSOC)){
echo $val;
}