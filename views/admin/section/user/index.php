<?php 
require_once 'views/admin/layout/header.php';
use App\Controllers\UserController;

$app = new UserController(); 
?>
	<div class="container">
		<div class="d-sm-flex align-items-center justify-content-between header-page">
			<h1 class="page-title mb-0 text-gray-800">User</h1>
		</div>

		<div class="row">
			<div class="col-4 col-md-4">
				<div class="card shadow">
					<div class="card-body">
						<h5 class="card-title">Add New</h5>
						<form action="/admin/user" method="post">
							<div class="mb-3">
						    	<label for="name" class="form-label">Name</label>
						    	<input type="text" class="form-control" name="name">
						  	</div>
						  	<div class="mb-3">
						    	<label for="username" class="form-label">Username</label>
						    	<input type="text" class="form-control" name="username">
						    	<div class="form-text">* Username should be unique.</div>
						  	</div>
						  	<div class="mb-3">
						    	<label for="password" class="form-label">Password</label>
						    	<input type="password" class="form-control" name="password">
						  	</div>
						  	<div class="mb-3">
						    	<label for="confirm_password" class="form-label">Confirm password</label>
						    	<input type="password" class="form-control" name="confirm_password">
						  	</div>
						  	<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-8 col-md-8">
				<div class="card shadow">
					<div class="card-body">
						<div class="table-responsive mt-3">
							<table class="table table-borderless">
								<thead class="bg-primary text-light">
								    <tr>
								      <th scope="col">No</th>
								      <th scope="col">Name</th>
								      <th scope="col">Username</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
								<tbody>
								<?php 
								$i = 1;
								foreach($app->get() as $row){
								?>
								    <tr>
								      <th scope="row"><?=$i++;?></th>
								      <td><?=$row['name']?></td>
								      <td><?=$row['username']?></td>
								      <td>
								      	<a href="/admin/blog/category/edit/<?=$row['id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
								      	<a href="/admin/blog/category/detele/<?=$row['id']?>" class="btn btn-outline-danger btn-sm">Hapus</a>

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
