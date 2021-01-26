<?php 
require_once 'views/client/layout/header.php';
use App\Controllers\BlogController;

$app  = new BlogController();
$data = $app->detail($_SESSION['slug']);
?>
  <div class="row mt-4">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
        <div class="card">
          <img src="/public/img/blog/<?=$data['cover']?>" class="img-fluid view-image" alt="...">
          <!-- <img src="/public/img/blog/<?=$data['cover']?>" class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title card-title-detail mb-4"><?=$data['title']?>
              <small class="d-block mt-1 published">Published at <?=$data['created_at']?></small>
            </h5>
            <p><?=$data['content']?></p>
          </div>
        </div>
      </div>
  </div>
<?php require_once 'views/client/layout/footer.php';?>