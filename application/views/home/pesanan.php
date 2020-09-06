
<div class="container p-5">
  <div class="card text-center">
  <div class="card-header">
    Data Pesanan
  </div>
  <div class="card-body">

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tanggal Pesanan</th>
          <th scope="col">Nama Mandor</th>
          <th scope="col">Pesan</th>
          <th scope="col">Keterangan</th>

        </tr>
      </thead>
      <tbody>

        <?php $i=1; ?>
        <?php foreach ($pesanan as $p) :?>
        <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $p['tgl_pesanan'] ?></td>
          <td><?= $p['name'] ?></td>
          <td><?= $p['pesan'] ?></td>
          <td>Menunggu Persetujuan</td>

        </tr>
      <?php $i++; ?>
      <?php endforeach; ?>

      </tbody>
    </table>

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
