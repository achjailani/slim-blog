<?php
namespace App\Controllers;

use App\Models\Category; 

class CategoryController {

	protected $model;

	public function __construct() {
		$this->model = new Category();
	}

	public function index() {
		require_once 'views/admin/section/blog/category/index.php';
	}

	public function store(array $data) {
		$app = new Category();
		if(empty($data['category'])) {
			echo '<script> alert("Failed! Category name can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/category";</script>';
		} else {
			$data = $app->store($data);
			if($data) {
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function edit($id) {
		echo $id;
	}

	public function show($id = null) {
		$app = new Category();

		if(is_null($id)){
			return $app->all();
		}
		return $app->show($id);
	}

	public function delete($id) {
		$app = new Category();
		if($app->destroy($id)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
}