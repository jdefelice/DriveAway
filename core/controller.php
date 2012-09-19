<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Controller{
	
	/**
	 * Stores URI object
	 *
	 * @var URI
	 * @access protected
	 */
	protected $uri;
	
	/**
	 * Stores Flash object
	 *
	 * @var Flash
	 * @access protected
	 */
	protected $flash;

	/**
	 * Constructor
	 */
	function __construct(){

	}
	
	/**
	 * Setups the controller
	 *
	 * @return	void
	 */	
	function setController(){
		$this->flash = new Flash();
	}
	
	/**
	 * Sets URI
	 *
	 * @return	void
	 */
	function setURI($uri){
		$this->uri = $uri;
	}
	
	/**
	 * Runs function supplied
	 *
	 * This function runs the supplied function
	 *
	 * @param	string
	 * @return	void
	 */
	function run($function){ 
		
		$this->$function();
	}
	
	/**
	 * Load HTML view
	 *
	 * This function load the HTML file
	 *
	 * @param	string
	 * @param	array
	 * @param	boolean
	 * @return	void
	 */	
	function view($template, $data = array(), $return = false){
		
		$template = APP.$template .'.php';
		
		foreach($data as $key => $value){
			$$key = $value;
		}
		
		$route = array(
			"controller" => $this->uri->segment(0),
			"action" => $this->uri->segment(1)
		);

		if(is_file($template)){
			if($return){
				
				ob_start();
				include_once($template);
				$output = ob_get_contents();
				ob_end_clean();
				
				return $output;
			}else{
				
				// Only Allow Flash Varibles to the template
				$flash = array(
					'isset' => $this->flash->isFlashSet(),
					'success' => $this->flash->getSuccess(),
					'error' => $this->flash->getError()
				);
				include_once($template);
			}
				
		}
		
	}
	
	/**
	 * Loads Model
	 *
	 * This function load the model
	 *
	 * @param	string
	 * @return	object
	 */	
	function model($model){
		$model = $model."_model";
		return new $model();
	}
	
	/**
	 * Includes Helper File
	 *
	 * This function include helper file
	 *
	 * @param	string
	 * @return	void
	 */	
	function helper($file){
		
		$file = ROOT.'/helpers/'.$file.'_helper.php';
		
		if(is_file($file)){
			include($file);
		}
		
	}
	
}