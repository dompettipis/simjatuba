
    <div class="container mt-5">
      <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
          <h1><i class="fas fa-id-card mb-4"></i> Profile</h1>
            <?= form_open_multipart('home/edit'); ?>
            <input type="hidden" name="id_pelanggan" value="<?= $user['id_pelanggan']; ?>">
            <div class="form-group row">
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" name="image" id="image" class="custom-file-input">
                      <label for="image" class="custom-file-label"> Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
            </div>

            <div class="form-group">
              <label for="no_hp">No HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp']; ?>">
            </div>
            <div class="form-group">
              <label for="jk">Jenis Kelamin</label>
              <select class="form-control" id="jk" name="jk">
                <?php foreach ($jk as $j): ?>
                  <?php if ($j == $user['jk']): ?>
                    <option value="<?= $j ?>" selected><?= $j ?></option>
                  <?php else: ?>
                    <option value="<?= $j ?>"><?= $j ?></option>
                  <?php endif; ?>

                <?php endforeach; ?>

              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $user['alamat'] ?></textarea>
            </div>

            <button type="submit" name="edit" class="btn btn-primary"> Edit Data</button>
          </form>
        </div>
      </div>
    </div>







        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
