<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<?php 
include_once ("connexion_bdd.php");
include ("entete.php");
include ("baspage.php");

$choix=0;
if(isset($_GET["choix"]))
{
   $choix=$_GET["choix"];
}
if($choix==1)
{
 $result=$conn->prepare("SELECT * FROM films order by id_films ASC");
 $result->execute();	
}
else
{
 if($choix==2)
 {
  $result=$conn->prepare("SELECT * FROM films ORDER BY jaquette_films ASC");
  $result->execute(); 
}
 else
 {
 	if($choix==3)
{
 $result=$conn->prepare("SELECT * FROM films order by titre_films ASC");
 $result->execute();	
}
else
{
	if($choix==4)
{
 $result=$conn->prepare("SELECT * FROM films order by sinopsys_films ASC");
 $result->execute();	
}
else
{
	if($choix==5)
{
 $result=$conn->prepare("SELECT * FROM films order by type_films ASC");
 $result->execute();	
}
else
{
  $result=$conn->prepare("SELECT * FROM films");
  $result->execute(); 
 }}}}}
?>

<html>
<head>
<title>page utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=MacRoman">
<link rel="stylesheet" media="screen" type="text/css" title="menu" href="css/menu.css" />



</head>
	<body>
<table border=1 width="100%">
	<tr>
	<td>

		<table align="center" bgcolor=#ffffCC border=1>
			<tr><td><b><font size="-1">Liste des films</font></B></td></tr>
		</table>
<br />
		<table align="center">
			<TR><TD>
			<table align=center>
				<tr><td>
   					<table border=1>
   						<TR bgcolor=#ffffCC>
     						<TD><font size="-1"><a href="liste_films.php?choix=1"><b>id</b></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=2"><b>Jaquette</b></a></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=3"><b>titre du film</b></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=4"><b>synopsys</b></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=5"><b>type de film</b></font></TD>						
     					</TR>
     					<? while ($val = $result->fetch(PDO::FETCH_ASSOC)) { ?>
     					<TR bgcolor=white>
     						<form method="post">
     						<TD><font size="-2"><? echo $val["id_films"]?></font></TD>
     						<TD><font size="-2"><img src="<? echo $val["jaquette_films"]?>" width=90 height=110 /></font></TD>
     						<TD height=110 width=200><font size="-2"><? echo $val["titre_films"]?></font></TD>
     						<TD height=110 width=500><font size="-2"><? echo $val["sinopsys_films"]?></font></TD>
     						<TD><font size="-2"><? echo $val["type_films"]?></font></TD>
      						<TD><font size="-2"></font><input name="favoris" type="image" src="images/etoile_favoris.gif"> favoris</TD>
     					</TR><? } ?>
   					</table>
   				</td></tr>
			</table>
			</td></tr>
		</table>
	</td></tr>
</table>
</body>
</html>
