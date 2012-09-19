<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class User_Model extends Model {

	function getUserById($id){
        $query = "SELECT * FROM users WHERE id = " . mysql_real_escape_string($id);
        return $this->db->getRow($query);
	}

	function insertUser($array){
		
		$data = array();
		
		$data['surname'] = $array['last_name'];
		$data['forename'] = $array['first_name'];
		$data['dob'] = date("Y-m-d H:i:s", toDate($array['dob_year'], $array['dob_month'], $array['dob_day']));
		$data['address1'] = $array['address'];
		$data['address2'] = $array['address2'];
		$data['postcode'] = $array['postcode'];
		$data['city'] = $array['city'];
		$data['password'] = md5($array['password']);
		$data['email'] = $array['email'];
		$data['telephone'] = $array['telephone'];
		
		return $this->insert('users', $data);
		
	}
	
	function updateUser($id, $array){
		
		$data = array();
		
		$data['surname'] = $array['last_name'];
		$data['forename'] = $array['first_name'];
		$data['dob'] = date("Y-m-d H:i:s", toDate($array['dob_year'], $array['dob_month'], $array['dob_day']));
		$data['address1'] = $array['address'];
		$data['address2'] = $array['address2'];
		$data['postcode'] = $array['postcode'];
		$data['city'] = $array['city'];
		$data['email'] = $array['email'];
		$data['telephone'] = $array['telephone'];
		
		return $this->update('users', array('id' => $id), $data);
		
	}
	
	function updateUserPassword($id, $password){
		$data = array('password' => md5($password));
		return $this->update('users', array('id' => $id), $data);
	}
 
	function saveSearch($user_id, $array){
		$data['user_id'] = $user_id;
		$data['search'] = iss($array, 'search');
		$data['color'] = iss($array, 'color');
		$data['make'] = iss($array, 'make');
		$data['minPrice'] = iss($array, 'minPrice') ? $array['minPrice'] : 0;
		$data['maxPrice'] = iss($array, 'maxPrice') ? $array['maxPrice'] : 0;
		$data['year'] = iss($array, 'year')? $array['year'] : '0000';
		return $this->insert('searches', $data);
		
	}
	
	function getSearchesByUserID($id){
		$query = "SELECT * FROM searches WHERE user_id = " . mysql_real_escape_string($id);
        return $this->db->getResults($query);
	}
	
	function getSearchByID($id){
		$query = "SELECT * FROM searches WHERE id = " . mysql_real_escape_string($id);
        return $this->db->getRow($query);
	}	
	
	function deleteSearch($id){
		return $this->delete('searches', "id = $id");
	}
	
	function updateSearchFave($id, $user_id){
		$this->update('searches', array('user_id' => $user_id), array('fave' => 0));
		return $this->update('searches', array('id' => $id), array('fave' => 1));
	}
	
	function getFavoriteSearch($user_id){
		$query = "SELECT * FROM searches WHERE user_id = " . mysql_real_escape_string($user_id) . " AND fave = 1";
        return $this->db->getRow($query);
	}
   
}

?>
