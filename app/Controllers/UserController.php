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
		if($model->store($data)) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			echo "Hello";
		}
	}
}