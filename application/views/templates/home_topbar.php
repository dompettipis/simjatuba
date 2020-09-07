<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('home'); ?>"> SIMJATUBA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         
         <?php if (!$this->session->userdata('email')) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('home'); ?>">Home</a>
            </li>
             <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
            </li>
           <?php }else{ ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('home/profile'); ?>">Profile</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('home/pesanan'); ?>">Pemesanan</a>
            </li>
            
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('mandor'); ?>">Daftar Mandor</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('home/tentang'); ?>">Tentang</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">Logout</a>
            </li>
            <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
