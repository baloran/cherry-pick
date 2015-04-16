<?php


function json ($code, $data) {

	$var = new stdClass();

	$var->code = $code;
	$var->data = $data;

	return json_encode($var);

}


function isJSON($string){
   return is_string($string) && is_object(json_decode($string)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}