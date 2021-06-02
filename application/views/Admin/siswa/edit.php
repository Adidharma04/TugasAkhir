
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
                <li class="breadcrumb-item active">Edit Siswa</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <?php echo $this->session->flashdata('msg') ?>
        <div class="card">
          <div class="card-header alert-warning" >
            <h3 class="card-title">Form Edit Siswa</h3>
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
                <li>Ukuran Foto 3x4 cm</li>
                <li>Nama file berupa Nis (contoh: 123456.jpg)</li>
                <li>Tanda (<font color="red"><b>*</b></font>) Wajib untuk di isi! </li>
                <b> Notes : </b>
                <p> Penjelasan Verifikasi Alumni :</p>
                <li>Siswa    &emsp; : Masih menjadi siswa </li>  
                <li>Pengajuan : Mengajukan Menjadi Aumni </li> 
                <li>Di Terima &nbsp; : Sudah Menjadi Alumni </li>
              </p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-6">
                  <label>(<font color="red"><b>*</b></font>)Nis</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Nomer Induk Siswa" value="<?= $profil_siswa->nis; ?>">
                  </div>
                  <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                  <label for="nama">(<font color="red"><b>*</b></font>)Nama</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $profil_siswa->nama; ?>">
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
                    <label for="alamat">(<font color="red"><b>*</b></font>)Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="6" placeholder="Masukkan Alamat"> <?= $profil_siswa->alamat; ?></textarea>
                  </div>
                  <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>(<font color="red"><b>*</b></font>)Tanggal lahir:(Month/Day/Year)</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $profil_siswa->tanggal_lahir; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>(<font color="red"><b>*</b></font>)Tempat lahir:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-globe"></i></span>
                    </div>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $profil_siswa->tempat_lahir; ?>">
                    <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                  <div class="col-md-4">
                      <label>(<font color="red"><b>*</b></font>)Email:</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Examample@gmail.com" value="<?= $profil_siswa->email; ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label>(<font color="red"><b>*</b></font>)No Telfon</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                        <input type="number" class="form-control" id="no_telfon" name="no_telfon" placeholder="08xxxxxxx" value="<?= $profil_siswa->no_telfon; ?>">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <label>(<font color="red"><b>*</b></font>)Tahun Lulus</label>
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
              <hr>
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
                            Pilih File
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
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="jurusan">(<font color="red"><b>*</b></font>)Jurusan</label>
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
                      <label for="alumni">(<font color="red"><b>*</b></font>)Verifikasi Alumni</label>
                      <?php if ($profil_siswa->verifikasi_alumni == "null") : ?>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="null" checked> Siswa
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="pengajuan"> Pengajuan
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="diterima"> Alumni
                          </div>
                      <?php elseif ($profil_siswa->verifikasi_alumni == "pengajuan") : ?>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="null" > Siswa
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="pengajuan" checked> Pengajuan
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="diterima"> Alumni
                          </div>
                      <?php else : ?>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="null" > Siswa
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="pengajuan"> Pengajuan
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="diterima" checked> Alumni
                          </div>
                      <?php endif ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gender">(<font color="red"><b>*</b></font>)Jenis Kelamin</label>
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
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Submit</i></button>
                &nbsp;
                <span> <a href="<?= base_url("admin/siswa") ?>" class="btn btn-warning"><i class="fa fa-chevron-circle-left"> Cancel</i></a></span>
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