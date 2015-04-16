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

			$value['score'] = (isset($show['score'])) ? $show['score'] : '';
			$value['title'] = (isset($show['show']['title'])) ? $show['show']['title'] : '';
			$value['overview'] = (isset($show['show']['overview'])) ? $show['show']['overview'] : '';
			$value['year'] = (isset($show['show']['year'])) ? $show['show']['year'] : '';
			$value['poster_full'] = (isset($show['show']['images']['poster']['full'])) ? $show['show']['images']['poster']['full'] : '';
			$value['poster_medium'] = (isset($show['show']['images']['poster']['medium'])) ? $show['show']['images']['poster']['medium'] : '';
			$value['fanart_full'] = (isset($show['show']['images']['fanart']['full'])) ? $show['show']['images']['fanart']['full'] : '';
			$value['fanart_medium'] = (isset($show['show']['images']['fanart']['medium'])) ? $show['show']['images']['fanart']['medium'] : '';
			$value['id_trakt'] = (isset($show['show']['ids']['trakt'])) ? $show['show']['ids']['trakt'] : '';
			$value['id_slug'] = (isset($show['show']['ids']['slug'])) ? $show['show']['ids']['slug'] : '';
			$value['id_tvdb'] = (isset($show['show']['ids']['tvdb'])) ? $show['show']['ids']['tvdb'] : '';
			$value['id_imdb'] = (isset($show['show']['ids']['imdb'])) ? $show['show']['ids']['imdb'] : '';
			$value['id_tvrage'] = (isset($show['show']['ids']['tvrage'])) ? $show['show']['ids']['tvrage'] : '';
			$value['id_tmdb'] = (isset($show['show']['ids']['tmdb'])) ? $show['show']['ids']['tmdb'] : '';

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

		if (isJSON($db_data)){
			$db_data = json_decode($db_data);
		}

		if ($db_data->code == 404) {
			$api_data = json_decode($this->getCurl("https://api-v2launch.trakt.tv/shows/". $id_show ."/people"));
			// var_dump($api_data);
			// die();
			foreach ($api_data->cast as $person) {
				$value = [];
				$show_cast = [];
				$value['person'] = (isset($person->person->name)) ? $person->person->name : '';
				$value['id_trakt'] = (isset($person->person->ids->trakt)) ? $person->person->ids->trakt  : '';
				$value['id_slug'] = (isset($person->person->ids->slug)) ? $person->person->ids->slug  : '';
				$value['id_imdb'] = (isset($person->person->ids->imdb)) ? $person->person->ids->imdb  : '';
				$value['id_tvrage'] = (isset($person->person->ids->tvrage)) ? $person->person->ids->tvrage  : '';
				$value['id_tmdb'] = (isset($person->person->ids->tmdb)) ? $person->person->ids->tmdb  : '';

				$show_cast['character_name'] = $person->character;
				$show_cast['show_id'] = $id_show;
				$show_cast['cast_id'] = $value['id_trakt'];

				$actor_in_db = $this->load->cast->getActorById($value['id_trakt']);

				if (isJSON($actor_in_db)){
					$actor_in_db = json_decode($actor_in_db);
				}

				if ($actor_in_db->code == 404) {
					$this->load->cast->create($value);
				}

				$this->load->cast->create_link($show_cast);
			}

		} else {

			return $db_data->data;
		}
	}
}