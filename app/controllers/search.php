<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Search_Controller extends Controller{
	
	private $db;
	
	function __construct(){
		
		if(!isLoggedIn()){
			Flash::setError('You must be logged in to view that page.');
			$_SESSION['requested_url'] = current_url();
			redirect('index');
		}
		
		$this->db = $this->model('car');
	}

	function index(){
		
		if(isPost()){
			redirect('search/cars/'.$this->uri->arrayToURI($_POST));
		}else{
			$user = $this->model('user');
			$fave = $user->getFavoriteSearch(user('id'));
			redirect($this->uri->arrayToSearchLink($fave));
		}
		
	}

	function cars(){
		
		$this->helper('html');
		
		$data['colors'] = $this->db->getAllCarColors();
		$data['makes'] = $this->db->getAllCarMakes();
		$data['search'] = $this->uri->toArray(2);
		$data['cars'] = $this->db->searchCarsByColumn($data['search']);
		$data['save'] = $this->uri->queryString(2);
		
                
                
		$data['view'] = $this->view('views/search', $data, true);
		$this->view('views/template', $data);
		
	}

	function save(){
		
		$user = $this->model('user');
		
		$search = $this->uri->toArray(2);
		
		if($user->saveSearch(user('id'), $search)){
			$this->flash->setSuccess('Search Saved');
		}else{
			$this->flash->setError('Something went wrong!');			
		}
		
		redirect('search/cars/'.$this->uri->queryString(2));
	}

}


?>
