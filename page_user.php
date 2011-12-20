<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<?php include_once ("connexion_bdd.php");
include("entete.php");
include("fonction.php");
spl_autoload_register('autoClass_racine');

// recherche dans la base de donnée pour séléctionner les données à afficher et pouvoir faire le tri par colonne
$choix=0;
if(isset($_GET["choix"]))
{
	$choix=$_GET["choix"];
}
if($choix==1)
{
	$result=$conn->prepare("SELECT jaquette_films, pseudo_users FROM avoir_films_favoris, films, utilisateurs WHERE utilisateurs.id_users = avoir_films_favoris.id_users AND films.id_films = avoir_films_favoris.id_films order by jaquette_films ASC");
	$result->execute();
}
else
{
	if($choix==2)
	{
		$result=$conn->prepare("SELECT titre_films, pseudo_users FROM avoir_films_favoris, films, utilisateurs WHERE utilisateurs.id_users = avoir_films_favoris.id_users AND films.id_films = avoir_films_favoris.id_films ORDER BY titre_films ASC");
		$result->execute();
	}
	else
	{
		if($choix==3)
		{
			$result=$conn->prepare("SELECT date_sortie, pseudo_users FROM sortir, films, utilisateurs WHERE sortir.id_films = films.id_films AND films.id_films = utilisateurs.id_users AND pseudo_users = 'toto' ORDER BY date_sortie ASC");
			$result->execute();
		}
		else
		{
			if($choix==4)
			{
				$result=$conn->prepare("SELECT sinopsys_films, pseudo_users FROM avoir_films_favoris, films, utilisateurs WHERE utilisateurs.id_users = avoir_films_favoris.id_users AND films.id_films = avoir_films_favoris.id_films ORDER BY sinopsys_films ASC");
				$result->execute();
			}
			else
			{
				$result=$conn->prepare("SELECT *, pseudo_users FROM avoir_films_favoris, films, utilisateurs WHERE utilisateurs.id_users = avoir_films_favoris.id_users AND films.id_films = avoir_films_favoris.id_films AND pseudo_users = 'toto' ");
				$result->execute();
			}}}}
			?>


<head>
<title>page utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=MacRoman">
<link rel="stylesheet" media="screen" type="text/css" title="menu"
	href="css/menu.css" />


</head>
<body>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<table border=1 width="100%">
		<tr>
			<td><?php include("menu_user.php");	?>
			</td>
			<td>

				<table align="center" bgcolor=#ffffCC border=1>
					<tr>
						<td><b><font size="-1">Liste des films favoris</font> </B></td>
					</tr>
				</table> <br />
				<table align="center">
					<TR>
						<TD>
							<table align=center>
								<tr>
									<td>
										<table border=1>
											<TR bgcolor=#ffffCC>
												<TD><font size="1"><b>ID</b> </font></TD>
												<TD><font size="-1"><a href="page_user.php?choix=1"><b>Jacquette</b>
													</a> </font></TD>
												<TD><font size="-1"><a href="page_user.php?choix=2"><b>Nom
																du film</b> </a> </font></TD>
												<TD><font size="-1"><a href="page_user.php?choix=3"><b>Date
																de sortie</b> </a> </font></TD>
												<td><font size="-1"><a href="page_user.php?choix=4"><b>Sinopsys</b>
													</a> </font></td>
											</TR>
											<? //affichage des données sous forme de tableau
											while ($val = $result->fetch(PDO::FETCH_ASSOC)) { ?>
											<TR bgcolor=white>
												<TD><font size="-2"><?php echo $val["id_films"]?> </font></TD>
												<TD><font size="-2"><img src="<? echo $val["jaquette_films"]?>" width=90 height=110 /> </font></TD>
												<TD height=110 width=200><font size="-2"><? echo $val["titre_films"]?></font></TD>
												<TD height=110><font size="-2"></font></TD>
												<td height=110 width=500><font size="-2"><? echo $val["sinopsys_films"]?></font></td>
												<TD><font size="-2"></font>
													<form action="favoris_del.php" method="post"><input name="favoris" value="favoris" type="image" src="images/iconePoubelle.gif"> favoris</form>
												</TD>
											</TR>
											<? } ?>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
