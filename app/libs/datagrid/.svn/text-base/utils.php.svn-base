<?php 
function get_field($field=''){
	if(strstr($field,'_')){
		$array_field	=	explode('_', $field);
		$field		=	$array_field[0] . '_id';
	}
	return $field;	
}
function get_relation($field=''){
	if(strstr($field,'_')){
		$array_field	=	explode('_', $field);
		return	'get' . ucfirst($array_field[0]);
	}
	return $field;
}
?>