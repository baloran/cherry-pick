<?php

Class API Extends cpController {

	private $provider = array(
			"trakt"=> array(
				'header'=> array()
			),
		);

	function __construct () {

		$this->curl = curl_init();
	}

	function getCurl ($url) {


		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false); 


		curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
			"Content-Type: application/json",
			"trakt-api-version: 2",
			"trakt-api-key: 84b74ccaa16899d32db18adac8711d6f329c8c646e6ef28688352b7fa72c9d50"
		));

		$data = curl_exec($this->curl);
		return $data;

	}

	function search($params) {
		$params = explode("/", $params);
		$data = $this->getCurl("https://api-v2launch.trakt.tv/search?query=".$params[2]."&type=show");
		if ($data != false) {
		 	$data = json_decode($data, true);
		} 
		else{
			$data = null;
		}
		return $data;
		//score trakt, show(title), show(overview), show(year), show(images(poster(full)))
		//$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./people");
		//cast
		//$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./progress/collection");
		//aired, completed
		//$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./seasons/.$i./stats");
		//find in stats which season has most views
	}

	private function cache ($url) {


	}
}