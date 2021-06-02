
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
              <div class="row">
                  <div class="col-md-6">
                  <label>Nama Pekerjaan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan beserta Jabatan" value="<?= $loker->nama_pekerjaan; ?>">
                        <?= form_error('nama_pekerjaan','<small class="text-danger">','</small>');?>
                    </div>
                  </div>
                  <div class="col-md-6">
                  <label>Alamat Pekerjaan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Perusahaan" value="<?= $loker->alamat; ?>" >
                        <?= form_error('alamat','<small class="text-danger">','</small>');?>
                    </div>
                  </div>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="form-group">
                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                <textarea class="form-control" name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" cols="30" rows="6" placeholder="Masukkan Deskripsi Pekerjaan"> <?= $loker->deskripsi_pekerjaan; ?> </textarea>
                  <?= form_error('deskripsi_pekerjaan', '<small class="text-danger">', '</small>'); ?>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <h4>Foto Lowongan Kerja</h4>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="foto" name="foto" value="<?= $loker->foto; ?>">
                        <label class="custom-file-label" for="foto" value="">
                          <?php
                          $img = base_url('assets/Gambar/Website/default_job.png');
                          if ($loker->foto == "") : ?>
                            Pilih File
                          <?php else : ?>
                            <?= $loker->foto;
                            $img = base_url('assets/Gambar/Upload/Loker/' . $loker->foto); ?>
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
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <h4>Berkas Lowongan Kerja</h4>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="berkas" name="berkas" value="<?= $loker->berkas; ?>">
                        <label class="custom-file-label" for="berkas" value="">
                          <?php
                          $img = base_url('assets/Gambar/Website/default_document.png');
                          if ($loker->berkas == "") : ?>
                            Pilih File
                          <?php else : ?>
                            <?= $loker->berkas;
                            $img = base_url('assets/Gambar/Upload/Loker/' . $loker->berkas); ?>
                          <?php endif ?>
                        </label>
                      </div>
                    </div>
                    <small>Tambahkan foto apabila dibutuhkan</small>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <hr>
              <!-- Batas Baris -->
              <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url() . 'alumni/sharing_loker' ?>" class="btn btn-danger">Cancel</a></span>
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
    
    <br><br>