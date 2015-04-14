<?php

Class Site Extends cpController {

	public function home () {

		$api = new api();

		$this->partials('home');
	}
}