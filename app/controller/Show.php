<?php

Class Show {
	private $title;

	function __construct(){

	}

	static function search($str){
		
		$api = new api();
		$result = $api->search($str);
		// $shows = [];
		// if ($result){
		// 	foreach ($result as $show) {
		// 		$shows[] = [
		// 			'id' => $show['show']['ids']['trakt'],
		// 			'title' => $show['show']['title']
		// 		];
		// 	}
		// }
		return $result;
	}

	static function getById($id){
		
	}

	function getActors(){

	}


} 