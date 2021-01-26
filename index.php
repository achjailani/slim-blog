<?php
require __DIR__ . '/vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Controllers\CategoryController;
use App\Controllers\BlogController;
use App\Controllers\UserController;

$route = new Router();

$route->get('/', function(Request $req, Response $res){
	require_once 'views/client/home.php';
});

$route->get('/about', function(){
	require_once 'views/client/about.php';
});
$route->get('/contact', function(){
	require_once 'views/client/contact.php';
});
$route->get('/blog', function(Request $req, Response $res){
	$app = new BlogController();
	$app->home(); 
});
$route->get('/blog/:slug', function($slug) {
	$app = new BlogController();
	$app->view($slug);
});


$route->get('/admin', function(Request $req, Response $res) {
	session_start();
	require_once 'views/admin/home.php';
});

// Blog admin
$route->get('/admin/blog', function() {
	$app =  new BlogController();
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

// Blog category
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


// User
$route->get('/admin/user', function() {
	$app = new UserController();
	$app->index();
});
$route->post('/admin/user', function(Request $req, Response $res){
	$app = new UserController();
	$app->store($req->request->all());
});
$route->run();
