<?php 
require_once 'views/admin/layout/header.php';
use App\Controllers\UserController;

$app = new UserController(); 
$data = $app->get($_SESSION['user_edit_id']);
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
						<form action="/admin/user/update" method="post">
							<div class="mb-3">
						    	<label for="name" class="form-label">Name</label>
						    	<input type="text" class="form-control" name="name" value="<?=$data['name']?>">
						    	<input type="hidden" name="id" value="<?=$data['id']?>">
						  	</div>
						  	<div class="mb-3">
						    	<label for="username" class="form-label">Username</label>
						    	<input type="text" class="form-control" name="username" value="<?=$data['username']?>">
						    	<input type="hidden" name="old_username" value="<?=$data['username']?>">
						    	<div class="form-text">* Username should be unique.</div>
						  	</div>
						  	<button type="submit" class="btn btn-primary">Update</button>
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
								      	<a href="/admin/user/edit/<?=$row['id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
								      	<a href="/admin/user/delete/<?=$row['id']?>" class="btn btn-outline-danger btn-sm">Hapus</a>

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
