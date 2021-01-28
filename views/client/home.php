<?php 
require_once 'views/client/layout/header.php';
use App\Controllers\BlogController;

$app  = new BlogController();
$data = $app->show();
?>
    <div class="jombo">
      <div class="jombo-content container-fluid">
         <h3 class="display-5">Bluepeer Social Networking</h3>
         <p class="lead">Welcome to bluepeer blog, you can read professional article here, enjoy your life</p>
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