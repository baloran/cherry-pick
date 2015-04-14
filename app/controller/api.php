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

	function getShow () {

		$this->getCurl();
	}

	private function cache ($url) {


	}
}