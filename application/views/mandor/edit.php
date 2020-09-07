<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="text-primary font-weight-bold">Edit</h6>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<input type="hidden" name="id" value="<?= $mandor['id_mandor'] ?>">
						<div class="form-group">
					  	 <label for="nama_mandor">Nama</label>
					    <input type="text" class="form-control" name="nama_mandor" value="<?= $mandor['nama_mandor'] ?>">
					    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	 <label for="alamat">Alamat</label>
					    <input type="text" class="form-control" name="alamat" value="<?= $mandor['alamat'] ?>">
					    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	 <label for="no_hp">No. HP</label>
					    <input type="text" class="form-control" name="no_hp" value="<?= $mandor['no_hp'] ?>">
					    <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	 <label for="deskripsi">Deskripsi</label>
					  	 <textarea name="deskripsi" cols="30" rows="10" class="form-control"><?= $mandor['deskripsi'] ?></textarea>
					    <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>					