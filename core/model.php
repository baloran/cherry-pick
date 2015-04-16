<?php

Class Model {

	function __construct () {

		try
		{
			// Try to connect to database
			$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

			// Set fetch mode to object
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

			$this->db = $pdo;
		}
		catch (Exception $e)
		{
			// Failed to connect
			die('Could not connect');
		}
	}

	function create ($data, $table) {

		$keys = array_keys($data);
		$fields = '`'.implode('`, `',$keys).'`';

		$placeholder = substr(str_repeat("?,",count($keys)),0,-1);

		$sql = 'INSERT INTO `'. $table .'` ('.$fields.') VALUES ('.$placeholder.')';

		$exec = $this->db->prepare($sql);

		$exec->execute(array_values($data));

		return $this->db->lastInsertId();

	}
}