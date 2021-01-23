<?php 
require_once 'views/admin/layout/header.php';
use App\Controllers\CategoryController;

$app = new CategoryController(); 
?>
	<div class="container">
		<div class="d-sm-flex align-items-center justify-content-between header-page">
			<h1 class="page-title mb-0 text-gray-800">Category</h1>
		</div>

		<div class="row">
			<div class="col-4 col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Add New</h5>
						<form action="/admin/category" method="post">
							<div class="mb-3">
						    	<label for="category" class="form-label">Category name</label>
						    	<input type="text" class="form-control" name="category">
						    	<div class="form-text">* Category name should be unique.</div>
						  	</div>
						  	<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-8 col-md-8">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive mt-3">
							<table class="table table-borderless">
								<thead class="table-dark">
								    <tr>
								      <th scope="col">No</th>
								      <th scope="col">Name</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
								<tbody>
								<?php 
								$i = 1;
								foreach($app->show() as $row){
								?>
								    <tr>
								      <th scope="row"><?=$i++;?></th>
								      <td><?=$row['name']?></td>
								      <td>
								      	<a href="" class="btn btn-outline-primary btn-sm">Edit</a>
								      	<a href="" class="btn btn-outline-danger btn-sm">Hapus</a>
								      </td>
								    </tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require_once 'views/admin/layout/footer.php'; ?>
