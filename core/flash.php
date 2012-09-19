<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

/**
 * Flash message creates a message that will only be shown once.
 */
class Flash{
		
	function __construct(){
		
		if(!isset($_SESSION['flash']['error'])){
			$_SESSION['flash']['error'] = "";
		}
		
		if(!isset($_SESSION['flash']['success'])){
			$_SESSION['flash']['success'] = "";
		}		
		
	}	
	
	/**
	 * Checks if either flash message is set.
	 */
	public function isFlashSet(){
		return ($_SESSION['flash']['error'] != "") || ($_SESSION['flash']['success'] != "");
	}
	
		/**
		 * Sets the success Flash Message
		 * @param type $message 
		 */
	public function setSuccess($message){
		$_SESSION['flash']['success'] = $message;
	}
	
		/**
		 * Gets the success flash message and resets flash session to only show once
		 * @return string 
		 */
	public function getSuccess(){
		$message = $_SESSION['flash']['success'];
		$_SESSION['flash']['success'] = "";
		return $message;
	}
	
		/**
		 * Checks if the success message is blank
		 * @return type bool
		 */
	public function isSuccessSet(){
		return ($_SESSION['flash']['success'] != "");
	}
		
		/**
		 * Sets the error Flash Message
		 * @param type $message 
		 */
	public function setError($message){
		$_SESSION['flash']['error'] = $message;
	}
	
		/**
		 * Gets the error flash message and resets flash session to only show once
		 * @return string 
		 */
	public function getError(){
		$message = $_SESSION['flash']['error'];
		$_SESSION['flash']['error'] = "";
		return $message;
	}
	
		/**
		 * Checks if the error message is blank
		 * @return type bool
		 */		
	public function isErrorSet(){
		return ($_SESSION['flash']['error'] != "");
	}

}


?>