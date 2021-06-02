<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Forum Diskusi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Forum</li>
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
        <h3 class="card-title">Form Tambah Forum Diskusi</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
          <!-- Batas Baris -->
          <div div class="row">
            <div class="col-md-6">
              <label for="nama_informasi">Nama Forum</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <input type="text" class="form-control" name="nama_forum" id="nama_forum" placeholder="Masukkan Nama Forum" value="<?= set_value('nama_forum'); ?>">
              </div>
              <?= form_error('nama_forum', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <label for="nama_informasi">Topik Forum</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <!-- <input type="text" class="form-control" name="id_topik" id="id_topik" placeholder="Masukkan Id Topik" value="<?= set_value('id_topik'); ?>"> -->
                <select name="id_topik" class="form-control">
                  <?php foreach ($topik->result_array() as $row) : ?>
                    <option value="<?php echo $row['id_topik'] ?>"><?php echo $row['nama'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= form_error('id_topik', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          <!-- Batas Baris -->
          <hr>
          <!-- Batas Baris -->
          <div class="row">
            <div class="col-md-12">
              <label for="deskripsi">Deskripsi Forum</label>
              <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" cols="30" rows="6" placeholder="Masukkan Deskripsi Forum Diskusi"><?= set_value('deskripsi'); ?></textarea>
              <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Upload Foto</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input form-control" id="foto" name="foto" value="">
                    <label class="custom-file-label" for="foto" value="">Choose file</label>
                  </div>
                </div>
                <small>Upload foto yang anda inginkan</small>
              </div>
            </div>
          </div>
          <!-- Batas Baris -->

          <div class="row">
            <div class="form-group">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Submit</i></button>
              &nbsp;
              <span> <a href="<?= base_url("alumni/forum_diskusi") ?>" class="btn btn-warning"><i class="fa fa-chevron-circle-left"> Cancel</i></a></span>
            </div>
          </div>

        </form>
      </div>
      <!-- /.card-body -->

      <!-- Card Footer -->
      <div class="card-footer">
        SMAN 1 PLOSO JOMBANG
      </div>
      <!-- /.Card-Footer-->
    </div>
    <!-- /.card -->

  </section>


</div>
<!-- /.content -->
<br><br>