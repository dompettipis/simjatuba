<div class="container">

<h3>Data Mandor</h3>
<div>
<a href="<?= base_url('mandor/tambah_mandor'); ?>" class="btn btn-primary">+Tambah Mandor</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mandor</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Handphone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 
      $i = 1;
      foreach ($mandor as $row) : ?>

    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $row['nama_mandor']; ?></td>
      <td><?= $row['alamat']; ?></td>
      <td><?= $row['no_hp']; ?></td>
      <td>
        <a href="" class="btn btn-primary">Update</a>
        <a href="" class="btn btn-primary">Hapus</a>
      </td>
    </tr>

     <?php endforeach; ?>
  </tbody>
</table>
</div>

