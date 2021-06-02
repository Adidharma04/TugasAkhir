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
                                <a href="<?php echo base_url("user/dashboard_user");?>"><img src=" <?php echo base_url().'assets/Gambar/Website/Dashboard/SMA_ploso.png';?>" alt=""></a>
                            </div>
                            <div class="login-content">
                                <a href="<?php echo base_url("admin/login");?>">Register / Login</a>
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
                                    <li><a href="<?php echo base_url("user/dashboard_user");?>">Beranda</a></li>
                                    <li><a href="<?php echo base_url("user/record_user");?>">Tracer</a></li>
                                    </li>
                                    <li><a href="#">Informasi</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo base_url('user/event_user')?>">Event</a></li>
                                            <li><a href="<?php echo base_url('user/informasi_umum')?>">Informasi Kuliah</a></li>
                                            <li><a href="<?php echo base_url('user/sharing_loker')?>">Informasi Loker</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url("user/kritik_saran_user");?>">Kritik & Saran</a></li>
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

</html>