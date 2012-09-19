<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Form_Validation{
	
		/**
		 *
		 * @var type 
		 */
	private $rules = array();
		
		/**
		 *
		 * @var type 
		 */
	private $customRules = array();
		
		/**
		 *
		 * @var type 
		 */
	private $messages = array();
	
		/**
		 *
		 * @param type $field
		 * @param type $label
		 * @param type $type 
		 */
	function setRules($field, $label, $type){
		
		$types = explode('|', $type);
		
		$this->rules[] = array('field' => $field,
						'label' => $label,
						'type' => $types);
		
		
		
	}
	
		/**
		 *
		 * @return type 
		 */
	function validate(){
		
		foreach($_POST as $p_key => $p_value){
			foreach($this->rules as $r_key){
				if(strtolower($p_key) == strtolower($r_key['field'])){
										
					foreach ($r_key['type'] as $type) {
												
						if(!$this->isValid($type, $p_value)){
							$this->messages[] = $this->setMessage($type, $r_key['label']);
						}					
					}
				}
			}
		}
		
		return empty($this->messages);
		
	}
	
		/**
		 *
		 * @param type $type
		 * @param type $value
		 * @return type 
		 */
	private function isValid($type, $value){
		
		//echo $type .' "'. $value .'"<br>';
		
		$type = strtolower($type);
		
		if($type == 'required'){
			return (trim($value) != '');
		}
		
		if($type == 'email'){
			return $this->isValidEmail($value);
		}

		if($type == 'alpha'){
			return $this->isAlpha($value);
		}
		
		if($type == 'alpha_num'){
			return $this->isAlphaNumeric($value);
		}		

	}
	
		/**
		 *
		 * @param string $rule
		 * @return string 
		 */
	function setMessage($type, $label){
		
		switch(strtolower($type)){
			
			case 'email':
				return "$label must be a valid email address";
				break;
				
			case 'required':
				return "$label is required";
				break;
				
			case 'alpha':
				return "$label must only be letters";
				break;
				
			case 'alpha_num':
				return "$label must only be letters and numbers only";
				break;
		}
		
	}
	
	/**
		 *
		 * @param type $rule
		 * @return type 
		 */
	function isRequired($rule){
		return (strtolower($rule['type']) == 'required');
	}
		
	/**
		 *
		 * @return type 
		 */
	function getMessages(){
		return $this->messages;
	}
	
		/**
		 *
		 * @param type $email
		 * @return type 
		 */
	function isValidEmail($email){
		return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email);
	}
	
	function isAlpha($string){
		return preg_match("/^[A-z-\. ']+$/", $string);
	}
	
	function isAlphaNumeric($string){
		return preg_match("/^[A-z0-9-\. ']+$/", $string);
	}	
	
}


?>