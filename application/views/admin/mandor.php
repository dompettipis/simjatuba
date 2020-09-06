

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#mandorModal"> Tambah Data Mandor</a>
          <div class="row">
            <div class="col-lg">
              <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              <?= $this->session->flashdata('message'); ?>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Email</th>
                    <th scope="col">jk</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                <?php foreach ($pelanggan as $sm) :?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><a href="#"><?= $sm['name']; ?></a> </td>
                    <td><?= $sm['email']; ?></td>
                    <td><?= $sm['jk']; ?></td>
                    <td><?= $sm['alamat']; ?></td>
                    <td><?= $sm['no_hp']; ?></td>
                    <td class="text-center">
                      <a href="#" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                      <a href="" class="btn btn-danger" onclick="return confirm('Apakah yakin akan dihapus?');"><i class="fas fa-user-times"></i></a>
                    </td>
                  </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
                </tbody>
              </table>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="mandorModal" tabindex="-1" role="dialog" aria-labelledby="mandorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mandorModalLabel">Tambah Data Mandor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?= base_url('admin/mandor');?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <select class="form-control" name="menu_id" id="menu_id">
            <option value="">Select Jenis Kelamin</option>
            <?php foreach ($jk as $m) : ?>
              <option value="<?= $m ?>"><?= $m ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
