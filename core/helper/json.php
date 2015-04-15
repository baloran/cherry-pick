<?php


function json ($code, $data) {

	$var = new stdClass();

	$var->code = $code;
	$var->data = $data;

	return json_encode($var);

}