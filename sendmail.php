<?php
include 'connexion_bdd.php';
include "/classes/PHPMailer_5.2.0/class.phpmailer.php";
include 'fonction.php';
spl_autoload_register('autoClass_racine');


$query = $conn->prepare("
						SELECT utilisateurs.email_users, sortir.date_sortie, films.titre_films, films.jaquette_films
						FROM sortir, avoir_films_favoris, utilisateurs, films
						WHERE avoir_films_favoris.id_films = sortir.id_films
						AND avoir_films_favoris.id_users = utilisateurs.id_users
						AND sortir.id_films=films.id_films
						AND type_sortie_films = 'dvd';
						");
$query->execute(array());
$tab_sortir= $query->fetchAll(PDO::FETCH_OBJ);


var_dump($tab_sortir);
foreach ($tab_sortir as $tab){
	
	$body=" <html> 
			<body align='center'>
				Votre film va sortir en dvd <br />
				".$tab->jaquette_films."<br />
				Date de sortie : ".$tab->date_sortie."
			</body>
		</html>  ";
	
	var_dump($tab->date_sortie);
	//$date_limite="2011-12-27";
	$date_limite=date( "Y-m-d");
	$date_limite=date( "Y-m-d", time() + 7 * 24 * 60 * 60 );
	if ($tab->date_sortie == $date_limite){
		echo "salut";
		
		$mail = new PHPmailer();
		$mail->CharSet = 'UTF-8'; // choix de l'encodage.
		$mail->IsSMTP();
		$mail->Host = 'ssl://smtp.gmail.com:465';
		$mail->SMTPAuth = true; // Si votre serveur requiert une authentification.
		$mail->Username = 'couraud.boris@gmail.com';
		$mail->Password = 'almoukabalass75017';
		$mail->IsHTML(true); // Envoi en html

		// ajout d'une image
		//$mail->AddEmbeddedImage("chemin_image", "non_image", "cid_image");

		$mail->From = 'couraud.boris@gmail.com';
		$mail->FromName = 'Boris Couraud';
		$mail->AddAddress($tab->email_users);
		$mail->AddReplyTo($tab->email_users);
		$mail->Subject = 'Votre films va sortir';
		$mail->Body = $body;
		$verif = $mail->Send();
		var_dump($verif);
		if (!$verif){
			echo $mail->ErrorInfo;
		}
		else {
			echo 'Le courriel a été envoyé';
		}
		$mail->SmtpClose();
		


	}
	var_dump($date_limite);
	echo "<br />";
}
/*
$mail = new PHPmailer();
$mail->CharSet = 'UTF-8'; // choix de l'encodage.
$mail->IsSMTP();
$mail->Host = 'ssl://smtp.gmail.com:465';
$mail->SMTPAuth = true; // Si votre serveur requiert une authentification.
$mail->Username = 'couraud.boris@gmail.com';
$mail->Password = 'almoukabalass75017';
$mail->IsHTML(true); // Envoi en html
 
// ajout d'une image
//$mail->AddEmbeddedImage("chemin_image", "non_image", "cid_image");
 
$mail->From = 'couraud.boris@gmail.com';
$mail->FromName = 'Boris Couraud';
$mail->AddAddress('couraud.boris@gmail.com');
$mail->AddReplyTo('couraud.boris@gmail.com');
$mail->Subject = 'Sujet de votre message';
$mail->Body = 'Contenu de votre message';
$verif = $mail->Send();
var_dump($verif);
if (!$verif){
	echo $mail->ErrorInfo;
}
else {
	echo 'Le courriel a été envoyé';
}
$mail->SmtpClose();
*/
?>