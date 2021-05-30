  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/fontawesome-free/css/all.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/dist/css/adminlte.min.css' ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' ?>">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url().'Alumni/dashboard_alumni'?>" class="nav-link">Dashboard</a>
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
          <a href="<?php echo base_url('Admin/login/logout') ?>" class="btn btn-danger"><i class="fa fa-power-off"></i> Logout</a>
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