<?php
require __DIR__ . '/vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Controllers\CategoryController;
use App\Controllers\BlogController;

$route = new Router();

$route->get('/', function(Request $req, Response $res){
	require_once 'views/client/home.php';
});

$route->get('/admin', function(Request $req, Response $res) {
	session_start();
	require_once 'views/admin/home.php';
});

$route->get('/admin/blog', function(Request $req, Response $res){
	$app = new BlogController();
	$app->index();
});
$route->get('/admin/blog/create', function(Request $req, Response $res){
	$app = new BlogController();
	$app->create();
});
$route->post('/admin/blog', function(Request $req, Response $res){
	$app = new BlogController();
	$app->store($req->request->all(), $req->files->get('cover'));
});
$route->get('/admin/blog/edit/:id', function($id) {
	$app = new BlogController();
	$app->edit($id);
});
$route->post('/admin/blog/update', function(Request $req, Response $res) {
	$app = new BlogController();
	$app->update($req->request->all(), $req->files->get('cover'));
});
$route->get('/admin/blog/delete/:id', function($id) {
	$app = new BlogController();
	$app->delete($id);
});

$route->get('/admin/blog/category', function(Request $req, Response $res) {
	$app = new CategoryController();
	$app->index();
});
$route->post('/admin/blog/category', function(Request $req, Response $res) {
	$app = new CategoryController();
	$app->store($req->request->all());
});
$route->get('/admin/blog/category/edit/:id', function($id) {
	$app = new CategoryController();
	$app->edit($id);
	require_once 'views/admin/section/blog/category/edit.php';
});
$route->post('/admin/blog/category/update', function(Request $req, Response $res) {
	$app = new CategoryController();
	$app->update($req->request->all());
});

$route->get('/admin/blog/category/detele/:id', function($id) {
	$app = new CategoryController();
	$app->delete($id);
});

$route->run();
