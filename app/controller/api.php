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
		$this->load->model('castModel', 'cast');

		$show = $_POST['data'];

		$id_trakt = $_POST['data']['show']['ids']['trakt'];

		$data = $this->load->show->getById($id_trakt);

		$info = $this->load->show->getSeasonsInfo($id_trakt);

		$episodes = json_decode($this->getCurl("https://api-v2launch.trakt.tv/shows/". $id_trakt ."?extended=full"));
		$episodes = $episodes->aired_episodes;

		if (isJSON($data)) {
			$data = json_decode($data);
		}

		if (isJSON($info)) {
			$info = json_decode($info);
		}

		if ($data->code == 404) {
			$value = [];
			$value['score'] = (isset($show['score'])) ? $show['score'] : '';
			$value['title'] = (isset($show['show']['title'])) ? $show['show']['title'] : '';
			$value['overview'] = (isset($show['show']['overview'])) ? $show['show']['overview'] : '';
			$value['year'] = (isset($show['show']['year'])) ? $show['show']['year'] : '';
			$value['total_episodes'] = (isset($episodes)) ? $episodes : '';
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

			$this->getRatesAndCreate($value);

			$cast = $this->getCast($value['id_trakt']);


			if (isJSON($cast)) {
				$cast = json_decode($cast);
			}

			if ($cast->code == 200) {

				if ($info->code == 200) {
					$value = [];

					for ($i=1; $i < $info->data->nbSeasons; $i++) {

						$value['id_trakt'] = $id_trakt;
						$value['num_season'] = $i;
						
						$s = 'season'.$i;
						$info->data->viewers->$s = json_encode($info->data->viewers->$s);

						$value['viewers'] = (isset($info->data->viewers->$s)) ? $info->data->viewers->$s : '';

						$this->load->show->create($value, 'seasons');
					}

				} else {

					return $info;
				}

			} else {

				return false;
			}

		} else {

			return $data;
		}

	}

	function getCast($id_show) {

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

				$show_cast['character_name'] = (isset($person->character)) ? $person->character : '';
				$show_cast['show_id'] = $id_show;
				$show_cast['cast_id'] = $value['id_trakt'];

				$actor_in_db = $this->load->cast->getActorById($value['id_trakt']);

				if (isJSON($actor_in_db)){
					$actor_in_db = json_decode($actor_in_db);
				}

				if ($actor_in_db->code == 404) {
					$this->load->cast->create($value, 'cast');
				}

				$this->load->cast->create($show_cast, 'show_cast');
			}

			return json(200, "Added");

		} else {

			return json(200, "Already Exists");
		}
	}

	function getRatesAndCreate ($value) {

		//rotten

		$html = file_get_html('http://www.rottentomatoes.com/tv/'.$value['id_slug']);

		$test = $html->find('#tomato_meter_link .superPageFontColor span');
		
		foreach ( $test as $element ) {
			$value['rotten_rate'] = $element->plaintext;
		}

		$this->getImdb($value);

	}

	function getImdb ($value) {

		$html = file_get_html('http://www.imdb.com/title/'.$value['id_imdb']);

		$test = $html->find('.titlePageSprite.star-box-giga-star');
		
		foreach ( $test as $element ) {
			$value['imdb_rate'] = $element->plaintext;
		}

		$this->getTmdb($value);
	}

	function getTmdb ($value) {

		$url = "http://api.themoviedb.org/3/tv/".$value['id_tmdb']."?api_key=bf589107b69eaea97de289221885aa25";

		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false); 

		curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
			"Content-Type: application/json"
		));

		$data = curl_exec($this->curl);

		$data = json_decode($data);

		$value['tmdb_rate'] = $data->vote_average;

		$this->load->show->create($value, 'shows');
	}

	function getAllInfo ($id){

		$this->load->model('showModel', 'show');

		$infos = $this->load->show->getAllInfo($id);

		return $infos;

	}
}