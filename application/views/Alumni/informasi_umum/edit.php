
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Data Informasi Umum</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Informasi Umum</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <?php echo $this->session->flashdata('msg') ?>
          <div class="card-header alert-warning" >
            <h3 class="card-title">Form Edit Informasi Umum</h3>

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
                  <li>File foto harus berekstensi &emsp; .jpg/png/jpeg</li>
                </p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div div class="row">
                <div class="col-md-12">
                  <label for="nama_informasi">(<font color="red"><b>*</b></font>)Nama Informasi</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama_informasi" id="nama_informasi" placeholder="Masukkan Informasi" value="<?= $informasi_umum->nama_informasi; ?>">
                  </div>
                  <?= form_error('nama_informasi', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="form-group">
                <label for="deskripsi_informasi">(<font color="red"><b>*</b></font>)Deskripsi Informasi</label>
                <textarea type="text" class="form-control" id="deskripsi_informasi" name="deskripsi_informasi" cols="30" rows="6" placeholder="Masukkan Deskripsi Informasi"><?= $informasi_umum->deskripsi_informasi; ?></textarea>
                <?= form_error('deskripsi_informasi', '<small class="text-danger">', '</small>'); ?>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">
              <div class="col-md-8">
                  <div class="form-group">
                    <label>Foto Informasi Kuliah</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="foto" name="foto" value="<?= $informasi_umum->foto; ?>">
                        <label class="custom-file-label" for="foto" value="">
                          <?php
                          $img = base_url('assets/Gambar/Website/default_information_null.png');
                          if ($informasi_umum->foto == "") : ?>
                            Pilih File
                          <?php else : ?>
                            <?= $informasi_umum->foto;
                            $img = base_url('assets/Gambar/Upload/Informasi/' . $informasi_umum->foto); ?>
                          <?php endif ?>
                        </label>
                      </div>
                    </div>
                    <small>Tambahkan foto apabila dibutuhkan</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="<?php echo $img ?>" alt="preview" style="width: 50%; border-radius: 5px; border: 2px solid #e0e0e0">
                </div>
              </div>
              <div class="row ">
                <div class="col-md-8">
                  <div class="form-group">
                  <label>Berkas Dokumen Informasi Kuliah</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="berkas" name="berkas" value="<?= $informasi_umum->berkas; ?>">
                        <label class="custom-file-label" for="berkas" value="">
                          <?php
                          $img = base_url('assets/Gambar/Website/default_info.png');
                          if ($informasi_umum->berkas == "") : ?>
                            Pilih File
                          <?php else : ?>
                            <?= $informasi_umum->berkas;
                            $img = base_url('assets/Gambar/Upload/Informasi/' . $informasi_umum->berkas);?>
                          <?php endif ?>
                        </label>
                      </div>
                    </div>
                    <small>Tambahkan berkas apabila dibutuhkan</small>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url() . 'alumni/informasi_umum' ?>" class="btn btn-danger">Cancel</a></span>
                  </div>
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