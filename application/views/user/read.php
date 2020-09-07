<div class="container">
	<div class="row">
		<div class="col-md">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="text-primary font-weight-bold">Edit</h6>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No. Hp</th>
							<th>foto</th>
							<th>Aksi</th>
						</tr>
						<?php 
						$i = 1; 
						foreach($semua_user as $user): ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $user['name'] ?></td>
								<td><?= $user['email'] ?></td>
								<td><?= $user['no_hp'] ?></td>
								<td>
									<img src="<?= base_url('asset/img/profile/') . $user['image'] ?>" style="width: 50px;">
								</td>
								<td>
								<a href="<?= base_url('user/user_detail/') . $user['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>

			                      <a href="<?= base_url('user/user_edit/') . $user['id'] ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a>

			                      <a href="<?= base_url('user/user_hapus/') . $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin akan dihapus?');"><i class="fas fa-user-times"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>