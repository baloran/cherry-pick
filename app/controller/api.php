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

	function getCurl ($url, $provider) {


		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true); 

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Content-Type: application/json",
			"trakt-api-version: 2",
			"trakt-api-key: [client_id]"
		));

		$data = curl_exec($this->curl);

	}

	function getShow ($params) {
		$params = explode("/", $params);

		$this->getCurl("https://api-v2launch.trakt.tv/search?query=".$params[2]."&type=show");
		//score trakt, show(title), show(overview), show(year), show(images(poster(full)))
		$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./people");
		//cast
		$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./progress/collection");
		//aired, completed
		$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./seasons/.$i./stats");
		//find in stats which season has most views
	}

	private function cache ($url) {


	}
}