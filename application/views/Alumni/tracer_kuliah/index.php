    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Tracer Kuliah</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Tracer Kuliah</li>
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
            <h3 class="card-title">Form Tambah Tracer Kuliah</h3>

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
                  <label>Nama Kampus</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        <input type="text" class="form-control" id="nama_kampus" name="nama_kampus" placeholder="Masukkan Nama Kampus" value="<?= set_value('nama_kampus'); ?>" >
                    </div>
                    <?= form_error('nama_kampus','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-4">
                  <label>Prodi(Program Study)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="program_studi" id="program_studi" placeholder="Masukkan Program Study" value="<?= set_value('program_studi'); ?>" >
                    </div>
                    <?= form_error('program_studi','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-4">
                  <label>Jurusan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan" value="<?= set_value('jurusan'); ?>" >
                    </div>
                    <?= form_error('jurusan','<small class="text-danger">','</small>');?>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <label>Tahun Masuk</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" value="<?= set_value('tahun_masuk'); ?>" >
                    </div>
                    <?= form_error('tahun_masuk','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-6">
                    <label>Tahun lulus</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="<?= set_value('tahun_lulus'); ?>" >
                    </div>
                    <?= form_error('tahun_lulus','<small class="text-danger">','</small>');?>
                  </div>
                  
              </div>
               <!-- Batas Baris -->
               <div class="form-group">
                    <label for="status">Jalur Penerimaan</label>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="snmptn" > SNMPTN 
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="sbmptn" > SBMPTN
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="snmpn" > SNMPN
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="sbmpn" > SBMPN
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="mandiri" > Mandiri
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="ikatan_dinas" > Ikatan Dinas
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="kedinasan" > Kedinasan
                    </div>
                    <?= form_error('jalur_penerimaan','<small class="text-danger">','</small>');?>
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