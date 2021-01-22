<?php
namespace App\Controllers;

use App\Models\Category; 

class CategoryController {

	protected $model;

	public function __construct() {
		$this->model = new Category();
	}

	public function index() {
		$data = $this->model->all();
		print_r($data);
	}
}