<?php
namespace App\Models;

use App\Models\DB;

class Blog extends DB {

	public function all() {
		$this->query("SELECT * FROM blog");
		$this->execute();
		return $this->fetchAll();
	}

	public function save(array $data) {
		$this->query("INSERT INTO blog (id, category_id, title, slug, cover, content, is_published, created_at) VALUES(null, :category_id, :title, :slug, :cover, :content, :is_published, :created_at)");
		$this->bind('category_id', $data['category']);
		$this->bind('title', $data['title']);
		$this->bind('slug', $data['slug']);
		$this->bind('cover', $data['cover']);
		$this->bind('content', $data['content']);
		$this->bind('is_published', true);
		$this->bind('created_at', date('Y-m-d H:i:s'));

		if($this->execute()) {
			return true;
		}
	}
}