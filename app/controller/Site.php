<?php

Class Site Extends cpController {

	public function home () {

		$api = new api();

		error_log(print_r($api,true));
		
		$this->partials('home');
	}

	public function compare () {

		$api = new api();

		$this->partials('compareIt');
	}
}