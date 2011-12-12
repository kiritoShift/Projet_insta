<?php
// SERVEUR SQL
$sql_serveur = "localhost";

// LOGIN SQL
$sql_user = "root";

// MOT DE PASSE SQL
$sql_passwd = "root";

//Base de donnees
$DB_NAME = "";

$db_link = mysql_connect($sql_serveur,$sql_user,$sql_passwd);
mysql_select_db ($DB_NAME) or die ("base invalide");
?>