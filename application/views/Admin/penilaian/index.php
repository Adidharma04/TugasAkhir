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
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a></li>
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
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($penilaian->result() as $pnl) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><a target="_blank" href="<?php echo base_url('admin/siswa/detail/' . $pnl->id_siswa) ?>"><?= $pnl->nama . ' <br> <small>NIS : ' . $pnl->nis . '</small>' ?></a></td>
                        <td><?= $pnl->kritik ?></td>
                        <td><?= $pnl->saran ?></td>
                        <td><?= date('d F Y H.i A', strtotime($pnl->created_at)) ?></td>
                        <td>
                        <a href="#" data-toggle="modal" data-target="#action-delete-<?php echo $pnl->id_penilaian ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                         <!-- Modal delete -->
                         <div class="modal fade" id="action-delete-<?php echo $pnl->id_penilaian ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <b>Hapus Kritik dan Saran</b>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini? <br> 
                                  </label> <br>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <a href="<?php echo base_url('admin/penilaian/onDelete/' . $pnl->id_penilaian) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                        </td>
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
                      <th>Opsi</th>
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