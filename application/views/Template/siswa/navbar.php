<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/css/animate.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/css/classy-nav.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/css/custom-icon.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/css/magnific-popup.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/css/owl.carousel.min.css';?>">

</head>
<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="<?php echo base_url("siswa/dashboard_siswa");?>"><img src=" <?php echo base_url().'assets/Gambar/Website/Dashboard/SMA_ploso.png';?>" alt=""></a>
                            </div>
                            <div class="login-content">
                            <a href="nav-link" data-toggle="modal" data-target="#action-logout"> HAI, <?php echo ucfirst($this->session->userdata('sess_name')) ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo base_url("siswa/dashboard_siswa");?>">Beranda</a></li>
                                    <li><a href="<?php echo base_url("siswa/record_siswa");?>">Tracer</a></li>
                                    </li>
                                    <li><a href="#">Informasi</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo base_url('siswa/event_siswa')?>">Event</a></li>
                                            <li><a href="<?php echo base_url('siswa/informasi_umum')?>">Informasi Kuliah</a></li>
                                            <li><a href="<?php echo base_url("siswa/sharing_loker")?>">Informasi Loker</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url("siswa/kritik_saran_siswa");?>">Kritik & Saran</a></li>
                                    <li><a href="<?php echo base_url("siswa/forum_diskusi");?>">Forum Diskusi</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:0321-888814"><i class="icon-telephone-2"></i> <span>0321-888814</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
</body>

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
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <a href="<?php echo base_url('admin/login/logout') ?>" class="btn btn-success"><i class="fa fa-power-off"></i> Logout</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

</html>