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
        <?php
                      
                      $img = "";
                      $sess_img = $this->session->userdata('sess_foto');

                      if ( !$sess_img == "" ) {

                        // foto default 
                        if ( $this->session->userdata('sess_gender') == "laki" ) {

                          $img = base_url('assets/Gambar/Website/male.png');
                        } else {

                          $img = base_url('assets/Gambar/Website/female.png');
                        }
                      } else {

                        // terdapat foto
                        $img = base_url('assets/Gambar/Upload/siswa/'. $sess_img);
                      }
                    ?>

                      <img src="<?= $img ?>" style="width: 50px; border-radius: 5px; border: 1.5px solid #e0e0e0">

        </div>
        <div class="info">
          <a href="<?= base_url("Alumni/dashboard_alumni")?>" class="d-block"><?php echo ucfirst($this->session->userdata('sess_name')) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dashboard_admin')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-header">Tracer History</li>
          <li class="nav-item">
            <a href="<?= base_url().''?>" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Tracer Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().''?>" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
               Tracer Kerja
              </p>
            </a>
          </li>
          <li class="nav-header">INFORMASI</li>
          <li class="nav-item">
            <a href="<?= base_url().'Alumni/Event'?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'Alumni/penilaian'?>" class="nav-link">
              <i class="nav-icon far fa-comments"></i>
              <p>
                Kritik dan Saran
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'Alumni/Informasi_umum'?>" class="nav-link">
              <i class="nav-icon far fa-newspaper-o"></i>
              <p>
                Informasi Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'Alumni/sharing_loker'?>" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Lowongan Kerja
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