<?php
  use App\Config\Fence;
  
  if(!Fence::isLogedIn()) {
    return Fence::throw();
    session_destroy();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Monday - Slim Blog</title>

    <link rel="stylesheet" href="/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="sidebar">
        <div class="sidenav-header mb-4">
          <h2>Bluepeer</h2>
          <small class="d-block username">Hi, <?=$_SESSION['username']?></small>
        </div>
        <div class="side-menu">
          <a href="/admin">Home</a>
          <a href="/admin/blog">Blog</a>
          <?php
            if($_SESSION['role'] == 'owner'){
          ?>
            <a href="/admin/user">User</a>
          <?php } ?>
          <a href="/admin/logout">Logout</a>
        </div>       
      </div>

      <div class="main">