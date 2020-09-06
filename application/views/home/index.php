




        <div class="row">

          <?php foreach ($tukang as $m) :?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">

              <div class="card-body">
                <img src="<?= base_url('asset/img/profile/') . $m['image']; ?>" class="img-thumbnail" alt="">
                <h4 class="card-title text-center">
                  <a href="<?= base_url('home/') . $m['id_mandor'] ?>"><?= $m['name']; ?></a>
                </h4>
                <h5 class="text-center"><?= $m['no_hp']; ?></h5>
                <p class="card-text text-center">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
              </div>
              <div class="card-footer">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#pesanModal">Kirim Pesanan</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>



        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Modal -->
  <div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pesanModalLabel">Kirim Pesanan untuk mandor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" action="<?= base_url('home/pesanan') ?>" method="post">
        

        <div class="modal-body">
          <div class="form-group">
            <label for="alamat">Pesan</label>
            <textarea class="form-control" name="pesan" id="pesan" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Pesan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
