  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Tracer Kerja</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Tracer Kerja</li>
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
            <h3 class="card-title">Form Tambah Tracer Kerja</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row">

                  <div class="col-md-4">
                  <label>Nama Perusahaan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Perusahaan" value="<?= set_value('nama_perusahaan'); ?>" >
                    </div>
                    <?= form_error('nama_perusahaan','<small class="text-danger">','</small>');?>
                  </div>

                  <div class="col-md-4">
                  <label>Jenis Perusahaan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" id="jenis_perusahaan" name="jenis_perusahaan"  placeholder="Masukkan Jenis Perusahaan" value="<?= set_value('jenis_perusahaan'); ?>" >
                    </div>
                    <?= form_error('jenis_perusahaan','<small class="text-danger">','</small>');?>
                  </div>

                  <div class="col-md-4">
                  <label>Alamat Perusahaan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="Masukkan Alamat Perusahaan" value="<?= set_value('alamat_perusahaan'); ?>" >
                    </div>
                    <?= form_error('alamat_perusahaan','<small class="text-danger">','</small>');?>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <label>Tahun Masuk</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun Masuk" value="<?= set_value('tahun_masuk'); ?>" >
                    </div>
                    <?= form_error('tahun_masuk','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-6">
                    <label>Tahun Keluar (Optional)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" id="tahun_keluar" name="tahun_keluar" placeholder="Tahun Keluar"  value="<?= set_value('tahun_keluar'); ?>" >
                    </div>
                  </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <label>Jabatan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan" value="<?= set_value('jabatan'); ?>" >
                        </div>
                        <?= form_error('jabatan','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status Karyawan</label>
                        <div class="form-check">
                            <input type="radio" name="status" value="active" > Aktif 
                        </div>
                        <div class="form-check">
                            <input type="radio" name="status" value="inactive" > Tidak Aktif
                        </div>
                        <?= form_error('status','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="col-md-6">
                    </div>
              </div>
              
              <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url("alumni/tracer")?>" class="btn btn-danger">Cancel</a></span>
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