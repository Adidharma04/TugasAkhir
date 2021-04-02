<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url().'assets/Gambar/Website/Title_SMA.png'?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMA Negeri Ploso</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ucfirst($this->session->userdata('sess_name')) ?></a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="<?php echo base_url('bk/dashboard_bk')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('bk/penilaian')?>" class="nav-link">
              <i class="nav-icon fa fa-comments-o"></i>
              <p>
              Kritik dan Saran
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Pesan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forum Diskusi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kirim Notifikasi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Validasi</li>
          <li class="nav-item">
            <a href="<?= base_url().'bk/event'?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'bk/informasi_umum'?>" class="nav-link">
              <i class="nav-icon far fa-newspaper-o"></i>
              <p>
                Informasi Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'bk/sharing_loker'?>" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Lowongan Kerja
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("bk/siswa")?>" class="nav-link">
              <i class="nav-icon fa fa-Book"></i>
              <p>
                Registrasi Siswa
              </p>
            </a>
          </li>
          <li class="nav-header">Track Record</li>
          <li class="nav-item">
            <a href="<?php echo base_url("bk/record_kuliah")?>" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Record Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("bk/record_kerja")?>" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Record Kerja
              </p>
            </a>
          </li>
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
<!-- jQuery -->
<script src="<?= base_url("assets/Template/Admin/plugins/jquery/jquery.min.js")?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url("assets/Template/Admin/plugins/jquery-ui/jquery-ui.min.js")?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets/Template/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url("assets/Template/Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assets/Template/Admin/dist/js/adminlte.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url("assets/Template/Admin/dist/js/demo.js")?>"></script>