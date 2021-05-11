 <!-- Main content -->
 <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header" style="background-color:blanchedalmond">
            <h3 class="card-title">Form Registrasi Pegawai</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-6">
                  <label>No Induk</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" name="no_induk" id="no_induk" placeholder="Masukkan No Induk Pegawai" value="<?= set_value('no_induk'); ?>" >
                  </div>
                  <?= form_error('no_induk', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                  <label for="nama">Nama</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= set_value('nama'); ?>" >
                  </div>
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="6" placeholder="Masukkan Alamat" ><?= set_value("alamat")?></textarea>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal lahir:(Month/Day/Year)</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Tempat lahir:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                    </div>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= set_value('tempat_lahir'); ?>">
                  </div>
                  <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                  <div class="col-md-6">
                      <label>Email:</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                          <input type="text" class="form-control" name="email" id="email" placeholder="Example@gmail.com" value="<?= set_value('email'); ?>" >
                      </div>
                      <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="col-md-6">
                      <label>No Telfon</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                        <input type="number" class="form-control" id="no_telfon" name="no_telfon" placeholder="08xxxxxxx" value="<?= set_value('no_telfon') ?>" >
                      </div>
                      <?= form_error('no_telfon', '<small class="text-danger">', '</small>'); ?>
                  </div>
              </div>
              <!-- Batas Baris -->
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <div class="form-check">
                      <input type="radio" name="jenis_kelamin" value="l" <?= set_value('jenis_kelamin') == "l" ? "checked" : "" ?>> Laki-Laki
                    </div>
                    <div class="form-check">
                      <input type="radio" name="jenis_kelamin" value="p" <?= set_value('jenis_kelamin') == "p" ? "checked" : "" ?>> Perempuan
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <span> <a href="<?= base_url("Admin/pegawai")?>" class="btn btn-danger">Cancel</a></span>
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