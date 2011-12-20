<?php include 'connexion_bdd.php'; ?>
<?php
include 'fonction.php';
spl_autoload_register('autoClass_racine');
?>
<?php include "connexion_bdd.php"?>
<?php include "classes/mot_de_passe.php"?>
<?php include "classes/utilisateurs.php"?>
<?php include "entete.php" ?>
<?php
$choix=0;
if(isset($_GET["choix"]))
{
	$choix=$_GET["choix"];
}
if($choix==1)
{
	$result=$conn->prepare("SELECT * FROM utilisateurs order by id_users ASC");
	$result->execute();
}
else
{
	if($choix==2)
	{
		$result=$conn->prepare("SELECT * FROM utilisateurs ORDER BY pseudo_users ASC");
		$result->execute();
	}
	else
	{
		if($choix==3)
		{
			$result=$conn->prepare("SELECT * FROM utilisateurs ORDER BY nom_users ASC");
			$result->execute();
		}
			else
			{
				$result=$conn->prepare("SELECT * FROM utilisateurs");
				$result->execute();
			}}}
			?>


 <div id="moncadre">

 
  <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
    <title>Page liste utilisateurs</title>
    <link rel="stylesheet" href="css/admin.css" />
    
  </head>
 
	<body>
	<h2 align=center> Liste de tous les utilisateurs</h2>
	
	<table align="center">
			<TR><TD>
			<table align=center>
				<tr><td>
   					<table border=1>
   						<TR bgcolor=#ffffCC>
     						<TD><font size="-1"><a href="admin_liste_users.php?choix=1"><b>id</b></font></TD>
     						<TD><font size="-1"><a href="admin_liste_users.php?choix=2"><b>Pseudo</b></a></font></TD>
     						<TD><font size="-1"><a href="admin_liste_users.php?choix=3"><b>Nom</b></font></TD>
     						<TD><font size="-1"><a href="admin_liste_users.php?choix=4"><b>Prenom</b></font></TD>					
     					</TR>
     					<? while ($tab2 = $result->fetch(PDO::FETCH_ASSOC)) { ?>
     					<TR bgcolor=white>
     						<TD><font size="-2"><? echo $tab2["id_users"]?></font></TD>
     						<TD><font size="-2"><? echo $tab2["pseudo_users"]?></font></TD>
     						<TD height=110 width=200><font size="-2"><? echo $tab2["nom_users"]?></font></TD>
     						<TD height=110 width=500><font size="-2"><? echo $tab2["prenom_users"]?></font></TD>
     					</TR><? } ?>
   					</table>
   				</td></tr>
			</table>
			</td></tr>
		</table>
	
	<?php 
	
	//$tab2=liste_users();
	//var_dump($tab2);
	
	?>
	
 	</div>
