<?php
namespace App\Models;

use App\Models\DB;

class User extends DB {

	public function all() {
		$this->query("SELECT * FROM user");
		$this->execute();
		return $this->fetchAll();
	}

	public function find($id) {
		$this->query("SELECT * FROM user WHERE id=:id");
		$this->bind('id', $id);
		$this->execute();
		return $this->fetch();
	}

	public function store(array $data) {
		$this->query("INSERT INTO user (id, name, username, password, role) VALUES(null, :name, :username, :password, :role)");
		$this->bind('name', $data['name']);
		$this->bind('username', $data['username']);
		$this->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
		$this->bind('role', 'editor');
		if($this->execute()) {
			return true;
		}

	}
}