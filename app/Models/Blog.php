<?php
namespace App\Models;

use App\Models\DB;

class Blog extends DB {

	public function all() {
		$this->query("SELECT * FROM blog");
		$this->execute();
		return $this->fetchAll();
	}
}