<?php
namespace App\Controllers;

use App\Models\Blog; 

class BlogController {


	public function index() {
		require_once 'views/admin/section/blog/index.php';
	}

	public function create() {
		require_once 'views/admin/section/blog/create.php';
	}
}