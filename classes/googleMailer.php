<?php
//include 'fonction.php';
//spl_autoload_register('autoClass');
?>
<?php 
require_once "/classes/PHPMailer_5.2.0/class.phpmailer.php";
class GoogleMailer extends PHPMailer {
	
	/**
	 * Constructeur
	 *
	 */
	public function __construct() {
		// on passe en mode SMTP
		parent::IsSMTP();
		// on utilise l'authentification
		$this->SMTPAuth	= true;
		// on indique le chemin du stmp, en ssl
		$this->Host		= 'ssl://smtp.googlemail.com';
		// indication du numÃ©ro de port
		$this->Port		= 465;
		
	}
	
	/**
	 * Applique le nom d'utilisateur Gmail
	 *
	 * @param string 	$S_login	login gmail, adresse mail complete (tagada@gmail.com)
	 * @param string 	$S_FromName	nom de l'emetteur
	 */
	public function setUsername($S_login, $S_FromName = "") {
		$this->Username	= $S_login;
		$this->From		= $S_login;
		$this->FromName	= $S_FromName;
		
	}
	
	/**
	 * applique le mot de passe du compte gmail
	 *
	 * @param string $S_password
	 */
	public function setPassword($S_password) {
		$this->Password	= $S_password;
		
	}
	
	/**
	 * Redefinition du send pour renvoyer une exception en cas d'erreur
	 *
	 * @return bool
	 */
	public function Send() {
		if (!parent::Send()) {
			throw new Exception($this->ErrorInfo);
			
		}
		return true;
		
	}
	
}
?>