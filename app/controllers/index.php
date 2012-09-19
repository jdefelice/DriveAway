<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Index_Controller extends Controller{
	
	private $db;
	
	function __construct(){
		$this->db = $this->model('user');
	}

	function index(){
		
		$this->helper('html');

		$login = $this->model('login');

		$data['errors'] = array();
		
		if(isLoggedIn()){
			redirect('search/cars');
		}
		
		if(isPost()){
						
			$fv = new Form_Validation();
			
			$fv->setRules('first_name', 'First Name', 'required|alpha');
			$fv->setRules('last_name', 'Last Name', 'required|alpha');
			$fv->setRules('telephone', 'Telephone', 'required');
			$fv->setRules('address', 'Address', 'required');
			$fv->setRules('city', 'City', 'required');
			$fv->setRules('postcode', 'Post Code', 'required|alpha_num');
			$fv->setRules('email', 'Email', 'required|email');
			$fv->setRules('password', 'Password', 'required');			
			
			if($fv->validate()){
				
				$id = $this->db->insertUser($_POST);
				$user = $this->db->getUserById($id);

				if($login->login($user['email'], $user['password'], true)){
					redirect('search/cars');
				}
				
			}else{
				$data['errors'] = $fv->getMessages();
			}
			
		}
		
		$data['view'] = $this->view('views/index', $data, true);
		$this->view('views/template', $data);
		
	}

}


?>
