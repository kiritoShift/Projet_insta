<?php
/**
 * connection à la base de données
 */
header('Content-type: text/html; charset=UTF-8');

//création de la variable de connection à la base de données grace à l'objet PDO
$conn = new PDO("mysql:host=localhost;dbname=projet_insta", "root", "");


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//initialisation de l'encodage en utf8
$conn->exec("SET NAMES 'utf8'");
