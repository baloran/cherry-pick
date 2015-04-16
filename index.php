<?php

	require 'app/config.php';
	require 'core/helper/json.php';

	$q = !empty($_GET['q']) ? $_GET['q'] : '';

	if (empty($q)) {
		$site = new Site();
		$site->home();
	}

	else if(preg_match('/^contact\/?$/i', $q)) {
		User::contact();
	}

	else if(preg_match('/^news\/?$/i', $q)) {
		User::news();
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

	else{
		$view = 'not-found';
	}
