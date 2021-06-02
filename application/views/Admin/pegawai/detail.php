    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail Pegawai</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Detail Pegawai</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->

        <div class="col-19 col-lg-7 d-flex align-items-stretch" >
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
              <h2><?= $profil_pegawai->nama ?><h2>
              <hr>
            </div>
            <div class="card-body pt-0" style="padding-right:100.7px;">
              <div class="row">
                <div class="col-7">
                  <h4 class="lead"><b> <?= $profil_pegawai->no_induk ?></b></h4>
                  <p class="text-muted text-sm"><b>Tanggal Lahir: </b> <?= $profil_pegawai->tanggal_lahir ?> </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>Alamat : </b> <?= $profil_pegawai->alamat ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>No telfon : </b> <?= $profil_pegawai->no_telfon ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <b>Emai : </b> <?= $profil_pegawai->email ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-venus"></i></span> <b>Jenis Kelamin : </b> 
                    <?php if($profil_pegawai->jenis_kelamin=="l"):
                      echo "laki-laki";
                    ?>
                    <?php else: 
                      echo"perempuan"
                    ?>
                    <?php endif ?>
                    </li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                      <img src="<?= base_url('assets/Gambar/Website/admin.png') ?>" style="width:200px; height:200px;">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="<?= base_url() . 'admin/pegawai' ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-arrow-left"></i> Kembali
                </a>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>
    <br><br>