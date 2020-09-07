<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="text-primary font-weight-bold">Edit</h6>
				</div>
				<div class="card-body">
					<table class="table table-borderless">
						<tr>
							<th>Nama</th>
							<th>:</th>
							<th><?= $user['name'] ?></th>
						</tr>
						<tr>
							<th>Email</th>
							<th>:</th>
							<th><?= $user['email'] ?></th>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<th>:</th>
							<th><?= $user['jk'] ?></th>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<th><?= $user['alamat'] ?></th>
						</tr>
						<tr>
							<th>No. Hp</th>
							<th>:</th>
							<th><?= $user['no_hp'] ?></th>
						</tr>
						<tr>
							<th>Foto</th>
							<th>:</th>
							<th>
								<img src="<?= base_url('asset/img/profile/') . $user['image'] ?>" style="width: 50px;">
							</th>
						</tr>
						<tr>
							<th>Role / Level</th>
							<th>:</th>
							<th><?= $user['role'] ?></th>
						</tr>
					</table>
					<a href="<?= base_url('user/read') ?>" class="btn btn-primary"><i class="fas fa-backspace"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>