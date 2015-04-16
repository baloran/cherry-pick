<?php

Class ShowModel Extends Model {

	static function search($str){
		$api = new api();
		$result = $api->search($str);
		error_log(print_r($result,true));
		$shows = [];
		if ($result){
			foreach ($result as $show) {
				$shows[] = [
					'id' => $show['show']['ids']['trakt'],
					'title' => $show['show']['title']
				];
			}
		}
		return $shows;
	}

	function getById($id){
		$prepare = $this->db->prepare('SELECT * FROM `shows` WHERE id_trakt = :id');

		$prepare->bindParam(':id', $id);

		$prepare->execute();

		$data = $prepare->fetchAll();

		$len = count($data);

		if ($len == 0) {
			return json(404, null);
		} else {
			return json(200, $data);
		}
	}

	function getSeasonsInfo($id){

		$data = [];

		$api = new api();

		$api_data = json_decode($api->getCurl("https://api-v2launch.trakt.tv/shows/". $id ."/seasons"));

		$result = count($api_data)-1; //Without pre season

		$viewers = [];
		for ($i=1; $i < (1+$result); $i++) { 
			$infoView = json_decode($api->getCurl("https://api-v2launch.trakt.tv/shows/". $id ."/"."seasons/". $i ."/stats"));
			$viewers['season'.$i] = $infoView->watchers;
		}

		$data = array(
			'nbSeasons' => $result,
			'viewers' => $viewers,
		);

		$len = count($data);

		if ($len == 0) {
			return json(404, null);
		} else {
			return json(200, $data);
		}
	}

	function getAllInfo ($id) {
		$prepare = $this->db->prepare('SELECT title, overview, year, poster_full, total_episodes, score, rotten_rate, imdb_rate, tmdb_rate FROM `shows` WHERE id_trakt = :id');
		$prepare = $this->db->prepare('SELECT person, character_name FROM `cast` c INNER JOIN show_cast sc ON c.id_trakt = sc.cast_id WHERE sc.show_id = :id LIMIT 3');
		$prepare = $this->db->prepare('SELECT viewers FROM `seasons` s INNER JOIN shows sh ON s.id_trakt = sh.id_trakt WHERE s.id_trakt = :id');
		$prepare->bindParam(':id', $id);

		$prepare->execute();

		$data = $prepare->fetchAll();

		var_dump($data);
		die();

		$len = count($data);

		if ($len == 0) {
			return json(404, null);
		} else {
			return json(200, $data);
		}
	}
} 