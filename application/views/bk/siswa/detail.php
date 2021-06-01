    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail Siswa</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Detail Siswa</li>
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
              <h2><?= $profil_siswa->nama ?><h2>
              <hr>
            </div>
            <div class="card-body pt-0" style="padding-right:100.7px;">
              <div class="row">
                <div class="col-7">
                  <h4 class="lead"><b> NIS : <?= $profil_siswa->nis ?></b></h4>
                  <p class="text-muted text-sm"><b>Tanggal Lahir : </b> <?= $profil_siswa->tanggal_lahir ?> </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>Alamat : </b> <?= $profil_siswa->alamat ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>HP/Telepon : </b> <?= $profil_siswa->no_telfon ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-cogs"></i></span> <b>Jurusan : </b> <?= $profil_siswa->jurusan ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <b>Email : </b> <?= $profil_siswa->email ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> <b>Tahun Lulus : </b> <?= $profil_siswa->tahun_lulus ?></li>
                    <br>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-venus"></i></span> <b>Jenis Kelamin : </b> <?= $profil_siswa->jenis_kelamin ?></li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                    <?php if ($profil_siswa->foto == "") : ?>
                      <img src="<?= base_url('assets/Gambar/Website/default_siswa.jpg') ?>" style="width:180px; height:200px;">
                    <?php else : ?>
                      <img src="<?= base_url('assets/Gambar/Upload/siswa/') . $profil_siswa->foto ?>" style="width:180px; height:200px; object-fit: cover">
                    <?php endif ?>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="<?= base_url() . 'bk/siswa' ?>" class="btn btn-sm btn-primary">
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