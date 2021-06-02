<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- .container-fluid -->
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Siswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data Siswa</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Card -->
      <div class="card">

        <!-- Card Header -->
        <div class="card-header alert-warning">
          <h3 class="card-title"><i class="fa fa-edit"> Form Tambah Data Siswa</i></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>

        </div>
        <!-- ./Card Header -->

        <!-- Card Body -->
        <div class="card-body">
          <div class="alert " style="background-color:blanchedalmond">
            <h5><i class="icon fas fa-info"></i>Ketentuan Pengisian Data</h5>
            <p>
              <li>Isi data dengan benar</li>
              <li>Ukuran Foto 3x4 cm</li>
              <li>Nama file berupa Nis (contoh: 123456.jpg)</li>
              <li>Tanda (<font color="red"><b>*</b></font>) Wajib untuk di isi! </li>
              <b> Notes : </b>
              Penjelasan Verifikasi Alumni :
              
            </p>
          </div>
          <form action="" method="post" enctype="multipart/form-data">

            <!-- Batas Baris -->
            <div class="row">
              <div class="col-md-6">
                <label for="nis">(<font color="red"><b>*</b></font>) No Induk Siswa :</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                  </div>
                  <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Nomer Induk Siswa" value="<?= set_value('nis'); ?>">
                </div>
                <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col-md-6">
                <label for="nama">(<font color="red"><b>*</b></font>) Nama :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= set_value('nama'); ?>">
                </div>
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <!-- Batas Baris -->
            <hr>
            <!-- Batas Baris -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>(<font color="red"><b>*</b></font>) Tanggal lahir :(Bulan/Hari/Tahun)</label>
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
                  <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="col-md-6">
                <label>(<font color="red"><b>*</b></font>) Tempat lahir :</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                  </div>
                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= set_value('tempat_lahir'); ?>">
                </div>
                <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <!-- Batas Baris -->
            <hr>
            <!-- Batas Baris -->
            <div class="row">
              <div class="col-md-6">
                <label>(<font color="red"><b>*</b></font>) Email :</label>
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Example@gmail.com" value="<?= set_value('email') ?>">
                </div>
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col-md-6">
                <label>(<font color="red"><b>*</b></font>) HP/Telepon :</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="number" class="form-control" id="no_telfon" name="no_telfon" placeholder="08xxxxxxx" value="<?= set_value('no_telfon') ?>">
                </div>
                <?= form_error('no_telfon', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <!-- Batas Baris -->
            <hr>
            <!-- Batas Baris -->
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="6" placeholder="Masukkan Alamat" ><?= set_value('alamat') ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
            <hr>
            <!-- Batas Baris -->
            <div class="row">
              <div class="col-md-8">
                    <label for="foto">Foto</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="foto" name="foto" value="">
                        <label class="custom-file-label" for="foto" value="">Pilih file</label>
                        <small>Tambahkan Foto jika ada!</small>
                    </div>
              </div>
              <div class="col-md-4">
                <label>Tahun Lulus :</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="<?= set_value('tahun_lulus') ?>">
                </div>
                <?= form_error('tahun_lulus', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <!-- Batas Baris -->
            <hr>
            <!-- Batas Baris -->
            <div class="row">
              <div class="col-md-4">
                <label>(<font color="red"><b>*</b></font>) Jurusan</label>
                <div class="form-group ">
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jurusan" value="ipa" <?= set_value('jurusan') == "ipa" ? "checked" : "" ?> id="ipa">
                    <label for="ipa" class="custom-control-label">IPA</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jurusan" value="ips" <?= set_value('jurusan') == "ips" ? "checked" : "" ?> id="ips">
                    <label for="ips" class="custom-control-label">IPS</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>(<font color="red"><b>*</b></font>) Jenis Kelamin</label>
                <div class="form-group ">
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jenis_kelamin" value="laki" <?= set_value('jenis_kelamin') == "laki" ? "checked" : "" ?> id="laki">
                    <label for="laki" class="custom-control-label">Laki-laki</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="jenis_kelamin" value="perempuan" <?= set_value('jenis_kelamin') == "perempuan" ? "checked" : "" ?> id="perempuan">
                    <label for="perempuan" class="custom-control-label">Perempuan</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- Batas Baris -->
            <hr>
            <!-- Batas Baris -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Submit</i></button>
                &nbsp;
                <span> <input type="reset" class="btn btn-danger" value="Reset" ></input></span>
                &nbsp;
                <span> <a href="<?= base_url("admin/siswa/tambah") ?>" class="btn btn-warning"><i class="fa fa-chevron-circle-left"> Cancel</i></a></span>
            </div>

          </form>
        </div>
        <!-- ./Card Body -->


        <!-- Card Footer -->
        <div class="card-footer">
          SMAN 1 PLOSO JOMBANG
        </div>
        <!-- /.Card-Footer-->

      </div>
      <!-- ./Card -->
  </section>
  <!-- /.Main content -->

  <!-- Content Wrapper. Contains page content -->
</div>

<br><br>