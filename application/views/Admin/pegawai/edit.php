    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Data Pegawai</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Data Pegawai</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header alert-warning" >
            <h3 class="card-title">Form Edit Pegawai</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
              <div class="alert " style="background-color:blanchedalmond">
                  <h5><i class="icon fas fa-info"></i>Ketentuan Pengisian Data</h5>
                  <p>
                    <li>Isi data dengan benar</li>
                    <li>Tanda (<font color="red"><b>*</b></font>) Wajib untuk di isi! </li>
                  </p>
                  <h6>
                    <font color="red"><b>Notes : </b></font>
                  </h6>
                  <p>
                    Setelah Melakukan Registrasi Pegawai maka otomatis akan mendapatkan <br>
                    username dan password sebagai berikut :
                    <li>Username : (Nomor Induk Pegawai)</li>
                    <li>Password : bk (Nomor Induk Pegawai)</li>
                  <p>
                    Sebagai Contoh : <br>
                    No Induk Pegawai : 123456 <br>
                    Username &nbsp; &nbsp; : 123456 <br>
                    Password &emsp;: bk123456
                  </p>

                  </p>
              </div>

            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_pegawai" value="<?php echo $profil_pegawai->id_pegawai ?>" />
              <div class="row">
                <div class="col-md-6">
                  <label> (<font color="red"><b>*</b></font>)No Induk</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" name="no_induk" id="no_induk" placeholder="Masukkan No Induk Pegawai" value="<?= $profil_pegawai->no_induk;  ?>">
                  </div>
                  <?= form_error('no_induk', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                  <label for="nama">(<font color="red"><b>*</b></font>) Nama</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $profil_pegawai->nama; ?>">
                  </div>
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat">(<font color="red"><b>*</b></font>) Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="6" placeholder="Masukkan Alamat"><?= $profil_pegawai->alamat ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>(<font color="red"><b>*</b></font>) Tanggal lahir:(Month/Day/Year)</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $profil_pegawai->tanggal_lahir ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>(<font color="red"><b>*</b></font>) Tempat lahir:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                    </div>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $profil_pegawai->tempat_lahir ?>">
                  </div>
                  <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-6">
                  <label>(<font color="red"><b>*</b></font>) Email:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Example@gmail.com" value="<?= $profil_pegawai->email ?>">
                  </div>
                  <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                  <label>(<font color="red"><b>*</b></font>) No Telfon</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="number" class="form-control" id="no_telfon" name="no_telfon" placeholder="08xxxxxxx" value="<?= $profil_pegawai->no_telfon ?>">
                  </div>
                  <?= form_error('no_telfon', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">

                <div class="col-md-4">
                  <label>(<font color="red"><b>*</b></font>) Jenis Kelamin</label>
                  <div class="form-group ">
                    <?php if ($profil_pegawai->jenis_kelamin == "l") : ?>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jenis_kelamin" value="l" <?= set_value('jenis_kelamin') == "l" ? "checked" : "" ?> id="l" checked>
                        <label for="l" class="custom-control-label">Laki-laki</label>
                      </div>

                      <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jenis_kelamin" value="p" <?= set_value('jenis_kelamin') == "p" ? "checked" : "" ?> id="p">
                        <label for="p" class="custom-control-label">Perempuan</label>
                      </div>
                    <?php else : ?>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jenis_kelamin" value="l" <?= set_value('jenis_kelamin') == "l" ? "checked" : "" ?> id="l">
                        <label for="l" class="custom-control-label">Laki-laki</label>
                      </div>

                      <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jenis_kelamin" value="p" <?= set_value('jenis_kelamin') == "p" ? "checked" : "" ?> id="p" checked>
                        <label for="p" class="custom-control-label">Perempuan</label>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->

              <hr>
              <!-- Batas Baris -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Submit</i></button>
                &nbsp;
                <span> <a href="<?= base_url("admin/pegawai") ?>" class="btn btn-warning"><i class="fa fa-chevron-circle-left"> Cancel</i></a></span>
              </div>

            </form>
          </div>
          <!-- /.card-body -->

          <!-- /.card-footer-->
          <div class="card-footer">
            SMAN 1 PLOSO JOMBANG
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->

    </div>