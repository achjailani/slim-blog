<?php
namespace App\Models;

use App\Models\DB;

class User extends DB {

	public function all() {
		$this->query("SELECT * FROM user WHERE username!=:username");
		$this->bind('username', $_SESSION['username']);
		$this->execute();
		return $this->fetchAll();
	}

	public function find($id) {
		$this->query("SELECT * FROM user WHERE id=:id");
		$this->bind('id', $id);
		$this->execute();
		return $this->fetch();
	}

	public function isUsername($username) {
		$this->query("SELECT * FROM user WHERE username=:username");
		$this->bind('username', $username);
		$this->execute();
		return $this->fetch();
	}

	public function store(array $data) {
		$this->query("INSERT INTO user (id, name, username, password, role) VALUES(null, :name, :username, :password, :role)");
		$this->bind('name', $data['name']);
		$this->bind('username', $data['username']);
		$this->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
		$this->bind('role', 'admin');
		if($this->execute()) {
			return true;
		}

	}

	public function update(array $data) {
		$id = $data['id'];
		if($data['username'] == $data['old_username']) {
			$this->query("UPDATE user SET name=:name WHERE id=:id");
			$this->bind('name', $data['name']);
			$this->bind('id', $id);
		} else {
			$this->query("UPDATE user SET name=:name, username=:username WHERE id=:id");
			$this->bind('name', $data['name']);
			$this->bind('username', $data['username']);
			$this->bind('id', $id);
		}

		if($this->execute()) {
			return true;
		}
	}

	public function destroy($id) {
		$this->query("DELETE FROM user WHERE id=:id");
		$this->bind('id', $id);
		if($this->execute()) {
			return true;
		}
	}
}