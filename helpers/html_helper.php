<?php  if ( ! defined('ROOT')) exit('No direct script access allowed');

function createSelect($id, $array, $selected = null){

	$select = '<select name="'.$id.'" id="'.$id.'">'."\n";
	foreach($array as $key => $value)
	{
		$select .= "<option value=\"$key\"";
		$select .= ($key==$selected) ? ' selected="selected"' : '';
		$select .= ">$value</option>\n";
	}
	$select .= '</select>';
	return $select;
}

function createMonthSelect($id, $selected = null){
	
	$months = array(
		1 => 'January',
		2 => 'February',
		3 => 'March',
		4 => 'April',
		5 => 'May',
		6 => 'June',
		7 => 'July',
		8 => 'August',
		9 => 'September',
		10 => 'October',
		11 => 'November',
		12 => 'December'
	);
	
	return createSelect($id, $months, $selected);
	
}

function createDaySelect($id, $selected = null){
	
	$days = nRange(1, 31);
	
	return createSelect($id, $days, $selected);
	
}

function createYearSelect($id, $selected = null){
	
	$years = nRange(1900, date("Y"));
	
	return createSelect($id, $years, $selected);
	
}

function nRange($start, $limit, $step = 1){
	
	$array = array();
	
	for ($i=$start; $i <= $limit; $i=$i+$step) { 
		$array[$i] = $i;
	}
	
	return $array;
	
}



?>