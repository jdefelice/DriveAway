<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Login_Model extends Model {

	function login($email, $pass, $md5 = false){
		
		$user = $this->getUser($email, $pass, $md5);
		
		if(empty($user)){
			return false;
		}
		
		$_SESSION['user'] = $user;
		
		return true;
		
	}
	
    function getUser($email, $pass, $md5 = false) {

		$pass = $md5 ? $pass : md5($pass);
	
        $query = "SELECT * FROM users WHERE email = '" . mysql_real_escape_string($email) ."' AND password = '" . mysql_real_escape_string($pass) ."'";
		return $this->db->getRow($query);
    }
    
	function logout(){
		session_destroy();
	}
	
}

?>
