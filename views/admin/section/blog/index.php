<?php 
require_once 'views/admin/layout/header.php';
use App\Controllers\BlogController;

$app = new BlogController(); 
?>
	<div class="container">
		<div class="d-sm-flex align-items-center justify-content-between header-page">
			<h1 class="page-title mb-0 text-gray-800">Blog</h1>
			<div>
				<a href="/admin/blog/create" class="btn btn-outline-primary shadow-sm">
					Upload
				</a>
				<a href="/admin/category" class="btn btn-outline-warning shadow-sm">
					 Category
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-md-12">
				<div class="card shadow">
					<div class="card-body">
						<div class="table-responsive mt-3">
							<table class="table table-borderless">
								<thead class="table-dark">
								    <tr>
								      <th scope="col">No</th>
								      <th scope="col">Title</th>
								      <th scope="col">Category</th>
								      <th scope="col">Status</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
								<tbody>
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require_once 'views/admin/layout/footer.php'; ?>
