<?php
namespace App\Controllers; 

use App\Models\User;

class UserController {

	public function index() {
		require_once 'views/admin/section/user/index.php';
	}

	public function get($id = null) {
		$model = new User();
		if(is_null($id)) {
			return $model->all();
		}
		return $model->find($id);
	}

	public function store(array $data) {
		$model = new User();
		if($model->isUsername($data['username'])) {
			echo '<script> alert("Failed! Username has already registered, find another username.")</script>';
			echo '<script> window.location = "/admin/user";</script>';
		}

		if($model->store($data)) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			echo "Hello";
		}
	}

	public function edit($id) {
		$_SESSION['user_edit_id'] = $id;
		require_once 'views/admin/section/user/edit.php'; 
	}

	public function update(array $data) {
		$model = new User();
		if($model->update($data)) {
			echo '<script> alert("Data has been successfully updated.")</script>';
			echo '<script> window.location = "/admin/user";</script>';
		}
	}

	public function delete($id) {
		$model = new User();
		if($model->destroy($id)) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
}