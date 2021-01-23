<?php
require __DIR__ . '/vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Controllers\CategoryController;
use App\Controllers\BlogController;

$route = new Router();

$route->get('/', function(Request $req, Response $res){
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

$route->run();
