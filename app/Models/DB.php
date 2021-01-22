<?php
namespace App\Models;
use \PDO;

class DB {
	const host 	 	= 'localhost';
	const dbname 	= 'blog';
	const username  = 'root';
	const password  = '';


	protected $_db,
			  $_stm;

	public function __construct() {
		try {
			$this->_db = new PDO("mysql:host=".self::host.";dbname=".self::dbname, self::username, self::password);
			$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			die("error found: " . $e->getMessage());
		}
	}


	public function query(string $query) {
		$this->_stm = $this->_db->prepare($query);
	}

	public function bind($param, $value, $type=null) {
		if(is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->_stm->bindValue($param, $value, $type);
	}

	public function execute() {
		return $this->_stm->execute();
	}

	public function fetch() {
		$this->execute();
		return $this->_stm->fetch(PDO::FETCH_ASSOC);
	}

	public function fetchAll() {
		$this->execute();
		return $this->_stm->fetchAll(PDO::FETCH_ASSOC);
	}

}