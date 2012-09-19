<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Model{
	
	/**
	 *
	 * @var type 
	 */
	protected $db;
	
	function __construct(){
		
		$this->db = new MySQL(DB_HOST, DB_USER, DB_PASS);
		$this->db->connect();
		$this->db->changeDatabase(DB_DB);
                
	}
        
   

		/**
		 *
		 * @param type $table
		 * @param type $data
		 * @return type 
		 */
	function insert($table, $data){
		
		$fields = '';
		$values = '';

		foreach($data as $field => $value){
			
			$fields .= "`$field`,";
			$values .= "'". mysql_real_escape_string($value) ."',";
		}
		
		$fields = trim($fields, ',');
		$values = trim($values, ',');
		
		$query = "INSERT INTO `$table` ($fields) VALUES ($values);";
		
		return $this->db->insertQuery($query);
		
	}
		
		/**
		 *
		 * @param type $table
		 * @param type $where
		 * @return type 
		 */
	function delete($table, $where){
		
		if($where == '' || $table == ''){
			return false;
		}
		
		$query = "DELETE FROM $table WHERE " . mysql_real_escape_string($where);
				
		return $this->db->query($query);
		
	}
		
		/**
		 *
		 * @param type $table
		 * @param type $where
		 * @param type $data
		 * @return type 
		 */
	function update($table, $where, $data){
		
		$query = "UPDATE $table SET ";
		
		foreach($data as $field => $value){
			
			$query .= "`$field` = '". mysql_real_escape_string($value) ."',";

		}
		
		$query = rtrim($query, ',');
		
		$query .= " WHERE ";
		
		if(is_array($where)){
			
			$count = 0;
			$aLength = count($where);
			
			foreach($where as $f => $v){
				
				$query .= " $f = ". mysql_real_escape_string($v) ." ";
				
				if($count != $aLength && $aLength != 1){
					$query .= " AND ";
				}
				
				$count++;
				
			}
			
		}else{
			$query .= $where;
		}
		
		return $this->db->query($query);
		
	}
		
		/**
		 *
		 * @param type $table
		 * @param type $column
		 * @return type 
		 */
	function getUniqueColumn($table, $column){
		
		$query = "SELECT DISTINCT $column FROM $table";
		$results = $this->db->getResults($query);
		
		$resultArray = array();
		
		foreach($results as $key => $value){
			$resultArray[strtolower($value[$column])] = ucwords($value[$column]);
		}
		
		return $resultArray;
		
	}

}

?>
