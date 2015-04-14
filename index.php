<?php

	require 'app/config.php';

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

	else if(preg_match('/^api\/getshow\/[\w-]+$/i', $q)) {
		
		$api = new api();
		$api->getShow($q);
	}

	else{
		$view = 'not-found';
	}
