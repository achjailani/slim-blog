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
		} else {
			$img_name = substr(sha1(rand()), 0, 20) .'.'. strtolower($file->getClientOriginalExtension());

			$data['slug']  	 = strtolower(implode('-', explode(' ', $data['title'])));
			$data['cover'] 	 = $img_name;
			$data['content'] = $this->getHTMLContent($data['content']);
			
			$blog = new Blog();
			if($blog->save($data)) {
				move_uploaded_file($_FILES['cover']['tmp_name'], 'public/img/blog/'.$img_name);
				echo "Mantap pokoknya";
			}
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