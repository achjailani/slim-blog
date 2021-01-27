<?php
namespace App\Controllers; 

use App\Models\User;

class AuthController {

	public function index() {
		require_once 'views/admin/auth/login.php';
	} 

	public function login(array $data) {
		$model = new User();
		if(!$model->isUsername($data['username'])) {
			echo '<script> alert("Failed! Username or password is wrong.")</script>';
			echo '<script> window.location = "/admin/login";</script>';
		}

		$res = $model->isUsername($data['username']);

		if(!password_verify($data['password'], $res['password'])) {
			echo '<script> alert("Failed! Username or password is wrong.")</script>';
			echo '<script> window.location = "/admin/login";</script>';
		}
		session_start();
		$_SESSION['username'] = $res['username'];
		$_SESSION['role']	  = $res['role'];

		echo '<script> window.location = "/admin";</script>';
	}

	public function logout() {
		session_start();
		session_unset();
		session_destroy();
		echo '<script> window.location = "/admin/login";</script>';
	}
}