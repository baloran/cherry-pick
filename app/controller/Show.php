<?php

Class Show extends cpController {

	static function search($str){
		
		$api = new api();
		$result = $api->search($str);
		return $result;
	}

	static function getInfo(){
		
		$api = new api();
		$result = $api->getInfo();

	}

	static function getAllInfo($str){
		$api = new api();
		$result = $api->getAllInfo($str);
		return $result;

	}

} 