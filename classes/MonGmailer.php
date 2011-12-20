<?php
class MonGmailer extends GoogleMailer {
	
	/**
	 * constructeur
	 *
	 */
	public function __construct() {
		parent::__construct();
		parent::setUsername('couraud.boris@gmail.com', 'couraud.boris@gmail.com');
		parent::setPassword('almoukabalass75017');
		
	}
	
}
?>