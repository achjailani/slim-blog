<?php
require __DIR__ . '/vendor/autoload.php';

use GuahanWeb\Http;
use App\Controllers\CategoryController;
use App\Controllers\BlogController;

$router = Http\Router::instance();

$router->get('/', function ($req, $res) {
    $app = new CategoryController();
    $app->index();
});

$router->get('/admin', function($req, $res) {
	require_once 'views/admin/layout/app.php';
});
$router->get('/admin/blog', function($req, $res) {
	$app = new BlogController();
	$app->index();
});
$router->get('/admin/blog/create', function($req, $res) {
	$app = new BlogController();
	$app->create();
});
$router->post('/admin/blog', function($req, $res) {
	$app = new BlogController();
	$res->send(array(
        'method' => $req->method,
        'uri' => $req->uri,
        'query' => $req->query,
        'headers' => $req->headers,
        'body' => $req->body
    ));
});

$router->get('/admin/category', function($req, $res) {
	$app = new CategoryController();
	$app->index();
});
$router->post('/admin/category', function($req, $res) {
	parse_str($req->body, $data);
	$app = new CategoryController();
	$app->store($data);
});
$router->get('/admin/category/{id}', function($req, $res) {
	$app = new CategoryController();
    $app->edit($req->id);
});


// start the app
$router->process();