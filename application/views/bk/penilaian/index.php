  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kritik dan Saran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bk/dashboard_bk') ?>">Home</a></li>
              <li class="breadcrumb-item active">Kritik dan Saran</li>
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
                <h3 class="card-title">Kritik dan Saran dari Alumni</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Alumni</th>
                      <th>Kritik</th>
                      <th>Saran</th>
                      <th>Dibuat pada</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($penilaian->result() as $pnl) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><a  href="<?php echo base_url('bk/siswa/detail/'. $pnl->id_siswa) ?>"><?= $pnl->nama.' <br> <small>NIS : '. $pnl->nis.'</small>' ?></a></td>
                        <td><?= $pnl->kritik ?></td>
                        <td><?= $pnl->saran ?></td>
                        <td><?= date('d F Y H.i A', strtotime($pnl->created_at)) ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Alumni</th>
                                        <th>Kritik</th>
                                        <th>Saran</th>
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
  <br><br>