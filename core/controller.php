<?php 

Class cpController {

	function __construct() {

		$this->data = new stdClass;
		$this->laod = new Load();
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
