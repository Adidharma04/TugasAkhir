<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/dist/css/adminlte.min.css' ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Table Penilaian</li>
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
                <h3 class="card-title">Table Penilaian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Profile</th>
                      <th>Kritik</th>
                      <th>Saran</th>
                      <th>Update at</th>
                      <th>Created at</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($penilaian as $pnl) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pnl->id_profile ?></td>
                        <td><?= $pnl->kritik ?></td>
                        <td><?= $pnl->saran ?></td>
                        <td><?= $pnl->update_at ?></td>
                        <td><?= $pnl->created_at ?></td>
                        <td>
                        <a href="<?= base_url().'Admin/penilaian/detail/'.$pnl->id_penilaian ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                        <a href="#"  data-toggle="modal" data-target="#action-delete-<?php echo $pnl->id_penilaian ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                    <!-- Modal delete -->
                                                    <div class="modal fade" id="action-delete-<?php echo $pnl->id_penilaian ?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">Id Profile : <span class="text-bold"><?php echo $pnl->id_profile ?></span></label> <br>

                                                                <hr>
                                                                <label>
                                                                    Apakah anda yakin ingin menghapus Kritik dan Saran ini <?php echo $pnl->id_profile ?> ? 
                                                                </label> <br>
                                                                <small>Kritik dan Saran yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <a href="<?php echo base_url('admin/penilaian/onDelete/'. $pnl->id_penilaian) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
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
                                        <th>Profile</th>
                                        <th>Kritik</th>
                                        <th>Saran</th>
                                        <th>Update at</th>
                                        <th>Created at</th>
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
</body>
<!-- jQuery -->
<script src="<?= base_url("assets/Template/Admin/plugins/jquery/jquery.min.js") ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets/Template/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url("assets/Template/Admin/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/jszip/jszip.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/pdfmake/pdfmake.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/pdfmake/vfs_fonts.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.html5.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.print.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.colVis.min.js") ?>"></script>

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</html>