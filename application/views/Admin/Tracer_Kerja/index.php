  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tracer Kerja</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tracer Kerja</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <?php echo $this->session->flashdata('msg') ?>
              <div class="card-header">
                <h3 class="card-title">Tracer Kerja</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Alumni</th>
                      <th>Nama Perusahaan</th>
                      <th>Jabatan</th>
                      <th>Tahun Masuk</th>
                      <th>Dibuat pada</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($tracer_kerja->result() as $tker) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><a target="_blank" href="<?php echo base_url('admin/siswa/detail/'. $tker->id_siswa) ?>"><?= $tker->nama.' <br> <small>NIS : '. $tker->nis.'</small>' ?></a></td>
                        <td><?= $tker->nama_perusahaan ?></td>
                        <td><?= $tker->jabatan ?></td>
                        <td><?= $tker->tahun_masuk ?></td>
                        <td><?= date('d F Y H.i A', strtotime($tker->created_at)) ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Alumni</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Jabatan</th>
                                        <th>Tahun Masuk</th>
                                        <th>Dibuat pada</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->