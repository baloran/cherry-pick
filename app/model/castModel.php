<?php

Class CastModel Extends Model {

	function getByIdShow($id){

		$statement = $this->db->query('SELECT * FROM `cast` c INNER JOIN show_cast sc ON c.id_trakt = sc.show_id WHERE c.id_trakt = '. $id);

		$data = $statement->fetchAll();

		$len = count($data);

		$result = new stdClass();

		if ($len == 0) {
			$result->code = 404;
			$result->data = null;
		} else {
			$result->code = 200;
			$result->data = $data;
		}

		return $result;
	}

	function create ($data) {

		$keys = array_keys($data);
		$fields = '`'.implode('`, `',$keys).'`';

		$placeholder = substr(str_repeat("?,",count($keys)),0,-1);

		$sql = 'INSERT INTO `cast` ('.$fields.') VALUES ('.$placeholder.')';

		$exec = $this->db->prepare($sql);

		$exec->execute(array_values($data));

		return $this->db->lastInsertId();

	}
} 