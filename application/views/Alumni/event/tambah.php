
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Event</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Event</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header alert-warning" >
            <h3 class="card-title">Form Tambah Event</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <?php echo $this->session->flashdata('msg') ?>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div div class="row">
                  <div class="col-md-6">
                    <label for="nama_event">Nama Event</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Masukkan Nama Event" value="<?= set_value('nama_event'); ?>" >
                    </div>
                    <?= form_error('nama_event','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-6">
                    <label for="lokasi">Lokasi</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-globe"></i></span>
                          </div>
                          <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi Event" value="<?= set_value('lokasi'); ?>" >
                      </div>
                      <?= form_error('lokasi','<small class="text-danger">','</small>');?>
                  </div>

                </div>
                <!-- Batas Baris -->
                <div class="form-group">
                    <label for="deskripsi_event">Deskripsi Event</label>
                    <textarea type="text" class="form-control" id="deskripsi_event" name="deskripsi_event" cols="30" rows="6" placeholder="Masukkan Deskripsi Event"><?= set_value('deskripsi_event'); ?></textarea>
                    <?= form_error('deskripsi_event','<small class="text-danger">','</small>');?>
                </div>
                <!-- Batas Baris -->
                <div div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Event:(Month/Day/Year)</label>
                      <input type="date" class="form-control" id="tanggal_event" name="tanggal_event" value="<?= set_value('tanggal_event'); ?>" min="<?php echo date('Y-m-d') ?>" required="">
                      <?= form_error('tanggal_event','<small class="text-danger">','</small>');?>
                    </div>
                  </div>
                  <div class="col-md-6">
                  <label for="foto">Foto</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto">
                      <label class="custom-file-label" for="foto">Pilih file</label>
                      <small>Tambahkan Foto jika ada!</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url("alumni/event")?>" class="btn btn-danger">Cancel</a></span>
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