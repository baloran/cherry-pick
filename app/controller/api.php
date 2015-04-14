<?php

Class API Extends cpController {

	private $provider = array(
			"trakt"=> array(
				'header'=> array()
			),
		);

	function __construct {

		$this->curl = curl_init();
	}

	function get ($url, $provider) {

		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true); 

		return curl_exec($this->curl);

	}

	private function cache ($url) {


	}
}