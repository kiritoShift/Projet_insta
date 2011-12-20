<?php 
/*
$test = "toto";
echo $test;

$query = $conn->prepare("SELECT * FROM films ORDER BY titre_films ASC;");
$query->execute();
$row = $query->fetchAll(PDO::FETCH_ASSOC);


while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	print_r($row);print "<br />";
}

$result = mysql_query("select * from films order by titre_films ASC;");
echo $result;

$var1="pipi";
$var2="";
$var3="";
$var4="";
$id=4;
$film = new mot_de_passe($id, $var1);
//echo $film->films_get_id();
$film->mot_de_passe_update();*/
include "/classes/PHPMailer_5.2.0/class.phpmailer.php";
//require_once("/classes/PHPMailer_5.2.0/class.smtp.php");
/*
try {
	$O_mail	= new MonGmailer();
	$O_mail->AddAddress('vincent.voisin1986@gmail.com', 'vincent.voisin1986@gmail.com');
	$O_mail->SetLanguage('fr');
	$O_mail->IsHTML(true);
	
	$O_mail->Subject	= 'test';
	$O_mail->Body		= "<h1>Hello wolrd</h1>";
	$O_mail->AltBody	= 'Hello World';
	
	$O_mail->Send();
	
	echo 'OK !';
	
} catch (Exception $O_fault) {
	echo $O_fault->getMessage();
	
}
$hst = "ssl://smtp.gmail.com:465";
$log = "couraud.boris@gmail.com";
$pwd = "almoukabalass75017";
$exp = "couraud.boris@gmail.com";
$expName = "couraud.boris@gmail.com";
$dest = "vincent.voisin1986@gmail.com";
$sujet = "test bobo";
$message = "testooooo";


	$mail = new PHPmailer();
	$mail->IsSMTP(); //on spécifie que l'on passe par un serveur SMTP
	$mail->Host = $hst; //$hst étant l'hote SMTP (ex: SMTP.orange.fr)
	$mail->SMTPAuth = true; // est a true quand une authentification est demandée par le serveur SMTP, false sinon.
	$mail->Username = $log; //nom et mot de passe de la messagerie.
	$mail->Password = $pwd;
	$mail->From=$exp; // adresse de l'expediteur
	$mail->FromName=$expName; // nom de l'expediteur
	$mail->AddAddress($dest); // adresse de destination
	//$mail->AddCC($cc); // adresse Copie
	$mail->Subject=$sujet; // sujet du message
	$mail->Body=$message; // corp du message
	//$mail->AddAttachment($fichier); //pour une piece jointe, $ fichier contient le chemin d'accès à la piece jointe.
	$mail->Send();
*/

$sujet = "test bobo";
$message = "testooooo";

/*	$mail = new PHPmailer();
	$mail->Host='smtp.gmail.com';  
	$mail->Port='465';   
	$mail->Username   = 'couraud.boris@gmail.com'; // SMTP account username  
	$mail->Password   = 'almoukabalass75017';  
	$mail->SMTPKeepAlive = true;  
	$mail->Mailer = "smtp"; 
	$mail->IsSMTP(); // telling the class to use SMTP  
	$mail->SMTPAuth   = true;                  // enable SMTP authentication  
	$mail->CharSet = 'utf-8';  
	$mail->SMTPDebug  = 1;
	$mail->From='couraud.boris@gmail.com'; // adresse de l'expediteur
	$mail->FromName='couraud.boris@gmail.com'; // nom de l'expediteur
	$mail->AddAddress('couraud.boris@gmail.com'); // adresse de destination  
	$mail->Subject=$sujet; // sujet du message
	$mail->Body=$message; // corp du message
	$mail->Send();
	if(!$mail->Send()){
		echo "Message could not be sent. <p>";
		echo "Mailer Error: " . $mail->ErrorInfo;
		exit;
	}
	else {
		echo "Message has been sent";
	
	}*/
	
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
	echo 'eldkdf';
echo $mail->ErrorInfo;
}
else {
echo 'Le courriel a été envoyé';
}
$mail->SmtpClose();
?>
