<?php

	require 'app/config.php';
	require 'core/helper/json.php';
	require 'core/helper/simple_html_dom.php';

	$q = !empty($_GET['q']) ? $_GET['q'] : '';

	if (empty($q)) {
		$site = new Site();
		$site->home();
	}

	else if(preg_match('/^contact\/?$/i', $q)) {
		
		echo "salut";
	}

	else if(preg_match('/^api\/search\/[\w-]+$/i', $q)) {
		
		$shows = Show::search($q);
		
		echo $shows;
		// render the view with results list
	}

	else if(preg_match('/^api\/getinfo\/?$/i', $q)) {
		if (!empty($_POST)) {
			
			$shows = Show::getInfo();
			echo $shows;
		} else {

			header('Location: '.base_url());
		}
	}


	else if(preg_match('/^api\/getallinfo\/?$/i', $q)) {
		
		$shows = Show::getAllInfo($q);
		echo $shows;

	}

	else if(preg_match('/^compare\/([\w-]+\/)+$/i', $q)) {
			
		$slug = explode('/', $q);

		$data = new stdClass();

		$site = new Site();

		$api = new api();

		$data->show = json_decode($api->getAllInfo($slug[1]));

		if ($data->show->code == 404) {
			
			header('Location: '.BASE_PATH);
			exit();

		}

		$data->show = $data->show->data;

		if (!empty($slug[2])) {
			$caca = $api->getAllInfo($slug[2]);
		}

		$site->getInfo($data);

	}

	else{
		$view = 'not-found';
	}
