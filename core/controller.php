<?php 

Class cpController {

	function __construct() {

		$this->data = new stdClass;
		$this->load = new Load();
		$this->curl = curl_init();
	}

	function partials ($file){
		
		$array = get_object_vars($this->data);
		extract($array);

		if (!file_exists("../app/view/".$file.".php")) {
			$file = "home";
		}

		require "./app/view/header.php";
		require "./app/view/".$file.".php";
		require "./app/view/footer.php";
	}
}
