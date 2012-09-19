<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class MySQL {
	
	/**
	 *
	 * @var type 
	 */
	public $conn;
	
	/**
	 *
	 * @var type 
	 */
	private $host;
	
	/**
	 *
	 * @var type 
	 */
	private $user;
	
	/**
	 *
	 * @var type 
	 */
	private $pass;

	function __construct($host, $user, $pass) {
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
	}
	
	/**
	 * 
	 */
	function connect() {
		$this->conn = mysql_connect($this->host, $this->user, $this->pass);
		if (!$this->conn) {
			throw new Exception('Connection Issue.');
		}
	}
	
	/**
	 *
	 * @param type $database 
	 */
	function changeDatabase($database) {
		$this->database = $database;
		if ($this->conn) {
			if (!mysql_select_db($database, $this->conn)) {
				throw new Exception('Connection Issue.');
			}
		}
	}
	
	/**
	 *
	 * @param type $sql
	 * @return type 
	 */
	function query($sql) {
		$result = mysql_query($sql, $this->conn);
		if (!$result) {
			throw new Exception('Could not execute query.');
		}
		return $result;
	}
	
	/**
	 *
	 * @param type $result
	 * @return type 
	 */
	function resultToArray($result) {
		$result_array = array();

		for ($i = 0; $row = mysql_fetch_assoc($result); $i++) {
			$result_array[$i] = $row;
		}

		return $result_array;
	}
	
	/**
	 *
	 * @param type $sql
	 * @return type 
	 */
	function getResults($sql){
		$result = $this->query($sql);
		return $this->resultToArray($result);
	}
	
	/**
	 *
	 * @param type $sql
	 * @return type 
	 */
	function getRow($sql){
		$result = $this->query($sql);
		$result = $this->resultToArray($result);
		if(empty($result)){
			return false;
		}
		return $result[0];
	}
	
	/**
	 *
	 * @param type $sql
	 * @return type 
	 */
	function insertQuery($sql){
				
		$result = $this->query($sql);
		
		if(!$result){
			return false;
		}
		
		return mysql_insert_id();
		
	}

}


?>
