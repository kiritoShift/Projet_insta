<?session_start();?>
<?include("connexion.php");
include("menu_user.php");
$choix=0;
if(isset($_GET["choix"]))
{
   $choix=$_GET["choix"];
}
if($choix==1)
{
 $result = mysql_query("select * from famille order by code_famille ASC;");
}
else
{
 if($choix==2)
 {
  $result = mysql_query("select * from famille order by libelle ASC;");
 }
 else
 { 
  $result = mysql_query("select * from famille;"); 
 }
}?>

<?php
echo "realisateurs favoris";