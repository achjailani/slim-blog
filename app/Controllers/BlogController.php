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

	public function store(array $data, $file) {

		$extension  = ['png', 'jpg'];
		if(!in_array(strtolower($file->getClientOriginalExtension()), $extension)) {
			echo "Format file tidak tersedia";
		}
		$img_name = substr(sha1(rand()), 0, 20) .'.'. strtolower($file->getClientOriginalExtension());

		$data['slug']  = strtolower(implode('-', explode(' ', $data['title'])));
		$data['cover'] = $img_name;
		
		$blog = new Blog();
		if($blog->save($data)) {
			move_uploaded_file($_FILES['cover']['tmp_name'], 'public/img/blog/'.$img_name);
			echo "Mantap pokoknya";
		}
	}
}