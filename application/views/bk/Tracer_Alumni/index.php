
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Data Tracer Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bk/dashboard_bk') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tracer Alumni</li>
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
                <h3 class="card-title">Tracer Alumni</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Alumni</th>
                      <th>NIS</th>
                      <th>Tahun Lulus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($tracer_alumni->result() as $tkul) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><a target="_blank" href="<?php echo base_url('bk/tracer_alumni/detail/'. $tkul->id_profile) ?>"><?= $tkul->nama ?></a></td>
                        <td><?= $tkul->nis ?></td>
                        <td><?= $tkul->tahun_lulus?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Alumni</th>
                                        <th>NIS</th>
                                        <th>Tahun Lulus</th>
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
  <br><br>