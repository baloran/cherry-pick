<?php

Class Cast extends cpController {

	static function getCast($params){
		
		$api = new api();
		$result = $api->getCast($params);

	}
} 