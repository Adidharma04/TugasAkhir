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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Table Profile</li>
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
              <div class="card-header">
                <h3 class="card-title">Table Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="col-md-3">
                                <a href='#'><button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i> Tambah</button></a>
                            </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Last logged</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($profile as $prf) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $prf->username ?></td>
                        <td><?= $prf->level ?></td>
                        <td><?= $prf->last_logged ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Last logged</th>
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