<?php

Class Show {
	private $title;


	static function search($str){
		$api = new api();
		$result = $api->search($str);
		error_log(print_r($result,true));
		$shows = [];
		if ($result){
			foreach ($result as $show) {
				$shows[] = [
					'id' => $show['show']['ids']['trakt'],
					'title' => $show['show']['title']
				];
			}
		}
		return $shows;
	}

	static function getById($id){
		
	}

	function getActors(){

	}

	function __construct(){

	}
} 