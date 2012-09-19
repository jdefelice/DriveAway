<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class URI{
	
	private $uri = array();
	
	function __construct(){
		
		$this->uri = $this->getURI();
		
		if(isset($this->uri[0]) && empty($this->uri[0])){
			$this->uri[0] = 'index';
		}
		
		if(!isset($this->uri[1])){
			$this->uri[1] = 'index';
		}
		
	}
	
	function getURI(){
		$uri = $_SERVER['REQUEST_URI'];
		
		if (strpos($uri, $_SERVER['SCRIPT_NAME']) === 0){
			$uri = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
		}
		elseif (strpos($uri, dirname($_SERVER['SCRIPT_NAME'])) === 0){
			$uri = substr($uri, strlen(dirname($_SERVER['SCRIPT_NAME'])));
		}	

		return explode('/', trim($uri, '/'));
	}
	
	function length(){
		return count($this->uri);
	}
	
	function segment($index){
		if(isset($this->uri[$index])){
			return $this->uri[$index];
		}
		return '';
	}
	
	function queryString($n = 3){
		$string = '';
		for ($i=$n; $i < count($this->uri); $i=$i+2) { 
			$string .= $this->uri[$i] .'/'. (!empty($this->uri[$i+1]) ? $this->uri[$i+1] : '') . '/';
		}
		return rtrim($string,'/');
	}
	
	function toArray($n = 3, $default = array()){
		
		if(empty($default)){
			$default = $this->uri;
		}
		
		$array = array();
		
		for ($i=$n; $i < count($default); $i=$i+2) { 
			$array[$default[$i]] = !empty($default[$i+1]) ? trim(urldecode($default[$i+1])) : '';
		}
		
		return $array;
		
	}
	
	function arrayToURI($array){
		$string = "";
		foreach($array as $key => $value){
			if(strtolower($value) == 'any'){
				$value = '';
			}
			if($value != ''){
				$string .= urlencode($key) . '/' . urlencode($value).'/';
			}
		}
		return rtrim($string,'/');
	}
	
	function arrayToSearchLink($array){
		$string = "";
		foreach($array as $key => $value){
			if(strtolower($value) == 'any' 
			|| $key == 'id'
			|| $key == 'created_at'
			|| $key == 'user_id'
			|| $key == 'fave'
			|| ($key == 'year' && $value == 0000)){
				$value = '';
			}
			if($value != ''){
				$string .= urlencode($key) . '/' . urlencode($value).'/';
			}
		}
		$string = '/search/cars/' . rtrim($string,'/');
		
		return $string;
	}
	
}