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

		if(empty($data['title'])) {
			echo '<script> alert("Failed! Title can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/create";</script>';
		}
		elseif(empty($data['category'])) {
			echo '<script> alert("Failed! Category can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/create";</script>';
		}
		elseif(is_null($file)) {
			echo '<script> alert("Failed! Cover can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/create";</script>';
		}
		elseif(empty($data['content'])) {
			echo '<script> alert("Failed! Content can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/create";</script>';
		} 
		else {
			$extension  = ['png', 'jpg'];
			if(!in_array(strtolower($file->getClientOriginalExtension()), $extension)) {
				echo '<script> alert("Failed! File uploaded does not match.")</script>';
				echo '<script> window.location = "/admin/blog/create";</script>';
			} else {
				$img_name = substr(sha1(rand()), 0, 20) .'.'. strtolower($file->getClientOriginalExtension());

				$data['slug']  	 = strtolower(implode('-', explode(' ', $data['title'])));
				$data['cover'] 	 = $img_name;
				$data['content'] = $this->getHTMLContent($data['content']);
				
				$blog = new Blog();
				if($blog->save($data)) {
					move_uploaded_file($_FILES['cover']['tmp_name'], 'public/img/blog/'.$img_name);
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
			}
		}

	}

	public function update(array $data, $file) {
		$model = new Blog();

		if(empty($data['title'])) {
			echo '<script> alert("Failed! Title can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/create";</script>';
		}
		elseif(empty($data['category'])) {
			echo '<script> alert("Failed! Category can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/create";</script>';
		}
		elseif(empty($data['content'])) {
			echo '<script> alert("Failed! Content can not be empty.")</script>';
			echo '<script> window.location = "/admin/blog/create";</script>';
		} 
		else { 
			if(is_null($file)) {
			$img_name = $data['old_image'];
			} else {
				$extension  = ['png', 'jpg'];
				if(!in_array(strtolower($file->getClientOriginalExtension()), $extension)) {
					echo '<script> alert("Failed! File uploaded does not match.")</script>';
					echo '<script> window.location = "/admin/blog/create";</script>';
				}

				$img_name = substr(sha1(rand()), 0, 20) .'.'. strtolower($file->getClientOriginalExtension());
				move_uploaded_file($_FILES['cover']['tmp_name'], 'public/img/blog/'.$img_name);
				if(file_exists('public/img/blog/'.$data['old_image'])) {
					unlink('public/img/blog/'.$data['old_image']);
				}
			}

			$data['slug']  	 = strtolower(implode('-', explode(' ', $data['title'])));
			$data['cover'] 	 = $img_name;
			$data['content'] = $this->getHTMLContent($data['content']);
			if($model->update($data)) {
				echo '<script> window.location = "/admin/blog";</script>';
			}
		}
	}

	public function edit($id) {
		$_SESSION['blog_id'] = $id;
		require_once 'views/admin/section/blog/edit.php';
	}

	public function delete($id) {
		$app  = new Blog();
		$data = $app->find($id);
		if(file_exists('public/img/blog/'.$data['cover'])) {
			unlink('public/img/blog/'.$data['cover']);
		}

		if($app->destroy($id)) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

	public function show($id = null) {
		$blog = new Blog();
		if (is_null($id)) {
			return $blog->all();
		}
		return $blog->find($id);
	}

	private function getHTMLContent($data)
    {
    	$detail=$data;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');

        foreach($images as $num => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= "public/img/blog/body" . time().$num.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

        }

        $detail = $dom->saveHTML();

        return $detail;
    }
}