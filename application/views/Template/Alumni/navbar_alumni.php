<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/dist/css/adminlte.min.css' ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/select2/css/select2.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/dist/css/adminlte.min.css' ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ?>">

    <!-- jQuery -->
    <script src="<?= base_url("assets/Template/Admin/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url("assets/Template/Admin/plugins/jquery-ui/jquery-ui.min.js") ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
</head>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url().'alumni/dashboard_alumni'?>" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link btn " data-toggle="modal" data-target="#action-contact">
          Kontak
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link btn " data-toggle="modal" data-target="#action-logout">
          <font style="color:black; size:5px"><i class="nav-icon fa fa-power-off fa-1x"> Logout </i></font>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Modal Logout -->
  <div class="modal fade" id="action-logout">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <b>Logout</b>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label>
            Apakah anda ingin keluar dari halaman ini?
          </label> <br>
          <small>Yakin ingin keluar.</small>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <a href="<?php echo base_url('admin/login/logout') ?>" class="btn btn-danger"><i class="fa fa-power-off"></i> Logout</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Contact -->
  <div class="modal fade" id="action-contact">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <b>Kontak</b>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label>
            Hubungi Administrator Jika ada kesulitan menggunakan sistem
          </label> <br>
        </div>
        <div class="modal-footer justify-content-between">
          <small><strong>Copyright &copy; SMA NEGERI PLOSO <a href="http://www.smanegeriploso.sch.id/">smanegeriploso.sch.id</a>.</strong>
      All rights reserved.</small>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->