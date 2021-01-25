<?php 
require_once 'views/admin/layout/header.php';
use App\Controllers\BlogController;
use App\Controllers\CategoryController;

$cat  = new CategoryController();
$app  = new BlogController(); 
$data = $app->show($_SESSION['blog_id']);
?>
	<div class="container">
		<div class="d-sm-flex align-items-center justify-content-between header-page">
			<h1 class="page-title mb-0 text-gray-800">New Blog</h1>
		</div>

		<div class="row">
			<div class="col-12 col-md-12">
				<div class="card shadow">
					<div class="card-body d-flex justify-content-center">
						<div class="col-8 col-md-8 mt-4 mb-4">
							<form action="/admin/blog/update" method="post" enctype="multipart/form-data">
							  <div class="mb-3">
							    <label for="title" class="form-label">Title</label>
							    <input type="text" class="form-control" name="title" value="<?=$data['title']?>">
							    <input type="hidden" name="id" value="<?=$data['id']?>">
							    <div class="form-text">* Title of every article should be unique</div>
							  </div>
							  <div class="mb-3">
							    <label for="category" class="form-label">Category</label>
							    <select class="form-select" name="category">
								  	<option value="" selected>-- Choose category --</option>
								  	<?php
								  	foreach($cat->show() as $row) {
								  	?>
								  	<option <?=($data['category_id'] == $row['id']) ? 'selected':'';?> value="<?=$row['id']?>"><?=$row['name']?></option>
									<?php } ?>
								</select>
							  </div>
							  <div class="mb-3">
							    <label for="cover" class="form-label">Cover</label>
							    <input class="form-control" type="file" name="cover">
							    <input type="hidden" name="old_image" value="<?=$data['cover']?>">
							  </div>
							  <div class="mb-3">
							  	<label for="content" class="form-label"> Content</label>
							  	<textarea id="editor" name="content"><?=$data['content']?></textarea>
							  </div>
							  <button type="submit" class="btn btn-primary">Update</button>
							  <button type="reset" class="btn btn-danger">Cancel</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require_once 'views/admin/layout/footer.php'; ?>
