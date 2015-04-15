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
}