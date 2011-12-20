<?php include "connexion_bdd.php"?>
<?php include "classes/mot_de_passe.php"?>
<?php include "classes/utilisateurs.php"?>
<?php include "entete.php" ?>



 <div id="moncadre">
  
  
  

<?include("connection_bdd.php");
$choix=0;
if(isset($_GET["choix"]))
{
   $choix=$_GET["choix"];
}
if($choix==1)
{
 $result=$conn->prepare("select * from acteurs order by nom_acteur ASC;");
 $result->execute();
}
else
{
 if($choix==2)
 {
  $result=$conn->prepare("select * from acteurs order by prenom_acteur ASC;");
  $result->execute();
 }
 else
 { 
  $result=$conn->prepare("select * from acteurs;"); 
  $result->execute();
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
			<tr><td><b><font size="-1">Liste des acteurs favoris</font></B></td></tr>
		</table>
<br />
		<table align="center">
			<TR><TD>
			<table align=center>
				<tr><td>
   					<table border=1>
   						<TR bgcolor=#ffffCC>
     						<TD><font size="-1"><a href="acteurs_favoris.php?choix=1"><b>Nom de l'acteur</b></a></font></TD>
     						<td><font size="-1"><a href="acteurs_favoris.php?choix=2"><b>Prenom de l'acteur</b></a></font></td>							
     					</TR>
     					<? while ($val = $result->fetch(PDO::FETCH_ASSOC)) { ?>
     					<TR bgcolor=white>
     						<form method="post">
     						<TD><font size="-2"><? echo $val["nom_acteur"]?></font></TD>
     						<td><font size="-2"><? echo $val["prenom_acteur"]?></font></td>
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
</html>
</div>