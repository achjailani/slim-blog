<?php
namespace App\Models;

use App\Models\DB;

class Category extends DB {

	public function all() {
		$this->query("SELECT * FROM category");
		$this->execute();
		return $this->fetchAll();
	}

	public function show($id) {
		$this->query("SELECT * FROM category WHERE id=:id");
		$this->bind('id', $id);
		$this->execute();
		return $this->fetch();
	}

	public function store(array $data) {
		$created_at =  date('Y-m-d H:i:s');
		$this->query("INSERT INTO category (id, name, created_at) VALUES(null, :name, :created_at)");
		$this->bind('name', $data['category']);
		$this->bind('created_at', $created_at);
		if($this->execute()) {
			return true;
		}

	}

	public function destroy($id) {
		$this->query("DELETE FROM category WHERE id=:id");
		$this->bind('id', $id);
		if($this->execute()) {
			return true;
		}
	}
}