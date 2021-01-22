<?php
namespace App\Models;

use App\Models\DB;

class Category extends DB {

	public function all() {
		$this->query("SELECT * FROM category WHERE id=:id");
		$this->bind('id', 2);
		$this->execute();
		return $this->fetch();
	}
}