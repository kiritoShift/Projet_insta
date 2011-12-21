<?php 
include_once ("connexion_bdd.php");
include ("entete.php");


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





<div id="moncadre">
<title>liste des films</title>

	<body>


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
     						<TD><font size="-1"><a href="liste_films.php?choix=1"><b>id</b></a></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=2"><b>Jaquette</b></a></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=3"><b>titre du film</b></a></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=4"><b>synopsys</b></a></font></TD>
     						<TD><font size="-1"><a href="liste_films.php?choix=5"><b>type de film</b></a></font></TD>						
     					</TR>
     					<?php while ($val = $result->fetch(PDO::FETCH_ASSOC)) { ?>
     					<TR bgcolor=white>
     						<TD><font size="-2"><?php echo $val["id_films"]?></font></TD>
     						<TD><font size="-2"><img src="<?php echo $val["jaquette_films"]?>" width=90 height=110 /></font></TD>
     						<TD height=110 width=200><font size="-2"><?php echo $val["titre_films"]?></font></TD>
     						<TD height=110 width=500><font size="-2"><?php echo $val["sinopsys_films"]?></font></TD>
     						<TD><font size="-2"><?php echo $val["type_films"]?></font></TD>
      						<TD><font size="-2"></font><a href="favoris_add.php?id=<? echo $val['id_films']?>" title="ajouter favoris"><img src="images/etoile_favoris.gif" alt="etoile_favoris" border="0"></a></TD>
     					</TR><?php } ?>
   					</table>
   				</td></tr>
			</table>
			</td></tr>
		</table>
</div>

