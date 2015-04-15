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

	function getActors(){

	}

	function create ($data) {

		$keys = array_keys($data);
		$fields = '`'.implode('`, `',$keys).'`';

		$placeholder = substr(str_repeat("?,",count($keys)),0,-1);

		$sql = 'INSERT INTO `shows` ('.$fields.') VALUES ('.$placeholder.')';

		$exec = $this->db->prepare($sql);

		$exec->execute(array_values($data));

		return $this->db->lastInsertId();

	}
} 