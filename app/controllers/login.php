<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Login_Controller extends Controller{
	
	private $db;
	
	function __construct(){
		$this->db = $this->model('login');
	}

	function index(){
 		
		$data = array();
				
		if(isPost()){
			
			if($this->db->login($_POST['email'], $_POST['password'])){
				redirect('search');
			}else{
				$this->flash->setError("Your Email or Password is wrong.");
			}
			
		}

		$data['view'] = $this->view('views/login', $data, true);
		$this->view('views/template', $data);
		
	}

	function logout(){
		$this->db->logout();
		redirect('index');
	}

}


?>
