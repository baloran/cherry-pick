<?php

Class CastModel Extends Model {

	function getByIdShow($id){

		$statement = $this->db->query('SELECT * FROM `cast` c INNER JOIN show_cast sc ON c.id_trakt = sc.cast_id WHERE sc.show_id ='. $id);

		$data = $statement->fetchAll();

		$len = count($data);

		if ($len == 0) {
			return json(404, null);
		} else {
			return json(200, $data);
		}

	}

	function getActorById ($id) {

		$statement = $this->db->query('SELECT * FROM `cast` WHERE id_trakt ='. $id);

		$data = $statement->fetchAll();

		$len = count($data);

		if ($len == 0) {
			return json(404, null);
		} else {
			return json(200, $data);
		}

	}
} 