<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" >
<!-- Wrapper -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<div class="wrapper">
<?php
  $uriSegment = $this->uri->segment(2);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url().'bk/dashboard_bk/'?>" class="brand-link">
      <img src="<?= base_url().'assets/Gambar/Website/Title_SMA.png'?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMA Negeri Ploso</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
              $image="";

              if($this->session->userdata('sess_jenis_kelamin')=="l"){
                $image = base_url("assets/Gambar/Website/pegawai_laki.png");
              }else if($this->session->userdata('sess_jenis_kelamin')=="p"){
                $image = base_url("assets/Gambar/Website/pegawai_perempuan.png");
              } 
          ?>
          <img src="<?= $image ?>">
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
            <a href="<?php echo base_url('bk/dashboard_bk')?>" class="nav-link <?php if ($uriSegment == "dashboard_bk") echo 'active'; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('bk/penilaian')?>" class="nav-link <?php if ($uriSegment == "penilaian") echo 'active'; ?>">
              <i class="nav-icon fa fa-comments-o"></i>
              <p>
              Kritik dan Saran
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'bk/forum_diskusi'?>" class="nav-link <?php if ($uriSegment == "forum_diskusi") echo 'active'; ?>" >
              <i class="nav-icon fa fa-comments"></i>
              <p>
                Forum Diskusi
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'bk/tracer_alumni'?>" class="nav-link <?php if ($uriSegment == "tracer_alumni") echo 'active'; ?>">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Tracer Alumni
              </p>
            </a>
          </li>
          <li class="nav-header">Validasi</li>
          <li class="nav-item">
            <a href="<?= base_url().'bk/event'?>" class="nav-link <?php if ($uriSegment == "event") echo 'active'; ?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'bk/informasi_umum'?>" class="nav-link <?php if ($uriSegment == "informasi_umum") echo 'active'; ?>">
              <i class="nav-icon far fa-newspaper-o"></i>
              <p>
                Informasi Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'bk/sharing_loker'?>" class="nav-link <?php if ($uriSegment == "sharing_loker") echo 'active'; ?>">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Lowongan Kerja
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("bk/siswa")?>" class="nav-link <?php if ($uriSegment == "siswa") echo 'active'; ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Registrasi Siswa
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>