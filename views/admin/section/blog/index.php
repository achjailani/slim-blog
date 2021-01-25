<?php 
require_once 'views/admin/layout/header.php';
use App\Controllers\BlogController;

$app = new BlogController(); 
?>
	<div class="container">
		<div class="d-sm-flex align-items-center justify-content-between header-page">
			<h1 class="page-title mb-0 text-gray-800">Blog</h1>
			<div>
				<a href="/admin/blog/create" class="btn btn-primary">
					Upload
				</a>
				<a href="/admin/blog/category" class="btn btn-warning">
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
								<thead class="bg-primary text-light">
								    <tr>
								      <th scope="col">No</th>
								      <th scope="col">Title</th>
								      <th scope="col">Category</th>
								      <th scope="col">Status</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
								foreach($app->show() as $row){
								?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $row['title'];?></td>
										<td><?= $row['name'];?></td>
										<td>
											<?php
												if($row['is_published'] == 1) {
													echo '<span class="badge bg-primary">published</span>';
												} else {
													echo '<span class="badge bg-danger">saved</span>';
												}
											?>
										</td>
										<td>
											<a href="/admin/blog/edit/<?=$row['id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
											<a href="/admin/blog/delete/<?=$row['id']?>" class="btn btn-outline-danger btn-sm">Hapus</a>
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
