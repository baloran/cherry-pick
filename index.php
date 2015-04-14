<?php

	require 'inc/config.php';

	$q = !empty($_GET['q']) ? $_GET['q'] : '';

	if (empty($q)) {
		$user = new Site();
		$user->home();
	}

	else if(preg_match('/^contact\/?$/i', $q)) {
		User::contact();
	}

	else if(preg_match('/^news\/?$/i', $q)) {
		User::news();
	}

	else{
		$view = 'not-found';
	}
