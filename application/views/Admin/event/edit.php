
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Data Event</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Event</li>
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
            <h3 class="card-title">Form Edit Event</h3>

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
                  <label for="nama_event">Nama Event</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Masukkan Nama Event" value="<?= $event->nama_event; ?>">
                  </div>
                  <?= form_error('nama_event', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                  <label for="lokasi">Lokasi</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-globe"></i></span>
                    </div>
                    <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi Event" value="<?= $event->lokasi; ?>">
                  </div>
                  <?= form_error('lokasi', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="form-group">
                <label for="deskripsi_event">Deskripsi Event</label>
                <textarea type="text" class="form-control" id="deskripsi_event" name="deskripsi_event" cols="30" rows="6" placeholder="Masukkan Deskripsi Event"><?= $event->deskripsi_event; ?></textarea>
                <?= form_error('deskripsi_event', '<small class="text-danger">', '</small>'); ?>
              </div>
              <!-- Batas Baris -->
              <div div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tanggal Event:(Month/Day/Year)</label>
                    <input type="date" class="form-control" id="tanggal_event" name="tanggal_event" value="<?= $event->tanggal_event; ?>">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Foto Event</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="foto" name="foto" value="<?= $event->foto; ?>">
                        <label class="custom-file-label" for="foto" value="">
                          <?php
                          $img = base_url('assets/Gambar/Website/default_event_null.png');
                          if ($event->foto == "") : ?>
                            Pilih File
                          <?php else : ?>
                            <?= $event->foto;
                            $img = base_url('assets/Gambar/Upload/Event/' . $event->foto); ?>
                          <?php endif ?>
                        </label>
                      </div>
                    </div>
                    <small>Tambahkan foto apabila dibutuhkan</small>
                  </div>
                </div>
                <div class="col-md-3">
                  <img src="<?php echo $img ?>" alt="preview" style="width: 60%; border-radius: 5px; border: 2px solid #e0e0e0">
                </div>
              </div>
              <div class="form-group">
                <label for="status">Status Kegiatan</label>
                <?php if ($event->status == "accept") : ?>
                  <div class="form-check">
                    <input type="radio" name="status" value="accept" checked> Diterima
                  </div>
                  <div class="form-check">
                    <input type="radio" name="status" value="pending"> Pending
                  </div>
                  <div class="form-check">
                    <input type="radio" name="status" value="decline"> Ditolak
                  </div>
                <?php elseif ($event->status == "pending") : ?>
                  <div class="form-check">
                    <input type="radio" name="status" value="accept"> Diterima
                  </div>
                  <div class="form-check">
                    <input type="radio" name="status" value="pending" checked> Pending
                  </div>
                  <div class="form-check">
                    <input type="radio" name="status" value="decline"> Ditolak
                  </div>
                <?php else : ?>
                  <div class="form-check">
                    <input type="radio" name="status" value="accept"> Diterima
                  </div>
                  <div class="form-check">
                    <input type="radio" name="status" value="pending"> Pending
                  </div>
                  <div class="form-check">
                    <input type="radio" name="status" value="decline" checked> Ditolak
                  </div>
                <?php endif ?>
              </div>
              <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url() . 'Admin/event' ?>" class="btn btn-danger">Cancel</a></span>
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