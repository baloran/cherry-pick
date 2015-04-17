<?php

Class Site Extends cpController {

	public function home () {

		$api = new api();

		error_log(print_r($api,true));
		
		$this->data->css = 'style';

		$this->partials('home');
	}

	public function getInfo ($id) {

		$api = new api();

		$data = json_decode($api->getAllInfo($id));

		if ($data->code == 404) {
			
			header('Location: '.BASE_PATH);
			exit();

		}

		$this->data->show = $data->data;

		$this->data->css = 'style2';

		$this->partials('compare');
	}
}