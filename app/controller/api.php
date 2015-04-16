<?php

Class API Extends cpController {

	function getCurl ($url) {


		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false); 

		curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
			"Content-Type: application/json",
			"trakt-api-version: 2",
			"trakt-api-key: ".TRAKT_API_KEY
		));

		$data = curl_exec($this->curl);
		return $data;

	}

	function search($params) {
		$params = explode("/", $params);
		$data = $this->getCurl("https://api-v2launch.trakt.tv/search?query=".$params[2]."&type=show");

		$len = count($data);

		if ($len != 0) {
		 	$data = json(200, json_decode($data));
		} 
		else{
			$data = json(404, 'No data');
		}
		return $data;
		//score trakt, show(title), show(overview), show(year), show(images(poster(full)))
		//$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./people");
		//cast
		//$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./progress/collection");
		//aired, completed
		//$this->getCurl("https://api-v2launch.trakt.tv/shows/.$params[2]./seasons/.$i./stats");
		//find in stats which season has most views
	}

	function getInfo () {

		$this->load->model('showModel', 'show');

		$show = $_POST['data'];

		$data = $this->load->show->getById($_POST['data']['show']['ids']['trakt']);

		if (isJSON($data)) {
			$data = json_decode($data);
		}

		if ($data->code == 404) {

			$value['score'] = $show['score'];
			$value['title'] = $show['show']['title'];
			$value['overview'] = $show['show']['overview'];
			$value['year'] = $show['show']['year'];
			$value['poster_full'] = $show['show']['images']['poster']['full'];
			$value['poster_medium'] = $show['show']['images']['poster']['medium'];
			$value['fanart_full'] = $show['show']['images']['fanart']['full'];
			$value['fanart_medium'] = $show['show']['images']['fanart']['medium'];
			$value['id_trakt'] = $show['show']['ids']['trakt'];
			$value['id_slug'] = $show['show']['ids']['slug'];
			$value['id_tvdb'] = $show['show']['ids']['tvdb'];
			$value['id_imdb'] = $show['show']['ids']['imdb'];
			$value['id_tvrage'] = $show['show']['ids']['tvrage'];
			$value['id_tmdb'] = $show['show']['ids']['tmdb'];

			$this->load->show->create($value);

		} else {

			return $data;
		}
	}

	function getCast($params) {

		$params = explode("/", $params);
		$id_show = $params[2];

		$this->load->model('castModel', 'cast');
		$db_data = $this->load->cast->getByIdShow($id_show);

		if ($db_data->code == 404) {
			$api_data = json_decode($this->getCurl("https://api-v2launch.trakt.tv/shows/". $id_show ."/people"));
			$data = [];
			foreach ($api_data->cast as $person) {
				$value = [];
				$value['character'] = $person->character;
				$value['person'] = $person->person->name;
				$value['id_trakt'] = $person->person->ids->trakt;
				$value['id_slug'] = $person->person->ids->slug;
				$value['id_imdb'] = $person->person->ids->imdb;
				$value['id_tvrage'] = $person->person->ids->tvrage;
				$value['id_tmdb'] = $person->person->ids->tmdb;

				$this->load->cast->create($value);

				$data[] = $value;
			}

			return $data;

		} else {

			return $db_data->data;
		}
	}
}