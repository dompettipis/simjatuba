<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="text-primary font-weight-bold">Edit</h6>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<input type="hidden" name="id" value="<?= $user['id'] ?>">
						<div class="form-group">
					  	 <label for="name">Nama</label>
					    <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
					    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	 <label for="email">Email</label>
					    <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
					    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	 <label for="jk">Jenis Kelamin</label>
					    <input type="text" class="form-control" name="jk" value="<?= $user['jk'] ?>">
					    <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	 <label for="alamat">Alamat</label>
					  	 <input type="text" class="form-control" name="alamat" value="<?= $user['alamat'] ?>">
					    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	 <label for="no_hp">NO. Hp</label>
					  	 <input type="text" class="form-control" name="no_hp" value="<?= $user['no_hp'] ?>">
					    <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					  	<label>Role / Level</label>
					  	<select name="role_id" class="form-control">
					  		<?php foreach($role as $role): ?>
						  		<?php if($role['id'] == $user['role_id']): ?>
						  			<option value="<?= $user['role_id'] ?>" selected><?= $role['role'] ?></option>
						  		<?php else: ?>
						  			<option value="<?= $user['role_id'] ?>"><?= $role['role'] ?></option>
						  		<?php endif; ?>
						  	<?php endforeach; ?>
					  	</select>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>					