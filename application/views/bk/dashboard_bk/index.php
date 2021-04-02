<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
 
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bk/dashboard_bk')?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Siswa Laki</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>156</h3>

                <p>Siswa Perempuan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>2412</h3>

                <p>Total Alumni</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>100</h3>

                <p>Pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2>Profile Akun <?php echo ucfirst($this->session->userdata('sess_level')) ?><h2>
                  <hr>
                </div>
                <div class="card-body pt-0" style="padding-right:200.7px;">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="lead"><b><?php echo ucfirst($this->session->userdata('sess_name')) ?></b></h4>
                      
                      <p class="text-muted text-sm"><b>Tanggal Lahir: </b> <?php echo ucfirst($this->session->userdata('sess_tanggal_lahir')) ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building fa-1x"></i> </span><h6><b>Alamat</b><h6></li>
                          <span align="justify"> <p ><?php echo ucfirst($this->session->userdata('sess_alamat')) ?></p></span>
                          
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope fa-1x"></i> </span><h6><b>Email</b><h6></li>
                          <span align="justify"> <p ><?php echo ucfirst($this->session->userdata('sess_email')) ?></p></span>
                          
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone fa-1x"></i> </span><h6><b>No telfon</b><h6></li>
                          <span align="justify"> <p ><?php echo ucfirst($this->session->userdata('sess_telfon')) ?></p></span>
                          <br>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                        
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="<?= base_url() . 'Admin/edit_profile' ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Edit Profile
                    </a>
                    <a href="<?= base_url() . 'Admin/edit_profile' ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-key"></i> Change Password
                    </a>
                  </div>
                </div>
              </div>
          </div>
      </div><!-- /.container-fluid -->

      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>
