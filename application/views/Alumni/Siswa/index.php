    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Data Siswa</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Data Siswa</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header alert-warning">
            <h3 class="card-title">Form Edit Data Siswa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php echo $this->session->flashdata('msg') ?>

            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label>Nis</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Nomer Induk Siswa" value="<?= $profil_siswa->nis; ?>">
                    <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="nama">Nama</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $profil_siswa->nama; ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="6" placeholder="Masukkan Alamat"> <?= $profil_siswa->alamat; ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal lahir:(Month/Day/Year)</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $profil_siswa->tanggal_lahir; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Tempat lahir:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                    </div>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $profil_siswa->tempat_lahir; ?>">
                    <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                  <div class="col-md-4">
                      <label>Email:</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Example@gmail.com" value="<?= $profil_siswa->email; ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label>HP/Telepon</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                        <input type="number" class="form-control" id="no_telfon" name="no_telfon" placeholder="08xxxxxxx" value="<?= $profil_siswa->no_telfon; ?>">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <label>Tahun Lulus</label>
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="<?= $profil_siswa->tahun_lulus; ?>">
                        <?= form_error('tahun_lulus', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>
               </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <h4>Foto Siswa</h4>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto" value="<?= $profil_siswa->foto; ?>">
                        <label class="custom-file-label" for="foto">
                          <?php
                          $img = base_url('assets/Gambar/Website/default_siswa.jpg');
                          if ($profil_siswa->foto == "") : ?>
                            Choose File
                          <?php else : ?>
                            <?= $profil_siswa->foto;
                            $img = base_url('assets/Gambar/Upload/Siswa/' . $profil_siswa->foto); ?>
                          <?php endif ?>
                        </label>
                      </div>
                    </div>
                    <small>Tambahkan foto apabila dibutuhkan</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="<?php echo $img ?>" alt="preview" style="width: 30%; border-radius: 5px; border: 2px solid #e0e0e0">
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <?php if ($profil_siswa->jurusan == "ipa") : ?>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ipa" checked> Ipa
                      </div>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ips"> Ips
                      </div>
                    <?php else : ?>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ipa"> Ipa
                      </div>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ipa" checked> Ips
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                      <?php if ($profil_siswa->jenis_kelamin == "laki") : ?>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="laki" checked> Laki-Laki
                          </div>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan
                          </div>
                      <?php else : ?>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="laki"> Laki-Laki
                          </div>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="perempuan" checked> Perempuan
                          </div>
                      <?php endif ?>
                  </div>
                </div>

              </div>
              <!-- Batas Baris -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <span> <a href="<?= base_url("Alumni/dashboard_alumni")?>" class="btn btn-danger">Cancel</a></span>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            SMAN 1 PLOSO JOMBANG
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <br><br>