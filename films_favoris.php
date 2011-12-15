<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<?include("connexion_bdd.php");
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


<html>
<head>
<title>page utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=MacRoman">
<link rel="stylesheet" media="screen" type="text/css" title="menu" href="css/menu.css" />



</head>
	<body>
<table border=1 width="100%">
	<tr><td>
<?php include("menu_user.php");	?>
	</td>
	<td>

		<table align="center" bgcolor=#ffffCC border=1>
			<tr><td><b><font size="-1">Liste des films favoris</font></B></td></tr>
		</table>
<br />
		<table align="center">
			<TR><TD>
			<table align=center>
				<tr><td>
   					<table border=1>
   						<TR bgcolor=#ffffCC>
     						<TD><font size="-1"><b>Jacquette</b></font></TD>
     						<TD><font size="-1"><a href="page_user.php?choix=1"><b>Nom du film</b></a></font></TD>
     						<TD><font size="-1"><b>Date de sortie</b></font></TD>
     						<TD><font size="-1"><b>Nom du realisateur</b></font></TD>
     						<TD><font size="-1"><b>Nom des acteurs</b></font></TD>
     						<td><font size="-1"><a href="page_user.php?choix=2"><b>Sinopsys</b></a></font></td>							
     					</TR>
     					<? while ($val = mysql_fetch_array($result)) { ?>
     					<TR bgcolor=white>
     						<form method="post">
     						<TD><font size="-2"></font></TD>
     						<TD><font size="-2"><? echo $val["titre_films"]?></font></TD>
     						<TD><font size="-2"></font></TD>
     						<TD><font size="-2"></font></TD>
     						<TD><font size="-2"></font></TD>
     						<td><font size="-2"><? echo $val["sinopsys_films"]?></font></td>
      						<TD><font size="-2"></font><input name="favoris" type="image" src="images/iconePoubelle.gif"> favoris</TD>
     						<TD><font size="-2"></font><input name="email" type="button" value="email"></TD></form>
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