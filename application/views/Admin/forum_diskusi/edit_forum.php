<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Data Forum Diskusi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Forum Diskusi</li>
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
        <h3 class="card-title">Form Edit Forum Diskusi</h3>

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
          <input type="hidden" name="id_forum" value="<?php echo $forum->id_forum ?>" />

          <div div class="row">
            <div class="col-md-6">
              <label for="nama_informasi">Nama Forum</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <input type="text" class="form-control" name="nama_forum" id="nama_forum" placeholder="Masukkan Nama Forum" value="<?= $forum->nama_forum; ?>">
              </div>
              <?= form_error('nama_forum', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="col-md-6">
              <label for="nama_informasi">Topik Forum</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <select name="id_topik" class="form-control">
                  <?php foreach ($topik->result_array() as $row) : ?>
                    <option value="<?php echo $row['id_topik'] ?>" <?php if ($forum->id_topik == $row['id_topik']) {
                                                                      echo 'selected="selected"';
                                                                    } ?>><?php echo $row['nama'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= form_error('id_topik', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <!-- Batas Baris -->
          <div class="row">
            <div class="col-md-12">
              <label for="deskripsi">Deskripsi Forum</label>
              <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" cols="30" rows="6" placeholder="Masukkan Deskripsi Forum Diskusi"><?= $forum->deskripsi ?></textarea>
              <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Foto Forum</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input form-control" id="foto" name="foto" value="<?= $forum->foto; ?>">
                    <label class="custom-file-label" for="foto" value="">
                      <?php
                      $img = base_url('assets/Gambar/Website/default_forum_null.png');
                      if ($forum->foto == "") : ?>
                        Pilih File
                      <?php else : ?>
                        <?= $forum->foto;
                        $img = base_url('assets/Gambar/Upload/Forum/' . $forum->foto); ?>
                      <?php endif ?>
                    </label>
                  </div>
                </div>
                <small>Tambahkan foto apabila dibutuhkan</small>
              </div>
            </div>
            <div class="col-md-3">
              <img src="<?php echo $img ?>" alt="preview" style="width: 70%; border-radius: 5px; border: 2px solid #e0e0e0">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">Submit</button>
              <span> <a href="<?= base_url() . 'admin/forum_diskusi' ?>" class="btn btn-danger">Cancel</a></span>
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