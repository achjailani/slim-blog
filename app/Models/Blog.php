<?php
namespace App\Models;

use App\Models\DB;

class Blog extends DB {

	public function all() {
		$this->query('SELECT blog.id, blog.title, blog.slug, blog.cover, blog.content, blog.is_published, category.name FROM `blog` LEFT JOIN `category` ON category.id = blog.category_id');
		$this->execute();
		return $this->fetchAll();
	}

	public function find($id) {
		$this->query("SELECT * FROM blog WHERE id=:id");
		$this->bind('id', $id);
		$this->execute();
		return $this->fetch();
	}

	public function update(array $data) {
		$this->query("UPDATE blog SET category_id=:category_id, title=:title, slug=:slug, cover=:cover, content=:content, updated_at=:updated_at WHERE id=:id");
		$this->bind('category_id', $data['category']);
		$this->bind('title', $data['title']);
		$this->bind('slug', $data['slug']);
		$this->bind('cover', $data['cover']);
		$this->bind('content', $data['content']);
		$this->bind('updated_at', date('Y-m-d H:i:s'));
		$this->bind('id', $data['id']);
		if($this->execute()) {
			return true;
		}
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

	public function destroy($id) {
		$this->query("DELETE FROM blog WHERE id=:id");
		$this->bind('id', $id);
		if($this->execute()) {
			return true;
		}
	}
}