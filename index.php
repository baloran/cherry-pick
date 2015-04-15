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

	else if(preg_match('/^api\/search\/[\w-]+$/i', $q)) {
		$shows = Show::search($q);
		echo(print_r($shows,true));
		// render the view with results list
	}

	else{
		$view = 'not-found';
	}
