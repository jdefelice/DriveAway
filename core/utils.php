<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

/**
 *
 * @param type $class
 * @return type 
 */
function __autoload($class){

	$file = ROOT."/core/" . $class . ".php";
	if(is_file($file)){
		require_once($file);
		return;
	}
	
	$file = APP."/models/" . $class . ".php";
	if(is_file($file)){
		require_once($file);
		return;
	}
	
	$class = explode('_', $class);
	$class = $class[0];
	$file = APP."/controllers/" . $class . ".php";
	if(is_file($file)){
		require_once($file);
		return;
	}	
	

}

/**
 *
 * @param type $index
 * @return type 
 */
function isPost($index = NULL){
	if($index == NULL){
		return isset($_POST) && !empty($_POST);
	}else{
		return isset($_POST[$index]) && !empty($_POST[$index]);
	}
}

/**
 *
 * @param type $array 
 */
function pr($array){
	echo '<pre>'.print_r($array, true).'</pre>';
}

/**
 *
 * @param type $url 
 */
function redirect($url){
	header("Location: " . site_url($url));
	exit();
}

/**
 * Checks if a user is logged in
 * @return type boolean
 */
function isLoggedIn(){
	return isset($_SESSION['user']['id']);
}

/**
 *
 * @param type $file 
 */
function inc($file){
	include(APP.'/views/'.$file.'.php');
}

/**
 *
 * @param type $index
 * @return type 
 */
function user($index = NULL){

	if($index === NULL){
		return $_SESSION['user'];
	}else{
		return $_SESSION['user'][$index];
	}
	
}

/**
 *
 * @param type $index
 * @param type $default
 * @return type 
 */
function formValuePost($index, $default = ''){
	
	if(isset($_POST[$index])){
		return $_POST[$index];
	}
	
	if($default != ''){
		return $default;
	}
	
	return '';
	
}

/**
 *
 * @param type $array
 * @param type $index
 * @return type 
 */
function isThere($array, $index){
	return isset($array[$index]) && !empty($array[$index]) && $array[$index] != '';
}

/**
 *
 * @param type $number
 * @return type 
 */
function formatMoney($number){
	return number_format($number, 2, '.', '');
}

/**
 *
 * @param type $array
 * @param type $key
 * @param type $val
 * @return type 
 */
function array_unshift_assoc(&$array, $key, $val){
	$array = array_reverse($array, true);
	$array[$key] = $val;
	$array = array_reverse($array, true);
	return $array;
}

/**
 *
 * @param type $year
 * @param type $month
 * @param type $day
 * @return type 
 */
function toDate($year, $month, $day){
	return strtotime($year . '/' . $month . '/' . $day);
}

/**
 *
 * @param type $array
 * @param type $item
 * @return type 
 */
function iss($array, $item){	
	return isset($array[$item]) ? $array[$item] : '';
}

/**
 *
 * @param type $dateString
 * @param type $date
 * @return type 
 */
function formatDate($dateString, $date){
	return date($dateString, strtotime($date));
}

function site_url($url = ''){	
	$url = trim($url, '/');
	
	return WEB_ROOT.'index.php/'. $url;
}

function current_url(){
	$uri = URI::getURI();
	$uri = implode('/', $uri);
	return site_url($uri);
}

?>