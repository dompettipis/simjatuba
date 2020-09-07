<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-lg-3">

     <!--  <div class="card mt-4">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form action="<?= base_url('auth'); ?>" method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div> -->

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="<?= base_url('asset/img/sidebar/3.jpg') ?>" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="<?= base_url('asset/img/sidebar/1.jpg') ?>" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="<?= base_url('asset/img/sidebar/2.jpg') ?>" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
