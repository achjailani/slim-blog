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
		$data = $app->store($data);
		if($data) {
			return $this->index();
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
}