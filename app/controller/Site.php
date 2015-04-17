<?php

Class Site Extends cpController {

	public function home () {

		$api = new api();

		error_log(print_r($api,true));
		
		$this->data->css = 'style';

		$this->partials('home');
	}

	public function getInfo ($data) {

		$this->data->css = 'style2';

		$this->data->show = $data->show;

		if (isset($data->show1)) {
			$this->data->show1 = $data->show1;
		}

		$this->partials('compare');
	}
}