<?php 
/**
 * Formato para los campos de las tablas
 */
//include CORE_PATH . 'extensions/helpers/tags.php';

function dtg_date($date){
	if(!empty($date)){
		$array_date	=	explode(' ', $date);
		$date = str_replace("-","/",$array_date[0]);
		list($year, $mounth, $day)=explode("/",$date);
		return $day."/".$mounth."/".$year;
	}
	return 'NULL';
}

function dtg_money($number, $simbolo, $miles, $decimales, $can){
	$number = dtg_round($number);
	return "$simbolo&nbsp;".number_format($number, $can, $decimales, $miles);
}

function dtg_numeric($number, $miles, $decimales, $can){
	$number = dtg_round($number);
	return "&nbsp;".number_format($number, $can, $decimales, $miles);
}

function dtg_percent($number, $decimales, $can){
	$number = dtg_round($number);
	return number_format($number, $can, $decimales, '.') . '&nbsp;%';
}
/**
 * Realiza un redondeo usando la funcion round de la base
 * de datos.
 *
 * @param numeric $number
 * @param integer $n
 * @return numeric
 */
function dtg_round($number, $n=2){
	$number = (float) $number;
	$n = (int) $number;
	return ActiveRecord::static_select_one("round($number, $n)");
}
?>