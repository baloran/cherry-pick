<?php 

Class cpController {

	function __construct() {
		$this->data = new stdClass;
	}

	function partials ($file){
		
		$array = get_object_vars($this->data);
		extract($array);

		if (!file_exists("../app/view/".$file.".php")) {
			$file = "home";
		}

		include "../partials/header.php";
		include "../app/controller/".$file.".php";
		include "../partials/footer.php";
	}
}
