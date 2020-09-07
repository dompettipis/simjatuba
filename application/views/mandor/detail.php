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
							<th>Nama Mandor</th>
							<th>:</th>
							<th><?= $mandor['nama_mandor'] ?></th>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<th><?= $mandor['alamat'] ?></th>
						</tr>
						<tr>
							<th>No. Hp</th>
							<th>:</th>
							<th><?= $mandor['no_hp'] ?></th>
						</tr>
						<tr>
							<th>Deskripsi</th>
							<th>:</th>
							<th><?= $mandor['deskripsi'] ?></th>
						</tr>
					</table>
					<a href="<?= base_url('admin/mandor') ?>" class="btn btn-primary"><i class="fas fa-backspace"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>