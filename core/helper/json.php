<?php


function json ($code, $data) {

	$var = new stdClass();

	$var->code = $code;
	$var->data = json_decode($data);

	return json_encode($var);

}