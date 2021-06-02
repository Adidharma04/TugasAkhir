
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
        <?php echo $this->session->flashdata('msg') ?>
          <div class="card-header alert-warning">
            <h3 class="card-title">Form Tambah Event</h3>

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
                  <div class="col-md-6">
                    <label for="nama_event">(<font color="red"><b>*</b></font>)Nama Event</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Masukkan Nama Event" value="<?= set_value('nama_event'); ?>" >
                    </div>
                    <?= form_error('nama_event','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-6">
                    <label for="lokasi">(<font color="red"><b>*</b></font>)Lokasi</label>
                      <div class="input-group ">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-globe"></i></span>
                          </div>
                          <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi Event" value="<?= set_value('lokasi'); ?>" >
                      </div>
                      <?= form_error('lokasi','<small class="text-danger">','</small>');?>
                  </div>
                </div>
                <!-- Batas Baris -->
                <hr>
                <!-- Batas Baris -->
                <div class="form-group">
                    <label for="deskripsi_event">(<font color="red"><b>*</b></font>)Deskripsi Event</label>
                    <textarea type="text" class="form-control" id="deskripsi_event" name="deskripsi_event" cols="30" rows="6" placeholder="Masukkan Deskripsi Event"><?= set_value('deskripsi_event'); ?></textarea>
                    <?= form_error('deskripsi_event','<small class="text-danger">','</small>');?>
                </div>
                <!-- Batas Baris -->
                <hr>
                <!-- Batas Baris -->
                <div div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>(<font color="red"><b>*</b></font>)Tanggal Event:(Month/Day/Year)</label>
                      <input type="date" class="form-control" id="tanggal_event" name="tanggal_event" value="<?= set_value('tanggal_event'); ?>" min="<?php echo date('Y-m-d') ?>" required="">
                      <?= form_error('tanggal_event','<small class="text-danger">','</small>');?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Foto Event</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="foto" name="foto" value="">
                          <label class="custom-file-label" for="foto" value="">Pilih file</label>
                        </div>
                      </div>
                      <small>Tambahkan foto apabila dibutuhkan</small>
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
                  <span> <a href="<?= base_url("admin/event") ?>" class="btn btn-warning"><i class="fa fa-chevron-circle-left"> Cancel</i></a></span>
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