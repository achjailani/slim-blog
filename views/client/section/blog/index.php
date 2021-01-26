<?php 
require_once 'views/client/layout/header.php';
use App\Controllers\BlogController;

$app  = new BlogController();
$data = $app->show();
?>
    <div class="row mb-4 mt-4">
      <div class="col-12 col-md-12 text-center">
        <h2>Explore your read</h2>
        <p>This page contains many kind of professional articles you can read here, just enjoy your day</p>
      </div>
    </div>
    <div class="row">
      <?php
      foreach($data as $row){
      ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-4">
          <div class="card">
            <img src="/public/img/blog/<?=$row['cover']?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?=$row['title']?></h5>
              <p class="card-text"><?=(strlen($row['content']) > 93) ? substr($row['content'],0,93)." . . .":$row['content'];?></p>
              <a href="/blog/<?=$row['slug']?>" class="btn btn-primary btn-sm">See details</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
<?php require_once 'views/client/layout/footer.php';?>