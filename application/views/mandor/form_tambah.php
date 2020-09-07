<div class="container mt-4">
<div class="form-group">
  <div class="col-sm-6">
<h3>Form Tambah Mandor</h3>
</div>
</div>
<form action="<?= base_url('mandor/tambah_mandor'); ?>" method="POST">
  <div class="form-group">
  <div class="col-sm-6">
    <label for="formGroupExampleInput">Nama Mandor</label>
    <input type="text" name="nama_mandor" class="form-control" id="formGroupExampleInput" placeholder="Nama Mandor">
    <?= form_error('nama_mandor', '<small class="text-danger">', '</small>') ?>
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-6">
    <label for="formGroupExampleInput2">No Handphone</label>
    <input type="text" name="no_hp" class="form-control" id="formGroupExampleInput2" placeholder="No Handphone">
    <?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-6">
    <label for="formGroupExampleInput2">Alamat</label>
    <input type="text" name="alamat" class="form-control" id="formGroupExampleInput2" placeholder="Alamat">
    <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-6">
    <label for="formGroupExampleInput2">Deskripsi</label><br>
    <textarea name="deskripsi" style="height: 300px; width: 550px;"></textarea>
    <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-6">
  <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
  </div>
</form>
</div><br><br>