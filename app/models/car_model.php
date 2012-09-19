<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

class Car_Model extends Model {

    function getCars() {
        $query = "SELECT * FROM vehicles";
        return $this->db->getResults($query);
    }
    
    function getCarById($id){
        $query = "SELECT * FROM vehicles WHERE id = " . mysql_real_escape_string($id);
        return $this->db->getResults($query);
    }
	
	function searchCars($search, $sort = 'desc'){
		
		$sort = ($sort == 'desc') ? 'desc' : 'asc';		
		
		$search = mysql_real_escape_string($search);
		
		$query = "SELECT * FROM vehicles WHERE 
				make LIKE '%$search%' OR 
				model LIKE '%$search%' OR 
				cc LIKE '%$search%' OR 
				color LIKE '%$search%' OR 
				year LIKE '%$search%' OR 
				price LIKE '%$search%' ORDER BY price $sort";
		
		return $this->db->getResults($query);
	}
	
	function searchCarsByColumn($array){
		
		$array['search'] = isThere($array, 'search') ? $array['search'] : '';
		$array['sort'] = (isThere($array, 'sort') && $array['sort'] == 'desc') ? 'desc' : 'asc';		
		
		$array = array_map("mysql_real_escape_string", $array);
		
		$query = "SELECT * FROM vehicles WHERE ";
		
		if(isThere($array, 'make')){
			$query .=" make = '". $array['make'] ."' AND ";
		}
		
		if(isThere($array, 'model')){
			$query .=" model = '". $array['model'] ."' AND ";
		}		
		
		if(isThere($array, 'color')){
			$query .=" color = '". $array['color'] ."' AND ";
		}		
		
		if(isThere($array, 'year')){
			$query .=" year = '". $array['year'] ."' AND ";
		}		
		
		if(isThere($array, 'maxPrice') && $array['maxPrice'] > 0){
			
			$array['minPrice'] = isThere($array, 'minPrice') ? $array['minPrice'] : 0;
			
			$query .=" price BETWEEN ". $array['minPrice']
					." AND ". $array['maxPrice'] ." AND ";
		}		
		
		$query .= " (make LIKE '%{$array['search']}%' OR 
				model LIKE '%{$array['search']}%' OR 
				cc LIKE '%{$array['search']}%' OR 
				color LIKE '%{$array['search']}%' OR 
				year LIKE '%{$array['search']}%' OR 
				price LIKE '%{$array['search']}%')"; 
				
		if(isThere($array, 'sortColumn')){
			$query .= " ORDER BY {$array['sortColumn']} {$array['sort']}";
		}		
				
		return $this->db->getResults($query);		
		
		
	}

	function getAllCarColors(){
		$array = $this->getUniqueColumn('vehicles', 'color');
		array_unshift_assoc($array, 'any', 'Any');
		return $array ;
	}
	
	function getAllCarMakes(){
		$array = $this->getUniqueColumn('vehicles', 'make');
		array_unshift_assoc($array, 'any', 'Any');
		return $array ;
	}	
	
	function getAllCarModels(){
		$array = $this->getUniqueColumn('vehicles', 'model');
		array_unshift_assoc($array, 'any', 'Any');
		return $array ;
	}
    
}

?>
