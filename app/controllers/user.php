<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class User_Controller extends Controller{
	
	private $db;
	
	function __construct(){
			
		if(!isLoggedIn()){
			Flash::setError('You must be logged in to view that page.');
			$_SESSION['requested_url'] = current_url();
			redirect('index');
		}			
			
		$this->db = $this->model('user');
	}

	function index(){
		
		
		
	}

	function details(){
		
		$this->helper('html');
		
		$data['user'] = $this->db->getUserById(user('id'));
		
		if(isPost()){
		
			$fv = new Form_Validation();
			
			$fv->setRules('first_name', 'First Name', 'required');
			$fv->setRules('last_name', 'Last Name', 'required');
			$fv->setRules('telephone', 'Telephone', 'required');
			$fv->setRules('address', 'Address', 'required');
			$fv->setRules('city', 'City', 'required');
			$fv->setRules('postcode', 'Post Code', 'required');
			$fv->setRules('email', 'Email', 'email');
			$fv->setRules('password', 'Password', 'required');
			
			if($fv->validate()){
				
				if($this->db->updateUser(user('id'), $_POST)){
					$_SESSION['user'] = $this->db->getUserById(user('id'));
					$this->flash->setSuccess('Profile Updated');
				}else{
					$this->flash->setError('Something went wrong!');
				}

				redirect('user/details');
				
			}else{
				$data['errors'] = $fv->getMessages();
			}
			
		}
		
		$data['view'] = $this->view('views/user/details', $data, true);
		$this->view('views/template', $data);		
		
	}
	
	function password(){
		$data = array('errors' => array());
		
		if(isPost()){
			
			$user = $this->db->getUserById(user('id'));
			
			$fv = new Form_Validation();
			$fv->setRules('o_password', 'Old Password', 'required');
			$fv->setRules('n_password', 'New Password', 'required');
			$fv->setRules('r_password', 'Retype New Password', 'required');
			
			if($fv->validate()){
			
				if(md5($_POST['o_password']) == $user['password']){
					if($_POST['n_password'] == $_POST['r_password']){
						//Update Password
						if($this->db->updateUserPassword($user['id'], $_POST['n_password'])){
							Flash::setSuccess("Password Updated");
						}
						redirect('user/password');
			
					}else{
						$data['errors'][] = "New passwords doesn't match";
					}
				}else{
					$data['errors'][] = "Old password doesn't match";
				}
			}else{
				$data['errors'] = $fv->getMessages();
			}			
						
		}
		
		
		$data['view'] = $this->view('views/user/password', $data, true);
		$this->view('views/template', $data);
	}

	function searches(){
		
		$data = array();
		
		$data['searches'] = $this->db->getSearchesByUserID(user('id'));
		
		$data['view'] = $this->view('views/user/searches', $data, true);
		$this->view('views/template', $data);		
		
	}
	
	function searches_delete(){
		
		$id = $this->uri->segment(2);
		
		$search = $this->db->getSearchByID($id);
		
		if(!empty($search)){
			if($search['user_id'] == user('id')){
				if($this->db->deleteSearch($id)){
					$this->flash->setSuccess('Search Deleted');
				}else{
					$this->flash->setError('Search wasn\'t deleted try again later.');
				}
			}else{
				$this->flash->setError('Could not delete search!');
			}
		}else{
			$this->flash->setError('Could not delete search!');
		}

		redirect('user/searches');
	}
	
	function searches_fave(){
		
		$id = $this->uri->segment(2);
		
		$search = $this->db->getSearchByID($id);
				
		if(!empty($search)){
			
			if($search['user_id'] == user('id')){
				if($this->db->updateSearchFave($id, $search['user_id'])){
					$this->flash->setSuccess('Search Updated');
				}else{
					$this->flash->setError('Search wasn\'t updated try again later.');
				}
			}else{
				$this->flash->setError('Could not update search!');
			}
		}else{
			$this->flash->setError('Could not update search!');
		}

		redirect('user/searches');
	}	
	
}


?>
