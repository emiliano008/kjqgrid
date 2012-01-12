<?php
if(!function_exists('array_key_exists')){
	function array_key_exists($key,$arr){
	    if(preg_match("/".$key."/i", join(",", array_keys($arr))))               
	        return true;
	    else
	        return false;
	} 	
}
if (!function_exists('array_replace'))
{
  function array_replace( array &$array, array &$array1 )
  {
    $args = func_get_args();
    $count = func_num_args();

    for ($i = 0; $i < $count; ++$i) {
      if (is_array($args[$i])) {
        foreach ($args[$i] as $key => $val) {
          $array[$key] = $val;
        }
      }
      else {
        trigger_error(
          __FUNCTION__ . '(): Argument #' . ($i+1) . ' is not an array',
          E_USER_WARNING
        );
        return NULL;
      }
    }

    return $array;
  }
}
function array_change_value_case(array $input, $case = CASE_UPPER) {
    switch ($case) {
        case CASE_LOWER:
            return array_map('strtolower', $input);
            break;
        case CASE_UPPER:
            return array_map('strtoupper', $input);
            break;
        default:
            trigger_error('Case is not valid, CASE_LOWER or CASE_UPPER only', E_USER_ERROR);
            return false;
    }
} 
function array_push_associative(&$arr) {
   $args = func_get_args();
   $ret=0;
   foreach ($args as $arg) {
       if (is_array($arg)) {
           foreach ($arg as $key => $value) {
               $arr[$key] = $value;
               $ret++;
           }
       }else{
           $arr[$arg] = "";
       }
   }
   return $ret;
}
?>