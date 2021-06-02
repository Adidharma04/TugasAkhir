
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Kritik dan Saran</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Kritik dan Saran</li>
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
            <h3 class="card-title">Form Edit Kritik Saran</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kritik">Kritik</label>
                        <textarea type="text" class="form-control" id="kritik" name="kritik" cols="30" rows="6" placeholder="Masukkan Kritik untuk Sekolah"><?= $penilaian->kritik?></textarea>
                            <?= form_error('kritik','<small class="text-danger">','</small>');?>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="saran">Saran</label>
                        <textarea type="text" class="form-control" id="saran" name="saran" cols="30" rows="6" placeholder="Masukkan Saran untuk Sekolah"><?= $penilaian->saran?></textarea>
                        <?= form_error('saran','<small class="text-danger">','</small>');?>
                    </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url("alumni/penilaian")?>" class="btn btn-danger">Cancel</a></span>
                  </div>
              </div>

            </form>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
 <br><br>